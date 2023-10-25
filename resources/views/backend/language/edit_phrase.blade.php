@extends('backend.master')
@section('title')
{{ __('edit') }} {{ __('phrase') }}
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
            <li class="breadcrumb-item "><a href="javascript:void(0)" class="active">{{ __('edit') }} {{ __('phrase') }}</a></li>
        </ol>
    </div>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('edit') }} {{ __('phrase') }}
                </h4>
                <a class="btn btn-primary text-white" href="{{ route('language.index') }}">
                    <i class="fa fa-arrow-left"></i> {{ __('back') }}
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('language.update.phrase',[$lang->code]) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="table-responsive table--responsive">
                        <table class="table table-responsive-sm">
                            <thead>
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

                                @foreach ($langData as $key=>$value)
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
                        <button type="submit" class="btn btn-primary save"><i class="fa fa-save"></i> {{ __('update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
