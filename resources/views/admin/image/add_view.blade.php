@extends('layouts.admin')

@section('title')
    add image
    @endsection


@section('content')

    <form method="post" action="" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                     image info
                </div>

                <div class="panel-body">

                    <div class="form-group">
                        <input class="btn btn-primary" type="file"  value="upload" name="photo" >
                    </div>


                <div class="panel-footer">
                    <input type="submit" value="save"  class="btn btn-primary">
                </div>
            </div>
        </div>
        </div>

    </form>
    @endsection