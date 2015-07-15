@extends('master')

@section('main')
    <div class="panel panel-default">
        <div class="panel-heading">Load records from file</div>
        <div class="panel-body">
            @include('errors')
            {!! Form::open([
            'url' => action('BlogRecordsController@loadFromFile'),
            'method' => 'POST',
            'files' => true,
            ]) !!}
            <div class="form-group">
                <label for="file" class="control-label">CSV blog records file</label>
                {!! Form::file('file', '', ['class' => 'form-control', 'id' => 'file']) !!}
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    {!! Form::submit('Submit', ['class' => 'form-control btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
