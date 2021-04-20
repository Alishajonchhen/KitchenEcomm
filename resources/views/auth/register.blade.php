@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-4" style="padding-top: 50px;">
            <div class="row card">
                <div class="col-md-6">
                    <div id="image"></div>
                </div>
                <div class="col-md-6" style="padding-left: 22px;">
                    <h1>Register</h1>
                    <hr>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">NAME</label>
                            <input id="name" type="text" placeholder="Name"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">EMAIL ADDRESS</label>
                            <input id="email" type="email" placeholder="Email Address"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">

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
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">CONFIRM PASSWORD</label>
                            <input id="password-confirm" type="password" placeholder="Confirm Password"
                                class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="button">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>

                    <p class="sign-up">Already have an Account?<a href="{{ route('login') }}"> Login</a></p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection