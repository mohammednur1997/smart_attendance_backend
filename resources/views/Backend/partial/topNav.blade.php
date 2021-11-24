<!--BEGIN BACK TO TOP--><a id="totop" href="#"><i class="fa fa-angle-up"></i></a><!--END BACK TO TOP-->
<div id="header-topbar-option-demo" class="page-header-topbar">
    <nav id="topbar" role="navigation" style="margin-bottom: 0; z-index: 2;"
         class="navbar navbar-default navbar-static-top">
        <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span
                    class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                    class="icon-bar"></span><span class="icon-bar"></span></button>
            <a id="logo" href="{{ route("deshboard") }}" class="navbar-brand"><span class="fa fa-rocket"></span><span
                    class="logo-text" style="color: red">{{--<img src={{asset("image/logos/". app_config("AppLogo"))}} width="150px" alt="">--}} AzmiSoft</span><span style="display: none" class="logo-text-icon">A</span></a>
        </div>
        <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
            <ul class="nav navbar-nav    ">
                <li class="active"><a href="index.html">Dashboard</a></li>
                <li><a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle">Layouts
                        &nbsp;<i class="fa fa-angle-down"></i></a>
                </li>
            </ul>
            <form id="topbar-search" action="#" method="GET" class="hidden-xs">
                <div class="input-group"><input type="text" placeholder="Search..." class="form-control"/><span
                        class="input-group-btn"><a href="javascript:;" class="btn submit"><i
                                class="fa fa-search"></i></a></span></div>
            </form>

            <ul class="nav navbar navbar-top-links navbar-right mbn">

                <li id="topbar-chat" class="hidden-xs"><a href="javascript:void(0)" class="btn-chat"><i
                            class="fa fa-comments"></i><span class="badge badge-info">{{ DB::table("message")->get()->count() }}</span></a></li>

              {{--  <li class="dropdown hidden-xs">
                    <!--BEGIN THEME SETTING-->
                    <a id="theme-setting" href="javascript:;"
                                                                            data-hover="dropdown" data-step="1"
                                                                            data-intro="&lt;b&gt;Header&lt;/b&gt;, &lt;b&gt;sidebar&lt;/b&gt;, &lt;b&gt;border style&lt;/b&gt; and &lt;b&gt;color&lt;/b&gt;, all of them can change for you to create the best"
                                                                            data-position="left"
                                                                            class="dropdown-toggle"><i
                            class="fa fa-cogs"></i></a>
                    <ul class="dropdown-menu dropdown-theme-setting pull-right"> <li><h4><a href="{{route("social")}}" class="mtn" style="font-size: 20px;color: white">Social Setting</a></h4></li>
                        <li><h4><a href="{{route("general")}}" class="mtn" style="font-size: 20px;color: white">General Setting</a></h4></li>
                        <li><h4><a href="{{route("language")}}" class="mtn" style="font-size: 20px;color: white">Language Setting</a></h4></li>
                        <li><h4><a href="{{route("slider")}}" class="mtn" style="font-size: 20px;color: white">Slider</a></h4></li>
                        <li><h4><a href="{{route("allUseFullPage")}}" class="mtn" style="font-size: 20px;color: white">Useful Page </a></h4></li>
                    </ul>
                    <!--END THEME SETTING-->
                </li>
--}}

            </ul>
        </div>
    </nav>
</div>
  {{--  <!--BEGIN MODAL CONFIG PORTLET-->
    <div id="modal-config" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 class="modal-title">Modal title</h4></div>
                <div class="modal-body"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend et
                        nisl eget porta. Curabitur elementum sem molestie nisl varius, eget tempus odio molestie. Nunc
                        vehicula sem arcu, eu pulvinar neque cursus ac. Aliquam ultricies lobortis magna et aliquam.
                        Vestibulum egestas eu urna sed ultricies. Nullam pulvinar dolor vitae quam dictum condimentum.
                        Integer a sodales elit, eu pulvinar leo. Nunc nec aliquam nisi, a mollis neque. Ut vel felis
                        quis tellus hendrerit placerat. Vivamus vel nisl non magna feugiat dignissim sed ut nibh. Nulla
                        elementum, est a pretium hendrerit, arcu risus luctus augue, mattis aliquet orci ligula eget
                        massa. Sed ut ultricies felis.</p></div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!--END MODAL CONFIG PORTLET--></div>--}}
