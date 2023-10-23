@extends('backend.partials.master')
@section('title')
{{ __('menus.profile') }}
@endsection

@section('maincontent')
<div class="container-fluid  dashboard-content">




    <div class="j-profile-main">
        <div class="row">
            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body">

                        <div class="form-input-header">
                            <h4 class="title-site"> {{ __('user.create_user') }}</h4>
                        </div>

                        <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="name">{{ __('label.name') }}</label> <span class="text-danger">*</span>
                                    <input id="name" type="text" name="name" placeholder="{{ __('placeholder.Enter_name') }}" class="form-control input-style-1" value="{{ old('name') }}">
                                    @error('name') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="email">{{ __('label.email') }}</label> <span class="text-danger">*</span>
                                    <input id="email" type="email" name="email" placeholder="{{ __('placeholder.enter_email') }}" class="form-control input-style-1 " value="{{ old('email') }}">
                                    @error('email') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="phone">{{ __('label.phone') }}</label> <span class="text-danger">*</span>
                                    <input id="phone" type="tel" name="phone" placeholder="{{ __('placeholder.Enter_mobile') }}" class="form-control input-style-1 " value="{{ old('phone') }}">
                                    @error('phone') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="label-style-1">{{ __('label.dob') }} <span class="text-danger">*</span></label>
                                    <input type="date" id="dob" name="dob" class="form-control input-style-1 flatpickr" value="{{ old('dob') }}" placeholder="{{ __('placeholder.enter_dob') }}">
                                    @error('dob') <p class="pt-2 text-danger">{{ $message }}</p> @enderror
                                </div>



                                <div class="form-group col-md-6">
                                    <label class="label-style-1">{{ __('label.gender') }} <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control input-style-1 select2">
                                        @foreach(trans('status') as $key => $status)
                                        <option value="{{ $key }}" @selected(old('status',\App\Enums\Status::ACTIVE)==$key)>{{ $status }}</option>
                                        @endforeach
                                    </select>
                                    @error('status') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                </div>


                                <div class="form-group col-md-6">
                                    <label class="label-style-1">{{ __('label.gender') }} <span class="text-danger">*</span></label>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label label-style-1">
                                            <input type="radio" class="mr-2" name="gender" value="{{ App\Enums\Gender::MALE }}" @if(old('gender')==App\Enums\Gender::MALE) checked @endif>{{ __('male') }}
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label label-style-1">
                                            <input type="radio" class="mr-2" name="gender" value="{{ App\Enums\Gender::FEMALE }}" @if(old('gender')==App\Enums\Gender::FEMALE) checked @endif>{{ __('female') }}
                                        </label>
                                    </div>
                                    @error('gender') <p class="pt-2 text-danger">{{ $message }}</p> @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="status">{{ __('label.status') }}</label>
                                    <select name="status" id="status" class="form-control input-style-1 select2">
                                        @foreach(trans('status') as $key => $status)
                                        <option value="{{ $key }}" @selected(old('status',\App\Enums\Status::ACTIVE)==$key)>{{ $status }}</option>
                                        @endforeach
                                    </select>
                                    @error('status') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="address">{{ __('label.address') }}</label> <span class="text-danger">*</span>
                                    <input id="address" type="text" name="address" placeholder="{{ __('placeholder.Enter_address') }}" class="form-control input-style-1 " value="{{ old('address') }}">
                                    @error('address') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="password">{{ __('label.password') }}</label> <span class="text-danger">*</span>
                                    <input id="password" type="password" name="password" placeholder="{{ __('placeholder.Enter_password') }}" class="form-control input-style-1 " value="{{ old('password') }}">
                                    @error('password') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="nid_number">{{ __('label.nid_number') }}</label>
                                    <input id="nid_number" type="number" name="nid_number" placeholder="{{ __('placeholder.Enter_nid_number') }}" class="form-control input-style-1" value="{{ old('nid_number') }}">
                                    @error('nid_number') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="nid">{{ __('label.nid') }}</label>
                                    <input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="nid" id="nid" class="form-control input-style-1 ">
                                    @error('nid') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="image">{{ __('label.image') }}</label>
                                    <input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="image" id="image" placeholder="Enter image" class="form-control input-style-1 ">
                                    @error('image') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="label-style-1">{{ __('label.about') }} </label>
                                    <textarea name="about" class="form-control input-style-1" rows="10">{{ old('about') }}</textarea>
                                    @error('about')
                                    <p class="pt-2 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            <div class="j-create-btns">
                                <div class="drp-btns">
                                    <button type="submit" class="j-td-btn">{{ __('label.save') }}</button>
                                    <a href="{{ route('user.index') }}" class="j-td-btn btn-red"> <span>{{ __('label.cancel') }}</span> </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="card card-border profile-pd-0">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link active show">{{ __('menus.settings') }}</a> </li>
                                    <li class="nav-item"><a href="#password-change" data-toggle="tab" class="nav-link ">{{ __('menus.change_password') }}</a> </li>
                                </ul>
                                <div class="tab-content">

                                    <div id="profile-settings" class="tab-pane fade active show">
                                        <div class="settings-form j-text-body">
                                            <form action="{{route('profile.update',$user->id)}}" method="POST" enctype="multipart/form-data">

                                                @method('PUT')
                                                @csrf

                                                <div class="form-row">

                                                    <div class="form-group col-md-6">
                                                        <label class="label-style-1" for="name">{{ __('label.name') }}</label>
                                                        <input type="text" name="name" id="name" class="form-control input-style-1" value="{{$user->name}}" placeholder="{{ __('label.name') }}">
                                                        @error('name') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label class="label-style-1" for="image">{{ __('label.image') }}</label>
                                                        <input id="Image" type="file" name="image" data-parsley-trigger="change" placeholder="Enter Image" autocomplete="off" class="form-control">
                                                        @error('image') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <label class="label-style-1" for="address">{{ __('label.address') }}</label>
                                                    <textarea name="address" id="address" class="form-control input-style-1" rows="5" placeholder="{{ __('label.address') }}">{{ old('address',$user->address) }}</textarea>
                                                    {{-- <input type="text" name="address" id="address" class="form-control input-style-1" value="{{ old('address',$user->address) }}" placeholder="{{ __('label.address') }}"> --}}
                                                    @error('address') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                                </div>

                                                <button class="j-td-btn" type="submit"> {{ __('label.update') }}</button>

                                            </form>
                                        </div>
                                    </div>

                                    <div id="password-change" class="tab-pane fade ">
                                        <div class="profile-password-change j-text-body">
                                            <form action="{{route('password.update',$user->id)}}" method="POST" enctype="multipart/form-data">

                                                @method('PUT')
                                                @csrf

                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label class="label-style-1" for="old_password">{{ __('label.old_password') }}</label>
                                                            <input id="old_password" type="password" name="old_password" placeholder="{{ __('placeholder.enter_old_password') }}" autocomplete="off" class="form-control input-style-1" value="{{old('old_password')}}" require>
                                                            @error('old_password') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="label-style-1" for="new_password">{{ __('label.new_password') }}</label>
                                                            <input id="new_password" type="password" name="new_password" data-parsley-trigger="change" placeholder="{{ __('placeholder.enter_new_password') }}" autocomplete="off" class="form-control input-style-1" value="{{old('new_password')}}" require>
                                                            @error('new_password') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="label-style-1" for="confirm_password">{{ __('label.confirm_password') }}</label>
                                                            <input id="confirm_password" type="password" name="confirm_password" data-parsley-trigger="change" placeholder="{{ __('placeholder.enter_confirm_password') }}" autocomplete="off" value="{{old('confirm_password')}}" class="form-control input-style-1" require>
                                                            @error('confirm_password') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <button class="j-td-btn" type="submit"> {{ __('label.update') }}</button>

                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end wrapper  -->
@endsection()


@push('scripts')

<script>
    $(document).ready(function() {
        var currentURL = window.location.href;
        var profileSettingsTab = $('#profile-settings');
        var passwordChangeTab = $('#password-change');

        if (currentURL.includes('admin/profile/change-password')) {
            // Activate the "password-change" tab
            profileSettingsTab.removeClass('active show');
            passwordChangeTab.addClass('active show');
        }
    });

</script>

@endpush
