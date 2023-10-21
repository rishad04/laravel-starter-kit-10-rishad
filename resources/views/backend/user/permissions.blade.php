@extends('backend.partials.master')
@section('title')
{{ __('user.title') }} {{ __('permissions.permissions') }}
@endsection
@section('maincontent')

<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="breadcrumb-link">{{ __('levels.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{__('menus.user_role')}}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link">{{ __('user.title') }}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ __('permissions.permissions') }}</a></li>
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
                    <h4 class="title-site">{{ __('user.title') }}</h4>
                </div>

                <div class="card-body">
                    <form action="{{route('users.permissions.update',['id'=>$user->id])}}" method="POST" enctype="multipart/form-data" id="basicform">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="">
                                    <table class="table table-responsive-sm border  permission-table" style="width:100%">
                                        <thead class="bg">
                                            <tr>
                                                <th>{{ __('permissions.modules') }}</th>
                                                <th>{{ __('permissions.permissions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($permissions as $permission )
                                            <tr>
                                                <td>{{__('permissions.'.$permission->attribute) }}</td>
                                                <td>
                                                    @foreach ($permission->keywords as $key=>$keyword)
                                                    <div class="row align-items-center permission-check-box pb-2 pt-2">
                                                        <input id="{{ $keyword }}" class="read common-key form-check-input pb-4" type="checkbox" value="{{ $keyword }}" name="permissions[]" @if(in_array($keyword,$user->permissions)) checked @endif />
                                                        <label for="{{ $keyword }}">{{ __('permissions.'.$key) }}</label>
                                                    </div>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            @endforeach


                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="j-create-btns">
                            <div class="drp-btns">
                                <button type="submit" class="j-td-btn">{{ __('levels.save_change') }}</button>
                                <a href="{{ route('user.index') }}" class="j-td-btn btn-red"> <span>{{ __('levels.cancel') }}</span> </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()

@push('scripts')
<script src="{{ static_asset('backend/js/roles/roles.js') }}"></script>
@endpush
