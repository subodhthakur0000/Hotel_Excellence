<?php

namespace App\Http\Controllers;
use App\Feedback;
use App\Replyfeedback;
use DB;
use App\Traits\Validation;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Reply;

class FeedbackController extends Controller
{
    use Validation;
    public function index()
    {
      $feed = Feedback::orderBy('created_at', 'desc')->get();
    	return view('cd-admin.feedback.viewfeedback',compact('feed'));	
    }

    public function insertform()
    {
    	return view('cd-admin.feedback.add-feedback');
    	
    }

    public function store()
   {
   $a=[];
   $test=$this->feedbackvalidation();
   $a['created_at'] = Carbon::now('Asia/Kathmandu');
   $merge = array_merge($test,$a);
   DB::table('feedback')->insert($merge);
   Session::flash('success');
   return redirect('/feedback');
 }

  public function delete($id)
{
  DB::table('feedback')->where('id',$id)->delete();
  Session::flash('deletereply');
  return redirect('/feedback');
}


public function replystore($id)
   {
   $a=[];
   $test=$this->replyvalidation();
   $a['created_at'] = Carbon::now('Asia/Kathmandu');
   $merge = array_merge($test,$a);

   $data = Feedback::where('id',$id)->get()->first();
   $data['status']=$merge['status'];
   $data->update();

   DB::table('replyfeedbacks')->insert($merge);
   Mail::to($merge['email'])->send(new Reply($merge));
   Session::flash('replysuccess');
   return redirect('/feedback');
 }

 public function sentmessage()
    {
      $reply = Replyfeedback::all();
      return view('cd-admin.feedback.sent-message',compact('reply'));
      
    }

    public function deletereply($id)
{
  DB::table('replyfeedbacks')->where('id',$id)->delete();
  Session::flash('deletereply');
  return redirect('/sentmessage');
}

public function replyform($id){
  $data=Feedback::where('id',$id)->get()->first();
  return view('cd-admin.feedback.reply',compact('data'));
}

}
