@extends('layouts.admin')

@section('title')
    add post
    @endsection


@section('content')

    <form method="post" action="">
        {{csrf_field()}}
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                     post info
                </div>

                <div class="panel-body">
                    <div class="form-group">
                       <label>title:</label>
                       <input type="text"  name="title" placeholder="title" class="form-control">

                    </div>

                    <div class="form-group">
                       <label>content:</label>
                        <textarea   name="content" placeholder="content" class="form-control ckeditor"></textarea>

                    </div>

                    <div class="form-group">
                        <label>sections</label>
                        <select name="section_id" class="form-control">
                            @foreach($sections as $section)
                                <option value="{{$section->id}}"> {{$section->name}} </option>
                                @endforeach
                        </select>
                    </div>


                <div class="panel-footer">
                    <input type="submit" value="save"  class="btn btn-primary">
                </div>
            </div>
        </div>
        </div>



        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                     image info
                </div>

                <div class="panel-body">
                    <div class="row">

                            @foreach($photos as $photo)

                                <div class="col-md-4">

                                <img src="{{url('/images/'.$photo->path)}}"  style="width: 100px ;height: 100px ;margin: 10px" onclick="alert('{{url( '/images/'.$photo->path)}}')">
                                <input type="checkbox" name="photos[]" value="{{$photo->id}}" >
                                </div>

                                @endforeach

                    </div>
                </div>


            </div>
        </div>

    </form>
    @endsection