@extends('auth.master')
@section('title') {{ ___('menus.registration') }} @endsection

@section('main')

<div class="auth-form">

    <div class="text-center mb-3">
        <a href="{{ route('home')}}"> <img src="{{ logo(settings('light_logo') ) }}" alt="" class="rounded" height="40"></a>
    </div>

    <h4 class="text-center mb-3"> {{ ___('menus.registration') }}</h4>

    <form action="{{route('register')}}" method="post">
        @csrf

        <div class="row sno-gutters">
            <div class="col-xl-12 form-group mb-2">
                <label class="label-style-1 mb-1">{{ ___('label.Name') }} <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control input-style-1" value="{{ old('name') }}" placeholder="{{ ___('placeholder.enter_name')}}">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-xl-12 form-group mb-2">
                <label class="label-style-1 mb-1">{{ ___('label.Email') }} <span class="text-danger">*</span></label>
                <input type="email" class="form-control input-style-1" name="email" value="{{ old('email') }}" placeholder="{{ ___('placeholder.enter_email')}}">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-xl-12 form-group mb-2">
                <label class="label-style-1 mb-1">{{ ___('label.Phone') }} <span class="text-danger">*</span></label>
                <input type="tel" class="form-control input-style-1" name="phone" value="{{ old('phone') }}" placeholder="{{ ___('placeholder.enter_phone')}}">
                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-xl-12 form-group mb-2">
                <label class="label-style-1 mb-1" for="password">{{ ___('label.password') }} <span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control input-style-1" value="{{ old('password') }}" placeholder="{{ ___('placeholder.enter_password')}}">
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-xl-12 form-group mb-2">
                <label class="label-style-1 mb-1" for="confirm_password">{{ ___('label.confirm_password') }} <span class="text-danger">*</span></label>
                <input type="password" name="confirm_password" class="form-control input-style-1" value="{{ old('confirm_password') }}" placeholder="{{ ___('placeholder.enter_confirm_password')}}">
                @error('confirm_password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-xl-6 form-group mb-2 ">
                <label class="label-style-1 mb-1" for="gender">{{ ___('label.Gender') }} <span class="text-danger">*</span></label>
                <select name="gender" id="gender" class="form-control input-style-1 select2">
                    <option></option>
                    @foreach(App\Enums\Gender::cases() as $gender)
                    <option value="{{ $gender->value }}" @selected(old('gender')==$gender->value)>{{ ___("label.{$gender->name}") }}</option>
                    @endforeach
                </select>
                @error('gender') <small class="text-danger mt-2">{{ $message }}</small> @enderror
            </div>

            <div class="col-xl-6 form-group">
                <label class="label-style-1 mb-1" for="dob">{{ ___('label.date_of_birth') }} <span class="text-danger">*</span></label>
                <input type="date" name="date_of_birth" id="dob" class="form-control input-style-1 flatpickr" value="{{ old('date_of_birth') }}" placeholder="{{ ___('placeholder.enter_dob')}}" min="{{ date('Y-m-d', strtotime('-100 years')) }}" max="{{ date('Y-m-d', strtotime('-10 years')) }}">
                @error('date_of_birth') <small class="text-danger">{{ $message }}</small> @enderror
            </div>



        </div>

        <button type="submit" class="j-td-btn btn-smd w-100 d-block">{{ ___('label.signup') }}</button>

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
