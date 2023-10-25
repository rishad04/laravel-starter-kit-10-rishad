@extends('auth.master')
@section('title') {{ ___('menus.login') }} @endsection

@section('main')
<div class="row no-gutters">
    <div class="col-xl-12">
        <div class="auth-form">
            <h4 class="text-center mb-4">Sign in your account</h4>
            <form action="{{route('login')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label><strong>Email</strong></label>
                    <input type="email" name="email" class="form-control input-style-1" @if(Cookie::has('email')) ? value="{{Cookie::get('email')}}" : value="{{ old('email') }}" @endif placeholder="{{ __('placeholder.enter_email') }}">
                    @error('email') <span class="text-danger small"> {{ $message }} </span> @enderror
                </div>

                <div class="form-group">
                    <label class="label-style-1"><strong>Password</strong></label>
                    <input type="password" name="password" class="form-control input-style-1" @if(Cookie::has('password')) ? value="{{Cookie::get('password')}}" : value="{{ old('email') }}" @endif placeholder="{{ __('placeholder.enter_password') }}">
                    @error('password') <span class="text-danger small"> {{ $message }} </span> @enderror
                </div>
                <div class="form-row d-flex justify-content-between mt-4 mb-2">
                    <div class="form-group">
                        <div class="form-check ml-2">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} @if(Cookie::has('useremail')) checked @endif>
                            <label class="form-check-label" for="remember"> {{ __('Remember Me') }} </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('password.forgotForm') }}">Forgot Password?</a>
                    </div>
                </div>
                <div class="j-create-btns">
                    <div class="text-center">
                        <button type="submit" class="j-td-btn">{{ ___('signin') }}</button>
                    </div>
                </div>
            </form>
            <div class="new-account mt-3">
                <p>Don't have an account? <a class="text-primary" href="{{route('registerForm')}}">Sign up</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
