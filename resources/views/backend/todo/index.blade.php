@extends('backend.partials.master')
@section('title')
{{ __('label.to_do_list') }} {{ __('label.list') }}
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
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ __('label.to_do_list') }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="j-parcel-main j-parcel-res">
                <div class="card">
                    <div class="card-header mb-3">
                        <h4 class="title-site">{{ __('label.to_do_list') }}
                        </h4>
                        @if (hasPermission('todo_create'))
                        <a href="{{ route('todo.create') }}" class="j-td-btn">
                            <img src="{{asset('backend')}}/assets/img/icon/plus-white.png" class="jj" alt="no image">
                            <span>{{ __('website_setup.add') }}</span>
                        </a>
                        @endif
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-sm">
                                <thead class="bg">
                                    <tr>
                                        <th>{{ __('label.sl') }}</th>
                                        <th>{{ __('label.date') }}</th>
                                        <th>{{ __('label.title') }}</th>
                                        <th>{{ __('label.description') }}</th>
                                        <th>{{ __('label.file') }}</th>
                                        <th>{{ __('label.note') }}</th>
                                        <th>{{ __('label.status') }}</th>
                                        <th>{{ __('label.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($todos as $key => $todo)
                                    <tr id="row_{{ $todo->id }}">
                                        <td>{{++$key}}</td>
                                        <td> {{dateFormat($todo->date)}}</td>
                                        <td> {{$todo->title}}</td>
                                        <td> {{\Str::limit($todo->description,100,' ...')}}</td>
                                        <td><a href="{{ asset(@$todo->upload->original) }}" download>{{ __('label.download') }}</a></td>
                                        <td> {{$todo->note}}</td>
                                        <td>{!! $todo->TodoStatus !!}</td>

                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend be-addon">
                                                    <div class="d-flex" data-toggle="dropdown">
                                                        <a class="p-2" href="javascript:void()">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </a>
                                                    </div>
                                                    <div class="dropdown-menu">
                                                     

                                                        @if(hasPermission('todo_update')== true)
                                                        <a href="{{ route('todo.edit',$todo->id) }}" class="dropdown-item"><i class="fa fa-edit" aria-hidden="true"></i> {{ __('label.edit') }}</a>

                                           


                                                        @endif
                                                        @if(hasPermission('todo_delete')== true)
                                                        <a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('admin/todo/delete', {{$todo->id}})">
                                                            <i class="fa fa-trash" aria-hidden="true"></i> {{ __('label.delete') }}
                                                        </a>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                        

                                    @empty
                                    <x-nodata-found :colspan = "8" />
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                  


                        @if(count($todos))
                        <x-paginate-show :items="$todos" />
                        @endif
                        <!-- pagination component -->
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- @include('backend.todo.to_do_proccesing')
    @include('backend.todo.to_do_completed') --}}
</div>

@endsection()

@push('scripts')
<script>
    $(document).ready(function() {
        $('#todo_btn').click(function() {
            var id = $(this).data('id');
            $(".modal_todo_id").attr("value", id);
        });
    });

</script>

@include('backend.partials.delete-ajax')
@endpush
