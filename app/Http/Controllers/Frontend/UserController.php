<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Get logged in user details
     */
    public function index()
    {
        $user = Auth::user();

        return view('front.profile', compact('user'));
    }

    /**
     * Update user password
     * 
     * @param ChangePasswordRequest $request
     * @return Renderable
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        User::where('id', Auth::id())->update(['password' => Hash::make($request->password)]);

        Session::flash('success', 'Password updated successfully.');
        return redirect()->route('user-profile');
    }
}
