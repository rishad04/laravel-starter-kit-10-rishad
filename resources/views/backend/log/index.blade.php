@extends('backend.partials.master')
@section('title')
{{ __('label.logs') }} {{ __('label.list') }}
@endsection
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
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ __('label.logs') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- end pageheader -->
    <div class="row">
        <!-- data table  -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header mb-3">
                        <h4 class="title-site">{{ __('label.logs') }}</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-responsive-sm">
                            <thead class="bg">
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('label.log_name') }}</th>
                                    <th>{{ __('label.event') }}</th>
                                    <th>{{ __('label.subject_type') }}</th>
                                    <th>{{ __('label.description') }}</th>
                                    <th>{{ __('label.view') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @forelse($logs as $log)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$log->log_name}}</td>
                                    <td>{{__('label.'.$log->event)}}</td>
                                    <td>{{$log->subject_type}}</td>
                                    <td>{{__('label.'.$log->description)}}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm modalBtn" data-toggle="modal" data-target="#dynamic-modal" data-modalsize="modal-lg" data-title="{{ __('label.log_details') }}" data-url="{{ route('log-activity-view',$log->id) }}"> <i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                @empty
                                 <x-nodate-fount : colspan = "5" />
                                 @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- pagination component -->
                    @if(count($logs))
                    <x-paginate-show :items="$logs" />
                    @endif
                    <!-- pagination component -->
                </div>
            </div>
        </div>
        <!-- end data table  -->
    </div>
</div>
<!-- end wrapper  -->
@endsection()
