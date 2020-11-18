<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function getLogIn()
    {
        return view('users.login');
    }

    public function postLogIn(Request $request)
    {
        $request->validate([
            'UserName'=>'required|min:5|max:30',
            'Email' => 'Email',
            'Password' => 'required|min:5|max:60'
        ]);

        $credentials =$request->only(['Email','Password']);

        if (auth()->attempt($credentials)){
            return redirect()->intended('layout.welcome');
        }
            return redirect()->route('users.login')->with('Wrong!');
    }

    public function getSignUp()
    {
        return view('users.signup');
    }

    public function postSignUp(Request $request)
    {
        $request->validate([
            'UserName' => 'required|min:3|max:30',
            'Email' => 'Email|required|unique:UserTable',
            'Password' => 'required|min:5'
        ]);

        $user = User::create([
            'UserName' => $request->input('UserName'),
            'Email' => $request->input('Email'),
            'Password' => bcrypt($request->input('Password'))
        ]);


        $check= $this->$user;

        return redirect()->route('users.login');
    }

    public  function userProfile()
    {
        if(Auth::check()){
            return view('users.profile');
        }
        return  redirect()->route('users.login')->with('Wrong!');
    }

    public function  logout()
    {
        auth()->logout();
        return redirect()->route('users.login');
    }
}
