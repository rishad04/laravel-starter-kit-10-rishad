@extends('auth.master')
@section('title') {{ ___('Email Verification') }} @endsection

@section('main')

<div class="row no-gutters">
    <div class="col-xl-12">
        <div class="auth-form">
            <div class="contact-page-3">

                <div class="mb-3">
                    <h5 class="heading-5 mb-3 text-center"> Confirm Verification Code</h5>
                    <span class="small">We have sent you a verification Code to {{session('email')}}. Please confirm that code to verify your email address for registration. </span>
                </div>

                <form method="POST" action="{{ route('register.verifyToken') }}">
                    @csrf

                    <input type="hidden" name="user_id" value="{{session('user_id')}}">
                    {{-- <input type="hidden" name="email" value="{{session('email')}}"> --}}

                    <div class="form-group mb-3">
                        <label for="token" class="label-style-1">Verification Code <sup>*</sup></label>
                        <input type="text" name="token" id="token" class="form-control input-style-1" value="{{ old('token') }}" placeholder="Enter Verification Code" required autocomplete="off" autofocus>
                        @error('token') <span class="text-danger small"> {{ $message }} </span> @enderror
                        @if(session()->has('danger')) <span class="text-danger small">{{ session('danger') }}</span> @endif
                    </div>

                    <div class="text-center">
                        <button type="submit" class="j-td-btn btn-sm w-100 d-block">Verify</button>
                    </div>

                </form>

                <div>
                    <p class="text-center pt-2">Didn't get code ? <a id="resendToken" href="javascript:void(0);" class="text-primary" onclick="resendToken()">Resend Code!</a></p>
                    <p id="tokenResendResponse" class="text-center pt-2 text-success"></p>
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
