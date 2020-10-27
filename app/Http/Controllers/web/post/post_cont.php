<?php

namespace App\Http\Controllers\web\post;

use App\model\Comment;
use App\model\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class post_cont extends Controller
{
    //
    public function index( Request $request,$id){
        $post = Post::find($id);
        if($request->isMethod('post')){
            $post->comments()->create([
               'content'=>$request->input('content'),
                'user_id'=>Auth::user()->id,
            ]);
            return redirect()->back();

        }else{
            $arr['post']=$post;
            $arr['comments']=$post->comments;
            return view('web.post.index_view',$arr);
//            dd($post->comments);
        }

    }

    public function editcomment(Request $request,$id){
        $comment = Comment::find($id);
        $user = Auth::user();
        $section = $comment->post->section;
        $post =$comment->post;
        if($user->can('editcomment',$comment) or $user->can('control_post',$section)){
            if($request->isMethod('post')){
                $comment->update($request->all());
                return redirect(route('index.post.web',['id'=>$post->id]));
            }else{
                $arr['comment']=$comment;
                $arr['post']=$post;

                return view('web.post.edit_comment_view',$arr);
            }
        }

    }

    public function deletecomment($id)
    {
        $comment = Comment::find($id);
        $user = Auth::user();
        $section = $comment->post->section;
        $post = $comment->post;
        if ($user->can('editcomment', $comment) or $user->can('control_post', $section)) {
            $comment->delete();
            return redirect()->back();
        }

    }

}
