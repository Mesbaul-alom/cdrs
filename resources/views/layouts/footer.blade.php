<!-- footer start-->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0"></p>

            </div>
        </div>
    </div>
</footer>
</div>
</div>
<!-- latest jquery-->
<script src="{{ asset('/backend/assets/js/jquery-3.5.1.min.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('/backend/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<!-- feather icon js-->
<script src="{{ asset('/backend/assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('/backend/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
<!-- scrollbar js-->
<script src="{{ asset('/backend/assets/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('/backend/assets/js/scrollbar/custom.js') }}"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('/backend/assets/js/config.js') }}"></script>
<!-- Plugins JS start-->
<script src="{{ asset('/backend/assets/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('/backend/assets/js/chart/knob/knob.min.js') }}"></script>
<script src="{{ asset('/backend/assets/js/chart/knob/knob-chart.js') }}"></script>
<script src="{{ asset('/backend/assets/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('/backend/assets/js/chart/apex-chart/stock-prices.js') }}"></script>
<!-- <script src="../assets/js/notify/bootstrap-notify.min.js"></script> -->
<script src="{{ asset('/backend/assets/js/dashboard/default.js') }}"></script>
<script src="{{ asset('/backend/assets/js/notify/index.js') }}"></script>
<script src="{{ asset('/backend/assets/js/datepicker/date-picker/datepicker.js') }}"></script>
<script src="{{ asset('/backend/assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
<script src="{{ asset('/backend/assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
<script src="{{ asset('/backend/assets/js/photoswipe/photoswipe.min.js') }}"></script>
<script src="{{ asset('/backend/assets/js/photoswipe/photoswipe-ui-default.min.js') }}"></script>
<script src="{{ asset('/backend/assets/js/photoswipe/photoswipe.js') }}"></script>
<script src="{{ asset('/backend/assets/js/typeahead/handlebars.js') }}"></script>
<script src="{{ asset('/backend/assets/js/typeahead/typeahead.bundle.js') }}"></script>
<script src="{{ asset('/backend/assets/js/typeahead/typeahead.custom.js') }}"></script>
<script src="{{ asset('/backend/assets/js/typeahead-search/handlebars.js') }}"></script>
<script src="{{ asset('/backend/assets/js/typeahead-search/typeahead-custom.js') }}"></script>
<script src="{{ asset('/backend/assets/js/height-equal.js') }}"></script>
<script src="{{ asset('/backend/assets/js/fontawesome.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('/js/toastify-js.js') }}"></script>

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ asset('/backend/assets/js/script.js') }}"></script>
<!-- <script src="../assets/js/theme-customizer/customizer.js"></script> -->
<!-- login js-->
<!-- Plugin used-->
</body>


<script>
    function success(message) {
        Toastify({
            text: message,
            gravity: "top",
            position: "right",
            backgroundColor: "linear-gradient(to right, #269E70, #269E70)",
            className: "error",
        }).showToast();
    }

    function error(message) {
        Toastify({
            text: message,
            gravity: "top",
            position: "right",
            backgroundColor: "linear-gradient(to right, #F93C0A, #FF3551)",
            className: "error",
        }).showToast();
    }
</script>

<script>
    @if (session('success'))
        Toastify({
            text: {{ session('success') }},
            gravity: "top",
            position: "right",
            backgroundColor: "linear-gradient(to right, #00BFA6, #43E0C9)",
            className: "success",
        }).showToast();
        //var play = document.getElementById('success').play();
    @endif

    @if (session('error'))
        Toastify({
            text: {{ session('error') }},
            gravity: "top",
            position: "right",
            backgroundColor: "linear-gradient(to right, #F93C0A, #FF3551)",
            className: "error",
        }).showToast();
        //var play = document.getElementById('error').play();
    @endif
</script>

@if (session('success'))
    <script>
        swal({
            title: "Success",
            text: "{{ session('success') }}",
            icon: "success",
            button: "Ok",
        });
    </script>
@endif

@if (session('error'))
    <script>
        swal({
            title: "Error",
            text: "{{ session('error') }}",
            icon: "error",
            button: "Ok",
        });
    </script>
@endif



</html>
