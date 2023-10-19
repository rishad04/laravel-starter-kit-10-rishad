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
                                <img src="{{@$user->image}}" class="profile-img" alt="no image">
                                {{-- <img src="{{static_asset('backend')}}/assets/img/pictures/user-profile.png" alt="no image"> --}}
                            </div>
                            <div class="wel-user-bio">
                                <h5 class="heading-5">{{@$user->name}}</h5>
                                <p class="mb-0">{{@$user->email}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        {{-- <a href="#" class="j-btn-sm">{{ __('label.edit') }}</a> --}}
                        {{-- <a href="#profile-settings" data-toggle="tab" class="j-btn-sm active show">{{ __('label.edit') }}</a> --}}
                    </div>
                </div>
                <div class="j-eml-card">
                    <h5 class="heading-5">Profile Information</h5>
                    <ul class="j-eml-list">
                        <li>
                            <h6 class="heading-6">Name</h6>
                            <span>{{@$user->name}}</span>
                        </li>
                        <li>
                            <h6 class="heading-6">Email</h6>
                            <span>{{@$user->email}}</span>
                        </li>
                        <li>
                            <h6 class="heading-6">Phone</h6>
                            <span>{{@$user->mobile}}</span>
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
            <div class="col-xl-7">
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
