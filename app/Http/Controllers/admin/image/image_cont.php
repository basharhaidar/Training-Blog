<?php

namespace App\Http\Controllers\admin\image;

use App\model\Photo;
use function GuzzleHttp\Promise\queue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class image_cont extends Controller
{
    public function add(Request $request){
        if($request->isMethod('post')){
            $photo = $request->file('photo');
            $path = $photo->storeAs('post',$photo->getClientOriginalName(),'images');
            Photo::create([
                'path'=>$path
            ]);
            return redirect()->back();
        }else{


            return view ('admin.image.add_view');
        }

    }

    public function delete(Request $request,$id){
        $photo=Photo::find($id);
        if($request->isMethod('post')){
            unlink(public_path('/images/'.$photo->path));
            $photo->delete();
            return redirect(route('index.image'));
        }else{

            $arr ['photo']=$photo;
            return view('admin.image.delete_view',$arr);
        }


    }


    public function index(Request $request){
        $photos = Photo::all();
        $arr ['photos']= $photos ;
        return view('admin.image.index_view',$arr);

    }


}
