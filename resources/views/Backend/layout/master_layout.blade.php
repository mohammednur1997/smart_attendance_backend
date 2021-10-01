
@include("Backend.partial.style")<!--All Css File here-->

<!--BEGIN TOPBAR-->
@include("Backend.partial.topNav")
<!--END TOPBAR-->

<div id="wrapper">

    <!--BEGIN SIDEBAR MENU-->
    @include("Backend.partial.sideBar")
  <!--Finish SIDEBAR MENU-->

        <div id="page-wrapper"><!--BEGIN TITLE & BREADCRUMB PAGE-->
            @yield("content")<!--All Content File here-->
        </div>

 </div>
<!--BEGIN FOOTER-->
<div id="footer">
    <div class="copyright">2021 © Mohammed Nur</div>
</div>
<!--END FOOTER-->


@include("Backend.partial.script")<!--All Js File here-->
