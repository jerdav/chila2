
<script>


  @if(Session::has('success'))
    toastr.options =
    {
      "positionClass" : "toast-top-center",
      "progressBar" : true,
      "timeOut" : "5000",
    }
        toastr.success("{{ session('success') }}");

  @endif


  @if(Session::has('info'))
  toastr.options =
    {
      "positionClass" : "toast-top-center",
      "progressBar" : true,
      "timeOut" : "5000",
    }
  		toastr.info("{{ session('info') }}");

  @endif


  @if(Session::has('warning'))
  toastr.options =
    {
      "positionClass" : "toast-top-center",
      "progressBar" : true,
      "timeOut" : "5000",
    }
  		toastr.warning("{{ session('warning') }}");

  @endif


  @if(Session::has('error'))
  toastr.options =
    {
      "positionClass" : "toast-top-center",
      "progressBar" : true,
      "timeOut" : "5000",
    }
  		toastr.error("{{ session('error') }}");

  @endif


</script>