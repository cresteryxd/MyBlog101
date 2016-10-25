<?php

namespace App\Http\Controllers\Admin;

class MapController extends CommonController
{
    //
    public function index(){
       return view('admin.map.map');
    }
}
