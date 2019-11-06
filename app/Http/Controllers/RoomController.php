<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use Illuminate\Support\Facades\Input;
use DB;
use App\Traits\Imagetrait;
use App\Traits\Validation;
use Session;

class RoomController extends Controller
{
  use Imagetrait;
  use Validation;
    
  	public function index()
  	{
  		$room = Room::orderBy('created_at', 'desc')->get();
  		return view('cd-admin.room.view-room',compact('room'));
  	}

    public function viewinsertform()
    {
      return view('cd-admin.room.add-room');
    }

    public function insert()
    {
      
       $test=$this->roomvalidation();
       $data = new Room();
       $data['title'] = $test['title'];
       $data['summary'] = $test['summary'];
       $data['description'] = $test['description'];
       $data['image'] = $this->imageupload($test['image']);
       $data['imagedescription'] = $test['imagedescription'];
       $data['status'] = $test['status'];
       $data->save();
       Session::flash('success');
        return redirect('/viewroom');
    }

    public function edit($id)
    {
      $room = Room::findorfail($id);
      
      return view('cd-admin.room.edit-room',compact('room'));
    }

  	public function update($id)
  	{
      $test= $this->roomvalidation();
  		 $data = Room::findorfail($id);
  		 $data['title'] = $test['title'];
  		 $data['summary'] = $test['summary'];
  		 $data['description'] = $test['description'];
       $data['image'] = $this->imageupload($test['image']);
  		 $data['imagedescription'] = $test['imagedescription'];
       $data->update();
       Session::flash('updatesuccess');
        return redirect('/viewroom');
  	}

    public function updatestatus($id)
{

  $a = [];
  $room = DB::table('rooms')->where('id',$id)->get()->first();
  if($room->status=='Active')
  {
    $a['status'] = 'Inactive';
  }
  else
  {
    $a['status'] = 'Active'; 
  }
  DB::table('rooms')->where('id',$id)->update($a);
  return redirect('/viewroom');

}

    public function delete($id)
  {
    $test = DB::table('rooms')->where('id',$id)->get()->first();
    if(file_exists('public/uploads'.$test->image))
    {
      unlink('public/uploads'.$test->image);
    }
    DB::table('rooms')->where('id',$id)->delete();
    Session::flash('deletesuccess');
    return redirect('/viewroom');
  }
  	
}
