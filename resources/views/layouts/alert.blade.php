<script src="{{ asset('js/toastr.min.js') }}"></script>
{{-- alertas success --}}
@if(true)
  <script defer>
$( document ).ready(function()
  {

      toastr.options =
      {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "0",
        "hideDuration": "0",
        "timeOut": "0",
        "extendedTimeOut": "0",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      toastr.success("{!! Session::get('success') !!}");

  });
  </script>
@endif
{{-- FIN alertas success --}}

{{-- alerta warning --}}
@if(Session::has('warning'))
  <script defer>
$( document ).ready(function()
  {
      toastr.options =
      {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "0",
        "hideDuration": "0",
        "timeOut": "0",
        "extendedTimeOut": "0",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "slideDown",
        "hideMethod": "fadeOut"
      }
      toastr.warning("{!! Session::get('warning') !!}");

  });
  </script>
@endif
{{-- FIN alertas warning --}}

{{-- alertas warning2 --}}
{{-- @if(Session::has('warning2'))
  <script>
  $(function ()
  {
    window.onload = function()
    {
      toastr.options =
      {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "500",
        "timeOut": "6000",
        "extendedTimeOut": "500",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "slideDown",
        "hideMethod": "fadeOut"
      }
      toastr.error("{!! Session::get('warning2') !!}");
    };
  });
  </script>
@endif --}}
{{-- FIN alertas warning2 --}}


{{-- errores --}}
@if(count($errors->all())!=0)
  <script defer>
$( document ).ready(function()
  {

      toastr.options =
      {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "0",
        "hideDuration": "0",
        "timeOut": "0",
        "extendedTimeOut": "0",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "slideDown",
        "hideMethod": "fadeOut"
      }
      @foreach($errors->all() as $error)
      toastr.warning("{!! $error !!}");
      @endforeach

  });
  </script>


@endif
{{-- fin errores --}}
