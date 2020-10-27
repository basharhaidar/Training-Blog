@extends('layouts.web_app')

@section('title')
    main page
    @endsection

@section('content')
    <div class="row">
        @foreach($sections as $section)
            <div class="col-md-4">
                <a href="{{route('index.section.web',['id'=> $section->id])}}">
                    <div class="panel">
                        <label>{{$section->name}}</label>

                    </div>
                </a>
            </div>
            @endforeach
    </div>
    @endsection



@section('subject')
    welcome
    @endsection

@section('headerimage')
    {{url('/images/home.jpg')}}
    @endsection

@section('head')
    <style>
        .panel{
            border: #1b6d85 1px dashed;
            padding: 30px;
            margin: 30px;
            border-radius: 20px;
            width: 100%;
        }

        .panel:hover{
            background-color: #1b6d85;
            color: white;

        }
    </style>


    @endsection

