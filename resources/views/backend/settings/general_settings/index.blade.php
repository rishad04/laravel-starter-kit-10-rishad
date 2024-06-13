@extends('backend.partials.master')
@section('title')
{{ ___('menus.general_settings') }}
@endsection

@section('maincontent')
<div class="container-fluid  dashboard-content">
    <!-- pageheader -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{ ___('menus.settings') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('settings.general.index')}}" class="breadcrumb-link active">{{___('menus.general_settings')}}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- end pageheader -->
    <div class="row">
        <!-- basic form -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-input-header">
                        <h4 class="title-site"> {{ ___('menus.general_settings') }}</h4>
                    </div>

                    <form action="{{route('settings.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label class="label-style-1" for="name">{{ ___('label.name') }}</label>
                                <input id="name" type="text" name="name" placeholder="{{ ___('placeholder.enter_name') }}" class="form-control input-style-1" value="{{ old('name',settings('name')) }}">
                                @error('name') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="label-style-1" for="phone">{{ ___('label.phone') }}</label>
                                <input id="phone" type="text" name="phone" placeholder="{{ ___('placeholder.enter_phone') }}" class="form-control input-style-1" value="{{  old('phone',settings('phone'))   }}">
                                @error('phone') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="label-style-1" for="email">{{ ___('label.email') }}</label>
                                <input id="email" type="text" name="email" placeholder="{{ ___('placeholder.enter_email') }}" class="form-control input-style-1" value="{{ old('email', settings('email')) }}">
                                @error('email') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label class="label-style-1" for="paginate_value">{{ ___('label.paginate_value') }}</label>
                                <input id="paginate_value" type="number" name="paginate_value" placeholder="{{ ___('placeholder.paginate_value') }}" class="form-control input-style-1" value="{{ old('paginate_value', settings('paginate_value')) }}">
                                @error('paginate_value') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label class=" label-style-1" for="date_format">{{ ___('label.date_format') }}</label>
                                <select id="date_format" class="form-control input-style-1 select2" name="date_format">
                                    @foreach(config('site.date_format') as $format)
                                    <option value="{{ $format }}" @selected(old('date_format')==$format)>{{ today()->format($format) }}</option>
                                    @endforeach
                                </select>
                                @error('date_format') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label class=" label-style-1" for="time_format">{{ ___('label.time_format') }}</label>
                                <select id="time_format" class="form-control input-style-1 select2" name="time_format">
                                    @foreach( config('site.time_format') as $format)
                                    <option value="{{ $format }}" @selected(old('time_format')==$format)>{{ now()->format($format) }}</option>
                                    @endforeach
                                </select>
                                @error('time_format') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label class="label-style-1" for="currency_code">{{ ___('label.currency') }}</label>
                                <select class="form-control input-style-1 select2" id="currency_code" name="currency_code" required>
                                    <option></option>
                                    @foreach ($currencies ?? [] as $currency)
                                    <option value="{{$currency->code }}" @selected(old('currency_code',settings('currency_code') )==$currency->code )>{{$currency->name . ' - ' . $currency->symbol }}</option>
                                    @endforeach
                                </select>
                                @error('currency_code') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label class="label-style-1" for="copyright">{{ ___('label.copyright') }}</label>
                                <input id="copyright" type="text" name="copyright" placeholder="{{ ___('placeholder.enter_copyright') }}" class="form-control input-style-1" value="{{ old('copyright', settings('copyright')) }}">
                                @error('copyright') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label class="label-style-1" class=" label-style-1" for="language">{{ ___('label.default language') }}</label>
                                <select name="language" id="language" class="form-control select2">
                                    <option></option>
                                    @foreach($languages as $row)
                                    <option value="{{ $row->code }}" @selected(old('language',@settings('language'))==$row->code)>{{$row->name }}</option>
                                    @endforeach

                                </select>
                                @error('language') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>


                            <div class="form-group col-md-4">
                                <label class="label-style-1">{{ ___('label.light_logo') }}<span class="fillable"></span></label>

                                <div class="ot_fileUploader left-side mb-3">
                                    <input class="form-control input-style-1 placeholder" type="text" placeholder="Attach File" readonly>
                                    <button class="primary-btn-small-input" type="button">
                                        <label class="j-td-btn" for="light_logo">{{ ___('label.browse') }}</label>
                                        <input type="file" class="d-none form-control" name="light_logo" id="light_logo" accept="image/jpeg, image/jpg, image/png, image/webp">
                                    </button>
                                </div>

                                <div class="col-6 text-center p-1">
                                    <img src="{{ logo(settings('light_logo')) }}" alt="logo" height="50" style="object-fit: contain">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="label-style-1">{{ ___('label.dark_logo') }} <span class="fillable"></span></label>

                                <div class="ot_fileUploader left-side mb-3">
                                    <input class="form-control input-style-1 placeholder" type="text" placeholder="Attach File" readonly>
                                    <button class="primary-btn-small-input" type="button">
                                        <label class="j-td-btn" for="dark_logo">{{ ___('label.browse') }}</label>
                                        <input type="file" class="d-none form-control" name="dark_logo" id="dark_logo" accept="image/jpeg, image/jpg, image/png, image/webp">
                                    </button>
                                </div>

                                <div class="text-center bg-dark p-1">
                                    <img src="{{ logo(settings('dark_logo')) }}" alt="Logo" height="50" style="object-fit: contain">
                                </div>
                            </div>


                            <div class="form-group col-md-4">
                                <label class="label-style-1">{{ ___('label.favicon') }}<span class="fillable"></span></label>
                                <div class="ot_fileUploader left-side mb-3">
                                    <input class="form-control input-style-1 placeholder" type="text" placeholder="Image" readonly>
                                    <button class="primary-btn-small-input" type="button">
                                        <label class="j-td-btn" for="fileBrouse2">{{ ___('label.Browse') }}</label>
                                        <input type="file" class="d-none form-control" name="favicon" id="fileBrouse2" accept="image/jpg, image/jpeg, image/png">
                                    </button>
                                </div>
                                <div class="text-center ">
                                    <img src="{{ favicon(settings('favicon')) }}" alt="favicon" class="rounded mt-3" width="50">
                                </div>
                            </div>

                        </div>

                        <div class="j-create-btns">
                            <div class="drp-btns">
                                <button type="submit" class="j-td-btn">{{ ___('label.save_change') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- end basic form -->
    </div>
</div>
<!-- end wrapper  -->
@endsection()
