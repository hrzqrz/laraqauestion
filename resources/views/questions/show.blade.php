@extends('layouts.app')
@section('title', 'مشاهده سوال')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4>{{$question->title}}</h4>
                        <div class="mr-auto">
                            <a href="{{route('questions.index')}}" class="btn btn-lg btn-outline-danger"> لیست سوالات
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
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
