<div class="media post">
    <div class="d-flex flex-column counters">
        <div class="vote">
            <strong>{{$question->votes_count}}</strong>{{str_plural('vote', $question->votes_count)}}
        </div>
        <div class="status {{$question->status}}">
            <strong>{{$question->answers_count}}</strong>{{str_plural('answer', $question->answers_count)}}
        </div>
        <div class="view">
            {{$question->views . " " .str_plural('view', $question->views)}}
        </div>
    </div>
    <div class="media-body">
        <div class="d-flex align-items-center">
            <h3 class="mt-0">
                <a href="{{$question->url}}">{{str_limit($question->title, 15)}}</a>
            </h3>
            <div class="mr-auto">
                @can('update', $question)
                <a title="ویرایش" href="{{route('questions.edit', $question->id)}}"
                    class="btn btn-lg btn-success"> <span class="glyphicon glyphicon-edit"></span>
                </a>
                @endcan
                @can('delete', $question)
                <form class="form-delete" action="{{route('questions.destroy', $question->id)}}"
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
        <p class="lead">
            Asked by : <a href="{{$question->user->url}}">{{$question->user->name}}</a>
            <small class="text-muted">{{$question->created_date}}</small>
        </p>
        {{ $question->excerp(300) }}
    </div>
</div>