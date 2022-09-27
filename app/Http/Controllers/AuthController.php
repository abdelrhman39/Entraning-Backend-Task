<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function front_sign_up()
    {
        return view('auth.sign-up');
    }
    public function front_log_in()
    {
        return view('auth.login');
    }


    public function sign_up(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ], [
            'name.required' => Toastr::warning('Name Required', 'Name'),
            'email.required' => Toastr::warning('Email Required', 'Email'),
            'email.email' => Toastr::warning('The Email Should be Correct.', 'Email'),
            'password.required' => Toastr::warning('Password Required', 'Password'),
            'password.confirmed' => Toastr::warning('You should confirm your password', 'Password'),
            'email.unique' => Toastr::warning('This email is already registered', 'Email'),
        ],);

        $result = User::create([
            'name' => $validator['name'],
            'email' => $validator['email'],
            'password' => bcrypt($validator['password']),
        ]);

        if ($result) {
            Toastr::success('Created Successfully', 'Success');
            return redirect('/login');
        } else {
            Toastr::warning('Please check your data and register again.', 'Warning');
            return redirect()->back();
        }
    }



    public function log_in(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => Toastr::warning('Email Required', 'Email'),
            'email.email' => Toastr::warning('The Email Should be Correct.', 'Email'),
            'password.required' => Toastr::warning('Password Required', 'Password'),
        ]);

       
        $result = Auth::attempt($validator);
        if ($result) {
            Toastr::success('Login Successfully', 'Success');
            return redirect('/home');
        } else {
            Toastr::warning('Please check your data and register again.', 'Warning');
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/home');
    }
}
