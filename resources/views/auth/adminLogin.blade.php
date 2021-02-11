@extends('admin.adminHome')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-md-offset-4" style="padding-top: 50px;" >
                <div class="box">
                    <div id="image-holder"></div>
                    <div class="right">
                        <h1>Admin Login</h1>
                        <hr>
                        <form method="POST" action="{{ route('admin.login.submit') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">EMAIL ADDRESS</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">PASSWORD</label>
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

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

                                    @if (Route::has('admin.password.request'))
                                        <a href="{{ route('admin.password.request') }}">Forgot Your Password?</a>
                                    @endif
                                </div>
                            </div>
                            <br>

                            <p class="signup">Don't have an Account?<a href="{{route('admin.register')}}"> Register</a> </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

