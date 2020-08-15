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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
