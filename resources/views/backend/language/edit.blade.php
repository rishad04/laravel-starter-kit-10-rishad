@extends('backend.master')
@section('title')
{{ __('Language') }} {{ __('edit') }}
@endsection
@section('breadcrumb')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>{{ __('language') }}</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="{{ route('language.index') }}">{{ __('language') }}</a></li>
            <li class="breadcrumb-item "><a href="javascript:void(0)" class="active">{{ __('edit') }}</a></li>
        </ol>
    </div>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('language') }} {{ __('create') }}
                </h4>
                <a class="btn btn-primary text-white" href="{{ route('language.index') }}">
                    <i class="fa fa-arrow-left"></i> {{ __('back') }}
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('language.update',['id'=>$lang->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label>{{ __('language_name') }} <span class="text-danger">*</span></label>
                                <input type="text" placeholder="{{ __('enter_language_name') }}" class="form-control" name="name" value="{{ old('name',$lang->name) }}">
                                @error('name')
                                <p class="pt-2 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label>{{ __('short_code') }} <span class="text-danger">*</span></label>
                                <input type="text" placeholder="{{ __('enter_short_code') }}" class="form-control" name="code" value="{{ old('code',$lang->code) }}">
                                @error('code')
                                <p class="pt-2 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label>{{ __('flag_icon') }} <span class="text-danger">*</span></label>
                                <select name="icon_class" class="form-control">
                                    <option selected disabled>{{ __('select') }} {{ __('flag') }}</option>
                                    @foreach ($flags as $flag)
                                    <option value="{{ $flag->icon_class }}" data-icon="{{ $flag->icon_class }}" @if(old('icon_class',$lang->icon_class) == $flag->icon_class ) selected @endif>{{ $flag->title }}</option>
                                    @endforeach
                                </select>
                                @error('icon_class')
                                <p class="pt-2 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label>{{ __('script') }} </label>
                                <input type="text" placeholder="{{ __('enter_script') }}" class="form-control" name="script" value="{{ old('script',@$lang->langConfig->script) }}">

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label>{{ __('native') }} </label>
                                <input type="text" placeholder="{{ __('enter_native') }}" class="form-control" name="native" value="{{ old('native',@$lang->langConfig->native) }}">

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label>{{ __('regional') }} </label>
                                <input type="text" placeholder="{{ __('enter_regional') }}" class="form-control" name="regional" value="{{ old('regional',@$lang->langConfig->regional) }}">

                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group margintop35">
                                <label>{{ __('text_direction') }} <span class="text-danger">*</span></label>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="mr-2" name="text_direction" value="ltr" @if(old('text_direction',$lang->text_direction) == 'ltr') checked @endif>{{ __('ltr') }}
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="mr-2" name="text_direction" value="rtl" @if(old('text_direction',$lang->text_direction) == 'rtl') checked @endif>{{ __('rtl') }}
                                    </label>
                                </div>
                                @error('gender')
                                <p class="pt-2 text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group margintop35">
                                <div class="d-flex ">
                                    <label>{{ __('status') }} </label>
                                    <input type="checkbox" id="switch4" switch="success" name="status" {{ old('status',$lang->status) == null? '':'checked' }}>
                                    <label class="marginleft20" for="switch4" data-on-label="Active" data-off-label="Inactive"></label>
                                </div>
                            </div>
                        </div>



                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary save"><i class="fa fa-save"></i> {{ __('update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
