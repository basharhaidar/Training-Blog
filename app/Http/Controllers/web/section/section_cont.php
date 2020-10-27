<?php

namespace App\Http\Controllers\web\section;

use App\model\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class section_cont extends Controller
{

    public function index($id){
        $section = Section::find($id);
        $posts = $section->posts;
        $arr['posts']=$posts;
        return view('web.section.index_view',$arr);

    }
    //
}
