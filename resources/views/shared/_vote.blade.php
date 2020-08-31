@if($model instanceof App\Question)
    @php
        $name = 'question';
        $firstURISigment = 'questions';
    @endphp
    @elseif($model instanceof App\Answer)
    @php
        $name = 'answer';
        $firstURISigment = 'answers';
    @endphp
@endif

<div class="d-flex flex-column vote-controls">
    <a href="" title="This {{$name}} is usefull"
       class="vote-up {{Auth::guest() ? 'off' : ''}}"
        onclick="event.preventDefault();document.getElementById('up-vote-{{$name}}-{{$model->id}}').submit()">
        <i class='fas fa-caret-up' style='font-size:24px'></i>
    </a>
<form action="/{{$firstURISigment}}/{{$model->id}}/vote" id="up-vote-{{$name}}-{{$model->id}}" method="POST">
    @csrf
    <input type="hidden" name="vote" id="vote" value="1">
</form>
    <span class="votes-count">{{$model->votes_count}}</span>
    <a href="" title="This {{$name}} is not usefull" 
       class="vote-down {{Auth::guest() ? 'off' :''}}"
        onclick="event.preventDefault();document.getElementById('down-vote-{{$name}}-{{$model->id}}').submit()">
        <i class='fas fa-caret-down' style='font-size:24px'></i>
    </a>
<form action="/{{$firstURISigment}}/{{$model->id}}/vote" id="down-vote-{{$name}}-{{$model->id}}" method="POST">
    @csrf
    <input type="hidden" name="vote" id="vote" value="-1">
</form>
@if($model instanceof App\Question)
    @include('shared._favorite', [
        'model' => $model,
    ])
    @elseif($model instanceof App\Answer)
    @include('shared._accept', [
        'model' => $model,
    ])
@endif
</div>