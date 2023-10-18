@extends('backend.partials.master')
@section('title')
{{ __('user.title') }} {{ __('levels.list') }}
@endsection
@section('maincontent')
<!-- wrapper  -->
<div class="container-fluid  dashboard-content">
    <!-- pageheader -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="breadcrumb-link">{{ __('levels.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{__('menus.user_role')}}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link">{{ __('user.title') }}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ __('levels.list') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="GET">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-12 col-xl-3 col-md-4 col-sm-6">
                                <label class=" label-style-1" for="name">{{ __('levels.name') }}</label>
                                <input type="text" id="name" name="name" placeholder="{{ __('levels.user') }} {{ __('levels.name') }}" class="form-control input-style-1" value="{{old('name', $request->name)}}">
                                @error('name')
                                <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-12 col-xl-3 col-md-4 col-sm-6">
                                <label class=" label-style-1" for="email">{{ __('levels.email') }}</label>
                                <input type="text" id="email" name="email" placeholder="{{ __('levels.user') }} {{ __('levels.email') }}" class="form-control input-style-1" value="{{old('email', $request->email)}}">
                                @error('email')
                                <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-12 col-xl-3 col-md-4 col-sm-6">
                                <label class=" label-style-1" for="phone">{{ __('levels.phone')}}</label> <span class="text-danger"></span>
                                <input type="text" id="phone" name="phone" placeholder="{{ __('levels.phone') }}" class="form-control input-style-1" value="{{old('phone', $request->phone)}}">
                                @error('phone')
                                <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-12 col-xl-3 col-md-4 col-sm-6 pt-1">
                                <div class="d-flex mt-4 pt-2 gap-2">
                                    <button type="submit" class="j-td-btn mr-2"><i class="fa fa-filter "></i> {{ __('levels.filter') }}</button>
                                    <a href="{{ route('users.index') }}" class="j-td-btn btn-red mr-2"><i class="fa fa-eraser"></i> {{ __('levels.clear') }}</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">

                <div class="card-header mb-5">
                    <h4 class="title-site">{{ __('user.title') }}
                    </h4>
                    @if (hasPermission('user_create'))
                        <a href="{{ route('users.create') }}" class="j-td-btn">
                            <img src="{{static_asset('backend')}}/assets/img/icon/plus-white.png" class="jj" alt="no image">
                            <span>{{ __('website_setup.add') }}</span>
                        </a>
                    @endif
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-sm ">
                            <thead class="bg">
                                <tr>
                                    <th>{{ __('levels.id') }}</th>
                                    <th>{{ __('levels.details') }}</th>
                                    {{-- <th>{{ __('levels.hub') }}</th> --}}
                                    <th>{{ __('levels.role') }}</th>
                                    <th>{{ __('permissions.permissions') }}</th>
                                    {{-- <th>{{ __('levels.salary') }}</th> --}}
                                    <th>{{ __('levels.status') }}</th>
                                    @if(
                                    hasPermission('permission_update') == true ||
                                    hasPermission('user_update') == true ||
                                    hasPermission('user_delete') == true
                                    )
                                    <th>{{ __('levels.actions') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @forelse($users as $user)
                                <tr id="row_{{ $user->id }}">
                                    <td>{{$i++}}</td>
                                    <td>
                                        <div class="row">
                                            {{-- <div class="pr-3">
                                                <img src="{{$user->image}}" alt="user" class="rounded" width="40" height="40">
                                            </div> --}}
                                            <div>
                                                <strong>{{$user->name}}</strong>
                                                <p>{{$user->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- <td>{{@$user->hub->name}}</td> --}}
                                    <td>{{@$user->role_id}}</td>
                                    <td>
                                        @if(!empty($user->permissions) )
                                        <label class=" label-style-1" class="badge badge-primary">{{ count($user->permissions) }}</label>
                                        @endif
                                        @if(empty($user->permissions) )
                                        <label class=" label-style-1" class="badge badge-primary">{{ count($user->permissions) }}</label>
                                        @endif
                                    </td>
                                    {{-- <td>{{@$user->salary}}</td> --}}
                                    <td>{!! $user->MyStatus !!}</td>
                                    @if(
                                    hasPermission('permission_update') == true ||
                                    hasPermission('user_update') == true ||
                                    hasPermission('user_delete') == true
                                    )
                                    <td>
                                        <div class="d-flex" data-toggle="dropdown">
                                            <a class="p-2" href="javascript:void()">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </a>
                                        </div>
                                        <div class="dropdown-menu">
                                            @if( hasPermission('permission_update') == true )
                                            <a href="{{route('users.permission',$user->id)}}" class="dropdown-item"><i class="fa fa-edit" aria-hidden="true"></i> {{ __('permissions.permissions') }}</a>
                                            @endif
                                            @if( hasPermission('user_update') == true )
                                            <a href="{{route('users.edit',$user->id)}}" class="dropdown-item"><i class="fa fa-edit" aria-hidden="true"></i> {{ __('levels.edit') }}</a>
                                            @endif
                                            @if( hasPermission('user_delete') == true )
                                            @if($user->id != 1 && $user->id != @auth()->user->id)
                                            <a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('admin/user/delete', {{$user->id}})">
                                                <i class="fa fa-trash" aria-hidden="true"></i> {{ __('levels.delete') }}
                                            </a>
                                            @endif
                                            @endif
                                        </div>
                                    </td>
                                    @endif
                                </tr>

                                @empty
                                {{-- <x-nodata-found :colspan="8" /> --}}
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
                <!-- pagination component -->
                {{-- @if(count($users))
                <x-paginate-show :items="$users" />
                @endif --}}
                <!-- end pagination component -->
            </div>
        </div>
    </div>
</div>

@endsection()

{{-- @push('scripts')
@include('backend.partials.delete-ajax')
@endpush --}}
