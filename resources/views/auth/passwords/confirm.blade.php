@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-6 col-md-offset-4" style="padding-top: 50px;">
            <div class="box">
                <h1>Confirm Password</h1>
                    Please confirm your password before continuing.

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group">
                            <label for="password">PASSWORD</label>
                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="button">
                                    Confirm Password
                                </button>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
