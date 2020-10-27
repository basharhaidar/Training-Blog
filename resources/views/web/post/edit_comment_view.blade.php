@extends('layouts.web_app')

@section('title')
    {{$post->title}}
    @endsection

@section('head')
    <style>

        .myTextArea{
            border: 1px solid silver !important;
            border-radius: 20px !important;

            padding: 10px !important;
        }
        .myTextArea:focus{
             border: 1px solid #2aa6cb !important;
             border-radius: 20px !important;

            padding: 10px !important;
        }

    </style>


    @endsection

@section('content')



    @auth
    <div class="container">
        <div class="row">
            <div class=" col-md-12">
                <form method="post" action="">
                       {{csrf_field()}}
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>comment</label>
                            <textarea rows="5" class="form-control myTextArea" placeholder="comment" name="content" required data-validation-required-message="Please enter a message.">{{$comment->content}}</textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="border-radius: 10px" id="sendMessageButton">save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endauth


@endsection



@section('subject')
    {{$post->title}}
    @endsection

@section('headerimage')
    {{count($post->photos)>0? url('/images/'.$post->photos[0]->path): url('/images/home.jpg') }}
    @endsection


