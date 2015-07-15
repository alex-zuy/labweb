{!! Form::open([
'method' => 'POST',
'url' => action('BlogRecordCommentsController@store'),
]) !!}
@include('errors')
<div class="form-group">
    <label for="text" class="control-label">Text</label>
    {!! Form::textarea('text', '', ['class' => 'form-control', 'id' => 'text']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'submit-comment']) !!}
</div>
{!! Form::close() !!}
