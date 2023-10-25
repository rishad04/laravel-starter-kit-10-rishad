@extends('backend.partials.master')
@section('title')
{{ ___('user.title') }} {{ ___('label.add') }}
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
                            <li class="breadcrumb-item"><a href="{{ route('user.index') }}" class="breadcrumb-link">{{ ___('user.title') }}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ ___('label.create') }}</a></li>
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
                        <h4 class="title-site"> {{ ___('user.create_user') }}</h4>
                    </div>

                    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label class=" label-style-1" for="name">{{ ___('label.name') }}</label> <span class="text-danger">*</span>
                                <input id="name" type="text" name="name" placeholder="{{ ___('placeholder.enter_name') }}" class="form-control input-style-1" value="{{ old('name') }}">
                                @error('name') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" label-style-1" for="email">{{ ___('label.email') }}</label> <span class="text-danger">*</span>
                                <input id="email" type="email" name="email" placeholder="{{ ___('placeholder.enter_email') }}" class="form-control input-style-1 " value="{{ old('email') }}">
                                @error('email') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class=" label-style-1" for="phone">{{ ___('label.phone') }}</label> <span class="text-danger">*</span>
                                <input id="phone" type="tel" name="phone" placeholder="{{ ___('placeholder.enter_mobile') }}" class="form-control input-style-1 " value="{{ old('phone') }}">
                                @error('phone') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="label-style-1">{{ ___('label.designations') }} </label>
                                <input type="text" placeholder="{{ ___('placeholder.enter_designation') }} " class="form-control input-style-1" name="designations" value="{{ old('designations') }}">
                                @error('designations') <p class="pt-2 text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="label-style-1">{{ ___('label.dob') }} <span class="text-danger">*</span></label>
                                <input type="date" id="dob" name="dob" class="form-control input-style-1 flatpickr" value="{{ old('dob') }}" placeholder="{{ ___('placeholder.enter_dob') }}">
                                @error('dob') <p class="pt-2 text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class=" label-style-1">{{ ___('label.role') }}</label> <span class="text-danger">*</span>
                                <select class="form-control input-style-1 select2" name="role_id" placeholder="{{ ___('placeholder.enter_role') }}">
                                    <option></option>
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}" {{ (old('role_id') == $role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="label-style-1">{{ ___('label.gender') }} <span class="text-danger">*</span></label>
                                <select name="gender" id="gender" class="form-control input-style-1 select2">
                                    <option></option>
                                    @foreach(trans('gender') as $key => $gender)
                                    <option value="{{ $key }}" @selected(old('gender')==$key)>{{ $gender }}</option>
                                    @endforeach
                                </select>
                                @error('gender') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class=" label-style-1" for="password">{{ ___('label.password') }}</label> <span class="text-danger">*</span>
                                <input id="password" type="password" name="password" placeholder="{{ ___('placeholder.enter_password') }}" class="form-control input-style-1 " value="{{ old('password') }}">
                                @error('password') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class=" label-style-1" for="nid_number">{{ ___('label.nid_number') }}</label>
                                <input id="nid_number" type="number" name="nid_number" placeholder="{{ ___('placeholder.enter_nid_number') }}" class="form-control input-style-1" value="{{ old('nid_number') }}">
                                @error('nid_number') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" label-style-1" for="nid">{{ ___('label.nid') }}</label>
                                <input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="nid" id="nid" class="form-control input-style-1 ">
                                @error('nid') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class=" label-style-1" for="status">{{ ___('label.status') }}</label>
                                <select name="status" id="status" class="form-control input-style-1 select2">
                                    @foreach(trans('status') as $key => $status)
                                    <option value="{{ $key }}" @selected(old('status',\App\Enums\Status::ACTIVE)==$key)>{{ $status }}</option>
                                    @endforeach
                                </select>
                                @error('status') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class=" label-style-1" for="image">{{ ___('label.image') }}</label>
                                <input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="image" id="image" placeholder="Enter image" class="form-control input-style-1 ">
                                @error('image') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class=" label-style-1" for="address">{{ ___('label.address') }}</label> <span class="text-danger">*</span>
                                <textarea name="address" class="form-control input-style-1" rows="3" placeholder="{{ ___('placeholder.enter_address') }}">{{ old('address') }}</textarea>
                                @error('address') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label class="label-style-1">{{ ___('label.about') }} </label>
                                <textarea name="about" class="form-control input-style-1" rows="3" placeholder="{{ ___('placeholder.about_me') }}">{{ old('about') }}</textarea>
                                @error('about') <span class="pt-2 text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>

                        <div class="j-create-btns">
                            <div class="drp-btns">
                                <button type="submit" class="j-td-btn">{{ ___('label.save') }}</button>
                                <a href="{{ route('user.index') }}" class="j-td-btn btn-red"> <span>{{ ___('label.cancel') }}</span> </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
