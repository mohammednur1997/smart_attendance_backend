@extends("Backend.adminAuth.layout_auth")
@section("title")
    Forget
@endsection
@section("content")
    <body id="signin-page">
    <div class="page-form">
        <form action="{{ route("admin.forget.check") }}" method="post" class="form">
            @csrf
            <div class="header-content"><h1>Forget Password</h1></div>

            <div class="body-content">{{--<p>Log in with a social network:</p>--}}

                <div class="form-group">
                    <div class="input-icon right"><i class="fa fa-user"></i>
                        <input type="text" placeholder="Email" name="email" class="form-control">
                    </div>
                </div>
                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-success">Send Code
                        &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
                </div>
                <div class="clearfix"></div>
                <hr>
                <p>Don't have an account? <a id="btn-register" href={{ route('admin.register') }}>Register Now</a></p></div>
        </form>
    </div>
@endsection

