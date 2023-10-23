@extends('backend.partials.master')
@section('title')
{{ __('menus.profile') }}
@endsection

@section('maincontent')
<div class="container-fluid  dashboard-content">

    <div class="j-profile-main">
        <div class="row">
            <div class="col-xl-8">
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
