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
                    <a href="" title="This answer is usefull" 
                       class="vote-up {{Auth::guest() ? 'off' : ''}}"
                       onclick="event.preventDefault();document.getElementById('up-vote-answer-{{$answer->id}}').submit();">
                            <i class='fas fa-caret-up' style='font-size:24px'></i>
                        </a>
                    <form action="{{route('answers.vote', $answer->id)}}" id="up-vote-answer-{{$answer->id}}" method="POST">
                        @csrf
                        <input type="hidden" name="vote" value="1">
                    </form>
                        <span class="votes-count">{{$answer->votes_count}}</span>
                        <a href="" title="This answer is not usefull" 
                           class="vote-down {{Auth::guest() ? 'off' : ''}}"
                            onclick="event.preventDefault();document.getElementById('down-vote-answer-{{$answer->id}}').submit();">
                            <i class='fas fa-caret-down' style='font-size:24px'></i>
                        </a>
                    <form action="{{route('answers.vote', $answer->id)}}" method="POST" id="down-vote-answer-{{$answer->id}}">
                        @csrf
                        <input type="hidden" name="vote" value="-1">
                    </form>
                        @can('accept', $answer)
                        <a href="" title="Mark this answer as best answer" class="{{$answer->status}} mt-2"
                            onclick="event.preventDefault(); document.getElementById('accept-answer-{{$answer->id}}').submit();">
                            ​<i class='fas fa-check' style='font-size:20px'></i>
                        </a>
                        <form id="accept-answer-{{$answer->id}}" action="{{route('answers-accept', $answer->id)}}"
                            method="POST" style="display: none;">
                            @csrf
                        </form>
                        @else
                        @if($answer->is_best)
                        <a href="" title="The question owner accepted this answer as best answer" class="{{$answer->status}} mt-2">
                            ​<i class='fas fa-check' style='font-size:20px'></i>
                        </a>
                        @endif
                        @endcan
                    </div>
                    <div class="media-body">

                        {!! $answer->body_html !!}
                        <div class="row">
                            <div class="col-4">
                                <div class="mr-auto">
                                    @can('update', $answer)
                                    <a title="ویرایش"
                                        href="{{route('questions.answers.edit', [$question->id, $answer->id])}}"
                                        class="btn btn-lg btn-success"> <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    @endcan
                                    @can('delete', $answer)
                                    <form class="form-delete"
                                        action="{{route('questions.answers.destroy', [$question->id, $answer->id])}}"
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
