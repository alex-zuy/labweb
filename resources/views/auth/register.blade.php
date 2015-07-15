@extends('app')

@section('title')
    Registration
@endsection

@section('content')
    {!! Form::open([
    'method' => 'POST',
    'url' => action('Auth\AuthController@postRegister'),
    ]) !!}
    @include('errors')
    <div class="form-group">
        <label for="name" class="control-label">Name</label>
        {!! Form::text('name', '', ['class' => 'form-control', 'id' => 'name']) !!}
    </div>
    <div class="form-group">
        <label for="email" class="control-label" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Email</label>
        {!! Form::email('email', '', ['class' => 'form-control', 'id' => 'email', 'data-toggle' => 'tooltip',
        'data-placement' => 'top', 'title' => 'Email already in use', 'data-trigger' => 'manual']) !!}
    </div>
    <div class="form-group">
        <label for="password" class="control-label">Password</label>
        {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
    </div>
    <div class="form-group">
        <label for="password_confirmation" class="control-label">Password confirmation</label>
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Register', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection

@section('additional-scripts')

    @parent

    <script>
        $(function() {
            var URL = '{{ url('auth/check-email-available') }}';

            $('#email')
                    .keyup(function(e) {
                        var input = e.delegateTarget;
                        $.get(URL, { email: input.value }, function(response) {
                            var showError = response == 'false';
                            $(input)
                                .tooltip(showError ? 'show' : 'hide')
                                .parent()
                                .toggleClass('has-error', showError);
                        });
                    });
        });
    </script>
@endsection
