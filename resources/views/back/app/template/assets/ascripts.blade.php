<!-- jQuery -->
<script src="{{asset('assets/back/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/back/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/back/dist/js/adminlte.min.js')}}"></script>


<script>
    $('#logout .ok').click(function(event){
        event.preventDefault();
        document.getElementById('logout-form').submit();
    })
</script>
