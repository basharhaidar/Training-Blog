@extends('layouts.admin')

@section('title')
    index section
    @endsection


@section('content')

    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                image table
                <a class="btn btn-primary" href="{{route("add.image")}}">add</a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                @foreach($photos as $photo)
                <a href="{{route('delete.image',['id'=>$photo->id])}}" >  <img src='{{url('/images/'.$photo->path)}}' style="width: 100px;height: 100px">  </a>

            @endforeach
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>

    @endsection