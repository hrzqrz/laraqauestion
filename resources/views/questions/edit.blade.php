@extends('layouts.app')
@section('title', 'ویرایش سوال')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2> ویرایش سوال  </h2>
                        <div class="mr-auto">
                            <a href="{{route('questions.index')}}" class="btn btn-lg btn-outline-danger"> لیست سوالات
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('questions.update', $question->id)}}" method="POST">
                        @method('PUT')
                        @include('questions._form', ['buttonText' => ' بروزرسانی'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
