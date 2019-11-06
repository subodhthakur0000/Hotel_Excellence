<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imageview;
use App\Facilities;
use Illuminate\Support\Facades\Input;
use DB;
use App\Traits\Imagetrait;
use App\Traits\Validation;
use Carbon\Carbon;
use Session;

class ImageviewController extends Controller
{
	use Imagetrait;
	use Validation;
    public function index($facilities_id)
	{
		$facilities = Facilities::where('id',$facilities_id)->get()->first();
		$images = DB::table('imageviews')->where('facilities_id',$facilities_id)->get();
		return view('cd-admin.facilities.view-image',compact('images','facilities'));
	}

	public function insertform($facilities_id)
	{
		$facilities = Facilities::where('id',$facilities_id)->get()->first();
		return view('cd-admin.facilities.add-image',compact('facilities'));
	}


	public function store($facilities_id)
	{
		$a=[];
		$test=$this->imagevalidation();
		$a['created_at'] = Carbon::now('Asia/Kathmandu');
		$a['image'] = $this->imageupload($test['image']);
		$merge = array_merge($test,$a);
		DB::table('imageviews')->insert($merge);
		Session::flash('success');
		return redirect('/viewimage/'.$facilities_id);

	}

	public function update($id)
	{
		
		$a = [];
		$imageviews = DB::table('imageviews')->where('id',$id)->get()->first();
		if($imageviews->status=='Active')
		{
			$a['status'] = 'Inactive';
		}
		else
		{
			$a['status'] = 'Active'; 
		}
		DB::table('imageviews')->where('id',$id)->update($a);
		return redirect('/viewimage');

	}


	public function delete($id)
	{
		$test = DB::table('imageviews')->where('id',$id)->get()->first();
		if(file_exists('public/uploads'.$test->image))
		{
			unlink('public/uploads'.$test->image);
		}
		DB::table('imageviews')->where('id',$id)->delete();
		Session::flash('deletesuccess');
		return redirect()->back();
	}

}
