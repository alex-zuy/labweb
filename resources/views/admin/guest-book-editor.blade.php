@extends('master')

@section('main')
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">Load records from file</div>
            <div class="panel-body">
                @include('errors')
                {!! Form::open([
                    'url' => route('admin.guest-book-load-records'),
                    'method' => 'POST',
                    'files' => true,
                    'class' => 'form',
                    ]) !!}
                    <div class="form-group">
                        <label for="file">Records file</label>
                        {!! Form::file('file', ['id' => 'file']) !!}
                    </div>
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
