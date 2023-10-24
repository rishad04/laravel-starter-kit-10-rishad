@extends('auth.master')
@section('title') {{ __('Reset Password') }} @endsection

@section('main')

<div class="row no-gutters">
    <div class="col-xl-12">
        <div class="auth-form">
            <div class="contact-page-3">

                <div class="mb-3">
                    <h5 class="heading-5 mb-3 text-center"> Reset Password </h5>
                    <span class="small">Please fillup the form with your new password that you want to set. </span>
                </div>

                <form method="POST" action="{{ route('password.reset') }}">
                    @csrf

                    <input type="hidden" name="user_id" value="{{session('user_id')}}">
                    <input type="hidden" name="token" value="{{session('token')}}">

                    <div class="form-group mb-3">
                        <label for="new_password" class="label-style-1">New Password<sup>*</sup></label>
                        <input type="password" name="new_password" id="new_password" class="form-control input-style-1" value="{{ old('new_password') }}" placeholder="Enter new password" required autocomplete="off" autofocus>
                        @error('new_password') <span class="text-danger small"> {{ $message }} </span> @enderror
                        @if(session()->has('danger')) <span class="text-danger small">{{ session('danger') }}</span> @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="confirm_password" class="label-style-1">Confirm Password<sup>*</sup></label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control input-style-1" value="{{ old('confirm_password') }}" placeholder="confirm new password" required autocomplete="off" autofocus>
                        @error('confirm_password') <span class="text-danger small"> {{ $message }} </span> @enderror
                        @if(session()->has('danger')) <span class="text-danger small">{{ session('danger') }}</span> @endif
                    </div>

                    <div class="text-center">
                        <button type="submit" class="j-td-btn btn-sm w-100 d-block">Submit</button>
                    </div>

                </form>

                <div>
                    <span class="text-center pt-2">Know your password ? <a href="{{ route('loginForm') }}">Signin Here</a> </span> </p>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $('#tokenResendResponse').hide();

    function resendToken() {
        const uid = "{{ session('user_id') }}";
        const token = "{{ csrf_token() }}";

        $.ajax({
            type: "POST"
            , url: "{{ route('token.resend') }}"
            , data: {
                _token: token
                , user_id: uid
            }
            , dataType: "json"
            , success: function(response) {
                $('#tokenResendResponse').show();
                $("#tokenResendResponse").text(response.message);
                hideResponseText();
            }
            , error: function(jqXHR, textStatus, errorThrown) {
                console.log("Error: " + textStatus, errorThrown);
                $("#tokenResendResponse").text('Error occurred while resending token.');
                hideResponseText();
            }
        });
    }

    function hideResponseText() {
        setTimeout(function() {
            $("#tokenResendResponse").hide();
        }, 5000); // 5000 milliseconds = 5 seconds
    }

</script>

@endpush
