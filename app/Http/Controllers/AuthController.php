<?php

namespace App\Http\Controllers;

use App\Enums\VerificationType;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\TokenVerificationRequest;
use App\Interfaces\AuthInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\UserInterface;

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

    public function register(SignupRequest $request)
    {
        $result = $this->userRepo->signup($request);
        if ($result['status']) {
            return redirect()->route('verify.email.form')->with('success', $result['message']);;
        }
        return back()->with('danger', $result['message'])->withInput();
    }

    public function emailVerificationForm()
    {
        $user = $this->userRepo->get(session('user_id'));
        if ($user->email_verified_at == null) {
            return view('backend.verification.email');
        }
        return redirect('/');
    }

    public function emailVerification(TokenVerificationRequest $request)
    {
        $result =  $this->userRepo->verifyToken($request);

        if ($result['status']) {
            if ($request->expectsJson()) {
                return response()->json(['message' => $result['message']], 200);
            }

            if (auth()->attempt(['email' => $request->email, 'password' => session('password')])) {
                return redirect()->route('login')->with('success', $result['message']);
            }
        }

        if ($request->expectsJson()) {
            return response()->json(['message' => $result['message']], 422);
        }
        return redirect()->back()->with('danger', $result['message']);
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
