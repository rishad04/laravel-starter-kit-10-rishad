@extends('backend.partials.master')

@section('title', ___('menus.add') . ' | ' . ___('menus.stay_tuned') )

@section('maincontent')
<div class="container-fluid  dashboard-content">

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link  ">{{ ___('menus.stay_tuned') }}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ ___('menus.add') }}</a></li>
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
                        <h4 class="title-site">{{ ___('menus.add') }} {{ ___('menus.stay_tuned') }} </h4>
                    </div>

                    <form action="{{ route('stayTuned.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ ___('label.description') }} <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control input-style-1" rows="10" placeholder="{{ ___('placeholder.enter_description') }}">{{ old('description') }}</textarea>
                                    @error('description') <p class="pt-2 text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="form-group mb-2">
                                    <label class="label-style-1" for="icon">{{ ___('label.icon') }}<span class="fillable"></span></label>
                                    <div class="ot_fileUploader left-side">
                                        <input class="form-control input-style-1 placeholder" type="text" placeholder="{{ ___('label.icon') }}" readonly>
                                        <button class="primary-btn-small-input" type="button">
                                            <label class="j-td-btn" for="icon">{{ ___('label.Browse') }}</label>
                                            <input type="file" class="d-none form-control" name="icon" id="icon" accept="image/*">
                                        </button>
                                    </div>
                                    @error('icon') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label>{{ ___('label.order') }} </label>
                                    <input type="number" placeholder="{{ ___('placeholder.enter_order') }}" class="form-control input-style-1" name="order" value="{{ old('order') }}">
                                    @error('order') <p class="pt-2 text-danger">{{ $message }}</p> @enderror
                                </div>

                                <div class="form-group w-100">
                                    <label for="status">{{ ___('label.status') }}</label>
                                    <select name="status" id="status" class="form-control input-style-1 select2">
                                        @foreach ( App\Enums\Status::cases() as $case)
                                        <option value="{{$case->value }}" @selected(old('case', App\Enums\Status::ACTIVE->value)==$case->value)>{{ $case->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('status') <small class="text-danger mt-2">{{ $message }}</small> @enderror
                                </div>
                            </div>

                        </div>

                        <div class="drp-btns">
                            <button type="submit" class="j-td-btn">{{ ___('label.save') }}</button>
                            <a href="{{ route('stayTuned.index') }}" class="j-td-btn btn-red"> <span>{{ ___('label.cancel') }}</span> </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection



@pushOnce('scripts')

<script src="{{ asset('backend/js/custom/submit_form.js') }}"></script>

@endPushOnce
