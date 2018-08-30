<script src="{{ asset('js/toastr.min.js') }}"></script>
{{-- alertas success --}}
@if(Session::has('success'))
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
        "hideDuration": "5000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      toastr.success("{!! Session::get('success') !!}");
    };
  });
  </script>
@endif
{{-- FIN alertas success --}}

{{-- alerta warning --}}
@if(Session::has('warning'))
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
        "hideDuration": "5000",
        "timeOut": "3000",
        "extendedTimeOut": "500",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "slideDown",
        "hideMethod": "fadeOut"
      }
      toastr.warning("{!! Session::get('warning') !!}");
    };
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
        "hideDuration": "5000",
        "timeOut": "5000",
        "extendedTimeOut": "500",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "slideDown",
        "hideMethod": "fadeOut"
      }
      @foreach($errors->all() as $error)
      toastr.warning("{!! $error !!}");
      @endforeach
    };
  });
  </script>


@endif
{{-- fin errores --}}
