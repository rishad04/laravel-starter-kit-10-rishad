@extends('auth.master')
@section('title') {{ __('menus.registration') }} @endsection

@section('main')

<div class="auth-form">

    <h4 class="text-center mb-4">Sign up your account</h4>
    <form action="{{route('register')}}" method="post">
        @csrf

        <div class="row no-gutters">
            <div class="col-xl-12 form-group">
                <label class="label-style-1"><strong>{{ __('Name') }}</strong> <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control input-style-1" value="{{ old('name') }}" placeholder="{{ __('placeholder.enter_name')}}">
                @error('name') <span class="pt-2 text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-xl-12 form-group">
                <label class="label-style-1"><strong>{{ __('Email') }}</strong> <span class="text-danger">*</span></label>
                <input type="email" class="form-control input-style-1" name="email" value="{{ old('email') }}" placeholder="{{ __('placeholder.enter_email')}}">
                @error('email') <span class="pt-2 text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-xl-12 form-group">
                <label class="label-style-1"><strong>{{ __('Phone') }}</strong> <span class="text-danger">*</span></label>
                <input type="tel" class="form-control input-style-1" name="phone" value="{{ old('phone') }}" placeholder="{{ __('placeholder.enter_phone')}}">
                @error('phone') <span class="pt-2 text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-xl-12 form-group ">
                <label class="label-style-1">{{ __('label.gender') }} <span class="text-danger">*</span></label>
                <select name="gender" id="gender" class="form-control input-style-1 select2">
                    <option></option>
                    @foreach(trans('gender') as $key => $gender)
                    <option value="{{ $key }}" @selected(old('gender')==$key)>{{ $gender }}</option>
                    @endforeach
                </select>
                @error('gender') <small class="text-danger mt-2">{{ $message }}</small> @enderror
            </div>

            <div class="col-xl-12 form-group">
                <label class="label-style-1" for="dob"><strong>{{ __('label.dob') }}</strong> <span class="text-danger">*</span></label>
                <input type="date" name="dob" id="dob" class="form-control input-style-1 flatpickr" value="{{ old('dob') }}" placeholder="{{ __('placeholder.enter_dob')}}" min="{{ date('Y-m-d', strtotime('-100 years')) }}" max="{{ date('Y-m-d', strtotime('-10 years')) }}">
                @error('dob') <span class="pt-2 text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-xl-12 form-group">
                <label class="label-style-1"><strong>{{ __('label.password') }}</strong> <span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control input-style-1" value="{{ old('password') }}" placeholder="{{ __('placeholder.enter_password')}}">
                @error('password') <span class="pt-2 text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-xl-12 form-group">
                <label class="label-style-1"><strong>{{ __('label.confirm_password') }}</strong> <span class="text-danger">*</span></label>
                <input type="password" name="confirm_password" class="form-control input-style-1" value="{{ old('confirm_password') }}" placeholder="{{ __('placeholder.enter_confirm_password')}}">
                @error('confirm_password') <span class="pt-2 text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="j-create-btns">
                <div class="text-center">
                    <button type="submit" class="j-td-btn">{{ __('label.signup') }}</button>
                </div>
            </div>

        </div>
    </form>

    <div class="new-account mt-3">
        <p>Already have an account? <a class="text-primary" href="{{ route('login') }}">Sign in</a></p>
    </div>


</div>
@endsection


@push('scripts')

<script type="text/javascript">
    $(document).ready(function() {

        $("#dob").flatpickr({
            altInput: true
            , altFormat: "F j, Y"
            , dateFormat: "Y-m-d"
            , minDate: "{{  date('Y-m-d', strtotime('-100 years')) }}"
            , maxDate: "{{  date('Y-m-d', strtotime('-10 years')) }}"
        });

    });

</script>

@endpush
