{!! Form::open([
'method' => 'POST',
'url' => action('Auth\AuthController@postLogin'),
]) !!}
@include('errors')
<div class="form-group">
    <label for="_email" class="control-label">Email</label>
    {!! Form::email('email', '', ['class' => 'form-control', 'id' => '_email']) !!}
</div>
<div class="form-group">
    <label for="password" class="control-label">Password</label>
    {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
</div>
<div class="form-group">
    <div class="checkbox">
        <label for="remember" class="control-label">
            {!! Form::checkbox('remember') !!}
            Remember Me
        </label>
    </div>
</div>
<div class="form-group">
    {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
