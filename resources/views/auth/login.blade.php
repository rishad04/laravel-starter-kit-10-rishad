@extends('auth.master')

@section('main')
<div class="row no-gutters">
<div class="col-xl-12">
    <div class="auth-form">
        <h4 class="text-center mb-4">Sign in your account</h4>
        <form action="index.html">
            <div class="form-group">
                <label><strong>Email</strong></label>
                <input type="email" class="form-control  input-style-1" value="hello@example.com">
            </div>
            <div class="form-group">
                <label class="label-style-1"><strong>Password</strong></label>
                <input type="password" class="form-control  input-style-1" value="Password">
            </div>
            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                <div class="form-group">
                    <div class="form-check ml-2">
                        <input class="form-check-input" type="checkbox"
                            id="basic_checkbox_1">
                        <label class="form-check-label" for="basic_checkbox_1">Remember
                            me</label>
                    </div>
                </div>
                <div class="form-group">
                    <a href="page-forgot-password.html">Forgot Password?</a>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block">Sign me in</button>
            </div>
        </form>
        <div class="new-account mt-3">
            <p>Don't have an account? <a class="text-primary"
                    href="./page-register.html">Sign up</a></p>
        </div>
    </div>
</div>
</div>
@endsection
