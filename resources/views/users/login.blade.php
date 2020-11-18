@extends('layout.welcome')
@section('content')
    <div class="row">
        <div class="col-xs-4 col-md-offset-4">
            <h1>Log In</h1>

            <form action="{{route('users.login')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="UserName">Username</label>
                    <input type="text" name="UserName" id="UserName" class="form-control">
                </div>

                <div class="form-group">
                    <label for="Email"> Email Address</label>
                    <input type="text" name="Email" id="Email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="Password" name="Password" id="Password" class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-default" type="submit">Log In</button>
                </div>
                <p class="signup">Don't have an Account?<a href="{{route('users.signup')}}">Sign Up</a> </p>
            </form>
        </div>
    </div>
@endsection
