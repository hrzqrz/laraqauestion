@csrf

<div class="form-group">
    <label for="title">عنوان سوال</label>
    <input type="text" name="title" value="{{old('title', $question->title)}}" id="question-title"
        class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}">

    @if($errors->has('title'))
    <div class="invalid-feedback">
        <strong>{{$errors->first('title')}}</strong>
    </div>
    @endif

</div>

<div class="form-group">
    <label for="body">متن سوال</label>
    <textarea class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}" name="body" id="question-body" cols="30"
        rows="3">{{old('body', $question->body)}}</textarea>

    @if($errors->has('body'))
    <div class="invalid-feedback">
        <strong>{{$errors->first('body')}}</strong>
    </div>
    @endif
</div>

<div class="form-group">
    <button type="submit" class="btn btn-lg btn-outline-primary">{{$buttonText}} </button>
</div>
