@extends('backend.partials.master')
@section('title')
{{ __('todo') }} {{ __('create') }}
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
                            <li class="breadcrumb-item"><a href="{{route('todo.index')}}" class="breadcrumb-link active">{{ __('label.to_do_list') }}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ __('label.create') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="form-input-header">
                        <h4 class="title-site">{{ __('label.create') }} {{ __('label.to_do') }} </h4>
                    </div>
                    <form action="{{ route('todo.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 ">
                                <label>{{ __('label.title') }} <span class="text-danger">*</span></label>
                                <input type="text" placeholder="{{ __('placeholder.enter_title') }}" class="form-control input-style-1" name="title" value="{{ old('title') }}">
                                @error('title')
                                <p class="pt-2 text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 ">
                                <label class=" label-style-1" for="name">{{ __('label.user') }}</label> <span class="text-danger">*</span>
                                <select name="user" class="form-control input-style-1 select2">
                                    <option></option>
                                    @foreach ($users as $user)
                                    <option value="{{$user->id}}" @if(old('user')==$user->id) selected @endif>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user')
                                <p class="pt-2 text-danger">{{ $message }}</p>
                                @enderror
                            </div>




                            <div class="form-group col-md-6 ">
                                <label>{{ __('label.date') }}<span class="text-danger">*</span></label>
                                <input type="date" class="form-control input-style-1 flatpickr" name="date" readonly value="{{ old('date',Date('d/m/Y')) }}">
                                @error('date')
                                <p class="pt-2 text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 ">
                                <label>{{ __('label.file') }} </label>
                                <input type="file" class="form-control input-style-1" name="todoFile" readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label class=" label-style-1" for="status">{{ __('label.status') }}</label>
                                <select name="status" id="status" class="form-control input-style-1 select2">
                                    @foreach(trans('TodoStatus') as $key => $status)
                                    <option value="{{ $key }}" @selected(old('status',\App\Enums\Status::ACTIVE)==$key)>{{ $status }}</option>
                                    @endforeach
                                </select>
                                @error('status') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>




                            <div class="form-group col-md-6 ">
                                <label>{{ __('label.description') }} </label>
                                <textarea name="description" class="form-control input-style-1" rows="3">{{ old('description') }}</textarea>

                            </div>



                        </div>
                        <div class="form-row">
                            <div class="j-create-btns">
                                <div class="drp-btns">
                                    <button type="submit" class="j-td-btn">{{ __('label.save_change') }}</button>
                                    <a href="{{ route('todo.index') }}" class="j-td-btn btn-red"> <span>{{ __('label.cancel') }}</span> </a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
