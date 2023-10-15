@extends('auth.master')
@section('title') {{ __('menus.login') }} @endsection

@section('main')

<div class="row no-gutters">
    <div class="col-xl-12">
        <div class="auth-form">

            <h4 class="text-center mb-4">Sign up your account</h4>
            <form action="{{route('admin.register')}}" method="post">
                
                <div class="form-group">
                    <label class="label-style-1"><strong>{{ __('name') }}</strong> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control input-style-1" name="name" value="{{ old('name') }}">
                   @error('name')
                        <p class="pt-2 text-danger">{{ $message }}</p>
                   @enderror
                </div>

                <div class="form-group">
                    <label class="label-style-1"><strong>{{ __('email') }}</strong> <span class="text-danger">*</span></label>
                    <input type="email" class="form-control input-style-1" name="email" value="{{ old('email') }}">
                   @error('email')
                        <p class="pt-2 text-danger">{{ $message }}</p>
                   @enderror
                </div>


                <div class="form-group">
                    <label class="label-style-1"><strong>{{ __('phone') }}</strong> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control input-style-1" name="phone" value="{{ old('phone') }}">
                   @error('phone')
                        <p class="pt-2 text-danger">{{ $message }}</p>
                   @enderror
                </div>

                <div class="form-group">
                    <label class="label-style-1"><strong>{{ __('gender') }}</strong> <span class="text-danger">*</span></label>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <label class="label-style-1" class="form-check-label">
                                <input type="radio" class="mr-2"  name="gender"  value="{{ App\Enums\Gender::MALE }}"
                                   @if(old('gender',App\Enums\Gender::MALE) == App\Enums\Gender::MALE) checked @endif>{{ __('male') }}
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="label-style-1" class="form-check-label">
                                <input type="radio" class="mr-2" name="gender" value="{{ App\Enums\Gender::FEMALE }}"  @if(old('gender') == App\Enums\Gender::FEMALE) checked @endif>{{ __('female') }}
                            </label>
                        </div>
                    </div>
                   @error('gender')
                        <p class="pt-2 text-danger">{{ $message }}</p>
                   @enderror
                </div>
                <div class="form-group">
                    <label class="label-style-1"><strong>{{ __('date_of_birth') }}</strong> <span class="text-danger">*</span></label>
                    <input type="text" id="dateOfBirth" class="form-control input-style-1 dateofbirth" readonly="readonly" data-toggle="datepicker"  name="date_of_birth" value="{{ old('date_of_birth',Date('d-m-Y')) }}">
                   @error('date_of_birth')
                        <p class="pt-2 text-danger">{{ $message }}</p>
                   @enderror
                </div>


                <div class="form-group">
                    <label class="label-style-1"><strong>{{ __('password') }}</strong> <span class="text-danger">*</span></label>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control input-style-1" >
                    @error('password')
                        <p class="pt-2 text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="form-group">
                    <label class="label-style-1"><strong>{{ __('confirm_password') }}</strong> <span class="text-danger">*</span></label>
                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control input-style-1" >
                    @error('password_confirmation')
                        <p class="pt-2 text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="j-create-btns">
                    <div class="drp-btns">
                        <button type="submit" class="j-td-btn">{{ __('signup') }}</button>
                    </div>
                </div>


            </form>
            <div class="new-account mt-3">
                <p>Already have an account? <a class="text-primary" href="page-login.html">Sign
                        in</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
