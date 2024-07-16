@extends('errors.layout')

@section('title','Page not found!')

@section('content')

<div class="row  justify-content-center h-100 align-items-center">
    <div class="col-md-5">
        <div class="form-input-content text-center">
            <div class="mb-5">
                <a class="btn btn-primary" href="{{ url('/') }}">Back to Home</a>
            </div>
            <h1 class="error-text font-weight-bold">400</h1>
            <h4 class="mt-4"><i class="fa fa-thumbs-down text-danger"></i> Bad Request</h4>
            <p>Your Request resulted in an error</p>
        </div>
    </div>
</div>

@endsection
