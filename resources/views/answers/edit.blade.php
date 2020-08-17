@extends('layouts.app')
@section('content')
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                <h3> ویرایش پاسخ برای سوال : <strong>{{$question->title}}</strong></h3>
                </div>
                <hr>
                <form action="{{route('questions.answers.update', [$question->id, $answer->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="body">پاسخ</label>
                        <textarea class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}" name="body"
                        id="body" cols="30" rows="7">{{old('body', $answer->body)}}</textarea>

                            @if($errors->has('body'))
                                <div class="invalid-feedback">
                                    <strong>{{$errors->first('body')}}</strong>
                                </div>
                            @endif  
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-outline-primary"> بروز رسانی</button>
                    <a href="{{route('questions.show', $question->slug)}}" class="btn btn-lg btn-outline-danger mr-2">انصراف</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
