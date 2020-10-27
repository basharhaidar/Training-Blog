<?php

namespace App\Http\Controllers\admin\section;

use App\model\Section;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class section_cont extends Controller
{
    //
    public function add(Request $request){
        if($request->isMethod('post')){
            if(!is_null($request->input('name'))){
                $section = Section::create($request->all());
            }
            if(!is_null($request->input('admin'))){
                $user = User::find($request->input('admin'));
                $user->role='editor';
                $user->update();
            }
            return redirect()->back();
        }else{

            $users=User::select('id','name')->where('role','user')->get();
            $arr['users']=$users;
            return view ('admin.section.add_view',$arr);
        }

    }


    public function update(Request $request,$id){
        $section =Section::find($id);

        if($request->isMethod('post'))
        {
            $section->name=$request->input('name');
            if(is_null($request->input('admin')) or $section->admin != $request->input('admin')) {

                if (!is_null($section->admin)){
                    $old_admin = User::find($section->admin);
                $old_admin->role = 'user';
                $old_admin->update();
                 }
                $section->admin=$request->input('admin');
                if(!is_null($request->input('admin'))){
                    $admin =User::find($request->input('admin'));
                    $admin->role='editor';
                    $admin->update();
                }
            }

            $section->update();
            return redirect()->back();
        }else{
            $arr['section']=$section;
            $users=User::select('id','name')->where('role','user')->get();
            $arr['users']=$users;
            return view('admin.section.update_view',$arr);

        }

    }


    public function index(){
        $sections = Section::select('id','name','admin')->get();
        $arr['sections']= $sections;
        return view('admin.section.index_view',$arr);
    }

    public function delete(Request $request , $id)
    {
        $section = Section::find($id);

        if ($request->isMethod('post')) {

            if($section->admin) {
                $user =User::find($section->admin);
                $user->role = 'user';
                $user->update();
             }
            $section->delete();
            return redirect(route('index.section'));

        } else {
            $arr['section'] = $section;
            return view('admin.section.delete_view', $arr);
        }
    }

}
