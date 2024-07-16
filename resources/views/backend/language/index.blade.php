@extends('backend.partials.master')
@section('title',___('language.title') )

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
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="breadcrumb-link">{{ ___('label.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('language.index')}}" class="breadcrumb-link">{{___('language.title')}}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ ___('label.list') }}</a></li>
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
                    <h4 class="title-site">{{ ___('language.language_list') }}
                    </h4>
                    @if (hasPermission('language_create'))
                    <a href="{{ route('language.create') }}" class="j-td-btn">
                        <img src="{{ asset('backend') }}/icons/icon//plus-white.png" class="jj" alt="no image">
                        <span>{{ ___('label.add') }}</span>
                    </a>
                    @endif
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-sm ">
                            <thead class="bg">
                                <tr>
                                    <th>{{ ___('label.id') }}</th>
                                    <th scope="col">{{ ___('label.icon') }}</th>
                                    <th scope="col">{{ ___('language.language_name') }}</th>
                                    <th scope="col">{{ ___('label.code') }}</th>
                                    <th scope="col">{{ ___('label.status') }}</th>

                                    @if ( hasPermission('language_update') || hasPermission('language_phrase_update') || hasPermission('language_delete'))
                                    <th scope="col">{{ ___('label.action') }}</th>
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

                                    @if ( hasPermission('language_update') || hasPermission('language_phrase_update') || hasPermission('language_delete'))
                                    <td>
                                        <a class="p-2" href="javascript:void()" data-toggle="dropdown"> <i class="fa fa-ellipsis-v"></i> </a>

                                        <div class="dropdown-menu">
                                            @if( hasPermission('language_update') && ($language->code !== 'en'))
                                            <a href="{{ route('language.edit',$language->id) }}" class="dropdown-item"><i class="fa fa-edit color-muted" aria-hidden="true"></i> {{ ___('label.edit') }}</a>
                                            @endif

                                            @if( hasPermission('language_phrase_update'))
                                            <a href="{{ route('language.edit.phrase',$language->id) }}" class="dropdown-item"> <i class="fa fa-language color-muted"></i> {{ ___('label.edit_phrase') }}</a>
                                            @endif

                                            @if( hasPermission('language_delete') && ($language->code !== 'en'))
                                            <a class="dropdown-item" href="{{ route('language.delete', $language->id) }}" onclick="tryDelete(event)" data-remove-id="row_{{ $language->id }}" data-title="{{___('label.delete')}}" data-text="{{___('alert.this_action_cannot_be_reversed')}}" data-confirm-button-text="{{___('label.delete')}}" data-cancel-button-text="{{___('label.cancel')}}"> <i class="fa fa-trash"></i> {{ ___('label.delete') }} </a>
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


@pushOnce('scripts')

<script src="{{ asset('backend/js/custom/delete_ajax.js') }}"></script>

@endPushOnce
