@extends('backend.master')
@section('title')
{{ __('todo') }} {{ __('create') }}
@endsection
@section('breadcrumb')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ __('todo') }}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ route('todo.index') }}">{{ __('todo') }} </a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)" class="active">{{ __('create') }}</a></li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('todo') }} {{ __('create') }}
                </h4>
                <a class="btn btn-primary text-white" href="{{ route('todo.index') }}">
                    <i class="fa fa-arrow-left"></i> {{ __('back') }}
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('todo.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label  >{{ __('title') }} <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="{{ __('enter_title') }}"
                                        class="form-control" name="title" value="{{ old('title') }}" >
                                    @error('title')
                                        <p class="pt-2 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label  >{{ __('user') }} <span class="text-danger">*</span></label>
                                    <select name="user" class="form-control">
                                        <option selected disabled>{{ __('select')}} {{ __('user') }} </option>
                                        @foreach ($users as $user)
                                            <option value="{{$user->id}}" @if(old('user') == $user->id) selected @endif>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user')
                                        <p class="pt-2 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label  >{{ __('date') }}<span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control dateofbirth" name="date" readonly value="{{ old('date',Date('d/m/Y')) }}" >
                                    @error('date')
                                        <p class="pt-2 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <label  >{{ __('file') }} </label>
                                    <input type="file"
                                        class="form-control" name="todoFile" readonly  >
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-group ">
                                    <label  >{{ __('description') }} </label>
                                    <textarea name="description" class="form-control" rows="10">{{ old('description') }}</textarea>

                                </div>
                            </div>


                         <div class="col-12 text-right">
                              <button type="submit" class="btn btn-primary save"><i class="fa fa-save"></i> {{ __('save') }}</button>
                         </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
