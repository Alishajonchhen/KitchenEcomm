<?php

namespace App\Http\Controllers;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('layouts.app');
    }

    public function home()
    {
        return view('front.home');
    }

    public function adminHome()
    {
        return view('admin.adminHome');
    }
}
