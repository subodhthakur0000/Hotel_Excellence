<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carousel;
use App\Feedback;
use App\About;
use App\Seo;
use DB;
use App\Traits\Validation;
use Carbon\Carbon;

class FrontendController extends Controller
{
	use Validation;
    public function home(){
    	$carousel = Carousel::where('status','Active')->get();
    	$seo = Seo::where('pagetitle','Home')->get()->first();
    	$about = DB::table('abouts')->get()->first();
    	$data = DB::table('rooms')->take(3)->get();
    	return view('home.home',compact('carousel','seo','about','data'));

    }

   public function sendfeedback()
   {
   $a=[];
   $test=$this->feedbackvalidation();
   $a['created_at'] = Carbon::now('Asia/Kathmandu');
   $merge = array_merge($test,$a);
   DB::table('feedback')->insert($merge);
   flash('Message Sent');
   return redirect('/');
 }

 public function about(){
 	$about = DB::table('abouts')->get()->first();
 	$data = DB::table('rooms')->get();
 	$seo = Seo::where('pagetitle','About')->get()->first();
    	return view('about.about',compact('about','seo','data'));

    }

 public function accomodation(){
 	$accomodation = DB::table('accomodations')->get()->first();
 	$tailoredprograms = DB::table('programs')->get();
 	$seo = Seo::where('pagetitle','Accomodation')->get()->first();
    	return view('excellence.excellence',compact('accomodation','tailoredprograms','seo'));

    }

    public function album()
	{
		$facilities = DB::table('facilities')->orderBy('created_at','desc')->get();
		$seo = Seo::where('pagetitle','Facilities')->get()->first();
		return view('gallery.album',compact('facilities','seo'));
	}

	public function images($id)
	{
		$image = DB::table('imageviews')->where('facilities_id',$id)->orderBy('created_at','desc')->get();
		$album_name = DB::table('facilities')->where('id',$id)->get()->first();
		return view('gallery.item',compact('image','album_name'));
	}

	 public function room($id)
	{
		$data = DB::table('rooms')->where('id',$id)->get();
		$seo = Seo::where('pagetitle','Room')->get()->first();
		return view('room.room',compact('data','seo'));
	}

	public function contact()
	{
		$seo = Seo::where('pagetitle','Contact')->get()->first();
		return view('contact.contact',compact('seo'));
	}

}
