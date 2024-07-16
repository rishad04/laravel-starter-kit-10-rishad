@extends('backend.partials.master')

@section('title', ___('label.faq_list') )

@section('maincontent')
<div class="container-fluid  dashboard-content">

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{ ___('label.faq') }}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ ___('label.index') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="j-parcel-main j-parcel-res">
                <div class="card">
                    <div class="card-header mb-3">
                        <h4 class="title-site">{{ ___('label.faq_list') }} </h4>

                        @if (hasPermission('faq_create'))
                        <a href="{{ route('faq.create') }}" class="j-td-btn"> <img src="{{ asset('backend') }}/icons/icon//plus-white.png" class="jj" alt="no image"> <span>{{ ___('menus.add') }}</span> </a>
                        @endif

                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-sm">
                                <thead class="bg">
                                    <tr>
                                        <th>{{ ___('label.id') }}</th>
                                        <th>{{ ___('label.question') }}</th>
                                        <th>{{ ___('label.answer') }}</th>
                                        <th>{{ ___('label.order') }}</th>
                                        <th>{{ ___('label.type') }}</th>
                                        <th>{{ ___('label.status') }}</th>

                                        @if(hasPermission('faq_update') || hasPermission('faq_delete') )
                                        <th class="text-center">{{ ___('label.action') }}</th>
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($faqs as $key => $faq)
                                    <tr id="row_{{ $faq->id }}">

                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{$faq->question}}</td>
                                        <td> {{Str::limit($faq->answer,100,' ...')}}</td>
                                        <td> {{$faq->order}}</td>
                                        <td>{!! $faq->type_badge !!}</td>
                                        <td>{!! $faq->my_status !!}</td>

                                        @if(hasPermission('faq_update') || hasPermission('faq_delete') )
                                        <td class="text-center">
                                            <a class="p-2" href="javascript:void()" data-toggle="dropdown"> <i class="fa fa-ellipsis-v"></i> </a>

                                            <div class="dropdown-menu">

                                                @if(hasPermission('faq_update') )
                                                <a href="{{route('faq.edit',$faq->id)}}" class="dropdown-item"><i class="fa fa-edit" aria-hidden="true"></i> {{ ___('label.edit') }}</a>
                                                @endif

                                                @if( hasPermission('faq_delete') )
                                                <a class="dropdown-item" href="{{ route('faq.delete', $faq->id) }}" onclick="tryDelete(event)" data-remove-id="row_{{ $faq->id }}" data-title="{{___('label.delete')}}" data-text="{{___('alert.this_action_cannot_be_reversed')}}" data-confirm-button-text="{{___('label.delete')}}" data-cancel-button-text="{{___('label.cancel')}}"> <i class="fa fa-trash"></i> {{ ___('label.delete') }} </a>
                                                @endif

                                            </div>
                                        </td>
                                        @endif

                                    </tr>

                                    @empty
                                    <x-nodata-found :colspan="7" />
                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                        @if(count($faqs))
                        <x-paginate-show :items="$faqs" />
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection()


@pushOnce('scripts')

<script src="{{ asset('backend/js/custom/delete_ajax.js') }}"></script>

@endPushOnce
