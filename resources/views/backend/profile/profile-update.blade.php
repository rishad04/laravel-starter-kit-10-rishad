@extends('backend.profile.master')
@section('title')
{{ ___('menus.profile') }}
@endsection
@section('content')
<div id="update_profile">
    <div class="settings-form j-text-body">
        {{-- <h4 class="text-primary">Account Setting</h4> --}}
        <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label class=" label-style-1" for="name">{{ ___('label.name') }}</label> <span class="text-danger">*</span>
                    <input id="name" type="text" name="name" placeholder="{{ ___('placeholder.enter_name') }}" class="form-control input-style-1" value="{{ old('name',$user->name) }}">
                    @error('name') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                </div>

                <div class="form-group col-md-6">
                    <label class="label-style-1">{{ ___('label.dob') }} <span class="text-danger">*</span></label>
                    <input type="date" id="dob" name="dob" class="form-control input-style-1 flatpickr" value="{{ old('dob',$user->dob) }}" placeholder="{{ ___('placeholder.enter_dob') }}">
                    @error('dob') <span class="pt-2 text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group col-md-6">
                    <label class="label-style-1">{{ ___('label.gender') }} <span class="text-danger">*</span></label>
                    <select name="gender" id="gender" class="form-control input-style-1 select2">
                        @foreach(trans('gender') as $key => $gender)
                        <option value="{{ $key }}" @selected(old('gender',$user->gender) == $key)>{{ $gender }}</option>
                        @endforeach
                    </select>
                    @error('gender') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                </div>

                <div class="form-group col-md-6">
                    <label class=" label-style-1" for="image">{{ ___('label.image') }}</label>
                    <input type="file" accept="image/jpeg,image/png,image/jpg,image/webp" name="image" id="image" class="form-control input-style-1 ">
                    @error('image') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                </div>

                <div class="form-group col-md-6">
                    <label class=" label-style-1" for="address">{{ ___('label.address') }}</label> <span class="text-danger">*</span>
                    <textarea name="address" class="form-control input-style-1" rows="3" placeholder="{{ ___('placeholder.enter_address') }}">{{ old('address',$user->address) }}</textarea>
                    @error('address') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                </div>

                <div class="form-group col-md-6">
                    <label class="label-style-1">{{ ___('label.about') }} </label>
                    <textarea name="about" class="form-control input-style-1" rows="3" placeholder="{{ ___('placeholder.about_me') }}">{{ old('about',$user->about) }}</textarea>
                    @error('about') <span class="pt-2 text-danger">{{ $message }}</span> @enderror
                </div>

            </div>

            <div class="j-create-btns">
                <div class="drp-btns">
                    <button type="submit" class="j-td-btn">{{ ___('label.save') }}</button>
                    <a href="{{ route('profile') }}" class="j-td-btn btn-red"> <span>{{ ___('label.cancel') }}</span> </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection()



