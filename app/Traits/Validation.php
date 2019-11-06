<?php
namespace App\Traits;

use Illuminate\Http\Request;


trait Validation {
	public function validation(){
       $request = Request()->all();
        $data = Request()->validate([
            'title'     =>  'required',
            'summary'    => 'required',
            'description'  => 'required',
            'image'       => 'required|mimes:jpg,JPG,JPEG,jpeg,png,GIF',
            'imagedescription' => 'required',

        ]);
        
       return ($data);

       }

  public function genvalidation()
       {
        $data = Request()->validate([
            'title'     =>  'required',
            'headdescription'    => 'required',
            'bodydescription'  => 'required',
            'status'      => 'required',
        ]);
       return ($data);
       }

  public function carouselvalidation()
  {
    $data = Request()->validate([
            'title'     =>  'required',
            'image'    => 'required|mimes:jpg,JPG,JPEG,jpeg,png,GIF',
            'imagedescription'  => 'required',
            'status'      => 'required',
        ]);
       return ($data);
  }

   public function facilitiesvalidation()
  {
    $data = Request()->validate([
            'seotitle'     =>  'required',
            'seokeyword'     =>  'required',
            'seodescription'     =>  'required',
            'title'     =>  'required',
            'image'    => 'required|mimes:jpg,JPG,JPEG,jpeg,png,GIF',
            'imagedescription'  => 'required',
            'status'      => 'required',
        ]);
       return ($data);
  }

  public function programvalidation()
  {
    $data = Request()->validate([
            'title'     =>  'required',
            'slug' => '',
            'summary'    => 'required',
            'description'  => 'required',
            'image'    => 'required|mimes:jpg,JPG,JPEG,jpeg,png,GIF',
            'imagedescription'  => 'required',
            'status'      => 'required',
        ]);
       return ($data);
  }

   public function roomvalidation()
  {
    $data = Request()->validate([
            'title'     =>  'required',
            'summary'    => 'required',
            'description'  => 'required',
            'image'    => 'required|mimes:jpg,JPG,JPEG,jpeg,png,GIF',
            'imagedescription'  => 'required',
            'status'      => 'required',
        ]);
       return ($data);
  }

  public function seovalidation()
  {
    $data = Request()->validate([
            'pagetitle'     =>  'required',
            'seotitle'    => 'required',
            'seokeyword'  => 'required',
            'seodescription'  => 'required',
        ]);
       return ($data);
  }

  public function imagevalidation()
  {
    $data = Request()->validate([
            'facilities_id' => 'required',
            'image'    => 'required|mimes:jpg,JPG,JPEG,jpeg,png,GIF',
            'imagedescription'  => 'required',
            'status'      => 'required',
        ]);
       return ($data);
  }

  public function feedbackvalidation()
  {
       $data = Request()->validate([
            'email'    => 'required|email',
            'message'  => 'required',
            'status' => '',
        ]);
       return ($data);

    }
       
   
    public function replyvalidation()
  {
    $data = Request()->validate([
            'email'    => 'required|email',
            'message'  => 'required',
            'status'  => 'required',
        ]);
       return ($data);
  }

  public function quickvalidation()
  {
    $data = Request()->validate([
            'emailto'    => 'required|email',
            'subject'   => 'required',
            'message'  => 'required',
        ]);
       return ($data);
  }


       
    
}