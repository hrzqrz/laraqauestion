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
                        @csrf

                        <div class="form-group">
                            <label for="title">عنوان سوال</label>
                            <input type="text" name="title" value="{{old('title')}}" id="question-title" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}">

                            @if($errors->has('title'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('title')}}</strong>
                            </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="body">متن سوال</label>
                            <textarea class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}" name="body"  id="question-body" cols="30" rows="3">{{old('body')}}</textarea>

                            @if($errors->has('body'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('body')}}</strong>
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-outline-primary">ارسال پرسش </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
