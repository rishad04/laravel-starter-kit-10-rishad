@extends('backend.partials.master')
@section('title')
{{ ___('user.title') }} {{ ___('label.list') }}
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
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="breadcrumb-link">{{ ___('label.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{___('menus.user_role')}}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link">{{ ___('user.title') }}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ ___('label.list') }}</a></li>
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
                            <div class="form-group col-md-4">
                                <label class=" label-style-1" for="name">{{ ___('label.name') }}</label>
                                <input type="text" id="name" name="name" placeholder="{{ ___('label.user') }} {{ ___('label.name') }}" class="form-control input-style-1" value="{{old('name')}}">
                                @error('name')
                                <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class=" label-style-1" for="email">{{ ___('label.email') }}</label>
                                <input type="text" id="email" name="email" placeholder="{{ ___('label.user') }} {{ ___('label.email') }}" class="form-control input-style-1" value="{{old('email')}}">
                                @error('email')
                                <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class=" label-style-1" for="phone">{{ ___('label.phone')}}</label> <span class="text-danger"></span>
                                <input type="text" id="phone" name="phone" placeholder="{{ ___('label.phone') }}" class="form-control input-style-1" value="{{old('phone')}}">
                                @error('phone')
                                <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md6">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="j-td-btn mr-2"><i class="fa fa-filter "></i> {{ ___('label.filter') }}</button>
                                    <a href="{{ route('user.index') }}" class="j-td-btn btn-red mr-2"><i class="fa fa-eraser"></i> {{ ___('label.clear') }}</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header mb-3">
                    <h4 class="title-site">{{ ___('user.title') }}
                    </h4>
                    @if (hasPermission('user_create'))
                    <a href="{{ route('user.create') }}" class="j-td-btn">
                        <img src="{{ asset('backend') }}/icons/icon//plus-white.png" class="jj" alt="no image">
                        <span>{{ ___('label.add') }}</span>
                    </a>
                    @endif
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-sm ">
                            <thead class="bg">
                                <tr>
                                    <th>{{ ___('label.id') }}</th>
                                    <th>{{ ___('label.details') }}</th>
                                    <th>{{ ___('label.role') }}</th>
                                    <th>{{ ___('permissions.permissions') }}</th>
                                    <th>{{ ___('label.status') }}</th>
                                    @if(
                                    hasPermission('permission_update') == true ||
                                    hasPermission('user_update') == true ||
                                    hasPermission('user_delete') == true
                                    )
                                    <th>{{ ___('label.actions') }}</th>
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
                                            <div class="pr-3">
                                                <img src="{{ getImage($user->image,'original') }}" alt="user" class="rounded" width="40" height="40">
                                            </div>
                                            <div>
                                                <strong>{{$user->name}}</strong>
                                                <p>{{$user->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{@$user->role->name}}</td>
                                    <td>
                                        @if(!empty($user->permissions) )
                                        <label class="label-style-1" class="badge badge-primary">{{ count($user->permissions) }}</label>
                                        @endif
                                        @if(empty($user->permissions) )
                                        <label class="label-style-1" class="badge badge-primary">{{ count($user->permissions) }}</label>
                                        @endif
                                    </td>
                                    <td>{!! @$user->MyStatus !!}</td>
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
                                            <a href="{{route('user.permission',$user->id)}}" class="dropdown-item"><i class="fa fa-edit" aria-hidden="true"></i> {{ ___('permissions.permissions') }}</a>
                                            @endif
                                            @if( hasPermission('user_update') == true )
                                            <a href="{{route('user.edit',$user->id)}}" class="dropdown-item"><i class="fa fa-edit" aria-hidden="true"></i> {{ ___('label.edit') }}</a>
                                            @endif
                                            @if( hasPermission('user_delete') == true )
                                            @if($user->id != 1 && $user->id != @auth()->user->id)
                                            <a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('user/delete', {{$user->id}})">
                                                <i class="fa fa-trash" aria-hidden="true"></i> {{ ___('label.delete') }}
                                            </a>
                                            @endif
                                            @endif
                                        </div>
                                    </td>
                                    @endif
                                </tr>

                                @empty
                                <x-nodata-found :colspan="6" />
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                    @if(count($users))
                    <x-paginate-show :items="$users" />
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()

@push('scripts')
@include('backend.partials.delete-ajax')
@endpush
