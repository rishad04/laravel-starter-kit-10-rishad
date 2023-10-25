@extends('backend.partials.master')
@section('title')
{{ ___('role.title') }} {{ ___('label.add') }}
@endsection
@section('maincontent')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="breadcrumb-link">{{ ___('label.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{__('menus.user_role')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('role.index') }}" class="breadcrumb-link">{{ ___('role.title') }}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ ___('label.create') }}</a></li>
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
                        <h4 class="title-site"> {{ ___('role.create_role') }}</h4>
                    </div>

                    <form action="{{route('role.store')}}" method="POST" enctype="multipart/form-data" id="basicform">
                        @csrf
                        <div class="form-row">
                            <div class="col-xl-4 col-12">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class=" label-style-1" for="name">{{ ___('label.name') }}</label> <span class="text-danger">*</span>
                                        <input id="name" type="text" name="name" data-parsley-trigger="change" placeholder="{{ ___('placeholder.Enter_name') }}" autocomplete="off" class="form-control input-style-1" value="{{old('name')}}" require>
                                        @error('name')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-12 form-group">
                                        <label class="label-style-1" for="status">{{ ___('label.status') }}</label>
                                        <select class="form-control input-style-1 select2" id="status" name="status">
                                            <option value="1" @selected(old('status',1)==1 )>{{ ___('label.active') }}</option>
                                            <option value="0" @selected(old('status','')==0 )>{{ ___('label.inactive') }}</option>
                                        </select>
                                        @error('status') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="">
                                    <table class="table border permission-table">
                                        <thead>
                                            <tr>
                                                <th>{{ ___('label.modules') }}</th>
                                                <th>{{ ___('label.permissions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($permissions as $permission )
                                            <tr>
                                                <td>{{__('label.'.$permission->attribute) }}</td>
                                                <td>
                                                    @foreach ($permission->keywords as $key=>$keyword)
                                                    <div class="row align-items-center permission-check-box pb-2 pt-2">
                                                        <input id="{{ $keyword }}" class="read common-key form-check-input" type="checkbox" value="{{ $keyword }}" name="permissions[]" />
                                                        <label class="label-style-2" for="{{ $keyword }}">{{ ___('label.'.$key) }}</label>
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
                                <button type="submit" class="j-td-btn">{{ ___('label.save') }}</button>
                                <a href="{{ route('role.index') }}" class="j-td-btn btn-red"> <span>{{ ___('label.cancel') }}</span> </a>
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
