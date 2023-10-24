@extends('auth.master')
@section('title') {{ __('Forgot Password') }} @endsection

@section('main')

<div class="row no-gutters">
    <div class="col-xl-12">
        <div class="auth-form">
            <div class="contact-page-3">

                <div class="mb-3">
                    <h5 class="heading-5 mb-3 text-center"> Forgot Your Password ? </h5>
                    <span class="small">Not to worry, we got you! Let’s get you a new password.</span>
                </div>

                <form method="POST" action="{{ route('password.verify.email') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email" class="label-style-1">Email <sup>*</sup></label>
                        <input type="email" name="email" id="email" class="form-control input-style-1" value="{{ old('email') }}" placeholder="Enter your Email" required autocomplete="off" autofocus>
                        @error('email') <span class="text-danger small"> {{ $message }} </span> @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="j-td-btn btn-sm w-100 d-block">Verify Email</button>
                    </div>

                </form>


            </div>

        </div>
    </div>
</div>
@endsection
