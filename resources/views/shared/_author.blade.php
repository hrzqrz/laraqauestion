<span class="text-muted"> {{ $lable ." ". $model->created_date}}</span>
<div class="media mt-2">
    <a href="{{$model->user->url}}" class="pl-2">
        <img src="{{$model->user->avatar}}" alt="">
    </a>
    <div class="media-body mt-1">
        <a href="{{$model->user->url}}">{{$model->user->name}}</a>
    </div>
</div>
