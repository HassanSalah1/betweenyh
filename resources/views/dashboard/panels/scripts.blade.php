<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset(mix('vendors/js/ui/jquery.sticky.js')) }}"></script>
{{-- <script>
  window.default_locale = "{{ config('app.locale') }}";
  window.fallback_locale = "{{ config('app.fallback_locale') }}";
  window.messages = @json($messages);
</script> --}}

<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>

<!-- custome scripts file for user -->
{{-- <script src="{{ asset(mix('js/core/scripts.js')) }}"></script> --}}

{{-- @if ($configData['blankPage'] === false)
<script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
@endif --}}
<!-- END: Theme JS-->

<!-- BEGIN: Toastr JS-->
@if (session()->get('warning'))
  <script>
    $(function() {
      toastr['warning']('{{ session()->get('warning') }}', 'Warning', {
        closeButton: true,
        tapToDismiss: false,
        progressBar: true,
        rtl: {{ App::currentLocale() == 'ar' ? 'true' : 'false' }}
      });
    });
  </script>
@endif
@if (session()->get('success'))
  <script>
    $(function() {
      toastr['success']('{{ session()->get('success') }}', 'Success', {
        closeButton: true,
        tapToDismiss: false,
        progressBar: true,
        rtl: {{ App::currentLocale() == 'ar' ? 'true' : 'false' }}
      });
    });
  </script>
@endif
@if (session()->get('error'))
  <script>
    $(function() {
      toastr['error']('{{ session()->get('error') }}', 'Error', {
        closeButton: true,
        tapToDismiss: false,
        progressBar: true,
        rtl: {{ App::currentLocale() == 'ar' ? 'true' : 'false' }}
      });
    });
  </script>
@endif
<!-- END: Toastr JS-->

<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
