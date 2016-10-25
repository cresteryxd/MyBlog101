<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{
    //pic upload
    public function upload()
    {
        $file = Input::file('Filedata');
        if($file -> isValid()){

            $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path = $file -> move(base_path().'/uploads',$newName);
//            echo $path;

//            $filepath = 'uploads/'.$newName;
//            $filepath = $path.$newName;
            return $path;
//            $path_data = [
//                '_path' => $path,
//                '_filepath' => $filepath
//            ];
//            return $path_data;
        }
    }
}
