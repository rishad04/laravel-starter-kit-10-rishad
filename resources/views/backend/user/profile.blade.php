@extends('backend.partials.master')
@section('title')
{{ __('menus.profile') }}
@endsection
@section('maincontent')
<div class="container-fluid  dashboard-content">

    <div class="j-profile-main">
        <div class="row">
            <div class="col-xl-5">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text wel-flex">
                            <div class="wel-user-pic">
                                <img src="{{ getImage($user->image_id) }}" class="profile-img" alt="">
                            </div>
                            <div class="wel-user-bio">
                                <h5 class="heading-5">{{@$user->name}}</h5>
                                <p class="mb-0">{{@$user->email}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        @if($user->id == auth()->user()->id)
                        <a href="{{ route('profile.edit') }}" id="edit" class="j-btn-sm">{{ __('label.edit') }}</a>
                        {{-- <a href="javascript:void(0);" onclick="showUpdateForm()" id="edit" class="j-btn-sm">{{ __('label.edit') }}</a> --}}
                        @endif
                    </div>
                </div>
                <div class="j-eml-card">
                    <h5 class="heading-5">Basic Information</h5>
                    <ul class="j-eml-list">
                        <li>
                            <h6 class="heading-6">Name</h6>
                            <span>{{@$user->name}}</span>
                        </li>
                        <li>
                            <h6 class="heading-6">{{ __('label.dob') }}</h6>
                            <span>{{ dateFormat(@$user->date_of_birth) }}</span>
                        </li>
                        <li>
                            <h6 class="heading-6">{{ __('label.gender') }}</h6>
                            <span>{{ __('gender.' . @$user->gender)  }}</span>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-xl-5" id="contact_info">
                <div class="j-eml-card">
                    <h5 class="heading-5">Contact Information</h5>
                    <ul class="j-eml-list">
                        <li>
                            <h6 class="heading-6">Email</h6>
                            <span>{{@$user->email}}
                                @if(@$user->email_verified_at==null)
                                <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>
                                @endif
                            </span>



                        </li>
                        <li>
                            <h6 class="heading-6">Phone</h6>
                            <span>{{@$user->phone}}</span>
                        </li>
                        <li>
                            <h6 class="heading-6">Address</h6>
                            <span>{{@$user->address}}</span>
                        </li>
                        <li>
                            <h6 class="heading-6">{{ __('label.role') }}</h6>
                            <span>{{@$user->role->name}}</span>
                        </li>
                        <li>
                            <h6 class="heading-6">{{ __('label.designation') }}</h6>
                            <span>{{@$user->designation->title}}</span>
                        </li>
                        <li>
                            <h6 class="heading-6">{{ __('label.status') }}</h6>
                            <span>{!! @$user->my_status !!}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-xl-7" id="update">
                <div class="card card-border profile-pd-0">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#update_profile" id="update_profile_tab" data-toggle="tab" class="nav-link active show">Update Profile</a>
                                    </li>
                                    <li class="nav-item"><a href="#update_password" id="update_password_tab" data-toggle="tab" class="nav-link">Update Password</a>
                                    </li>
                                </ul>
                                <div class="tab-content">

                                    <div id="update_profile" class="tab-pane active show">
                                        <div class="settings-form j-text-body">
                                            {{-- <h4 class="text-primary">Account Setting</h4> --}}
                                            <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')

                                                <div class="form-row">

                                                    <div class="form-group col-md-6">
                                                        <label class=" label-style-1" for="name">{{ __('label.name') }}</label> <span class="text-danger">*</span>
                                                        <input id="name" type="text" name="name" placeholder="{{ __('placeholder.enter_name') }}" class="form-control input-style-1" value="{{ old('name',$user->name) }}">
                                                        @error('name') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label class="label-style-1">{{ __('label.dob') }} <span class="text-danger">*</span></label>
                                                        <input type="date" id="dob" name="dob" class="form-control input-style-1 flatpickr" value="{{ old('dob',$user->dob) }}" placeholder="{{ __('placeholder.enter_dob') }}">
                                                        @error('dob') <span class="pt-2 text-danger">{{ $message }}</span> @enderror
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label class="label-style-1">{{ __('label.gender') }} <span class="text-danger">*</span></label>
                                                        <select name="gender" id="gender" class="form-control input-style-1 select2">
                                                            @foreach(trans('gender') as $key => $gender)
                                                            <option value="{{ $key }}" @selected(old('gender',$user->gender) == $key)>{{ $gender }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('gender') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label class=" label-style-1" for="image">{{ __('label.image') }}</label>
                                                        <input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="image" id="image" class="form-control input-style-1 ">
                                                        @error('image') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label class=" label-style-1" for="address">{{ __('label.address') }}</label> <span class="text-danger">*</span>
                                                        <textarea name="address" class="form-control input-style-1" rows="3" placeholder="{{ __('placeholder.enter_address') }}">{{ old('address',$user->address) }}</textarea>
                                                        @error('address') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label class="label-style-1">{{ __('label.about') }} </label>
                                                        <textarea name="about" class="form-control input-style-1" rows="3" placeholder="{{ __('placeholder.about_me') }}">{{ old('about',$user->about) }}</textarea>
                                                        @error('about') <span class="pt-2 text-danger">{{ $message }}</span> @enderror
                                                    </div>

                                                </div>

                                                <div class="j-create-btns">
                                                    <div class="drp-btns">
                                                        <button type="submit" class="j-td-btn">{{ __('label.save') }}</button>
                                                        <a href="{{ route('profile') }}" class="j-td-btn btn-red"> <span>{{ __('label.cancel') }}</span> </a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div id="update_password" class="tab-pane fade">
                                        <div class="settings-form j-text-body">
                                            <h4 class="text-primary">Account Setting</h4>
                                            <form action="{{route('passwordUpdate')}}" method="POST">
                                                @csrf
                                                @method('put')

                                                <div class="form-row">

                                                    <div class="form-group col-md-12">
                                                        <label class=" label-style-1" for="old_password">{{ __('label.old_password') }}</label> <span class="text-danger">*</span>
                                                        <input type="password" id="old_password" name="old_password" placeholder="{{ __('placeholder.enter_old_password') }}" class="form-control input-style-1 " value="{{ old('old_password') }}">
                                                        @error('old_password') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label class=" label-style-1" for="new_password">{{ __('label.new_password') }}</label> <span class="text-danger">*</span>
                                                        <input type="password" id="new_password" name="new_password" placeholder="{{ __('placeholder.enter_new_password') }}" class="form-control input-style-1" value="{{ old('new_password') }}">
                                                        @error('new_password') <small class=" text-danger mt-2">{{ $message }}</small> @enderror
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label class=" label-style-1" for="confirm_password">{{ __('label.confirm_password') }}</label> <span class="text-danger">*</span>
                                                        <input type="password" id="confirm_password" name="confirm_password" placeholder="{{ __('placeholder.enter_confirm_password') }}" class="form-control input-style-1" value="{{ old('confirm_password') }}">
                                                        @error('confirm_password') <small class=" text-danger mt-2">{{ $message }}</small> @enderror
                                                    </div>

                                                </div>

                                                <div class="j-create-btns">
                                                    <div class="drp-btns">
                                                        <button type="submit" class="j-td-btn">{{ __('label.save') }}</button>
                                                        <a href="{{ route('profile') }}" class="j-td-btn btn-red"> <span>{{ __('label.cancel') }}</span> </a>
                                                    </div>
                                                </div>
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
        if (currentURL.includes('profile/change-password')) {
            $('#contact_info').hide();
            $('#update').show();
            $('#update_profile,#update_profile_tab').removeClass('active show');
            $('#update_password,#update_password_tab').addClass('active show');
        }
        if (currentURL.includes('profile/edit')) {
            showUpdateForm();
        }
    });


    $('#update').hide();

    function showUpdateForm() {
        $('#contact_info').hide();
        $('#update').show();
    }

</script>

@endpush
