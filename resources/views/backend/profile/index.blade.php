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
                        <a href="{{ route('profile.edit') }}" class="j-btn-sm">{{ __('label.edit') }}</a>
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
            <div class="col-xl-5">
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
