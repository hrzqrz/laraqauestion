@extends('layouts.app')
@section('title', 'All questions')
@section('styles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2> پرسش ها</h2>
                        <div class="mr-auto">
                            <a href="{{route('questions.create')}}" class="btn btn-lg btn-outline-primary">سوالی
                                بپرسید</a>
                        </div>
                    </div>
                    <div class="mt-5">
                        @include('layouts.includes._messages')
                    </div>
                </div>

                <div class="card-body">
                    @foreach($questions as $question)
                    <div class="media">
                        <div class="d-flex flex-column counters">
                            <div class="vote">
                                <strong>{{$question->votes}}</strong>{{str_plural('vote', $question->votes)}}
                            </div>
                            <div class="status {{$question->status}}">
                                <strong>{{$question->answers}}</strong>{{str_plural('answer', $question->answers)}}
                            </div>
                            <div class="view">
                                {{$question->views . " " .str_plural('view', $question->views)}}
                            </div>
                        </div>
                        <div class="media-body">
                            <div class="d-flex align-items-center">
                                <h3 class="mt-0">
                                    <a href="{{$question->url}}">{{str_limit($question->title, 15)}}</a>
                                </h3>
                                <div class="mr-auto">
                                    <a title="ویرایش" href="{{route('questions.edit', $question->id)}}"
                                        class="btn btn-lg btn-success"> <span class="glyphicon glyphicon-edit"></span> </a>
                                </div>
                            </div>
                            <p class="lead">
                                Asked by : <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                <small class="text-muted">{{$question->created_date}}</small>
                            </p>
                            {{str_limit($question->body, 250)}}
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    {{$questions->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
