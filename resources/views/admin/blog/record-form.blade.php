@include('errors')

{!! Form::open([
'url' => $url,
'method' => $method,
'class' => 'form-horizontal',
'files' => true,
]) !!}
<div class="form-group">
    <label for="subject" class="col-md-2  control-label">Subject</label>
    <div class="col-md-10 ">
        {!! Form::text('subject', isset($blogRecord) ? old('subject', $blogRecord->subject) : '', ['class' => 'form-control', 'id' =>
        'subject']) !!}
    </div>
</div>
@if($method == 'POST')
    <div class="form-group">
        <label for="image" class="col-md-2  control-label">Image</label>
        <div class="col-md-10 " data-toggle="tooltip" data-placement="top"
             title="Image you wish to attach to blog record">
            {!! Form::file('image', '', ['class' => 'form-control', 'id' =>
            'image']) !!}
        </div>
    </div>
@endif
<div class="form-group">
    <div class="col-md-12">
        {!! Form::textarea('text', isset($blogRecord) ? old('text', $blogRecord->text) : '', ['class' => 'form-control', 'id' =>
        'text']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        {!! Form::submit('Submit', ['class' => 'form-control btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
