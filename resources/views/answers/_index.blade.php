@if($answersCount > 0 )
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
                                @include('shared._author', [
                                    'model' => $answer,
                                    'lable' => 'تاریخ پاسخ'
                                ])
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
@endif


