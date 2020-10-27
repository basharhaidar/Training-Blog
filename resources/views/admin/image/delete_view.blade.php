@extends('layouts.admin')

@section('title')
    delete section
    @endsection


@section('content')

    <form method="post" action="">
        {{csrf_field()}}
        <div class="col-lg-4">
            <div class="panel panel-red">
                <div class="panel-heading">
                    delete section
                </div>

                <div class="panel-body">

                    <div class="form-group">
                        <label>are you sure</label><br>
                        <img src="{{url('/images/'.$photo->path)}}" style="width: 100px;height: 100px">

                    </div>

                <div class="panel-footer">
                    <input type="submit" value="delete"  class="btn btn-danger">
                </div>
            </div>
        </div>
        </div>

    </form>
    @endsection