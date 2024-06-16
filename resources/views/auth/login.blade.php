@extends('auth.master')
@section('title') {{ ___('menus.login') }} @endsection

@section('main')
<div class="row no-gutters">
    <div class="col-xl-12">
        <div class="auth-form">

            <div class="text-center mb-3">
                <img src="{{ logo(settings('light_logo') ) }}" alt="" class="rounded" height="40">
            </div>

            <h4 class="text-center mb-4">Sign in your account</h4>
            <form action="{{route('login')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="label-style-1 mb-2">{{ ___('label.Email') }} </label>
                    <input type="email" name="email" class="form-control input-style-1" @if(Cookie::has('email')) ? value="{{Cookie::get('email')}}" : value="{{ old('email') }}" @endif placeholder="{{ ___('placeholder.enter_email') }}">
                    @error('email') <span class="text-danger small"> {{ $message }} </span> @enderror
                </div>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label class="label-style-1 mb-2">{{ ___('label.Password') }} </label>
                        <a class="small" href="{{ route('password.forgotForm') }}">{{ ___('label.Forgot Password') }} ?</a>
                    </div>

                    <input type="password" name="password" class="form-control input-style-1" @if(Cookie::has('password')) ? value="{{Cookie::get('password')}}" : value="{{ old('email') }}" @endif placeholder="{{ ___('placeholder.enter_password') }}">
                    @error('password') <span class="text-danger small"> {{ $message }} </span> @enderror
                </div>

                <div>
                    <input type="checkbox" name="remember" id="remember" @checked(old('remember',Cookie::has('useremail')))>
                    <label for="remember"> {{ ___('label.Remember Me') }} </label>
                </div>

                <button type="submit" class="j-td-btn btn-sm w-100 d-block">{{ ___('label.signin') }}</button>

            </form>

            <div class="new-account mt-3">
                <p>Don't have an account? <a class="text-primary" href="{{route('registerForm')}}">{{ ___('label.Sign up') }}</a></p>
            </div>

        </div>
    </div>
</div>

@endsection
