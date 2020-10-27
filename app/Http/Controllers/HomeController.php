<?php

namespace App\Http\Controllers;

use App\model\Photo;
use App\model\Post;
use App\model\Section;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');

//        $sec =post::find(1);
//        dump($sec->user);


//        $sec =Photo::find(1);
//        dump($sec->posts);
    }


}
