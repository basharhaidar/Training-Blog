@extends('layouts.admin')

@section('title')
    update post
@endsection


@section('content')

    <form method="post" action="">
        {{csrf_field()}}
        <div class="col-lg-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    update post
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label>title:</label>
                        <input type="text"  name="title" placeholder="title" class="form-control" value="{{$post->title}}">

                    </div>

                    <div class="form-group">
                        <label>content:</label>
                        <textarea   name="content" placeholder="content" class="form-control ckeditor">{{$post->content}}</textarea>

                    </div>

                    <div class="form-group">
                        <label>sections</label>
                        <select name="section_id" class="form-control">
                            @foreach($sections as $section)
                                <option {{$section->id==$post->section_id?"selected=selected":""}} value="{{$section->id}}"> {{$section->name}} </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="panel-footer">
                        <input type="submit" value="update"  class="btn btn-info">
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    image info
                </div>

                <div class="panel-body">
                    <div class="row">

                            @foreach($photos as $photo)
                                <div class="col-md-4">

                                <img src="{{url('/images/'.$photo->path)}}" style="width: 100px ;height: 100px ;margin: 10px" onclick="alert('{{url( '/images/'.$photo->path)}}')" >
                                <input {{$photo_chake->find($photo)?'checked':''}} type="checkbox" name="photos[]" value="{{$photo->id}}"  >
                                </div>
                            @endforeach


                    </div>
                </div>


            </div>
        </div>


    </form>
@endsection