<script src={{asset("assets/js/jquery.min.js")}}></script>
<script src={{asset("assets/js/jquery-migrate-1.2.1.min.js")}}></script>
<script src={{asset("assets/js/jquery-ui.js")}}></script>
<!--loading bootstrap js-->
<script src={{asset("assets/vendors/bootstrap/js/bootstrap.min.js")}}></script>
<script src={{asset("assets/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js")}}></script>
<script src={{asset("assets/vendors/jquery-validate/jquery.validate.min.js")}}></script>
<script src={{asset("assets/js/html5shiv.js")}}></script>
<script src={{asset("assets/js/respond.min.js")}}></script>
<script src={{asset("assets/js/extra-signup.js")}}></script>
<script src={{asset("assets/vendors/iCheck/icheck.min.js")}}></script>
<script src={{asset("assets/vendors/iCheck/custom.min.js")}}></script>
<script  src="{{ asset('assets/vendors/toaster/toastr.min.js')}}"></script>
<script  src="{{ asset('assets/vendors/bootstrap-sweetalert/dist/sweetalert.js')}}"></script>
<script>//BEGIN CHECKBOX & RADIO
    $('input[type="checkbox"]').iCheck({
        checkboxClass: 'icheckbox_minimal-grey',
        increaseArea: '20%' // optional
    });
    $('input[type="radio"]').iCheck({
        radioClass: 'iradio_minimal-grey',
        increaseArea: '20%' // optional
    });
    //END CHECKBOX & RADIO</script>


<script>
        @if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>

@yield("script")

</body>
</html>
