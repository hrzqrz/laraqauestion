@if(Session('questions_saved_success'))
<div class="alert alert-success">
    <strong>{{Session('questions_saved_success')}}</strong>
</div>
@endif

@if(Session('question_updated_success'))
<div class="alert alert-success">
    <strong>{{Session('question_updated_success')}}</strong>
</div>
@endif
