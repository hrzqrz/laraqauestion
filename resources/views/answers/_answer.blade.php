
<div class="media post">
    @include('shared._vote', [
        'model' => $answer
    ])
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