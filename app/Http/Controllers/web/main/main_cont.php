<?php

namespace App\Http\Controllers\web\main;

use App\model\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class main_cont extends Controller
{
    //
    public function index(){
        $sections = Section::all();
        $arr['sections'] = $sections;
        return view('web.main.main_view',$arr);

    }
}
