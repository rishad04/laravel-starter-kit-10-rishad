@extends('backend.partials.master')
@section('title')
{{ ___('label.to_do_list') }} {{ ___('label.list') }}
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
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ ___('label.to_do_list') }}</a></li>
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
                        <h4 class="title-site">{{ ___('label.to_do_list') }}
                        </h4>
                        @if (hasPermission('todo_create'))
                        <a href="{{ route('todo.create') }}" class="j-td-btn">
                            <img src="{{ asset('backend') }}/icons/icon//plus-white.png" class="jj" alt="no image">
                            <span>{{ ___('menus.add') }}</span>
                        </a>
                        @endif
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-sm">
                                <thead class="bg">
                                    <tr>
                                        <th>{{ ___('label.id') }}</th>
                                        <th>{{ ___('label.date') }}</th>
                                        <th>{{ ___('label.title') }}</th>
                                        <th>{{ ___('label.description') }}</th>
                                        <th>{{ ___('label.file') }}</th>
                                        <th>{{ ___('label.note') }}</th>
                                        <th>{{ ___('label.status') }}</th>
                                        <th>{{ ___('label.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($all_todo as $key => $todo)
                                    <tr id="row_{{ $todo->id }}">
                                        <td>{{++$key}}</td>
                                        <td> {{dateFormat($todo->date)}}</td>
                                        <td> {{$todo->title}}</td>
                                        <td> {{\Str::limit($todo->description,100,' ...')}}</td>
                                        <td><a href="{{ asset(@$todo->upload->original) }}" download>{{ ___('label.download') }}</a></td>
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
                                                        <a href="{{ route('todo.edit',$todo->id) }}" class="dropdown-item"><i class="fa fa-edit" aria-hidden="true"></i> {{ ___('label.edit') }}</a>
                                                        @endif
                                                        @if(hasPermission('todo_delete')== true)
                                                        <a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('todo/delete', {{$todo->id}})">
                                                            <i class="fa fa-trash" aria-hidden="true"></i> {{ ___('label.delete') }}
                                                        </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <x-nodata-found :colspan="8" />
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @if(count($all_todo))
                        <x-paginate-show :items="$all_todo" />
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
