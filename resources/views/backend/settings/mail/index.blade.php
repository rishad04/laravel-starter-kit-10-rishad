@extends('backend.partials.master')

@section('title')
{{ __('menus.mail_setting') }}
@endsection

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
                            <li class="breadcrumb-item"><a href="{{route('settings.mail')}}" class="breadcrumb-link active">{{ __('menus.mail_setting') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <div class="form-input-header">
                <h4 class="title-site"> {{ __('menus.mail_setting') }} </h4>
            </div>

            <form action="{{route('settings.mail.update')}}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label class="label-style-1" for="mail_sendmail_path">{{ __('label.mail_sendmail_path') }}</label> <span class="text-danger">*</span>
                        <input type="text" name="mail_sendmail_path" id="mail_sendmail_path" class="form-control input-style-1 " value="{{ old('mail_sendmail_path', globalSettings('mail_sendmail_path')) }}" placeholder="Enter {{ __('label.mail_sendmail_path') }}" @disabled(!hasPermission('mail_settings_update')) />
                        @error('mail_sendmail_path') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label class="label-style-1" for="mail_driver">{{ __('label.mail_driver') }}</label> <span class="text-danger">*</span>
                        <input type="text" name="mail_driver" id="mail_driver" class="form-control input-style-1 " value="{{ old('mail_driver', globalSettings('mail_driver')) }}" placeholder="Enter {{ __('label.mail_driver') }}" @disabled(!hasPermission('mail_settings_update')) />
                        @error('mail_driver') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label class="label-style-1" for="mail_host">{{ __('label.mail_host') }}</label> <span class="text-danger">*</span>
                        <input type="text" name="mail_host" id="mail_host" class="form-control input-style-1 " value="{{ old('mail_host', globalSettings('mail_host')) }}" placeholder="Enter {{ __('label.mail_host') }}" @disabled(!hasPermission('mail_settings_update')) />
                        @error('mail_host') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label class="label-style-1" for="mail_port">{{ __('label.mail_port') }}</label> <span class="text-danger">*</span>
                        <input type="text" name="mail_port" id="mail_port" class="form-control input-style-1 " value="{{ old('mail_port', globalSettings('mail_port')) }}" placeholder="Enter {{ __('label.mail_port') }}" @disabled(!hasPermission('mail_settings_update')) />
                        @error('mail_port') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label class="label-style-1" for="mail_username">{{ __('label.mail_username') }}</label> <span class="text-danger">*</span>
                        <input type="text" name="mail_username" id="mail_username" class="form-control input-style-1 " value="{{ old('mail_username', globalSettings('mail_username')) }}" placeholder="Enter {{ __('label.mail_username') }}" @disabled(!hasPermission('mail_settings_update')) />
                        @error('mail_username') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label class="label-style-1" for="mail_password">{{ __('label.mail_password') }}</label> <span class="text-danger">*</span>
                        <input type="text" name="mail_password" id="mail_password" class="form-control input-style-1 " value="{{ old('mail_password', globalSettings('mail_password')) }}" placeholder="Enter {{ __('label.mail_password') }}" @disabled(!hasPermission('mail_settings_update')) />
                        @error('mail_password') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label class="label-style-1" for="mail_encryption">{{ __('label.mail_encryption') }}</label> <span class="text-danger">*</span>
                        <input type="text" name="mail_encryption" id="mail_encryption" class="form-control input-style-1 " value="{{ old('mail_encryption', globalSettings('mail_encryption')) }}" placeholder="Enter {{ __('label.mail_encryption') }}" @disabled(!hasPermission('mail_settings_update')) />
                        @error('mail_encryption') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label class="label-style-1" for="mail_from_address">{{ __('label.mail_from_address') }}</label> <span class="text-danger">*</span>
                        <input type="text" name="mail_from_address" id="mail_from_address" class="form-control input-style-1 " value="{{ old('mail_from_address', globalSettings('mail_from_address')) }}" placeholder="Enter {{ __('label.mail_from_address') }}" @disabled(!hasPermission('mail_settings_update')) />
                        @error('mail_from_address') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label class="label-style-1" for="mail_from_name">{{ __('label.mail_from_name') }}</label> <span class="text-danger">*</span>
                        <input type="text" name="mail_from_name" id="mail_from_name" class="form-control input-style-1 " value="{{ old('mail_from_name', globalSettings('mail_from_name')) }}" placeholder="Enter {{ __('label.mail_from_name') }}" @disabled(!hasPermission('mail_settings_update')) />
                        @error('mail_from_name') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-12 col-md-6">
                        <label class="label-style-1" for="mail_signature">{{ __('label.mail_signature') }}</label> <span class="text-danger">*</span>
                        <textarea name="mail_signature" id="mail_signature" class="form-control input-style-1 summernote" placeholder="Enter {{ __('label.mail_signature') }}" @disabled(!hasPermission('mail_settings_update'))>{{ old('mail_signature', globalSettings('mail_signature')) }}</textarea>
                        @error('mail_signature') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                    </div>

                </div>
                @if(hasPermission('mail_settings_update'))

                <div class="j-create-btns">
                    <div class="drp-btns">
                        <button type="submit" class="j-td-btn">{{ __('label.save_change') }}</button>
                    </div>
                </div>

                @endif
            </form>
        </div>
    </div>
</div>
@endsection()


@push('styles')
{{-- summernote --}}
<link rel="stylesheet" href="{{asset('backend')}}/vendor/summernote/summernote.css" />
@endpush

@push('scripts')

{{-- summernote --}}
<script src="{{asset('backend')}}/vendor/summernote/js/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });

</script>
@endpush
