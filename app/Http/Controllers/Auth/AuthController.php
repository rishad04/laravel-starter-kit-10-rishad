<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\UserInterface;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    private  $userRepo;

    public function __construct(UserInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }


    public function loginForm()
    {
        return view('auth.login');
    }


    // Auth login 
    public function login(Request $request)
    {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|string',
        ]);

        $user       = User::query()->firstWhere('email', $request->email);

        if (!$user) {
            return back()->withErrors([
                'email' => 'The provided email do not match our records.'
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'The provided password does not match our records.'
            ]);
        }

        if (auth()->attempt(request()->only(['email', 'password']))) {
            // Active Remember me 24 houre
            if ($request->remember != null) {
                Cookie::queue('email', $request->email, 1440);
                Cookie::queue('password', $request->password, 1440);
            } else {
                Cookie::queue(Cookie::forget('email'));
                Cookie::queue(Cookie::forget('password'));
            }
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

    public function resendToken(Request $request)
    {
        $result =  $this->userRepo->resendToken($request);

        if ($result['status']) {
            if ($request->expectsJson()) {
                return response()->json(['message' => $result['message']], 200);
            }
            return redirect()->back()->with('success', $result['message']);
        }

        if ($request->expectsJson()) {
            return response()->json(['message' => $result['message']], 422);
        }
        return redirect()->back()->with('danger', $result['message']);
    }
}
