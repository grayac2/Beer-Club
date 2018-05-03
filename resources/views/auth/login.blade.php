@extends('layouts.login')

@section('content')
    <div class="container">
        <div class="loginContainer">
            <h1>Login to Beer Club</h1>
            <form class="login" method="post">
                {{ csrf_field() }}
                <input type="text" name="email" placeholder="Email"/>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <input type="password" name="password" placeholder="Password"/>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <button type="submit" class="login-btn">
                    Login
                </button>
            </form>
            Forgot Password? Click <a href="{{ route('password.request') }}">here</a> | Want to register? Click <a href="{{route('register')}}">here</a>
        </div>
    </div>
@endsection
