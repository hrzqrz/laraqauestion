<a href="" title="Click to mark as favorite {{$name}} ( Click again to undo )  "
   class="favorite mt-2 {{Auth::guest() ? 'off' : ($model->is_favorited ? 'favorited' : '') }}"
onclick="event.preventDefault();document.getElementById('favorite-{{$name}}-{{$model->id}}').submit();">
        ​<i class='fas fa-certificate' style='font-size:20px'></i>
        <span class="favorties-count">{{$model->favorites_count}}</span>
    </a>
<form action="{{route('questions.favorite', $model->id)}}" method="POST" id="favorite-{{$name}}-{{$model->id}}">
    @csrf
    @if($model->is_favorited)
        @method('DELETE')
    @endif
</form>