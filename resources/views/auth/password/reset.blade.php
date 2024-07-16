@extends('auth.master')
@section('title') {{ ___('Reset Password') }} @endsection

@section('main')

<div class="row no-gutters">
    <div class="col-xl-12">
        <div class="auth-form">

            <div class="text-center mb-3">
                <a href="{{ route('home')}}"> <img src="{{ logo(settings('light_logo') ) }}" alt="" class="rounded" height="40"></a>
            </div>

            <div class="contact-page-3">

                <div class="mb-3">
                    <h5 class="heading-5 mb-3 text-center"> Reset Password </h5>
                    <span class="small">Please fillup the form with your new password that you want to set. </span>
                </div>

                <form method="POST" action="{{ route('password.reset') }}">
                    @csrf

                    <input type="hidden" name="user_id" value="{{session('user_id')}}">
                    <input type="hidden" name="token" value="{{session('token')}}">

                    <div class="form-group mb-3">
                        <label for="new_password" class="label-style-1 mb-2">New Password<sup>*</sup></label>
                        <input type="password" name="new_password" id="new_password" class="form-control input-style-1" value="{{ old('new_password') }}" placeholder="{{ ___('placeholder.Enter new password') }}" required autocomplete="off" autofocus>
                        @error('new_password') <span class="text-danger small"> {{ $message }} </span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="confirm_password" class="label-style-1 mb-2">Confirm Password<sup>*</sup></label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control input-style-1" value="{{ old('confirm_password') }}" placeholder="{{ ___('placeholder.Confirm new password') }}" required autocomplete="off" autofocus>
                        @error('confirm_password') <span class="text-danger small"> {{ $message }} </span> @enderror
                    </div>

                    <button type="submit" class="j-td-btn btn-sm w-100 d-block">Submit</button>

                </form>

                <div class="text-center pt-3">
                    <span>Know your password ? <a href="{{ route('loginForm') }}">Signin Here</a> </span> </p>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
