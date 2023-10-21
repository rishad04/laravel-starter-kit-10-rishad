<div class="modal fade" id="todoModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="data-modal">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('to_do.to_do_add')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                {{-- {{ route('todo.store') }} --}}
                <form action="#" method="post">
                    @csrf

                    <div class="form-row">
                        <div class="col-12 col-md-6 form-group">
                            <label class=" label-style-1" for="transfer_hub">{{ __('to_do.title')}}</label> <span class="text-danger">*</span>
                            <div class="form-control-wrap">
                                <input id="" type="text" name="title" placeholder="{{ __('placeholder.Enter_title') }}" class="form-control input-style-1">
                                @error('title')
                                <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label class=" label-style-1" for="user">{{ __('to_do.assign')}}</label> <span class="text-danger">*</span>
                            <select id="user" name="user_id" class="form-control input-style-1 select2 todouser">
                                <option selected disabled>{{ __('menus.select') }} {{ __('user.title') }}</option>
                                @foreach (user() as $user)
                                @if ($user->user_type !== App\Enums\UserType::MERCHANT)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('user_id')
                            <small class="text-danger mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 form-group  ">
                            <label class=" label-style-1" for="note">{{ __('to_do.date')}}</label> <span class="text-danger">*</span>
                            <div class="form-control-wrap user-search">
                                <input type="date" name="date" class="form-control input-style-1 flatpickr" value="{{old('date',date('Y-m-d'))}}">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label class=" label-style-1" for="note">{{ __('to_do.description')}}</label>
                            <div class="form-control-wrap user-search">
                                <textarea class="form-control input-style-1" name="description" rows="5" id="description" placeholder="{{ __('placeholder.Enter_description') }}"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="j-td-btn btn-red" data-dismiss="modal">{{ __('levels.cancel') }}</button>
                <button type="submit" id="transfer_to_hub_multiple_parcel_button" class="j-td-btn">{{ __('levels.save') }}</button>
            </div>
        </div>
    </div>
</div>
