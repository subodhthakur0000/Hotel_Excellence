<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seo;
use DB;
use App\Traits\Validation;
use Carbon\Carbon;
use Session;

class SeoController extends Controller
{
	use Validation;

    public function index()
  {
    $seo = Seo::orderBy('created_at', 'desc')->get();
    return view('cd-admin.seo-section.view-seo',compact('seo'));


  }

  public function insertform()
  {
    return view('cd-admin.seo-section.add-seo');
  }

  public function store()
  {
   $a=[];
   $test=$this->seovalidation();
   $a['created_at'] = Carbon::now('Asia/Kathmandu');
   $merge = array_merge($test,$a);
   DB::table('seos')->insert($merge);
   Session::flash('success');
   return redirect('/viewseo');
 }

 public function edit($id)
 {
  $seo = Seo::findorfail($id);

  return view('cd-admin.seo-section.edit-seo',compact('seo'));
}

public function update($id)
{
 $a=[];
 $test=$this->seovalidation();
 $a['updated_at'] = Carbon::now('Asia/Kathmandu');
 $merge =  array_merge($test,$a);
 DB::table('seos')->where('id',$id)->update($merge);
 Session::flash('updatesuccess');
 return redirect('/viewseo');
}

public function delete($id)
{
  DB::table('seos')->where('id',$id)->delete();
  Session::flash('deletesuccess');
  return redirect('/viewseo');
}

}
