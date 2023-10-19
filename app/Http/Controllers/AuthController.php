<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\LoginActivity\LoginActivityInterface;

class AuthController extends Controller
{
    protected $LoginActivity;

    public function __construct(LoginActivityInterface $LoginActivity)
    {
        $this->middleware('guest')->except('logout');
        $this->LoginActivity  = $LoginActivity;
    }


    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (auth()->attempt(request()->only(['email', 'password']))) {
            return redirect('/dashboard');
        }
        return redirect('/');
    }

    public function logout()
    {
        Session()->flush();
        Auth::logout();
        return redirect('/');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email', // Make sure 'email' is required and a valid email.
            'date_of_birth' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);


        User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'phone'         => $request->phone,
            'gender'        => $request->gender,
            'password'      => $request->password
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard');
        }
        // return redirect ('/')->withErrors('error');
    }
}
