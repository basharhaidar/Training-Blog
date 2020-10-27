@extends('layouts.admin')

@section('title')
    update section
@endsection


@section('content')

    <form method="post" action="">
        {{csrf_field()}}
        <div class="col-lg-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    update section
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text"  name="name" class="form-control" value="{{$section->name}}">

                    </div>
                    <div class="form-group">

                        <label>editor</label>
                        <select name="admin" >
                            <option value="">empty</option>
                            @foreach($users as $user)
                                <option value='{{$user->id}}'> {{$user->name}} </option>
                            @endforeach
                            @if(!is_null($section->Admin))

                                <option selected="selected" value="{{$section->Admin->id}}">{{$section->Admin->name}}</option>
                            @endif
                        </select>
                    </div>


                    <div class="panel-footer">
                        <input type="submit" value="save"  class="btn btn-info">
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection