@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-4" style="padding-top: 50px;">
            <div class="row box">
                <div class="col-md-6">
                    <div id="image-holder"></div>
                </div>
                <div class="col-md-6" style="padding-left:22px;">
                    <h1>Login</h1>
                    <hr>
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">EMAIL ADDRESS</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email Address" name="email" value="{{ old('email') }}" required
                                autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">PASSWORD</label>
                            <input id="password" type="password" placeholder="Password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-offset-md-4">
                                <button type="submit" class="button">
                                    Login
                                </button>
                                <br>
                                <br>

                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                                @endif
                            </div>
                        </div>
                        <br>

                        <p class="signup">Don't have an Account?<a href="{{route('register')}}"> Register</a> </p>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection