<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use App\Repositories\User\UserInterface;
use App\Repositories\LoginActivity\LoginActivityInterface;

class AuthController extends Controller
{

    private  $userRepo, $LoginActivity;


    public function __construct(UserInterface $userRepo, LoginActivityInterface $LoginActivity)
    {
        $this->userRepo = $userRepo;
        $this->LoginActivity = $LoginActivity;
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

            //add user  login activity
            if (Auth::check()) :
                $this->LoginActivity->addLoginActivity(request()->header('user_agent'), 'user_logged_in');
            endif;
            //add user  login activity

            return redirect('/dashboard');
        }
        return redirect('/');
    }

    public function logout()
    {
        //add user  logout activity
        if (Auth::check()) :
            $this->LoginActivity->addLoginActivity(request()->header('user_agent'), 'user_logged_out');
        endif;
        //add user  logout activity

        session()->flush();

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return request()->wantsJson() ? response()->json(status: 204) : redirect('/');
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
