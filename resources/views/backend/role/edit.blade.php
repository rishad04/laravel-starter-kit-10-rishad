@extends('backend.partials.master')
@section('title')
{{ ___('role.title') }} {{ ___('levels.edit') }}
@endsection
@section('maincontent')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">{{ ___('levels.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{ ___('menus.user') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('role.index') }}" class="breadcrumb-link">{{ ___('role.title') }}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ ___('levels.edit') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-input-header">
                        <h4 class="title-site"> {{ ___('role.edit_role') }}</h4>
                    </div>
                    <form action="{{ route('role.update', ['id' => $role->id]) }}" method="POST" enctype="multipart/form-data" id="basicform">
                        @csrf
                        @if (isset($role))
                        @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-4">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class=" label-style-1" for="name">{{ ___('levels.name') }}</label>
                                        <span class="text-danger">*</span>
                                        <input id="name" type="text" name="name" data-parsley-trigger="change" placeholder="{{ ___('placeholder.enter_role_name') }}" autocomplete="off" class="form-control input-style-1" value="{{ old('name', $role->name) }}" require>
                                        @error('name') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group col-12">
                                        <label class=" label-style-1" for="status">{{ ___('levels.status') }}</label>
                                        <span class="text-danger">*</span>
                                        <select name="status" class="form-control input-style-1 select2">
                                            @foreach(config('site.status.default') as $key => $status)
                                            <option value="{{ $key }}" @selected(old('status', @$role->status)==$key)>{{ ___('status.'.$status) }}</option>
                                            @endforeach
                                        </select>
                                        @error('status') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="col-8">
                                <table class="table border  permission-table">
                                    <thead>
                                        <tr>
                                            <th>{{ ___('permissions.modules') }}</th>
                                            <th>{{ ___('permissions.permissions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ ___('permissions.' . $permission->attribute) }}</td>
                                            <td>
                                                @foreach ($permission->keywords as $key => $keyword)
                                                <div class="row align-items-center permission-check-box pb-2 pt-2">
                                                    <input id="{{ $keyword }}" class="read common-key form-check-input" type="checkbox" value="{{ $keyword }}" name="permissions[]" @if ($role->permissions !== null && in_array($keyword, $role->permissions)) checked @endif />
                                                    <label class=" label-style-2" for="{{ $keyword }}">{{ ___('permissions.' . $key) }}</label>
                                                </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>


                        <div class="j-create-btns">
                            <div class="drp-btns">
                                <button type="submit" class="j-td-btn">{{ ___('label.save_change') }}</button>
                                <a href="{{ route('role.index') }}" class="j-td-btn btn-red">
                                    <span>{{ ___('label.cancel') }}</span> </a>
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
