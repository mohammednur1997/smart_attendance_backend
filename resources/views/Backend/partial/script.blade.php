
<script src={{asset("assets/js/jquery-1.10.2.min.js")}}></script>
<script src={{asset("assets/js/jquery-migrate-1.2.1.min.js")}}></script>
<script src={{asset("assets/js/jquery-ui.js")}}></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>


<!--loading bootstrap js-->
<script src={{asset("assets/js/bootstrap/js/bootstrap.min.js")}}></script>
<script src={{asset("assets/js/bootstrap-hover-dropdown.js")}}></script>
<script src={{asset("assets/js/jquery.metisMenu.js")}}></script>


<script src={{asset("assets/js/icheck.min.js")}}></script>
<script src={{asset("assets/js/custom.min.js")}}></script>
<script src={{asset("assets/js/bootstrap-daterangepicker/daterangepicker.js")}}></script>
<script src={{asset("assets/js/moment/moment.js")}}></script>


<script src={{asset("assets/js/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js")}}></script>
<script src={{asset("assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js")}}></script>
<script src={{asset("assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js")}}></script>


<script src={{asset("assets/js/jquery.cookie.js")}}></script>
<script src={{asset("assets/js/pace.min.js")}}></script>

<script src={{asset("assets/js/jquery.slimscroll.js")}}></script>
<script src={{asset("assets/js/custom.min.js")}}></script>
<script src={{asset("assets/js/responsive-tabs.js")}}></script>





<script src={{asset("assets/js/html5shiv.js")}}></script>
<script src={{asset("assets/js/respond.min.js")}}></script>

<script src={{asset("assets/js/jquery.menu.js")}}></script>





<!--CORE JAVASCRIPT-->
<script src={{asset("assets/js/main.js")}}></script>
<!--LOADING SCRIPTS FOR PAGE-->
<script src={{asset("assets/js/ckeditor/ckeditor.js")}}></script>
<script  src="{{ asset('assets/js/toaster/toastr.min.js')}}"></script>
<script  src="{{ asset('assets/js/sweetalert.js')}}"></script>

<!--LOADING SCRIPTS FOR PAGE-->
<script src={{asset("assets/js/animation.js")}}></script>

<!--LOADING SCRIPTS For Data Table-->
<script src={{asset("assets/js/jquery.dataTables.min.js")}}></script>



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

<script>
    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
            },
            function(isConfirm) {
                if (isConfirm) {
                    swal("Deleted!", "Your Data has been deleted.", "success");
                    window.location.href = link;
                } else {
                    swal("Cancelled", "Your Data is safe :)", "error");
                }
            });
    });
</script>

<script>
    $(".chosen-select").chosen({
        no_results_text: "Oops, nothing found!"
    })
</script>
@yield("backendScript")

</body>
</html>
