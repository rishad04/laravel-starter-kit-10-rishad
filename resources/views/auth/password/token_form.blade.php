@extends('auth.master')
@section('title') {{ ___('label.Token Verification') }} @endsection

@section('main')

<div class="row no-gutters">
    <div class="col-xl-12">
        <div class="auth-form">
            <div class="contact-page-3">

                <div class="text-center mb-3">
                    <img src="{{ logo(settings('light_logo') ) }}" alt="" class="rounded" height="40">
                </div>



                <div class="mb-3">
                    <h5 class="heading-5 mb-3 text-center"> Confirm Verification Code</h5>
                    <span class="small">We have sent you a verification Code to {{session('email')}}. Please confirm that code to verify your password reset request. </span>
                </div>

                <form method="POST" action="{{ route('password.verifyToken') }}">
                    @csrf

                    <input type="hidden" name="user_id" value="{{session('user_id')}}">

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

                <div class="text-center mt-3">
                    <p>Didn't get code ? <a href="{{ route('token.resend') }}" class="text-primary" onclick="resendToken(event)">Resend Code!</a></p>
                    <p>Know your password ? <a class="text-primary" href="{{ route('login') }}">Sign in here</a></p>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<script>
    function resendToken(event) {
        event.preventDefault();
        const btn = event.target;
        const parentP = btn.closest('p');
        const originalHtml = parentP.innerHTML;

        parentP.innerHTML = `Sending ... <i class="fa fa-spinner fa-spin"></i>`;

        const uid = "{{ session('user_id') }}";
        const token = "{{ csrf_token() }}";

        $.ajax({
            type: "POST"
            , url: btn.href || btn.dataset.url
            , data: {
                _token: token
                , user_id: uid
            }
            , dataType: "json"
            , success: function(response) {
                parentP.innerHTML = response.message;
                parentP.classList.add('text-success')
            }
            , error: function(jqXHR, textStatus, errorThrown) {
                parentP.innerHTML = 'Error occurred while resending token.';
            }
            , complete: function() {
                setTimeout(() => (parentP.innerHTML = originalHtml, parentP.classList.remove('text-success')), 5000);
            }
        });
    }

</script>


@endpush
