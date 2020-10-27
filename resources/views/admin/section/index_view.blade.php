@extends('layouts.admin')

@section('title')
    index section
    @endsection


@section('content')

    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                DataTables Advanced Tables
                <a class="btn btn-primary" href="{{route("add.section")}}">add</a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>name</th>
                        <th>admin</th>
                        <th>action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sections as $section)
                    <tr class="odd gradeX">
                        <td>{{$section->name}}</td>
                        <td>{{is_null($section->Admin)?'':$section->Admin->name }}</td>
                        <td>
                           <a class="btn btn-danger" href="{{route('delete.section',['id'=>$section->id])}}">delete</a>
                           <a class="btn btn-warning" href="{{route('update.section',['id'=>$section->id])}}">update</a>
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