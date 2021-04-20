@extends('admin.adminHome')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-6 col-md-offset-4" style="padding-top: 50px;">
            <div class="box1">
                <h1>Admin Reset Password</h1>
                <hr>
                <br>

                <div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.password.email') }}">
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
                        <br>

                        <div class="row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="button">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
