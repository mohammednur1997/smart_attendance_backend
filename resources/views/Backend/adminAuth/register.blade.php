@extends("Backend.adminAuth.layout_auth")
@section("title")
    Register
@endsection
@section("content")
    <body id="signup-page">
    <div class="page-form">
        <form action="" id="signup_form" method="post" class="form">
            @csrf
            <div class="header-content"><h1>Register</h1></div>
            <div class="body-content">
                <div class="form-alerts">
                    <div class="empty-form text-center" id="myError" style="display: none;">
                        <p><span id="errorHandle" style="color: red"></span></p>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-icon right"><i class="fa fa-user"></i>
                        <input type="text" placeholder="Username" name="username" id="username" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon right"><i class="fa fa-envelope"></i>
                        <input type="text" placeholder="Email address" name="email" id="email" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon right"><i class="fa fa-key"></i>
                        <input id="password" type="password" placeholder="Password" name="password" id="password" class="form-control"></div>
                </div>
                <div class="form-group">
                    <div class="input-icon right"><i class="fa fa-key"></i>
                        <input type="password" placeholder="Confirm Password" name="passwordConfirm" id="passwordConfirm" class="form-control"></div>
                </div>
                <hr>
                <div style="margin-bottom: 15px" class="row">
                    <div class="col-lg-6"><label>
                            <input type="text" placeholder="First Name" name="firstname" id="firstname" class="form-control"></label></div>
                    <div class="col-lg-6">
                        <label><input type="text" placeholder="Last Name" name="lastname" id="lastname" class="form-control"></label></div>
                </div>
                <div class="form-group"><label style="display: block" class="select">
                        <select name="gender" id="gender" class="form-control">
                            <option value="0" selected disabled>Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select></label></div>
                <div class="form-group">
                    <div class="checkbox-list">
                        <label><input id="subscription" type="checkbox" name="subscription">&nbsp; I want to receive news and special offers</label></div>
                </div>
                <div class="form-group">
                    <div class="checkbox-list">
                        <label><input id="terms" type="checkbox" name="terms">&nbsp;I agree with the Terms and Conditions</label></div>
                </div>
                <hr>
                <div class="form-group mbn"><a href="{{ route("admin.login") }}" class="btn btn-warning">
                        <i class="fa fa-chevron-circle-left"></i>&nbsp;Back</a>
                    <button type="submit" id="register_form" class="btn btn-info pull-right">
                        Submit
                        &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section("script")
    <script>
        $("#register_form").click(function(event){
            event.preventDefault();

            let firstname = $('#firstname').val();
            let lastname = $('#lastname').val();
            let username = $("#username").val();
            let email = $("#email").val();
            let gender = $("#gender").val();
            let password = $("#password").val();
            let passwordConfirm = $("#passwordConfirm").val();
            let _token   = $("input[name=_token]").val();


            if(username.length === 0){
                $('#myError').removeAttr("style");
                $('#errorHandle').text("Enter Your User Name")
            }else if(email.length === 0){
                $('#myError').removeAttr("style");
                $('#errorHandle').text("A valid email require")
            }else if(password.length === 0){
                $('#myError').removeAttr("style");
                $('#errorHandle').text("Enter Your Password")
            }else if(password !== passwordConfirm){
                $('#myError').removeAttr("style");
                $('#errorHandle').text("Password not Match")
            } else if(firstname.length === 0){
                $('#myError').removeAttr("style");
                $('#errorHandle').text("Enter Your first Name")
            }else if(lastname.length === 0){
                $('#myError').removeAttr("style");
                $('#errorHandle').text("Enter Your first Last Name")
            }else{
                $('#signup_form').attr('action', "/admin/register/store").submit();
            }
        });
    </script>
@endsection
