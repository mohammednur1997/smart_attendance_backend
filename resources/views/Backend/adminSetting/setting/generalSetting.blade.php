@extends("Backend.layout.master_layout")
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">General</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href={{route("general")}}>General Setting</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">General Setting</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
    <div class="page-content">
        <div class="row">
            @include("Backend.partial.message")
        <div class="col-lg-8">
            <h3>General Setting</h3>
            <div class="tabbable tabs-left">
                <ul id="myTab2" class="nav nav-tabs">
                    <li class="active"><a href="#Logo" data-toggle="tab">Logo And Icon</a></li>
                    <li><a href="#System" data-toggle="tab">System Setting</a></li>
                    <li><a href="#Localization" data-toggle="tab">Localization</a></li>
                    <li><a href="#Email" data-toggle="tab">Email Setting</a></li>
                </ul>
                <div id="myTabContent2" class="tab-content">

                    <div id="Logo" class="tab-pane fade in active">
                    @include("Backend.adminSetting.config.logo_icon")
                    </div>

                    <div id="System" class="tab-pane fade">
                        @include("Backend.adminSetting.config.systemSetting")
                    </div>

                    <div id="Localization" class="tab-pane fade">
                        @include("Backend.adminSetting.config.localization")
                    </div>

                    <div id="Email" class="tab-pane fade">
                        @include("Backend.adminSetting.config.email")
                    </div>

                </div>
            </div>
        </div>
        </div>

@endsection
