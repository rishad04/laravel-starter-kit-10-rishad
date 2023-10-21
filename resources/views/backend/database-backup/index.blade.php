@extends('backend.partials.master')
@section('title')
    {{ __('backup.title') }}
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
                            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="breadcrumb-link">{{ __('levels.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{ __('backup.title') }}</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link active">{{ __('backup.backup') }}</a></li>
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
                        <h4 class="title-site">{{ __('backup.title') }} {{ __('backup.backup') }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-10 mb-5">
                                <p>{{ __('backup.backup_description') }}</p>
                            </div>
                        </div>
                            <div class="col-md-2">
                                <a href="{{ route('database.backup.download') }}" class="btn btn-rounded btn-outline-success" data-toggle="tooltip" data-placement="top" title="download">{{ __('backup.database_backup') }}</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end data table  -->
    </div>
</div>
<!-- end wrapper  -->
@endsection()

