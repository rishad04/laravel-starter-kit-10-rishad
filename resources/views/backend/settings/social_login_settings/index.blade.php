@extends('backend.partials.master')
@section('title')
{{ ___('menus.social_login_settings') }}
@endsection
@section('maincontent')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="breadcrumb-link">{{ ___('menus.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link active">{{ ___('menus.settings') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('social.login.settings.index')}}" class="breadcrumb-link active">{{ ___('menus.social_login_settings') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="h4 mb-3">{{__('levels.facebook')}}</h4>
                    @if(hasPermission('social_login_settings_update'))
                    <form action="{{route('social.login.settings.update','facebook')}}" method="POST" enctype="multipart/form-data" id="basicform">
                        @method('PUT')
                        @csrf
                        @endif
                        <div class="row">
                            <div class="col-12 ">

                                <div class="form-group">
                                    <label class="label-style-1" for="facebook_client_id">{{ ___('levels.app_id') }}</label> <span class="text-danger">*</span>
                                    <input id="facebook_client_id" type="text" name="facebook_client_id" data-parsley-trigger="change" placeholder="{{ ___('placeholder.app_id') }}" autocomplete="off" class="form-control input-style-1" value="{{ old('facebook_client_id', globalSettings('facebook_client_id')) }}" require>
                                    @error('facebook_client_id')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="label-style-1" for="facebook_client_secret">{{ ___('levels.app_secret') }}</label> <span class="text-danger">*</span>
                                    <input id="facebook_client_secret" type="text" name="facebook_client_secret" data-parsley-trigger="change" placeholder="{{ ___('placeholder.app_secret') }}" autocomplete="off" class="form-control input-style-1" value="{{ old('facebook_client_secret', globalSettings('facebook_client_secret')) }}" require>
                                    @error('facebook_client_secret')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group d-flex">
                                    <label class="label-style-1" for="switch-id">{{ ___('levels.status') }}</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input switch-id ml-3" name="facebook_status" id="switch-id" type="checkbox" role="switch" @checked(old('facebook_status', globalSettings('facebook_status'))==\App\Enums\StatusEnum::ACTIVE->value)>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @if(hasPermission('social_login_settings_update'))
                        <div class="j-create-btns">
                            <div class="drp-btns">
                                <button type="submit" class="j-td-btn">{{ ___('levels.save_change') }}</button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-6  col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="h4 mb-3">{{__('levels.google')}}</h4>
                    @if(hasPermission('social_login_settings_update'))
                    <form action="{{route('social.login.settings.update','google')}}" method="POST" enctype="multipart/form-data" id="basicform">
                        @method('PUT')
                        @csrf
                        @endif
                        <div class="row">
                            <div class="col-12 ">
                                <div class="form-group">
                                    <label class="label-style-1" for="google_client_id">{{ ___('levels.client_id') }}</label> <span class="text-danger">*</span>
                                    <input id="google_client_id" type="text" name="google_client_id" data-parsley-trigger="change" placeholder="{{ ___('placeholder.client_id') }}" autocomplete="off" class="form-control input-style-1" value="{{ old('google_client_id', globalSettings('google_client_id')) }}" require>
                                    @error('google_client_id')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="label-style-1" for="google_client_secret">{{ ___('levels.client_secret') }}</label> <span class="text-danger">*</span>
                                    <input id="google_client_secret" type="text" name="google_client_secret" data-parsley-trigger="change" placeholder="{{ ___('placeholder.client_secret') }}" autocomplete="off" class="form-control input-style-1" value="{{ old('google_client_secret', globalSettings('google_client_secret')) }}" require>
                                    @error('google_client_secret')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group d-flex">
                                    <label class="label-style-1" for="g-switch-id">{{ ___('levels.status') }}</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input switch-id ml-3" name="google_status" id="g-switch-id" type="checkbox" role="switch" @checked(old('google_status', globalSettings('google_status'))==\App\Enums\StatusEnum::ACTIVE->value)>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(hasPermission('social_login_settings_update'))
                        <div class="j-create-btns">
                            <div class="drp-btns">
                                <button type="submit" class="j-td-btn">{{ ___('levels.save_change') }}</button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
