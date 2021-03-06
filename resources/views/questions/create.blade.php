@extends('layouts.app')
@section('title', 'طرح سوال')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>لطفا سوال خود را اینجا مطرح کنید</h2>
                        <div class="mr-auto">
                            <a href="{{route('questions.index')}}" class="btn btn-lg btn-outline-danger"> لیست سوالات
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('questions.store')}}" method="POST">
                        @include('questions._form', ['buttonText' => 'ایجاد سوال'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
