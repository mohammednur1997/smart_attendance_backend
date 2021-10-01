@extends("Backend.layout.master_layout")
@section('title', 'Usefull Page')
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Usefull Page</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href={{route("allUseFullPage")}}>General Setting</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">Usefull Page</li>
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
                        <li class="active"><a href="#about" data-toggle="tab">About Page</a></li>
                        <li><a href="#privacy" data-toggle="tab">Privacy Policy</a></li>
                        <li><a href="#disclaimer" data-toggle="tab">Disclaimer</a></li>
                        <li><a href="#terms" data-toggle="tab">Terms Of Use</a></li>
                    </ul>
                    <div id="myTabContent2" class="tab-content">

                        <div id="about" class="tab-pane fade in active">
                            @include("Backend.adminSetting.config.about")
                        </div>

                        <div id="privacy" class="tab-pane fade">
                            @include("Backend.adminSetting.config.privacy")
                        </div>

                        <div id="disclaimer" class="tab-pane fade">
                            @include("Backend.adminSetting.config.disclaimer")
                        </div>

                        <div id="terms" class="tab-pane fade">
                            @include("Backend.adminSetting.config.terms")
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection
