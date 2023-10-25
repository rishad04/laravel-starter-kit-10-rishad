@extends('backend.partials.master')
@section('title')
{{ ___('Database Backup') }}
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
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="breadcrumb-link">{{ ___('label.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link active">{{ ___('Database Backup') }}</a></li>
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
                    <h4 class="title-site">{{ ___('Database Backup') }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-10 mb-5">
                                <p>{{ ___('Backup Description') }}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('database.backup.download') }}" class="j-td-btn" data-toggle="tooltip" data-placement="top" title="download">{{ ___('Database Backup') }}</a>
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
