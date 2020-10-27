<?php

namespace App\Http\Controllers\admin\post;

use App\model\Photo;
use App\model\Post;
use App\model\Section;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class post_cont extends Controller
{
    //
    public function add(Request $request){
        $user = Auth::user();

        if ($request->isMethod('post')){
            $section = Section::find($request->input('section_id'));
            if($user->can('control_post',$section)){
                $post =$user->posts()->create($request->all());
                /*            $post =Post::create([
                                'title'=>$request->input('title'),
                                'content'=>$request->input('content'),
                                'user_id'=>$user->id,
                                'section_id'=>$request->input('section_id'),

                            ]);*/
                $post->photos()->attach($request->input('photos'));
                return redirect()->back();
            }else{

                dd('errore no have permission');
            }


        }else{
            $flag='%';
            if($user->role =='editor'){
                $flag=$user->section->id;
            }
            $sections = Section::select('*')->where('id','like',$this->getflag())->get();
            $arr ['sections']= $sections;
            $photos =Photo::all();
            $arr['photos']=$photos;
            return view('admin.post.add_view',$arr);
        }

    }

    public function getflag(){
        $user = Auth::user();
        $flag='%';
        if($user->role =='editor'){
            $flag=$user->section->id;
        }
        return $flag;
    }

        //
    public function update(Request $request,$id){
        $post = Post::find($id);
        $sections = $post->section;
        $user = Auth::user();
        if($user->can('control_post',$sections)) {
            if ($request->isMethod('post')) {
                $post->update($request->all());
                $post->photos()->detach();
                $post->photos()->attach($request->input('photos'));
                return redirect()->back();


            } else {
                $sections = Section::select('*')->where('id', 'like', $this->getflag())->get();
                $arr ['sections'] = $sections;
                $arr ['post'] = $post;
                $photos = Photo::all();
                $arr['photos'] = $photos;
                $photo_chake = $post->photos;
                $arr['photo_chake'] = $photo_chake;

                return view('admin.post.update_view', $arr);
            }
        }else{
            dd('error no have permission');
        }

    }
        //
    public function delete(Request $request,$id){
        $post =Post::find($id);
        $user = Auth::user();
        $section =$post->section;
        if ($user->can('control_post',$section)){
            if ($request->isMethod('post')){

                $post->delete();
               return redirect(route('index.post'));

            }else{
                $arr['post']=$post;
                return view('admin.post.delete_view',$arr);
            }
        }

    }
        //
    public function index(Request $request){
        $posts = post::where('section_id','like',$this->getflag())->get();
        $arr['posts']=$posts;
        return view('admin.post.index_view',$arr);
    }





}
