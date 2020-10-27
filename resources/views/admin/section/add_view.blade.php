@extends('layouts.admin')

@section('title')
    add section
    @endsection


@section('content')

    <form method="post" action="">
        {{csrf_field()}}
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                     section info
                </div>

                <div class="panel-body">
                    <div class="form-group">
                       <label>Name:</label>
                       <input type="text"  name="name" class="form-control">

                    </div>
                    <div class="form-group">
                        <label>editor</label>
                        <select name="admin">
                            <option value="">empty</option>
                            @foreach($users as $user)
                                <option value='{{$user->id}}'> {{$user->name}} </option>
                                @endforeach
                        </select>
                    </div>


                <div class="panel-footer">
                    <input type="submit" value="save"  class="btn btn-primary">
                </div>
            </div>
        </div>
        </div>

    </form>
    @endsection