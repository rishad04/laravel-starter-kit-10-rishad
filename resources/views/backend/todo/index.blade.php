@extends('backend.partials.master')
@section('title')
{{ __('to_do.to_do_list') }} {{ __('levels.list') }}
@endsection
@section('maincontent')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}" class="breadcrumb-link">{{ __('levels.dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="" class="breadcrumb-link active">{{ __('to_do.to_do_list') }}</a></li>
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
                        <h4 class="title-site">{{ __('to_do.to_do_list') }}</h4>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-sm" style="width:100%">
                                <thead class="bg">
                                    <tr>
                                        <th>{{ __('to_do.sl') }}</th>
                                        <th>{{ __('to_do.date') }}</th>
                                        <th>{{ __('to_do.title') }}</th>
                                        <th>{{ __('to_do.description') }}</th>
                                        <th>{{ __('to_do.assign') }}</th>
                                        <th>{{ __('to_do.note') }}</th>
                                        <th>{{ __('to_do.status') }}</th>
                                        <th>{{ __('to_do.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($todos as $key => $todo)
                                    <tr id="row_{{ $todo->id }}">
                                        <td>{{++$key}}</td>
                                        <td> {{dateFormat($todo->date)}}</td>
                                        <td> {{$todo->title}}</td>
                                        <td> {{\Str::limit($todo->description,100,' ...')}}</td>
                                        <td> {{$todo->user->name}}</td>
                                        <td> {{$todo->note}}</td>
                                        <td>
                                            {!! $todo->TodoStatus !!} <br>

                                            @if($todo->partial_delivered && $todo->status != \App\Enums\TodoStatus::PENDING)
                                            <span class="bullet-badge bullet-badge-success">{{trans("to_do." . \App\Enums\todoStatus::PENDING)}}</span>
                                            @endif

                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend be-addon">
                                                    <div class="d-flex" data-toggle="dropdown">
                                                        <a class="p-2" href="javascript:void()">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </a>
                                                    </div>
                                                    <div class="dropdown-menu">
                                                        {!! TodoStatus($todo) !!}

                                                        @if(hasPermission('todo_update')== true)
                                                        <a href="" class="dropdown-item" id="todoeditModal1" data-target="#todoeditModal{{$todo->id}}" data-toggle="modal"><i class="fa fa-edit" aria-hidden="true"></i> {{ __('levels.edit') }}</a>
                                                        @endif
                                                        @if(hasPermission('todo_delete')== true)
                                                        <a class="dropdown-item" href="javascript:void(0);" onclick="delete_row('admin/todo/delete', {{$todo->id}})">
                                                            <i class="fa fa-trash" aria-hidden="true"></i> {{ __('levels.delete') }}
                                                        </a>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('backend.todo.to_do_edit')
                                    @empty
                                    <x-nodata-found :colspan="9" />
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- pagination component -->
                        @if(count($todos))
                        <x-paginate-show :items="$todos" />
                        @endif
                        <!-- pagination component -->
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('backend.todo.to_do_proccesing')
    @include('backend.todo.to_do_completed')
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
