<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;
use App\Program;
use Session;
use Carbon\Carbon;
use DB;
use App\Traits\Validation;
use Illuminate\Support\Facades\Mail;
use App\Mail\Quick;
use App\Quickmail;


class DashboardController extends Controller
{
	use Validation;
    public function index()
    {
    	$program = Program::all()->count();
    	$countreplied = Feedback::where('status','Replied')->count();
      $countnotreplied = Feedback::where('status','Not Replied')->count();

      $countquickmail = Quickmail::all()->count();
    	$quick = Quickmail::orderBy('created_at', 'desc')->take(8)->get();

    	return view('cd-admin.dashboard.view-dashboard',compact('count','program','quick','countquickmail','countreplied','countnotreplied'));
    }

    public function store()
   {
   $a=[];
   $test=$this->quickvalidation();
   $a['created_at'] = Carbon::now('Asia/Kathmandu');
   $merge = array_merge($test,$a);
   DB::table('quickmails')->insert($merge);
   Mail::to($merge['emailto'])->send(new Quick($merge));
   Session::flash('success');
   return redirect('/');
 }

 public function viewquick()
 {
  $quick = Quickmail::orderBy('created_at', 'desc')->get();
 	return view('cd-admin.dashboard.viewquick',compact('quick'));
 }

 public function deletequick($id)
  {
    DB::table('quickmails')->where('id',$id)->delete();
    Session::flash('deletesuccess');
    return redirect('/viewquickmail');
  }
    
}
