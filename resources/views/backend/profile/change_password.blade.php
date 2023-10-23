@extends('backend.partials.master')
@section('title')
{{ __('menus.profile') }}
@endsection

@section('maincontent')
<div class="container-fluid  dashboard-content">

    <div class="j-profile-main">
        <div class="row">
            <div class="col-xl-6">

                <div class="card">
                    <div class="card-body">

                        <div class="form-input-header">
                            <h4 class="title-site"> {{ __('user.create_user') }}</h4>
                        </div>

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
