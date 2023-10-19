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
                    <label class="label-style-1"><strong>{{ __('name') }}</strong> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control input-style-1" name="name" value="{{ old('name') }}">
                    @error('name') <p class="pt-2 text-danger">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label class="label-style-1"><strong>{{ __('email') }}</strong> <span class="text-danger">*</span></label>
                    <input type="email" class="form-control input-style-1" name="email" value="{{ old('email') }}">
                    @error('email') <p class="pt-2 text-danger">{{ $message }}</p> @enderror
                </div>


                <div class="form-group">
                    <label class="label-style-1"><strong>{{ __('phone') }}</strong> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control input-style-1" name="phone" value="{{ old('phone') }}">
                    @error('phone') <p class="pt-2 text-danger">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label class="label-style-1"><strong>{{ __('label.gender') }}</strong> <span class="text-danger">*</span></label>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <label class="label-style-1" class="form-check-label">
                                <input type="radio" class="mr-2" name="gender" value="{{ App\Enums\Gender::MALE }}" @if(old('gender',App\Enums\Gender::MALE)==App\Enums\Gender::MALE) checked @endif>{{ __('male') }}
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="label-style-1" class="form-check-label">
                                <input type="radio" class="mr-2" name="gender" value="{{ App\Enums\Gender::FEMALE }}" @if(old('gender')==App\Enums\Gender::FEMALE) checked @endif>{{ __('female') }}
                            </label>
                        </div>
                    </div>
                    @error('gender')
                    <p class="pt-2 text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="label-style-1"><strong>{{ __('date_of_birth') }}</strong> <span class="text-danger">*</span></label>
                    <input type="text" id="dateOfBirth" class="form-control input-style-1 dateofbirth" readonly="readonly" data-toggle="datepicker" name="date_of_birth" value="{{ old('date_of_birth',Date('d-m-Y')) }}">
                    @error('date_of_birth')
                    <p class="pt-2 text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="form-group">
                    <label class="label-style-1"><strong>{{ __('label.password') }}</strong> <span class="text-danger">*</span></label>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control input-style-1">
                    @error('password') <p class="pt-2 text-danger">{{ $message }}</p> @enderror
                </div>


                <div class="form-group">
                    <label class="label-style-1"><strong>{{ __('label.c_password') }}</strong> <span class="text-danger">*</span></label>
                    <input type="password" name="c_password" value="{{ old('c_password') }}" class="form-control input-style-1">
                    @error('c_password') <p class="pt-2 text-danger">{{ $message }}</p> @enderror
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
