@extends('layouts.app')
@section('title', 'مشاهده سوال')
@section('styles')
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                            @include('layouts.includes._messages')
                        </div>
                    </div>
                    <hr>
                    <div class="media">
                        @include('shared._vote', [
                            'model' => $question
                        ])
                        <div class="media-body">
                            {!! $question->body_html !!}
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-4"></div>
                                <div class="col-4">
                                    @include('shared._author', [
                                        'model' => $question,
                                        'lable' => 'تاریخ سوال'
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    @include('answers._index', ['answerCount'=>$question->answers_count, 'answers'=>$question->answers])

    @include('answers._create')
</div>
@endsection
