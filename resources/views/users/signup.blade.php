@extends('layout.welcome')
@section('content')
<div class="row">
    <div class="col-xs-4 col-md-offset-4">
        <h1>Sign Up</h1>
        <form action="{{route('users.signup')}}" method="post">
            {{csrf_field()}}

            <div class="form-group">
                <div>
                    <a href="" style="color:red;">{{$errors->first('UserName')}}</a>
                </div>
                <label for="UserName">Username</label>
                <input type="text" name="UserName" id="UserName" class="form-control">
            </div>

            <div class="form-group">
                <div>
                    <a href="" style="color:red;">{{$errors->first('Email')}}</a>
                </div>
                <label for="Email"> Email Address</label>
                <input type="text" name="Email" id="Email" class="form-control">
            </div>

            <div class="form-group">
                <div>
                    <a href="" style="color:red;">{{$errors->first('Password')}}</a>
                </div>
                <label for="Password">Password</label>
                <input type="Password" name="Password" id="Password" class="form-control">
            </div>

            <div class="form-group">
                <button class="btn btn-default" type="submit">Sign Up</button>
            </div>
            <p class="sign-up">Already have an Account?<a href="{{ route('users.login') }}"> Sign In</a></p>
        </form>
    </div>
</div>
@endsection
