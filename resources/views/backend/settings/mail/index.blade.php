@extends('backend.partials.master')

@section('title')
{{ ___('menus.mail_setting') }}
@endsection

@section('maincontent')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="breadcrumb-link">{{ ___('menus.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link active">{{ ___('menus.settings') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('settings.mail')}}" class="breadcrumb-link active">{{ ___('menus.mail_setting') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <div class="form-input-header">
                <h4 class="title-site"> {{ ___('menus.mail_setting') }} </h4>
            </div>

            <form action="{{route('settings.update')}}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="form-group col-12 col-md-6">
                        <label class="label-style-1" for="mail_driver">{{ ___('label.mail_driver') }}</label> <span class="text-danger">*</span>
                        <select name="mail_driver" class="form-control select2" id="mail_driver" @if(!hasPermission('mail_settings_update')) disabled @endif>
                            <option value="sendmail" {{ old('mail_driver',globalSettings('mail_driver')) == 'sendmail'? 'selected':'' }}>{{ __('sendmail') }}</option>
                            <option value="smtp" {{ old('mail_driver',globalSettings('mail_driver')) == 'smtp'? 'selected':'' }}>{{ __('smtp') }}</option>
                        </select>
                        @error('mail_driver') <p class="pt-2 text-danger">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group col-12 col-md-6 sendmail">
                        <label class="label-style-1" for="sendmail_path">{{ ___('label.path') }}</label> <span class="text-danger">*</span>
                        <input type="text" name="sendmail_path" id="sendmail_path" class="form-control input-style-1 " value="{{ old('sendmail_path', globalSettings('sendmail_path')) }}" placeholder="{{ ___('placeholder.enter_sendmail_path') }}" @disabled(!hasPermission('mail_settings_update')) />
                        @error('sendmail_path') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-12 col-md-6 smtp">
                        <label class="label-style-1" for="mail_host">{{ ___('label.mail_host') }}</label> <span class="text-danger">*</span>
                        <input type="text" name="mail_host" id="mail_host" class="form-control input-style-1 " value="{{ old('mail_host', globalSettings('mail_host')) }}" placeholder="{{ ___('placeholder.enter_mail_host') }}" @disabled(!hasPermission('mail_settings_update')) />
                        @error('mail_host') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-12 col-md-6 smtp">
                        <label class="label-style-1" for="mail_port">{{ ___('label.mail_port') }}</label> <span class="text-danger">*</span>
                        <input type="text" name="mail_port" id="mail_port" class="form-control input-style-1 " value="{{ old('mail_port', globalSettings('mail_port')) }}" placeholder="{{ ___('placeholder.enter_mail_port') }}" @disabled(!hasPermission('mail_settings_update')) />
                        @error('mail_port') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-12 col-md-6 smtp">
                        <label class="label-style-1" for="mail_address">{{ ___('label.mail_address') }}</label> <span class="text-danger">*</span>
                        <input type="email" name="mail_address" id="mail_address" class="form-control input-style-1 " value="{{ old('mail_address', globalSettings('mail_address')) }}" placeholder="{{ ___('placeholder.enter_mail_address') }}" @disabled(!hasPermission('mail_settings_update')) />
                        @error('mail_address') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-12 col-md-6 smtp">
                        <label class="label-style-1" for="mail_name">{{ __('label.mail_name') }}</label>
                        <input type="text" name="mail_name" id="mail_name" placeholder="{{ __('placeholder.enter_mail_name') }}" class="form-control input-style-1 " value="{{ old('mail_name',globalSettings('mail_name')) }}" @if(!hasPermission('mail_settings_update')) disabled @endif>
                        @error('mail_name') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-12 col-md-6 smtp">
                        <label class="label-style-1" for="mail_username">{{ ___('label.mail_username') }}</label> <span class="text-danger">*</span>
                        <input type="text" name="mail_username" id="mail_username" class="form-control input-style-1 " value="{{ old('mail_username', globalSettings('mail_username')) }}" placeholder="{{ ___('placeholder.enter_mail_username') }}" @disabled(!hasPermission('mail_settings_update')) />
                        @error('mail_username') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-12 col-md-6 smtp">
                        <label class="label-style-1" for="mail_password">{{ ___('label.mail_password') }}</label> <span class="text-danger">*</span>
                        <input type="password" name="mail_password" id="mail_password" class="form-control input-style-1 " value="{{ old('mail_password', globalSettings('mail_password')) }}" placeholder="{{ ___('placeholder.enter_mail_password') }}" @disabled(!hasPermission('mail_settings_update')) />
                        @error('mail_password') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-12 col-md-6 smtp">
                        <label class="label-style-1" for="mail_encryption">{{ ___('label.mail_encryption') }}</label> <span class="text-danger">*</span>
                        <select name="mail_encryption" class="form-control  select2" id="mail_encryption" @if(!hasPermission('mail_settings_update')) disabled @endif>
                            <option value="">Null</option>
                            <option @if(globalSettings('mail_encryption')=='tls' ) selected @endif value="tls">Tls </option>
                            <option @if(globalSettings('mail_encryption')=='ssl' ) selected @endif value="ssl">Ssl </option>
                        </select>
                        @error('mail_encryption') <small class="text-danger mt-2">{{ $message }}</small> @enderror

                    </div>

                    <div class="form-group col-12 col-md-6 smtp">
                        <label class="label-style-1" for="mail_signature">{{ ___('label.mail_signature') }}</label> <span class="text-danger">*</span>
                        <textarea name="mail_signature" id="mail_signature" class="form-control input-style-1 summernote" placeholder="{{ ___('placeholder.enter_mail_signature') }}" @disabled(!hasPermission('mail_settings_update'))>{{ old('mail_signature', globalSettings('mail_signature')) }}</textarea>
                        @error('mail_signature') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-12 col-md-6 smtp">
                        <label>{{ __('signature') }} </label>
                        <textarea name="signature" class="form-control" rows="10">{{ old('signature',globalSettings('signature')) }}</textarea>
                    </div>

                </div>
                @if(hasPermission('mail_settings_update'))

                <div class="j-create-btns">
                    <div class="drp-btns">
                        <button type="submit" class="j-td-btn">{{ ___('label.save_change') }}</button>
                    </div>
                </div>

                @endif
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if(hasPermission('mail_settings_read'))
            <form action="{{ route('settings.mail.settings.testsendmail') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group ">
                            <label>{{ __('email') }} <span class="text-danger">*</span></label>
                            <input type="email" placeholder="{{ __('enter_email_address') }}" class="form-control" name="email" value="{{ old('email') }}">
                            @error('email')
                            <p class="pt-2 text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-2 text-right margintop30">
                        <button type="submit" class="btn btn-primary save">{{ __('test') }}</button>
                    </div>
                </div>
            </form>
            @endif
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
        $('.summernote').summernote({
            placeholder: "{{ ___('placeholder.enter_mail_signature')}}"
        });
    });

</script>


<script src="{{static_asset('backend')}}/js/settings/mail-settings.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        @if(globalSettings('mail_driver') == 'smtp')
        $('.smtp').show();
        $('.sendmail').hide();
        @elseif(globalSettings('mail_driver') == 'sendmail')
        $('.sendmail').show();
        $('.smtp').hide();
        @endif
    })

</script>

@endpush
