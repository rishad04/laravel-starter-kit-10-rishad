@include('backend.partials.header')
@include('backend.partials.navbar')
@include('backend.partials.sidebar')

<div class="content-body">
    @yield('maincontent')
</div>
   

@include('backend.partials.footer')
