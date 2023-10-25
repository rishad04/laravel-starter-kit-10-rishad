@extends('backend.partials.master')
@section('title',__('language.title') )

@section('maincontent')

<!-- wrapper  -->
<div class="container-fluid  dashboard-content">
    <!-- pageheader -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="breadcrumb-link">{{ __('label.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{__('language.title')}}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ __('label.list') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="card">
                <div class="card-header mb-3">
                    <h4 class="title-site">{{ __('language.language_list') }}
                    </h4>
                    @if (hasPermission('language_create'))
                    <a href="{{ route('language.create') }}" class="j-td-btn">
                        <img src="{{asset('backend')}}/assets/img/icon/plus-white.png" class="jj" alt="no image">
                        <span>{{ __('label.add') }}</span>
                    </a>
                    @endif
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-sm ">
                            <thead class="bg">
                                <tr>
                                    <th>{{ __('label.id') }}</th>
                                    <th scope="col">{{ __('icon') }}</th>
                                    <th scope="col">{{ __('language.language_name') }}</th>
                                    <th scope="col">{{ __('code') }}</th>
                                    <th scope="col">{{ __('label.status') }}</th>
                                    @if (
                                    hasPermission('language_update') ||
                                    hasPermission('language_phrase') ||
                                    hasPermission('language_delete'))
                                    <th scope="col">{{ __('label.actions') }}</th>
                                    @endif

                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @forelse($languages as $language)


                                <tr id="row_{{ $language->id }}">
                                    <td>{{ ++$i; }}</td>
                                    <td><i class="{{ @$language->icon_class }}"></i></td>
                                    <td>{{ @$language->name }}</td>
                                    <td>{{ @$language->code }}</td>
                                    <td>{!! @$language->my_status !!}</td>
                                    @if (
                                    hasPermission('language_update') ||
                                    hasPermission('language_phrase') ||
                                    hasPermission('language_delete'))
                                    <td>

                                        <div class="d-flex" data-toggle="dropdown">
                                            <a class="p-2" href="javascript:void()">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </a>
                                        </div>

                                        <div class="dropdown-menu">

                                            @if( hasPermission('language_update') == true )
                                            @if($language->code !== 'en' && $language->code !== 'bn' && $language->code !== 'ar')
                                            <a href="{{ route('language.edit',$language->id) }}" class="dropdown-item"><i class="fa fa-edit" aria-hidden="true"></i> {{ __('label.edit') }}</a>
                                            @endif
                                            @endif

                                            @if( hasPermission('language_phrase') == true )
                                            <a href="{{ route('language.edit.phrase',$language->id) }}" class="dropdown-item"> <i class="fa fa-language color-muted"></i> {{ __('label.edit') }}</a>
                                            @endif

                                            @if( hasPermission('language_delete') == true )
                                            @if($language->code !== 'en' && $language->code !== 'bn' && $language->code !== 'ar')
                                            <a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('admin/language/delete', {{$language->id}})">
                                                <i class="fa fa-trash" aria-hidden="true"></i> {{ __('label.delete') }}
                                            </a>
                                            @endif
                                            @endif
                                        </div>
                                    </td>
                                    @endif

                                </tr>

                                @empty
                                <x-nodata-found :colspan="6" />
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>

                @if(count($languages))
                <x-paginate-show :items="$languages" />
                @endif


            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<script src="{{ static_asset('backend') }}/js/user/user.js"></script>
@endpush
