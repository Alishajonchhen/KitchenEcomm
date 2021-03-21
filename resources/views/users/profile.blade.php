@extends('layouts.app')
@section('content')
    <div id="user-dashboard">
        <div class="container custom-container">
            <div class="dashboard-content">
                <div class="nav-content">
                    <div class="side-nav">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <div class="small-title">
                                    <h4>Manage Account</h4>
                                </div>
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Edit Profile</a>
                                <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="true">ChangePassword</a>
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Address Book</a>

                            </li>
                            {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Address Book</a>--}}
                            {{--</li>--}}
                        </ul>
                    </div>

                    <div class="nav-details">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="account-wrapper">
                                    <div class="inner-wrapper">
                                        {{--<div class="card-header">{{ Auth::user()->name }}</div>--}}
                                        <div class="image-upload">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' name="avatar" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" class="form-control" name="_token" value="{{ csrf_token() }}" required autofocus >
                                                        <label for="imageUpload"></label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview" style="background-image: url('img/avatar/{{Auth::user()->avatar}}');">
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="form-button">
                                                        {{ __('Upload Image') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="details">
                                            <form action="" method="post">
                                                @csrf
                                                <div class="form-item">
                                                    <label>Full name</label>
                                                    <input  id="name" type="text" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus placeholder="Full name">
                                                    @if($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach($errors->all() as $error)
                                                                    <li>{{$error}}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-item">
                                                    <label>Email</label>
                                                    <input id="email" type="email"  name="email" value="{{ Auth::user()->email }}" required autocomplete="email" placeholder="E-mail">

                                                </div>
                                                <button type="submit" class="form-button">
                                                    {{ __('Update') }}
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                <div class="account-wrapper">
                                    <form action="{{route('changepassword')}}" method="post">
                                        @csrf

                                        <div class="form-item">
                                            <label>Current Password</label>
                                            <input id="current_password" type="password" name="current_password" required autocomplete="current-password" placeholder="Please enter your current password">

                                        </div>

                                        <div class="form-item">
                                            <label>New Password</label>
                                            <input id="new_password" type="password" name="new_password"  required autocomplete="new-password" placeholder="Minimum 4 characters">
                                            <span toggle="#new_password" class="toggle-password">
                                    <div class="field-icon">
                                        <img class="eye-close" src="{{asset('img/icons/closed.png')}}">
                                        <img class="eye-open" src="{{asset('img/icons/photo.png')}}">
                                    </div>
                                </span>
                                        </div>
                                        <div class="form-item">
                                            <label>Confirm Password</label>
                                            <input id="new_password_confirmation" type="password" name="new_password_confirmation"  required autocomplete="new-password" placeholder="Please retype your password">
                                            <span toggle="#new_password_confirmation" class="toggle-passwords">
                                    <div class="field-icons">
                                        <img class="eye-close" src="{{asset('img/icons/closed.png')}}">
                                        <img class="eye-open" src="{{asset('img/icons/photo.png')}}">
                                    </div>
                                </span>
                                        </div>

                                        <button type="submit" class="form-button">
                                            {{ __('Change Password') }}
                                        </button>
                                    </form>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <section class="product-section">
                                    <div class="custom-container small-container">
                                        <div class="product-wrapper">
                                            <div class="product-item">
                                                <div class="inner-wrapper">
                                                    <div class="common-img">
                                                        <a href=""><img src=""></a>
                                                    </div>
                                                    <div class="common-content">
                                                        <a href="#"><span>Shop 1</span></a>
                                                        <h4></h4>
                                                        <p>Rs. </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
