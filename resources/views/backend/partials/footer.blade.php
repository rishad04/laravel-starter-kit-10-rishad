<!--********************************** Scripts ***********************************-->

<script src="{{asset('backend')}}/vendor/fontawesome/fontawesome.min.js"></script>

<script src="{{asset('backend')}}/vendor/global/global.min.js"></script>
<script src="{{asset('backend')}}/js/quixnav-init.js"></script>
<script src="{{asset('backend')}}/js/custom.min.js"></script>

<!-- Vectormap -->
<script src="{{asset('backend')}}/vendor/jqvmap/js/jquery.vmap.min.js"></script>
<script src="{{asset('backend')}}/vendor/jqvmap/js/jquery.vmap.world.js"></script>

<!--  flot-chart js -->
<script src="{{asset('backend')}}/vendor/flot/jquery.flot.js"></script>
<script src="{{asset('backend')}}/vendor/flot/jquery.flot.resize.js"></script>

<!-- Chart Chartist plugin files -->
<script src="{{asset('backend')}}/vendor/chartist/js/chartist.min.js"></script>
<script src="{{asset('backend')}}/vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
<script src="{{asset('backend')}}/js/plugins-init/chartist-init.js"></script>

<!-- Chart Morris plugin files -->
<script src="{{asset('backend')}}/vendor/raphael/raphael.min.js"></script>
<script src="{{asset('backend')}}/vendor/morris/morris.min.js"></script>
<script src="{{asset('backend')}}/js/plugins-init/morris-init.js"></script>

<!-- Owl Carousel -->
<script src="{{asset('backend')}}/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<!-- Counter Up -->
<script src="{{asset('backend')}}/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="{{asset('backend')}}/vendor/jquery.counterup/jquery.counterup.min.js"></script>

<script src="{{asset('backend')}}/js/dashboard/dashboard-1.js"></script>


<script src="{{static_asset('backend')}}/vendor/sweetalert2/js/sweetalert2.all.min.js"></script>

<!-- select 2 js -->
<script src="{{asset('backend')}}/vendor/select2/js/select2.full.min.js"></script>

<script src="{{asset('backend')}}/vendor/flatpickr/flatpickr.min.js"></script>


@include('backend.partials.alert-message')

<script type="text/javascript">
    $(document).ready(function() {
        $(".select2").select2({
            tags: "true"
            , placeholder: "Select an option"
            , allowClear: true
        });

        $(".flatpickr").flatpickr({
            altInput: true
            , altFormat: "F j, Y"
            , dateFormat: "Y-m-d"
        });

        $(".flatpickr-range").flatpickr({
            mode: "range"
            , altInput: true
            , altFormat: "F j, Y"
            , dateFormat: "Y-m-d"
        });

    });

</script>
