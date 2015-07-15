@extends('app')

@section('title')
    Education test passed
@endsection

@section('content')
    <h1>Success! Test Passed!</h1>
    <p>
        <a href="{{route('education.test-results')}}" class="btn btn-default">See results</a>
    </p>
@endsection
