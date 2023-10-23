@extends('backend.partials.master')
@section('title')
{{ __('menus.profile') }}
@endsection

@section('maincontent')
<div class="container-fluid  dashboard-content">

    <div class="j-profile-main">
        <div class="row">
            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body">

                        <div class="form-input-header">
                            <h4 class="title-site"> {{ __('Update Profile') }}</h4>
                        </div>

                        <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="name">{{ __('label.name') }}</label> <span class="text-danger">*</span>
                                    <input id="name" type="text" name="name" placeholder="{{ __('placeholder.enter_name') }}" class="form-control input-style-1" value="{{ old('name',$user->name) }}">
                                    @error('name') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="label-style-1">{{ __('label.dob') }} <span class="text-danger">*</span></label>
                                    <input type="date" id="dob" name="dob" class="form-control input-style-1 flatpickr" value="{{ old('dob',$user->dob) }}" placeholder="{{ __('placeholder.enter_dob') }}">
                                    @error('dob') <span class="pt-2 text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="label-style-1">{{ __('label.gender') }} <span class="text-danger">*</span></label>
                                    <select name="gender" id="gender" class="form-control input-style-1 select2">
                                        @foreach(trans('gender') as $key => $gender)
                                        <option value="{{ $key }}" @selected(old('gender',$user->gender) == $key)>{{ $gender }}</option>
                                        @endforeach
                                    </select>
                                    @error('gender') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="image">{{ __('label.image') }}</label>
                                    <input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="image" id="image" class="form-control input-style-1 ">
                                    @error('image') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label class=" label-style-1" for="address">{{ __('label.address') }}</label> <span class="text-danger">*</span>
                                    <textarea name="address" class="form-control input-style-1" rows="3" placeholder="{{ __('placeholder.enter_address') }}">{{ old('address',$user->address) }}</textarea>
                                    @error('address') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="label-style-1">{{ __('label.about') }} </label>
                                    <textarea name="about" class="form-control input-style-1" rows="3" placeholder="{{ __('placeholder.about_me') }}">{{ old('about',$user->about) }}</textarea>
                                    @error('about') <span class="pt-2 text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>

                            <div class="j-create-btns">
                                <div class="drp-btns">
                                    <button type="submit" class="j-td-btn">{{ __('label.save') }}</button>
                                    <a href="{{ route('profile') }}" class="j-td-btn btn-red"> <span>{{ __('label.cancel') }}</span> </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end wrapper  -->
@endsection()
