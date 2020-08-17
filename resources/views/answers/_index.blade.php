<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{$answerCount ." ". str_plural('answer ', $question->answers_count)}}</h2>
                </div>
                <hr>
                @foreach($answers as $answer)
                <div class="media">
                    <div class="d-flex flex-column vote-controls">
                        <a href="" title="This answer is usefull" class="vote-up">
                            <i class='fas fa-caret-up' style='font-size:24px'></i>
                        </a>
                        <span class="votes-count">1230</span>
                        <a href="" title="This answer is not usefull" class="vote-down off">
                            <i class='fas fa-caret-down' style='font-size:24px'></i>
                        </a>
                        <a href="" title="Mark this answer as best answer" class="{{$answer->status}} mt-2">
                            ​<i class='fas fa-check' style='font-size:20px'></i>
                        </a>
                        
                    </div>
                    <div class="media-body">
                        
                        {!! $answer->body_html !!}
                        <div class="row">
                            <div class="col-4">
                                <div class="mr-auto">
                                    @can('update', $answer)
                                    <a title="ویرایش" href="{{route('questions.answers.edit', [$question->id, $answer->id])}}"
                                        class="btn btn-lg btn-success"> <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    @endcan
                                    @can('delete', $answer)
                                    <form class="form-delete" action="{{route('questions.answers.destroy', [$question->id, $answer->id])}}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="del_btn" id="del_btn" class="btn btn-lg btn-danger"
                                            onclick="return confirm('Are you sure ?')"><span
                                                class="glyphicon glyphicon-trash"></span></button>
                                    </form>
                                    @endcan
                                </div>
                            </div>
                            <div class="col-4"></div>
                            <div class="col-4">
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
                </div>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>