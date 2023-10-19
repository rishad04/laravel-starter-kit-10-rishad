@extends('backend.partials.master')
@section('title')
{{ __('user.title') }} {{ __('levels.add') }}
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
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}" class="breadcrumb-link">{{ __('user.title') }}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ __('levels.create') }}</a></li>
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
                        <h4 class="title-site"> {{ __('user.create_user') }}</h4>
                    </div>
                    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data" id="basicform">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label class=" label-style-1" for="name">{{ __('levels.name') }}</label> <span class="text-danger">*</span>
                                <input id="name" type="text" name="name" data-parsley-trigger="change" placeholder="{{ __('placeholder.Enter_name') }}" autocomplete="off" class="form-control input-style-1 ">
                                @error('name') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" label-style-1" for="phone">{{ __('levels.phone') }}</label> <span class="text-danger">*</span>
                                <input id="phone" type="number" name="phone" data-parsley-trigger="change" placeholder="{{ __('placeholder.Enter_mobile') }}" autocomplete="off" class="form-control input-style-1 " value="{{ old('phone') }}">
                                @error('phone') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" label-style-1" for="address">{{ __('levels.address') }}</label> <span class="text-danger">*</span>
                                <input id="address" type="text" name="address" data-parsley-trigger="change" placeholder="{{ __('placeholder.Enter_address') }}" autocomplete="off" class="form-control input-style-1 " value="{{ old('address') }}">
                                @error('address') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>
                            {{-- <div class="form-group col-md-6 col-md-6">
                                    <label class=" label-style-1" for="designation_id">{{ __('levels.designation') }}</label> <span class="text-danger">*</span>
                            <select class="form-control input-style-1  select2" id="designation_id" name="designation_id" data-placeholder="Select {{ __('levels.designation') }}" d>
                                <option></option>
                                @foreach($designations as $designation)
                                <option value="{{$designation->id}}" {{ (old('designation_id') == $designation->id) ? 'selected' : '' }}>{{$designation->title}}</option>
                                @endforeach
                            </select>
                            @error('designation_id') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                        </div> --}}
                        {{-- <div class="form-group col-md-6 col-md-6">
                                    <label class=" label-style-1">{{ __('levels.department') }}</label> <span class="text-danger">*</span>
                        <select class="form-control input-style-1  select2" name="department_id" data-placeholder="Select {{ __('levels.department') }}" d>
                            <option></option>
                            @foreach($departments as $department)
                            <option value="{{$department->id}}" {{ (old('department_id') == $department->id) ? 'selected' : '' }}>{{$department->title}}</option>
                            @endforeach
                        </select>
                        @error('department_id')
                        <small class="text-danger mt-2">{{ $message }}</small>
                        @enderror
                </div> --}}

                {{-- <div class="form-group col-md-6 col-md-6">
                                    <label class=" label-style-1">{{ __('levels.role') }}</label> <span class="text-danger">*</span>
                <select class="form-control input-style-1  select2" name="role_id" data-placeholder="Select {{ __('levels.role') }}" d>
                    <option></option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}" {{ (old('role_id') == $role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role_id') <small class="text-danger mt-2">{{ $message }}</small> @enderror
            </div> --}}

            {{-- <div class="form-group col-md-6 col-md-6">
                                    <label class=" label-style-1" for="status">{{ __('levels.status') }}</label>
            <select name="status" id="status" class="form-control input-style-1  select2">
                @foreach(trans('status') as $key => $status)
                <option value="{{ $key }}" @selected(old('status',\App\Enums\Status::ACTIVE)==$key)>{{ $status }}</option>
                @endforeach
            </select>
            @error('status') <small class="text-danger mt-2">{{ $message }}</small> @enderror
        </div> --}}



        <div class="form-group col-md-6">
            <label class=" label-style-1" for="email">{{ __('levels.email') }}</label> <span class="text-danger">*</span>
            <input id="email" type="email" name="email" data-parsley-trigger="change" placeholder="{{ __('placeholder.enter_email') }}" autocomplete="off" class="form-control input-style-1 " value="{{ old('email') }}">
            @error('email') <small class="text-danger mt-2">{{ $message }}</small> @enderror
        </div>

        <div class="form-group col-md-6">
            <label class=" label-style-1" for="password">{{ __('levels.password') }}</label> <span class="text-danger">*</span>
            <input id="password" type="password" name="password" data-parsley-trigger="change" placeholder="{{ __('placeholder.Enter_password') }}" autocomplete="off" class="form-control input-style-1 " value="{{ old('password') }}">
            @error('password') <small class="text-danger mt-2">{{ $message }}</small> @enderror
        </div>
        <div class="form-group col-md-6">
            <label class=" label-style-1">{{ __('levels.role') }}</label> <span class="text-danger">*</span>
            <select class="form-control input-style-1 select2" name="role_id">
                <option></option>
                @foreach($roles as $role)
                <option value="{{$role->id}}" {{ (old('role_id') == $role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
            @error('role_id') <small class="text-danger mt-2">{{ $message }}</small> @enderror
        </div>

        <div class="form-group col-md-6">
            <label class=" label-style-1" for="nid_number">{{ __('levels.nid') }}</label>
            <input id="nid_number" type="number" name="nid_number" data-parsley-trigger="change" placeholder="{{ __('placeholder.Enter_nid_number') }}" autocomplete="off" class="form-control input-style-1" value="{{ old('nid_number') }}">
            @error('nid_number') <small class="text-danger mt-2">{{ $message }}</small> @enderror
        </div>

        <div class="form-group col-md-6">
            <label class=" label-style-1" for="status">{{ __('levels.status') }}</label>
            <select name="status" id="status" class="form-control input-style-1 select2">
                @foreach(trans('status') as $key => $status)
                <option value="{{ $key }}" @selected(old('status',\App\Enums\Status::ACTIVE)==$key)>{{ $status }}</option>
                @endforeach
            </select>
            @error('status') <small class="text-danger mt-2">{{ $message }}</small> @enderror
        </div>

        {{-- <div class="form-group col-md-6 col-md-6">
                                    <label class=" label-style-1">{{ __('levels.hub') }}</label>
        <select class="form-control input-style-1  select2" name="hub_id" data-placeholder="Select {{ __('levels.hub') }}">
            <option></option>
            @foreach($hubs as $hub)
            <option value="{{$hub->id}}" {{ (old('hub_id') == $hub->id) ? 'selected' : '' }}>{{$hub->name}}</option>
            @endforeach
        </select>
        @error('hub_id') <small class="text-danger mt-2">{{ $message }}</small> @enderror
    </div> --}}
    {{-- <div class="form-group col-md-6">
                                    <label class=" label-style-1">{{ __('levels.salary') }}</label>
    <input type="number" step="any" class="form-control input-style-1 " value="{{ old('salary') }}" placeholder="{{ __('salary.title') }}" name="salary" />
    @error('salary') <small class="text-danger mt-2">{{ $message }}</small> @enderror
</div> --}}
<div class="form-group col-md-6">
    <label class=" label-style-1" for="image">{{ __('levels.image') }}</label>
    <input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="image" id="image" data-parsley-trigger="change" placeholder="Enter image" autocomplete="off" class="form-control input-style-1 " value="{{ old('image') }}">
    @error('image') <small class="text-danger mt-2">{{ $message }}</small> @enderror
</div>

</div>

<div class="j-create-btns">
    <div class="drp-btns">
        <button type="submit" class="j-td-btn">{{ __('levels.save') }}</button>
        <a href="{{ route('users.index') }}" class="j-td-btn btn-red"> <span>{{ __('levels.cancel') }}</span> </a>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection()
