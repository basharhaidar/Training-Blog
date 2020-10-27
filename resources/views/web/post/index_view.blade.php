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

        .comment{
            margin: 20px;
            border: solid #0000cc 1px;
            border-radius: 20px;
            padding: 20px;
            word-wrap: break-word;
        }

        .comment .user_name{
            width: 75px;
            height: 75px;
            background-color: #0d6aad;
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cont{
            font-size: 10px;
        }

        .comment .foot{
            font-size: 12px;
            color: #a4a4a4;
            margin-left:auto ;
            margin-right: 0;

        }
    </style>


    @endsection

@section('content')

    <article>
            <div class="row">
                <div class="col-md-12 ">
                    {!! $post->content !!}
                    <hr>

                    <div class="row">
                        @foreach($post->photos as $photo)
                            <div class="col-md-4">
                                <img src="/images/{{$photo->path}}" style="width: 100px ; height: 100px">

                            </div>
                            @endforeach
                    </div>
                </div>
            </div>
    </article>

    <hr>

    @auth
    <div class="container">
        <div class="row">
            <div class=" col-md-12">
                <form method="post" action="">
                       {{csrf_field()}}
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>comment</label>
                            <textarea rows="5" class="form-control myTextArea" placeholder="comment" name="content" required data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="border-radius: 10px" id="sendMessageButton">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

           @foreach($comments as $comment)
            <div class="row comment">

                <div class="col-md-2">
                    <div class="user_name">
                        <label>{{$comment->user->name}}</label>
                    </div>
                </div>

                <div class="col-md-8">
                    {{--{{$comment->content}}--}}
                    {!! str_replace(array("\n"),"<br>",$comment->content) !!}

                </div>

                @if(Auth::user()->id==$comment->user_id or Auth::user()->role=='admin' or $comment->post->section->admin == Auth::user()->id )
                <div class="col-md-2">
                    <div class="cont">
                        <a href="{{route('edit.comment.web',['id'=> $comment->id])}}">Edit</a>|
                        <a href="#" onclick="deletecomment('{{route('delete.comment.web',['id'=> $comment->id])}}')">Delete</a>
                    </div>
                </div>
                @endif

                <div class="foot">
                    {{$comment->created_at}}
                </div>

            </div>
               @endforeach
        </div>
        <script>
           function  deletecomment($url){
               var $flage=confirm("are you sure");
               if($flage){
                   window.location.href=$url;

               }
            }

        </script>
    </div>
    @endauth


@endsection



@section('subject')
    {{$post->title}}
    @endsection

@section('headerimage')
    {{count($post->photos)>0? url('/images/'.$post->photos[0]->path): url('/images/home.jpg') }}
    @endsection


