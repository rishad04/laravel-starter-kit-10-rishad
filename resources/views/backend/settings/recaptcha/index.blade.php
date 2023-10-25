@extends('backend.partials.master')

@section('title',__('recaptcha.recaptcha_setting') )

@section('maincontent')

<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="breadcrumb-link">{{ __('menus.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link active">{{ __('menus.settings') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('settings.recaptcha.index')}}" class="breadcrumb-link active">{{ __('menus.recaptcha') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <div class="form-input-header">
                        <h4 class="title-site"> {{ __('recaptcha.recaptcha_setting') }} </h4>
                    </div>

                    <form action="{{ route('settings.recaptcha.update') }}" method="post">
                        @csrf
                        @method('put')

                        <div class="form-row">

                            <div class="col-md-12 form-group ">
                                <label class="label-style-1">{{ __('recaptcha.site_key') }}</label>
                                <input type="text" placeholder="{{ __('recaptcha.site_key') }}" class="form-control input-style-1" name="recaptcha_site_key" value="{{ old('recaptcha_site_key',globalSettings('recaptcha_site_key')) }}" @if(!hasPermission('recaptcha_settings_update')) disabled @endif>
                                @error('recaptcha_site_key') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-12 form-group ">
                                <label class="label-style-1">{{ __('recaptcha.secret_key') }}</label>
                                <input type="text" placeholder="{{ __('recaptcha.secret_key') }}" class="form-control input-style-1" name="recaptcha_secret_key" value="{{ old('recaptcha_secret_key',globalSettings('recaptcha_secret_key')) }}" @if(!hasPermission('recaptcha_settings_update')) disabled @endif>
                                @error('recaptcha_secret_key') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label class="label-style-1" class=" label-style-1" for="recaptcha_status">{{ __('label.status') }}</label>
                                <select name="recaptcha_status" id="recaptcha_status" class="form-control input-style-1 input-style-1 select2" @disabled(!hasPermission('recaptcha_settings_update'))>

                                    @foreach(trans('status') as $key => $status)
                                    <option value="{{ $key }}" @selected(old('recaptcha_status',@globalSettings('recaptcha_status'))==$key)>{{ $status }}</option>
                                    @endforeach
                                </select>
                                @error('recaptcha_status') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>


                            @if(hasPermission('recaptcha_settings_update'))
                            <div class="j-create-btns">
                                <div class="drp-btns">
                                    <button type="submit" class="j-td-btn">{{ __('label.save') }}</button>
                                    <a href="{{ route('role.index') }}" class="j-td-btn btn-red"> <span>{{ __('label.cancel') }}</span> </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
