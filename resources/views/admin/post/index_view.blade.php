@extends('layouts.admin')

@section('title')
    index post
    @endsection


@section('content')

    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                all posts
                <a class="btn btn-primary" href="{{route("add.post")}}">add post</a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Section</th>
                        <th>Post by</th>
                        <th>Date</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr class="odd gradeX">
                        <td>{{$post->title}}</td>
                        <td>{{$post->section->name}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->created_at }}</td>
                        <td>
                           <a class="btn btn-danger" href="{{route('delete.post',['id'=>$post->id])}}">delete</a>
                           <a class="btn btn-warning" href="{{route('update.post',['id'=>$post->id])}}">update</a>
                        </td>

                    </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>
    </div>

    @endsection