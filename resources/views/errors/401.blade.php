@extends('errors.layout')

@section('title','Unauthorized')

@section('content')

<div class="row justify-content-center h-100 align-items-center">
    <div class="col-md-5">
        <div class="form-input-content text-center">
            <div class="mb-5">
                <a class="btn btn-primary" href="{{ url('/') }}">Back to Home</a>
            </div>
            <h1 class="error-text font-weight-bold">401</h1>
            <h4 class="mt-4"><i class="fa fa-exclamation-triangle text-warning"></i> Unauthorized</h4>
            <p>Please refresh in the page and fill in the login correct information.</p>
        </div>
    </div>
</div>

@endsection
