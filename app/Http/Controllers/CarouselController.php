<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carousel;
use Illuminate\Support\Facades\Input;
use DB;
use App\Traits\Imagetrait;
use App\Traits\Validation;
use Carbon\Carbon;
use Session;

class CarouselController extends Controller
{
	use Imagetrait;
	use Validation;
	public function index()
	{
		$carousel = Carousel::orderBy('created_at', 'desc')->get();
		return view('cd-admin.carousel.view-carousel',compact('carousel'));
	}

	public function insertform()
	{
		return view('cd-admin.carousel.add-carousel');
	}


	public function store()
	{
		$a=[];
		$test=$this->carouselvalidation();
		$a['created_at'] = Carbon::now('Asia/Kathmandu');
		$a['image'] = $this->imageupload($test['image']);
		$merge = array_merge($test,$a);
		DB::table('carousels')->insert($merge);
		Session::flash('success');
		return redirect('/viewcarousel');

	}

	public function update($id)
	{
		
		$a = [];
		$carousel = DB::table('carousels')->where('id',$id)->get()->first();
		if($carousel->status=='Active')
		{
			$a['status'] = 'Inactive';
		}
		else
		{
			$a['status'] = 'Active'; 
		}
		DB::table('carousels')->where('id',$id)->update($a);
		Session::flash('statusupdatesuccess');
		return redirect('/viewcarousel');

	}


	public function delete($id)
	{
		$test = DB::table('carousels')->where('id',$id)->get()->first();
		if(file_exists('public/uploads'.$test->image))
		{
			unlink('public/uploads'.$test->image);
		}
		DB::table('carousels')->where('id',$id)->delete();
		Session::flash('deletesuccess');
		return redirect('/viewcarousel');
	}
}
