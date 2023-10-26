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
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="breadcrumb-link">{{ ___('menus.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link active">{{ ___('menus.settings') }}</a></li>
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

                    <form action="{{route('settings.update')}}" method="POST" enctype="multipart/form-data" id="basicform">
                        @csrf
                        @method('PUT')

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label class="label-style-1" for="name">{{ ___('label.brand_name') }}</label>
                                <input id="name" type="text" name="name" placeholder="{{ ___('placeholder.enter_brand_name') }}" class="form-control input-style-1" value="{{ old('brand_name',globalSettings('brand_name')) }}" require>
                                @error('brand_name') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="label-style-1" for="phone">{{ ___('label.phone') }}</label>
                                <input id="phone" type="text" name="phone" placeholder="{{ ___('placeholder.enter_phone') }}" class="form-control input-style-1" value="{{  old('brand_phone',globalSettings('brand_phone'))   }}" require>
                                @error('brand_phone') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="label-style-1" for="email">{{ ___('label.email') }}</label>
                                <input id="email" type="text" name="email" placeholder="{{ ___('placeholder.enter_email') }}" class="form-control input-style-1" value="{{ old('brand_info_email', globalSettings('brand_info_email')) }}" require>
                                @error('brand_info_email') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="label-style-1" for="copyright">{{ ___('label.copyright') }}</label>
                                <input id="copyright" type="text" name="copyright" placeholder="{{ ___('placeholder.enter_copyright') }}" class="form-control input-style-1" value="{{ old('copyright', globalSettings('copyright')) }}" require>
                                @error('copyright') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="label-style-1" class=" label-style-1" for="language">{{ ___('label.default language') }}</label>
                                <select name="language" id="language" class="form-control input-style-1 input-style-1 select2">

                                    @foreach($languages as $row)
                                    <option value="{{ $row->code }}" @selected(old('language',@globalSettings('language'))==$row->code)>{{$row->name }}</option>
                                    @endforeach

                                </select>
                                @error('language') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-6 ">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="label-style-1" for="logo">{{ ___('label.logo') }}</label>
                                        <input type="file" name="logo" id="logo" class="form-control input-style-1 " value="{{ old('logo') }}">
                                        @error('logo') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="col-6 text-right">
                                        <img src="{{ logo(globalSettings('logo')) }}" alt="logo" class="rounded mt-3" height="50" style="object-fit: contain">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6 ">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="label-style-1" for="favicon">{{ ___('label.favicon') }}</label>
                                        <input id="favicon" type="file" name="favicon" class="form-control input-style-1 " value="{{ old('favicon') }}">
                                        @error('favicon') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="col-6 text-right ">
                                        <img src="{{ favicon(globalSettings('favicon')) }}" alt="fabicon" class="rounded mt-3" width="50" style="object-fit: contain">
                                    </div>
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


@push('scripts')

<script>
    $(document).ready(function() {
        $('#currency').select2({
            placeholder: 'Select Currency Symbol'
        , });
    });

</script>

@endpush
