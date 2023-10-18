@extends('backend.partials.master')
@section('title')
{{ __('role.title') }} {{ __('levels.list') }}
@endsection
@section('maincontent')


<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}" class="breadcrumb-link">{{ __('levels.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">{{__('menus.user_role')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('role.index') }}" class="breadcrumb-link">{{ __('role.title') }}</a></li>
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

                <div class="card-header mb-3">
                    <h4 class="title-site">{{ __('role.title') }}</h4>
                    {{-- @if(hasPermission('role_create') ) --}}
                    <a href="{{route('role.create')}}" class="j-td-btn">
                        <img src="{{ asset('backend') }}/assets/img/icon/plus-white.png" class="jj" alt="no image"> <span>{{ __('levels.add') }} </span>
                    </a>
                 
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-responsive-sm ">
                            <thead class="bg">
                                <tr>
                                    <th>{{ __('levels.id') }}</th>
                                    <th>{{ __('levels.name') }}</th>
                                    <th>{{ __('levels.slug') }}</th>
                                    <th>{{ __('levels.permission') }}</th>
                                    <th>{{ __('levels.status') }}</th>

                                    {{-- @if(hasPermission('role_update') == true || hasPermission('role_delete') == true)
                                    <th>{{ __('levels.actions') }}</th>
                                    @endif --}}
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @php $i=1; @endphp
                                @forelse($roles as $role)
                                <tr id="row_{{ $role->id }}">
                                    <td>{{$i++}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->slug}}</td>
                                    <td>
                                        @if(!empty($role->permissions) )
                                        <label class="bullet-badge bullet-badge-info">{{ count($role->permissions) }}</label>
                                        @endif
                                    </td>
                                    <td>{!! $role->my_status !!}</td>
                                    @if(hasPermission('role_update') == true || hasPermission('role_delete') == true )
                                    <td>
                                        <div class="d-flex" data-toggle="dropdown">
                                            <a class="p-2" href="javascript:void()">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </a>
                                        </div>
                                        <div class="dropdown-menu">
                                            @if(hasPermission('role_update') == true )
                                            <a href="{{route('roles.edit',$role->id)}}" class="dropdown-item"><i class="fa fa-edit" aria-hidden="true"></i> {{ __('levels.edit') }}</a>
                                            @endif
                                            @if( hasPermission('role_delete') == true )
                                            <a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('admin/role/delete', {{$role->id}})">
                                                <i class="fa fa-trash" aria-hidden="true"></i> {{ __('levels.delete') }}
                                            </a>
                                            @endif
                                        </div>
                                    </td>
                                    @endif
                                </tr>

                                @empty
                                <x-nodata-found :colspan="6" />
                                @endforelse
                            </tbody> --}}
                        </table>
                    </div>
                </div>
                <!-- pagination component -->
                {{-- @if(count($roles))
                <x-paginate-show :items="$roles" />
                @endif --}}
                <!-- end pagination component -->
            </div>
        </div>
    </div>
</div>
@endsection()

