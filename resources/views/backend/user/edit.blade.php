@extends('backend.partials.master')
@section('title')
{{ __('user.title') }} {{ __('label.edit') }}
@endsection
@section('maincontent')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="breadcrumb-link">{{ __('label.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{__('menus.user_role')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user.index') }}" class="breadcrumb-link">{{ __('user.title') }}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ __('label.edit') }}</a></li>
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
                        <h4 class="title-site"> {{ __('user.edit_user') }}</h4>
                    </div>
                    <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data" id="basicform">
                        @csrf
                        @if (isset($user))
                        @method('PUT')
                        @endif
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="form-row">
                
                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="name">{{ __('label.name') }}</label> <span class="text-danger">*</span>
                                    <input id="name" type="text" name="name" data-parsley-trigger="change" placeholder="{{ __('placeholder.enter_name') }}" autocomplete="off" class="form-control input-style-1" value="{{ old('name',$user->name) }}" require>
                                    @error('name')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror

                          
                                </div>
                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="phone">{{ __('label.phone') }}</label> <span class="text-danger">*</span>
                                    <input id="phone" type="tel" name="phone" data-parsley-trigger="change" placeholder="{{ __('placeholder.Enter_phone') }}" autocomplete="off" class="form-control input-style-1" value="{{ old('phone',$user->phone) }}" require>
                                    @error('phone')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="email">{{ __('label.email') }}</label> <span class="text-danger">*</span>
                                    <input id="email" type="text" name="email" data-parsley-trigger="change" placeholder="{{ __('placeholder.Enter_email') }}" autocomplete="off" class="form-control input-style-1"  value="{{ old('email',$user->email) }}" require>
                                    @error('email')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="password">{{ __('label.password') }}</label>
                                    <input id="password" type="password" name="password" data-parsley-trigger="change" placeholder="{{ __('placeholder.Enter_password') }}" autocomplete="off" class="form-control input-style-1" value="{{ old('password') }}">
                                    @error('password')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                           
                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="address">{{ __('label.address') }}</label> <span class="text-danger">*</span>
                                    <input id="address" type="text" name="address" data-parsley-trigger="change" placeholder="{{ __('placeholder.Enter_address') }}" autocomplete="off" class="form-control input-style-1" value="{{ old('address',$user->address) }}" require>
                                    @error('address')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="input-select">{{ __('label.role') }}</label> <span class="text-danger">*</span>
                                    <select class="form-control input-style-1 select2" id="input-select" name="role_id" required>
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{ (old('role_id',$user->role_id) == $role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="nid_number">{{ __('label.nid_number') }}</label>
                                    <input id="nid_number" type="number" name="nid_number" placeholder="{{ __('placeholder.Enter_nid_number') }}" autocomplete="off" class="form-control input-style-1" value="{{ old('nid_number',$user->nid_number) }}">
                                    @error('nid_number') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="nid">{{ __('label.nid') }}</label>
                                    <input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="nid" id="nid" class="form-control input-style-1 ">
                                    @error('nid') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="status">{{ __('label.status') }}</label> <span class="text-danger">*</span>
                                    <select name="status" class="form-control input-style-1">
                                        @foreach(trans('status') as $key => $status)
                                        <option value="{{ $key }}" {{ (old('status',$user->status) == $key) ? 'selected' : '' }}>{{ $status }}</option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="image">{{ __('label.image') }}</label>
                                    <input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="image" id="image" placeholder="Enter image" class="form-control input-style-1 ">
                                    @error('image') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                </div>
                           
                     
                           
                     
                        </div>
                        <div class="form-row">
                            <div class="j-create-btns ml-1">
                                <div class="drp-btns">
                                    <button type="submit" class="j-td-btn">{{ __('label.save_change') }}</button>
                                    <a href="{{ route('user.index') }}" class="j-td-btn btn-red"> <span>{{ __('label.cancel') }}</span> </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
