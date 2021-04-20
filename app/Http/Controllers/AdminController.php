<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.adminHome');
    }

    public function welcome()
    {
        $orderCount = Order::where('status', 0)->count();
        return view('admin.dashboard', compact('orderCount'));
    }
}
