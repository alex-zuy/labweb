@extends('app')

@section('title')
    Guest book
@endsection

<?php
    /**
     * @var App\GuestBookRecord $records
     */
?>

@section('content')
    <h1>Guest book</h1>
    <h2>Recent comments</h2>
    @if($records->isEmpty())
        No comments yet!
    @else
        @foreach($records as $record)
            <blockquote>
                <p>{{$record->text}}</p>
                <footer class="text-right"><i>{{$record->full_name}}</i>,
                    at {{ PrettyDate::parse($record->created_at)->toDayDateTimeString()}} ({{$record->email}})</footer>
            </blockquote>
        @endforeach
    @endif
    <h2>Leave your comment</h2>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Guest book form</h3>
        </div>
        <div class="panel-body">
            @include('errors')
            {!! Form::open(['url' => action('GuestBookRecordsController@store'), 'class' => 'form-horizontal']) !!}
            <div class="form-group">
                <label for="full_name" class="col-md-2  control-label">Full name</label>
                <div class="col-md-10 "  data-toggle="tooltip" data-placement="top" title="Should contain 3 words">
                    {!! Form::text('full_name', '', ['class' => 'form-control', 'id' =>
                    'full_name']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-md-2  control-label">Email</label>
                <div class="col-md-10 "  data-toggle="tooltip" data-placement="top" title="Your E-mail.">
                    {!! Form::email('email', '', ['class' => 'form-control', 'id' =>
                    'email']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::textarea('text', '', ['class' => 'form-control', 'id' =>
                    'text']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::submit('Submit', ['class' => 'form-control btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
