@extends('auth.master')
@section('title') {{ __('menus.login') }} @endsection

@section('main')

<div class="row no-gutters">
    <div class="col-xl-12">
        <div class="auth-form">

            <h4 class="text-center mb-4">Sign up your account</h4>
            <form action="{{route('register')}}" method="post">
                @csrf

                <div class="form-group">
                    <label class="label-style-1"><strong>{{ __('Name') }}</strong> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control input-style-1" name="name" value="{{ old('name') }}">
                    @error('name') <span class="pt-2 text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="label-style-1"><strong>{{ __('Email') }}</strong> <span class="text-danger">*</span></label>
                    <input type="email" class="form-control input-style-1" name="email" value="{{ old('email') }}">
                    @error('email') <span class="pt-2 text-danger">{{ $message }}</span> @enderror
                </div>


                <div class="form-group">
                    <label class="label-style-1"><strong>{{ __('Phone') }}</strong> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control input-style-1" name="phone" value="{{ old('phone') }}">
                    @error('phone') <span class="pt-2 text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group ">
                    <label class="label-style-1">{{ __('label.gender') }} <span class="text-danger">*</span></label>
                    <select name="gender" id="gender" class="form-control input-style-1 select2">
                        @foreach(trans('gender') as $key => $gender)
                        <option value="{{ $key }}" @selected(old('gender')==$key)>{{ $gender }}</option>
                        @endforeach
                    </select>
                    @error('gender') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label class="label-style-1" for="dob"><strong>{{ __('label.dob') }}</strong> <span class="text-danger">*</span></label>
                    <input type="date" id="dob" class="form-control input-style-1 flatpickr" name="dob" value="{{ old('dob') }}">
                    @error('dob') <span class="pt-2 text-danger">{{ $message }}</span> @enderror
                </div>


                <div class="form-group">
                    <label class="label-style-1"><strong>{{ __('label.password') }}</strong> <span class="text-danger">*</span></label>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control input-style-1">
                    @error('password') <span class="pt-2 text-danger">{{ $message }}</span> @enderror
                </div>


                <div class="form-group">
                    <label class="label-style-1"><strong>{{ __('label.confirm_password') }}</strong> <span class="text-danger">*</span></label>
                    <input type="password" name="confirm_password" value="{{ old('confirm_password') }}" class="form-control input-style-1">
                    @error('confirm_password') <span class="pt-2 text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="j-create-btns">
                    <div class="text-center">
                        <button type="submit" class="j-td-btn">{{ __('label.signup') }}</button>
                    </div>
                </div>

            </form>

            <div class="new-account mt-3">
                <p>Already have an account? <a class="text-primary" href="{{ route('login') }}">Sign in</a></p>
            </div>

        </div>
    </div>
</div>
@endsection
