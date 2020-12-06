@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-6 col-md-offset-4" style="padding-top: 50px;">
            <div class="box">
                <h1>Verify Your Email Address</h1>

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            A fresh verification link has been sent to your email address.
                        </div>
                    @endif

                    Before proceeding, please check your email for a verification link.
                    If you did not receive the email,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Click here to request another</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
