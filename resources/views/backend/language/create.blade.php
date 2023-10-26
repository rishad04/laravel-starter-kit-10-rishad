@extends('backend.partials.master')
@section('title')
{{ ___('language.title') }} {{ ___('label.add') }}
@endsection
@section('maincontent')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="breadcrumb-link">{{ ___('label.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('language.index')}}" class="breadcrumb-link">{{___('language.title')}}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ ___('label.create') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-input-header">
                        <h4 class="title-site"> {{ ___('language.create_language') }}</h4>
                    </div>

                    <form action="{{route('language.store')}}" method="POST">
                        @csrf

                        <div class="form-row">

                            <div class="form-group col-md-6 ">
                                <label class="label-style-1" for="name">{{ ___('language.language_name') }} <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control input-style-1" value="{{ old('name') }}" placeholder="{{ ___('language.enter_language_name') }}">
                                @error('name') <small class="pt-2 text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-6 ">
                                <label class="label-style-1" for="code">{{ ___('language.language_code') }} <span class="text-danger">*</span></label>
                                <input type="text" name="code" id="code" class="form-control input-style-1" value="{{ old('code') }}" placeholder="{{ ___('language.enter_language_code') }}">
                                @error('code') <small class="pt-2 text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-6 ">
                                <label class="label-style-1" for="icon_class">{{ ___('language.flag_icon') }} <span class="text-danger">*</span></label>
                                <select name="icon_class" id="icon_class" class="form-control input-style-1 select2">
                                    <option></option>
                                    @foreach ($flags as $flag)
                                    <option value="{{ $flag->icon_class }}" @selected(old('icon_class')==$flag->icon_class) data-icon="{{ $flag->icon_class }}"> {{ $flag->title }}</option>
                                    @endforeach
                                </select>
                                @error('icon_class') <small class="pt-2 text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12 col-md-6 form-group">
                                <label class="label-style-1" for="text_direction">{{ ___('language.text_direction') }}</label>
                                <select class="form-control input-style-1  select2" id="text_direction" name="text_direction">
                                    <option value="ltr" @selected(old('text_direction','ltr')=='ltr' )>{{ ___('language.ltr') }}</option>
                                    <option value="rtl" @selected(old('text_direction')=='rtl' )>{{ ___('language.rtl') }}</option>
                                </select>
                                @error('text_direction') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12 col-md-6 form-group">
                                <label class="label-style-1" for="status">{{ ___('label.status') }}</label>
                                <select class="form-control input-style-1 select2" id="status" name="status">
                                    @foreach(config('site.status.default') as $key => $status)
                                    <option value="{{ $key }}" @selected(old('status', 1)==$key)>{{ ___('status.'.$status) }}</option>
                                    @endforeach
                                </select>
                                @error('status') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="j-create-btns">
                            <div class="drp-btns">
                                <button type="submit" class="j-td-btn">{{ ___('label.save') }}</button>
                                <a href="{{ route('language.index') }}" class="j-td-btn btn-red"> <span>{{ ___('label.cancel') }}</span> </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
