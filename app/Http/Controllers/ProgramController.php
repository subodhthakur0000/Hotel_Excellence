<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Validation;
use App\Traits\Imagetrait;
use Session;
use Carbon\Carbon;
use DB;
use App\Program;

class ProgramController extends Controller
{
	use Validation;
	use Imagetrait;
    public function insertform()
    {
    	return view('cd-admin.tailored-programs.add-tailored-programs');
    }

    public function index()
    {
        $program = Program::orderBy('created_at', 'desc')->get();
    	return view('cd-admin.tailored-programs.view-tailored-programs',compact('program'));
    }

    public function store()
    {
    	$a=[];
		$test=$this->programvalidation();
		$a['created_at'] = Carbon::now('Asia/Kathmandu');
		$a['image'] = $this->imageupload($test['image']);
    $a['slug'] = str_slug($test['title']);
		$merge = array_merge($test,$a);
		DB::table('programs')->insert($merge);
		Session::flash('success');
		return redirect('/viewtailoredprograms');
    }

    public function edit($slug)
    {
      $program = Program::where('slug',$slug)->get()->first();
      
      return view('cd-admin.tailored-programs.edit-tailored-programs',compact('program'));
    }

    public function update($slug)
    {
      $test= $this->programvalidation();
         $data = Program::where('slug',$slug)->get()->first();
         $data['title'] = $test['title'];
         $data['slug'] = str_slug($test['title']);
         $data['summary'] = $test['summary'];
         $data['description'] = $test['description'];
       $data['image'] = $this->imageupload($test['image']);
         $data['imagedescription'] = $test['imagedescription'];
         $data['status'] = $test['status'];
       $data->update();
       Session::flash('updatesuccess');
        return redirect('/viewtailoredprograms');
    }

    public function updatestatus($slug)
{

  $a = [];
  $program = DB::table('programs')->where('slug',$slug)->get()->first();
  if($program->status=='Active')
  {
    $a['status'] = 'Inactive';
  }
  else
  {
    $a['status'] = 'Active'; 
  }
  DB::table('programs')->where('slug',$slug)->update($a);
  Session::flash('statusupdatesuccess');
  return redirect('/viewtailoredprograms');

}

    public function delete($slug)
  {
    $test = DB::table('programs')->where('slug',$slug)->get()->first();
    if(file_exists('public/uploads'.$test->image))
    {
      unlink('public/uploads'.$test->image);
    }
    DB::table('programs')->where('slug',$slug)->delete();
    Session::flash('deletesuccess');
    return redirect('/viewtailoredprograms');
  }
}
