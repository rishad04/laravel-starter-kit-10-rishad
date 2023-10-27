@extends('backend.partials.master')
@section('title')
{{ ___('menus.todo') }} {{ ___('label.add') }}
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
                            <li class="breadcrumb-item"><a href="{{route('todo.index')}}" class="breadcrumb-link active">{{ ___('label.to_do_list') }}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ ___('label.add') }}</a></li>
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
                        <h4 class="title-site">{{ ___('label.add') }} {{ ___('menus.todo') }} </h4>
                    </div>
                    <form action="{{ route('todo.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 ">
                                <label>{{ ___('label.title') }} <span class="text-danger">*</span></label>
                                <input type="text" placeholder="{{ ___('placeholder.enter_title') }}" class="form-control input-style-1" name="title" value="{{ old('title') }}">
                                @error('title')
                                <p class="pt-2 text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 ">
                                <label class=" label-style-1" for="name">{{ ___('label.user') }}</label> <span class="text-danger">*</span>
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
                                <label>{{ ___('label.date') }}<span class="text-danger">*</span></label>
                                <input type="date" class="form-control input-style-1 flatpickr" name="date" placeholder="{{ ___('placeholder.select_date') }}" value="{{ old('date') }}">
                                @error('date') <p class="pt-2 text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="label-style-1">{{ ___('label.image') }}<span class="fillable"></span></label>
                                <div class="ot_fileUploader left-side mb-3">
                                    <input class="form-control input-style-1" type="text" placeholder="{{ ___('label.image') }}" readonly="" id="placeholder">
                                    <button class="primary-btn-small-input" type="button">
                                        <label class="j-td-btn" for="todoFile">Browse</label>
                                        <input type="file" class="d-none form-control" name="todoFile" id="todoFile" accept="image/jpg, image/jpeg, image/png" style="display: none;">
                                    </button>
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <label class=" label-style-1" for="status">{{ ___('label.status') }}</label>
                                <select name="status" id="status" class="form-control input-style-1 select2">
                                    @foreach(config('site.status.Todo') as $key => $status)
                                    <option value="{{ $key }}" @selected(old('status',\App\Enums\StatusEnum::ACTIVE->value)==$key)>{{ ___('status.' .  $status) }}</option>
                                    @endforeach
                                </select>
                                @error('status') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                            </div>




                            <div class="form-group col-md-6 ">
                                <label>{{ ___('label.description') }} </label>
                                <textarea name="description" class="form-control input-style-1" rows="3" placeholder="{{ ___('placeholder.enter_description') }}">{{ old('description') }}</textarea>

                            </div>



                        </div>
                        <div class="form-row">
                            <div class="j-create-btns">
                                <div class="drp-btns">
                                    <button type="submit" class="j-td-btn">{{ ___('label.save_change') }}</button>
                                    <a href="{{ route('todo.index') }}" class="j-td-btn btn-red"> <span>{{ ___('label.cancel') }}</span> </a>
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
