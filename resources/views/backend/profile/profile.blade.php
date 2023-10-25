@extends('backend.profile.master')
@section('title')
{{ __('menus.profile') }}
@endsection
@section('content')
<div id="update_profile">
    <div class="settings-form j-text-body">
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
@endsection()



