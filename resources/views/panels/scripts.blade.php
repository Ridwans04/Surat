<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="{{asset(mix('vendors/js/ui/jquery.sticky.js'))}}"></script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>

<!-- custome scripts file for user -->
<script src="{{ asset(mix('js/core/scripts.js')) }}"></script>
<script src="{{ asset('js/scripts/tool/sweet-alert.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/scripts/tool/toast.js') }}"></script>
@include('content.general.script_ajax')
<script>
    $(document).ready(function() {
        $("#theme-toggle").on("click", function() {
            let icon = $("#theme-toggle i");
            let theme = icon.attr("data-feather") === "moon" ? "dark" : "light";
            let url = `{{ url('/change-theme') }}?theme=${theme}`;

            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    if (response.status === 'success') {
                        if (theme === "dark") {
                            icon.attr("data-feather", "sun");
                            $('html').addClass('dark-layout');
                        } else {
                            icon.attr("data-feather", "moon");
                            $('html').removeClass('dark-layout');
                        }
                        feather.replace(); // Update icons
                        location.reload(); // Reload to apply new stylesheet
                    } else {
                        alert('Set Theme Failed');
                    }
                },
                error: function() {
                    alert('Set Theme Failed');
                }
            });
        });

        // Initialize Feather icons on page load
        feather.replace();
    });
  </script>
</script>

@if($configData['blankPage'] === false)
<script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
@endif
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
