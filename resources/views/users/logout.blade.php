@extends('layout.welcome')
@section('content')
    <form id="frm-logout" action="{{ route('users.logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
    </form>
@endsection
