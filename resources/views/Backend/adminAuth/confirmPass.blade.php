@extends("Backend.adminAuth.layout_auth")
@section("title")
    ResetPass
@endsection
@section("content")
    <body id="signin-page">
    <div class="page-form">
        <form action="" method="post"  id="resetForm" class="form">
            @csrf
            <div class="header-content"><h1>Reset Password</h1></div>

            <div class="body-content">
                <div class="form-alerts">
                    <div class="empty-form text-center" id="myError" style="display: none;">
                        <p><span id="errorHandle" style="color: red"></span></p>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-icon right"><i class="fa fa-user"></i>
                        <input type="text" placeholder="Email" name="email" value="{{ request()->email }}" id="email" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-icon right"><i class="fa fa-user"></i>
                        <input type="text" placeholder="pin" name="pin" id="pin" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-icon right"><i class="fa fa-key"></i>
                        <input type="password" placeholder="Password" name="password" id="password" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-icon right"><i class="fa fa-key"></i>
                        <input type="password" placeholder="Confirm Password" name="passwordConfirm" id="passwordConfirm" class="form-control"></div>
                </div>

                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-success" id="reset">Reset
                        &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
                </div>
                <div class="clearfix"></div>
                <hr>
                <p>Already have an account? <a id="btn-register" href={{ route("admin.login") }}>Login</a></p></div>
        </form>
    </div>
@endsection

    @section("script")
        <script>
            $("#reset").click(function(event){
                event.preventDefault();

                let email = $("#email").val();
                let pin = $("#pin").val();
                let password = $("#password").val();
                let passwordConfirm = $("#passwordConfirm").val();


                if(email.length === 0){
                    $('#myError').removeAttr("style");
                    $('#errorHandle').text("A valid email require")
                }else if(pin.length === 0){
                    $('#myError').removeAttr("style");
                    $('#errorHandle').text("Enter Your pin")
                }else if(password.length === 0){
                    $('#myError').removeAttr("style");
                    $('#errorHandle').text("Enter Your Password")
                }else if(password !== passwordConfirm){
                    $('#myError').removeAttr("style");
                    $('#errorHandle').text("Password not Match")
                } else{
                    $('#resetForm').attr('action', "/admin/confirm/store").submit();
                }

            });
        </script>
@endsection
