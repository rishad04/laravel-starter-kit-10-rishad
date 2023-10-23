<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use App\Repositories\LoginActivity\LoginActivityInterface;

class AuthController extends Controller
{
    protected $LoginActivity;

    public function __construct(LoginActivityInterface $LoginActivity)
    {
        $this->middleware('guest')->except('logout');
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


        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        Auth::login($user);

        return redirect('/dashboard');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'date_of_birth' => ['required'],
            'gender' => ['required'],
            'phone' => ['required', 'numeric'],
            'password' => ['required', 'string', 'min:2','confirmed'], // Ensure password confirmation
        ]);
    }

    protected function create(array $data)
    {


        $role                = Role::find(2);
        return User::create([
            'name'           => $data['name'],
            'email'          => $data['email'],
            'phone'          => $data['phone'],
            'gender'         => $data['gender'],
            'role_id'        => $role ? $role->id : null,
            'permissions'    => $role ? $role->permissions : [],
            'date_of_birth'  => Carbon::parse($data['date_of_birth'])->format('d-m-Y'),
            'password'       => Hash::make($data['password'])

        ]);
    }
}
