<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


trait Imagetrait {
	public function imageupload($name){
		if(isset($name)){
			$file = $name;
			$fileName = time().$file->getClientOriginalName();
			$destinationPath = public_path('uploads');
			$file->move($destinationPath,$fileName);

			return $fileName;
		}    
	}

}