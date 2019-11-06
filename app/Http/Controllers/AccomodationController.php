<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accomodation;
use DB;
use App\Traits\Validation;
use Carbon\Carbon;
use Session;

class AccomodationController extends Controller
{
  use Validation;

  public function index()
  {
    $accomodation = Accomodation::orderBy('created_at', 'desc')->get();
    return view('cd-admin.accomodation.view-accomodation',compact('accomodation'));


  }

  public function insertform()
  {
    return view('cd-admin.accomodation.insert-accomodation');
  }

  public function store()
  {
   $a=[];
   $test=$this->genvalidation();
   $a['created_at'] = Carbon::now('Asia/Kathmandu');
   $merge = array_merge($test,$a);
   DB::table('accomodations')->insert($merge);
   Session::flash('success');
   return redirect('/viewaccomodation');
 }

 public function edit($id)
 {
  $accomodation = Accomodation::findorfail($id);

  return view('cd-admin.accomodation.edit-accomodation',compact('accomodation'));
}

public function update($id)
{
 $a=[];
 $test=$this->genvalidation();
 $a['updated_at'] = Carbon::now('Asia/Kathmandu');
 $merge =  array_merge($test,$a);
 DB::table('accomodations')->where('id',$id)->update($merge);
 Session::flash('updatesuccess');
 return redirect('/viewaccomodation');
}

public function updatestatus($id)
{

  $a = [];
  $accomodation = DB::table('accomodations')->where('id',$id)->get()->first();
  if($accomodation->status=='Active')
  {
    $a['status'] = 'Inactive';
  }
  else
  {
    $a['status'] = 'Active'; 
  }
  DB::table('accomodations')->where('id',$id)->update($a);
  return redirect('/viewaccomodation');

}

public function delete($id)
{
  DB::table('accomodations')->where('id',$id)->delete();
  Session::flash('deletesuccess');
  return redirect('/viewaccomodation');
}
}
