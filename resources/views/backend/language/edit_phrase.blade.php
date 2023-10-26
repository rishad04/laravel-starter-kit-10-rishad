@extends('backend.partials.master')
@section('title')
{{ ___('language.title') }} {{ ___('language.edit_phrase') }}
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
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ ___('language.edit_phrase') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-3">
                    <h4 class="title-site">{{ ___('language.edit_phrase') }} </h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('language.update.phrase',[$lang->code]) }}" method="post">
                        @csrf

                        <input type="hidden" name="code" id="code" value="{{ @$lang->code }}">

                        <div class="row">

                        <div class="col-md-12 mb-3">
                            <label for="validationServer04" class="form-label">{{ ___('language.module') }}</label>
                            <select class="form-control input-style-1 select2 @error('lang_module') is-invalid @enderror change-module"
                                name="lang_module" id="validationServer04" aria-describedby="validationServer04Feedback">
                                <option value="alert" selected>{{ ___('language.alert') }}</option>
                                <option value="label">{{ ___('language.label') }}</option>
                                <option value="language">{{ ___('language.language') }}</option>
                                <option value="menus">{{ ___('language.menus') }}</option>
                            </select>
                            @error('lang_module')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        </div>

                        <div class="table-responsive table--responsive">
                            <table class="table table-responsive-sm" id="language-terms">
                                <thead class="bg">
                                    <tr class="border-bottom">
                                        <th>#</th>
                                        <th>{{ __('phrase') }}</th>
                                        <th>{{ __('translated_language') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                    $i=0;
                                    @endphp


                                    @foreach ($langData as $key => $value)
                                    <tr>
                                        <td data-title="#">{{ ++$i }}</td>
                                        <td data-title="phrase">{{ $key }}</td>
                                        <td data-title="translated_language">
                                            <input type="text" class="form-control form--control" name="{{ $key }}" value="{{ $value }}" />
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 text-right">
                            <button type="submit" class="j-td-btn"><i class="fa fa-save"></i> {{ __('update') }}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
