@extends('layouts.app')
@section('title', 'مشاهده سوال')
@section('styles')
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h4>{{$question->title}}</h4>
                            <div class="mr-auto">
                                <a href="{{route('questions.index')}}" class="btn btn-lg btn-outline-danger"> لیست سوالات
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a href="" title="This question is usefull" class="vote-up">
                                <i class='fas fa-caret-up' style='font-size:24px'></i>
                            </a>
                            <span class="votes-count">1230</span>
                            <a href="" title="This question is not usefull" class="vote-down off">
                                <i class='fas fa-caret-down' style='font-size:24px'></i>
                            </a>
                            <a href="" title="Click to mark as favorite question ( Click again to undo )  " class="favorite favorited mt-2">
                                ​<i class='fas fa-certificate' style='font-size:20px'></i>
                            </a>
                            <span class="favorties-count">123</span>
                        </div>
                        <div class="media-body">
                            {!! $question->body_html !!}
                            <div class="float-left">
                                <span class="text-muted">تاریخ: {{$question->created_date}}</span>
                                <div class="media">
                                    <a href="{{$question->user->url}}" class="pl-2">
                                        <img src="{{$question->user->avatar}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{$question->answers_count ." ". str_plural('answer ', $question->answers_count)}}</h2>
                    </div>
                    <hr>
                    @foreach($question->answers as $answer)
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a href="" title="This answer is usefull" class="vote-up">
                                <i class='fas fa-caret-up' style='font-size:24px'></i>
                            </a>
                            <span class="votes-count">1230</span>
                            <a href="" title="This answer is not usefull" class="vote-down off">
                                <i class='fas fa-caret-down' style='font-size:24px'></i>
                            </a>
                            <a href="" title="Mark this answer as best answer" class="vote-accepted mt-2">
                                ​<i class='fas fa-check' style='font-size:20px'></i>
                            </a>
                            
                        </div>
                        <div class="media-body">
                            
                            {!! $answer->body_html !!}
                            <div class="float-left">
                                <span class="text-muted">تاریخ پاسخ: {{ $answer->created_date}}</span>
                                <div class="media mt-2">
                                    <a href="{{$answer->user->url}}" class="pl-2">
                                        <img src="{{$answer->user->avatar}}" alt="">
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="{{$answer->user->url}}">{{$answer->user->name}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
