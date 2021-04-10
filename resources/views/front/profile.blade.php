@extends('layouts.welcome')
@section('content')
    <style>
        .user{
           padding: 10px;
            font-size: 20px;
        }
    </style>

<div class="container product-list" style="min-height: 300px;">
    <h3 style="font-family: Baskerville Old Face; font-size: 25px;">
        My Profile
        <br>
        <br>
    </h3>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <li>
        <span class="label label-important">{{ $error }}</span>
    </li>
    @endforeach
    @endif
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        <p>{{session('success')}}</p>
    </div>
    @endif
    <div class="well">
        <div class="row">
            <table>
                <tbody>
                    <tr>
                        <td class="user">Name : {{ $user->name }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="user">Email : {{ $user->email }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="change-password">
                            <a data-toggle="modal" data-target="#changePassword">
                                <span class="label label-warning" style="background-color: black; color: white; width: 25px;
                                    height: 42px; font-size: 17px;">Change Password </span>
                            </a>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    @include("front.changePasswordModal")
</div>
@endsection
<style>
    .product-list {
        margin-top: 60px;
    }

    .change-password {
        padding: 10px;
        cursor: pointer;
    }
</style>
