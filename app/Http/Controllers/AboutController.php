<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use Illuminate\Support\Facades\Input;
use DB;
use App\Traits\Imagetrait;
use App\Traits\Validation;
use Session;

class AboutController extends Controller
{
  use Imagetrait;
  use Validation;
    
  	public function index()
  	{
  		$about = About::orderBy('created_at', 'desc')->get();
  		return view('cd-admin.about.view-about',compact('about'));
  	}

    public function viewinsertform()
    {
      return view('cd-admin.about.insert-about');
    }

    use Imagetrait;
    public function insert()
    {
      
       $test=$this->validation();
       $data = new About();
       $data['title'] = $test['title'];
       $data['summary'] = $test['summary'];
       $data['description'] = $test['description'];
       $data['image'] = $this->imageupload($test['image']);
       $data['imagedescription'] = $test['imagedescription'];
       $data->save();
       Session::flash('success');
        return redirect('/viewabout');
    }

    public function edit($id)
    {
      $about = About::findorfail($id);
      
      return view('cd-admin.about.edit-about',compact('about'));
    }

  	public function update($id)
  	{
      $test= $this->validation();
  		 $data = About::findorfail($id);
  		 $data['title'] = $test['title'];
  		 $data['summary'] = $test['summary'];
  		 $data['description'] = $test['description'];
       $data['image'] = $this->imageupload($test['image']);
  		 $data['imagedescription'] = $test['imagedescription'];
       $data->update();
       Session::flash('updatesuccess');
        return redirect('/viewabout');
  	}

    public function delete($id)
  {
    $test = DB::table('abouts')->where('id',$id)->get()->first();
    if(file_exists('public/uploads'.$test->image))
    {
      unlink('public/uploads'.$test->image);
    }
    DB::table('abouts')->where('id',$id)->delete();
    Session::flash('deletesuccess');
    return redirect('/viewabout');
  }
  	
}
