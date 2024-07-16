<!DOCTYPE html>
<html lang="en">

@include('backend.partials.header')

<body dir="{{defaultLanguage()->text_direction == "LTR" ? 'ltr': 'rtl'}}">
    <!--*******************  Preloader start ******************** -->
    {{-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> --}}

    <!-- Start Rtl  ==================================== -->
    {{-- <button type="button" class="rtl-mode">RTL/LTL</button> --}}

    <!--****************  Main wrapper start  *****************-->
    <div id="main-wrapper">

        @include('backend.partials.navbar')
        @include('backend.partials.sidebar')

        <div class="content-body">
            @yield('maincontent')
        </div>

        @include('backend.partials.footer_text')

    </div>
    <!--************** Main wrapper end ***************-->


    @include('backend.partials.dynamic_modal')

    <!--******* Scripts ********-->
    @include('backend.partials.footer')

    @stack('scripts')

</body>

</html>