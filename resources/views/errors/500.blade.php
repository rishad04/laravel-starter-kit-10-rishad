@extends('errors.layout')
@section('title',' Internal Server Error')
@section('content')

<div class="row justify-content-center h-100 align-items-center">
    <div class="col-md-5">
        <div class="form-input-content text-center">
            <div class="mb-5">
                <a class="btn btn-primary" href="{{ url('/') }}">Back to Home</a>
            </div>
            <h1 class="error-text font-weight-bold">500</h1>
            <h4 class="mt-4"><i class="fa fa-exclamation-triangle text-warning"></i> Internal Server Error</h4>
            <p>You do not have permission to view this resource.</p>
        </div>
    </div>
</div>

@endsection
