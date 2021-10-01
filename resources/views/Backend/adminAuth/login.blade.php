@extends("Backend.adminAuth.layout_auth")
@section("title")
    Login
@endsection
@section("content")
    <body id="signin-page">
    <div class="page-form">
        <form action="" method="post"  id="signin_form" class="form">
            @csrf
            <div class="header-content"><h1>Log In</h1></div>

            <div class="body-content">
                <div class="form-alerts">
                    <div class="empty-form text-center" id="myError" style="display: none;">
                        <p><span id="errorHandle" style="color: red"></span></p>
                    </div>
                </div>

                {{-- <div class="row mbm text-center">
                     <div class="col-md-4"><a href="{{route("loginSocial")}}" class="btn btn-sm btn-twitter btn-block"><i
                                 class="fa fa-twitter fa-fw"></i>Github</a></div>
                     <div class="col-md-4"><a href="#" class="btn btn-sm btn-facebook btn-block"><i
                                 class="fa fa-facebook fa-fw"></i>Facebook</a></div>
                     <div class="col-md-4"><a href="#" class="btn btn-sm btn-google-plus btn-block"><i
                                 class="fa fa-google-plus fa-fw"></i>Google +</a></div>
                 </div>--}}

                <div class="form-group">
                    <div class="input-icon right"><i class="fa fa-user"></i>
                        <input type="text" placeholder="Email" name="email" id="email" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon right"><i class="fa fa-key"></i>
                        <input type="password" placeholder="Password" name="password" id="password" class="form-control">
                    </div>
                </div>

                <div class="form-group pull-left">
                    <div class="checkbox-list"><label><input type="checkbox">&nbsp;
                            Keep me signed in</label></div>
                </div>
                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-success" id="login">Log In
                        &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
                </div>
                <div class="clearfix"></div>
              {{--  <div class="forget-password"><h4>Forgotten your Password?</h4>

                    <p>no worries, click <a href={{ route("admin.forget") }} class='btn-forgot-pwd'>here</a> to reset your password.</p></div>
                <hr>
                <p>Don't have an account? <a id="btn-register" href={{ route("admin.register") }}>Register Now</a></p></div>--}}
        </form>
    </div>
@endsection

    @section("script")
        <script>
            $("#login").click(function(event){
                event.preventDefault();

                let email = $("#email").val();
                let password = $("#password").val();


                if(email.length === 0){
                    $('#myError').removeAttr("style");
                    $('#errorHandle').text("A valid email require")
                }else if(password.length === 0){
                    $('#myError').removeAttr("style");
                    $('#errorHandle').text("Enter Your Password")
                }else{
                    $('#signin_form').attr('action', "/admin/login/store").submit();
                }

            });
        </script>
@endsection
