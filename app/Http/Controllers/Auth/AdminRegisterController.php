<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function register(Request $request)
    {
        //Validate form data
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'regex:/(.+)@(.+)\.(.+)/i','max:255','unique:admintable'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        //Create admin user
        try {
            $admin = Admin::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);

            //Log the admin in
            Auth::guard('admin')->loginUsingId($admin->id);
            return redirect()->intended('/admin/login')->send();

        }catch (\Exception $e){
            return redirect()->back()->withInput($request->only('name','email'));
        }
    }

    public function showRegisterForm()
    {
        return view('auth.adminRegister');
    }
}

