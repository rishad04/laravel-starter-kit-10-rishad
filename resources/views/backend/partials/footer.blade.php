<!--**********************************
            Footer start
        ***********************************-->
        <div class="footer txt-body-p">
          <div class="copyright">
            <p>© 2023 <span class="txt-clr-green">Parcel Fly</span>. All rights reserved.</p>
          </div>
          <div class="card d-none">
            <div class="card-body p-0">
              <div id="morris_line" class="morris_chart_height"></div>
            </div>
          </div>
          <div id="line_chart_2" class="morris_chart_height d-none"></div>

        </div>
        <!--**********************************
                Footer end
            ***********************************-->

        <!--**********************************
               Support ticket button start
            ***********************************-->

        <!--**********************************
               Support ticket button end
            ***********************************-->


      </div>
      <!--**********************************
            Main wrapper end
        ***********************************-->

      <!--**********************************
            Scripts
        ***********************************-->

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

    <script src="{{asset('backend')}}/vendor/sweetalert2/js/sweetalert2.all.min.js"></script>

    <!-- select 2 js -->
<script src="{{asset('backend')}}/vendor/select2/js/select2.full.min.js"></script>

<script src="{{asset('backend')}}/vendor/flatpickr/flatpickr.min.js"></script>

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



  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });


  // var yes = "{{ __('delete.yes') }}";
  // var cancel = "{{ __('delete.cancel') }}";

</script>

<script type="text/javascript">
  "use strict";
  $(function() {
      $('#demo-admin').click(function() {
          $('#email').attr('value', $(this).data('email'));
          $('#password').attr('value', $(this).data('password'));
      });
      $('#demo-merchant').click(function() {
          $('#email').attr('value', $(this).data('email'));
          $('#password').attr('value', $(this).data('password'));
      });
      $('#demo-deliveryman').click(function() {
          $('#email').attr('value', $(this).data('email'));
          $('#password').attr('value', $(this).data('password'));
      });
  });

</script>



@stack('scripts')


<script>
  const language = "{{ app()->getLocale() }}";

  var body = document.body;

  // Toggle the dir attribute between "ltr" and "rtl"
  if (language === "ar") {
      body.setAttribute("dir", "rtl");
  } else {
      body.setAttribute("dir", "ltr");
  }

</script>





    </body>
    </html>
