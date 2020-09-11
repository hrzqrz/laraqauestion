<answer :answer="{{$answer}}" inline-template>

    
<div class="media post">
    @include('shared._vote', [
        'model' => $answer
    ])
    <div class="media-body">
        <form v-if="editing" @submit.prevent="update">
            <div class="form-group">
                <textarea v-model="body" rows="10" class="form-control" required></textarea>
            </div>
            <button class="btn btn-outline-secondary" :disabled="isInvalid">بروزرسانی</button>
            <button class="btn btn-outline-secondary" @click="cancel" type="button">انصراف</button>
        </form>
        <div v-else>
            <div v-html="bodyHtml"></div>
            {{-- {!! $answer->body_html !!} --}}
        <div class="row">
            <div class="col-4">
                <div class="mr-auto">
                    @can('update', $answer)
                    <a title="ویرایش"
                        @click.prevent="edit"
                        class="btn btn-lg btn-success"> <span class="glyphicon glyphicon-edit"></span>
                        {{-- href="{{route('questions.answers.edit', [$question->id, $answer->id])}}" --}}
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
                {{-- @include('shared._author', [
                    'model' => $answer,
                    'lable' => 'تاریخ پاسخ'
                ]) --}}
                <user-info v-bind:model="{{$answer}}" label= "Answer date"></user-info>
            </div>
        </div>
        </div>

    </div>
</div>

</answer>