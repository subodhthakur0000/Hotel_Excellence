<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Facilities;
use App\Imageview;
use Illuminate\Support\Facades\Input;
use DB;
use App\Traits\Imagetrait;
use App\Traits\Validation;
use Carbon\Carbon;
use Session;

class FacilitiesController extends Controller
{
    use Imagetrait;
	use Validation;
	public function index()
	{
		$facilities = Facilities::orderBy('created_at', 'desc')->get();
		return view('cd-admin.facilities.view-facilities-items',compact('facilities'));
	}

	public function insertform()
	{
		return view('cd-admin.facilities.add-facility-items');
	}


	public function store()
	{
		$a=[];
		$test=$this->facilitiesvalidation();
		$a['created_at'] = Carbon::now('Asia/Kathmandu');
		$a['image'] = $this->imageupload($test['image']);
		$merge = array_merge($test,$a);
		DB::table('facilities')->insert($merge);
		Session::flash('success');
		return redirect('/viewfacilities');

	}

	public function update($id)
	{
		
		$a = [];
		$facilities = DB::table('facilities')->where('id',$id)->get()->first();
		if($facilities->status=='Active')
		{
			$a['status'] = 'Inactive';
		}
		else
		{
			$a['status'] = 'Active'; 
		}
		DB::table('facilities')->where('id',$id)->update($a);
		return redirect('/viewfacilities');

	}


	public function delete($id)
	{
		$test = DB::table('facilities')->where('id',$id)->get()->first();
		if(file_exists('public/uploads'.$test->image))
		{
			unlink('public/uploads'.$test->image);
		}
		$testimage = DB::table('imageviews')->where('facilities_id',$id)->get();
		foreach($testimage as $img)
		{
		if(file_exists('public/uploads/'.$img->image))
		{
			unlink('public/uploads/'.$img->image);
			DB::table('imageviews')->where('facilities_id',$id)->delete();
		}	
		}
		DB::table('facilities')->where('id',$id)->delete();
		Session::flash('deletesuccess');
		return redirect('/viewfacilities');
	}
}
