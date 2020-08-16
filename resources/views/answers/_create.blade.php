<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3>لطفا به این سوال پاسخی بنویسید</h3>
                </div>
                <hr>
                <form action="{{route('questions.answers.store', $question->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="body">پاسخ</label>
                        <textarea class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}" name="body"
                            id="body" cols="30" rows="7"></textarea>

                            @if($errors->has('body'))
                                <div class="invalid-feedback">
                                    <strong>{{$errors->first('body')}}</strong>
                                </div>
                            @endif  
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-outline-primary">ارسال پاسخ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
