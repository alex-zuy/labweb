@extends('app')

@section('title')
    Login
@endsection

@section('content')
    <h1>Login</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            Login form
        </div>
        <div class="panel-body">
            @include('auth.login-form')
        </div>
    </div>
@endsection
