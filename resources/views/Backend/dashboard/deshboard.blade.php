@extends("Backend.layout.master_layout")
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Dashboard</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href={{route("deshboard")}}>Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">Dashboard</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
    <div class="page-content">

<div id="tab-general">
    <div id="sum_box" class="row mbl">

        <div class="col-sm-6 col-md-3">
            <div class="panel profit db mbm">
                <div class="panel-body"><p class="icon"><i class="icon fa fa-user"></i></p>
                    <h4 class="value"><span>{{ $total_employee }}</span><span></span></h4>

                    <p class="description">Total Employee</p>

                    <div class="progress progress-sm mbn">
                        <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                             style="width: 80%;" class="progress-bar progress-bar-success"><span
                                class="sr-only">80% Complete (success)</span></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="panel income db mbm">
                <div class="panel-body"><p class="icon"><i class="icon fa fa-pause"></i></p>
                    <h4
                        class="value"><span>{{ $vacation }}</span><span></span></h4>

                    <p class="description">Vacation Request</p>

                    <div class="progress progress-sm mbn">
                        <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                             style="width: 60%;" class="progress-bar progress-bar-info"><span
                                class="sr-only">60% Complete (success)</span></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="panel task db mbm">
                <div class="panel-body"><p class="icon"><i class="icon fa fa-cut"></i></p>
                    <h4 class="value"><span>{{ $deduction }}</span></h4>

                    <p class="description">Total Deduction</p>

                    <div class="progress progress-sm mbn">
                        <div role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                             style="width: 50%;" class="progress-bar progress-bar-danger"><span
                                class="sr-only">50% Complete (success)</span></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="panel visit db mbm">
                <div class="panel-body"><p class="icon"><i class="icon fa fa-plus"></i></p><h4
                        class="value"><span>{{ $reward }}</span></h4>

                    <p class="description">Total Reward</p>

                    <div class="progress progress-sm mbn">
                        <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                             style="width: 70%;" class="progress-bar progress-bar-warning"><span
                                class="sr-only">70% Complete (success)</span></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
