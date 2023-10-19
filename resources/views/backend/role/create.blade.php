@extends('backend.partials.master')
@section('title')
{{ __('role.title') }} {{ __('levels.add') }}
@endsection
@section('maincontent')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="breadcrumb-link">{{ __('levels.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{__('menus.user_role')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('role.index') }}" class="breadcrumb-link">{{ __('role.title') }}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ __('levels.create') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-input-header">
                        <h4 class="title-site"> {{ __('role.create_role') }}</h4>
                    </div>

                    <form action="{{route('role.store')}}" method="POST" enctype="multipart/form-data" id="basicform">
                        @csrf
                        <div class="form-row">
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class=" label-style-1" for="name">{{ __('levels.name') }}</label> <span class="text-danger">*</span>
                                    <input id="name" type="text" name="name" data-parsley-trigger="change" placeholder="{{ __('placeholder.Enter_name') }}" autocomplete="off" class="form-control input-style-1" value="{{old('name')}}" require>
                                    @error('name')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class=" label-style-1" for="status">{{ __('levels.status') }}</label>
                                    <select name="status" class="form-control input-style-1 select2">
                                        <option value="{{ \App\Enums\Status::ACTIVE }}" selected>{{ __('levels.active')}} </option>
                                        <option value="{{ \App\Enums\Status::INACTIVE }}">{{ __('levels.inactive')}} </option>
                                    </select>
                                    @error('status') <p class="pt-2 text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="">
                                    <table class="table border permission-table">
                                        <thead>
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
                                                        <input id="{{ $keyword }}" class="read common-key form-check-input" type="checkbox" value="{{ $keyword }}" name="permissions[]" />
                                                        <label class=" label-style-1" for="{{ $keyword }}">{{ __('permissions.'.$key) }}</label>
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
                                <button type="submit" class="j-td-btn">{{ __('levels.save') }}</button>
                                <a href="{{ route('role.index') }}" class="j-td-btn btn-red"> <span>{{ __('levels.cancel') }}</span> </a>
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
<script src="{{ asset('backend/js/roles/roles.js') }}"></script>
@endpush
