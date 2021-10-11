@extends("Backend.layout.master_layout")
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Record</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href={{route("employees")}}>Employees</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">Employees Record</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
    <div class="page-content">

        <div id="table-panel-tab" class="tab-pane">
            <div class="row">
                <div class="col-lg-12">
                    <div class="portlet portlet-white">
                        <div class="portlet-header pam mbn">
                            <div class="caption">Employees Record</div>
                        </div>
                        <div id="tab-general mt-2">
                            <div id="sum_box" class="row mbl">

                                <div class="col-sm-6 col-md-3">
                                    <div class="panel profit db mtm">
                                        <div class="panel-body"><p class="icon"><i class="icon fa fa-shopping-cart"></i></p>
                                            <h4 class="value"><span>20</span><span></span></h4>
                                            <p class="description">Net Salary</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                    <div class="panel profit db mtm">
                                        <div class="panel-body"><p class="icon"><i class="icon fa fa-shopping-cart"></i></p>
                                            <h4 class="value"><span>20</span><span></span></h4>

                                            <p class="description">Gross Salary</p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                    <div class="panel profit db mtm">
                                        <div class="panel-body"><p class="icon"><i class="icon fa fa-shopping-cart"></i></p>
                                            <h4 class="value"><span>20</span><span></span></h4>

                                            <p class="description">Deduction</p>


                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3">
                                    <div class="panel profit db mtm mt-5">
                                        <div class="panel-body"><p class="icon"><i class="icon fa fa-shopping-cart"></i></p>
                                            <h4 class="value"><span>Paid</span><span></span></h4>
                                            <p class="description">Salary Status</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="portlet-body pan">
                            <table class="table table-hover table-striped table-bordered table-advanced tablesorter mbn">
                                <thead>
                                <tr>
                                    <th width="3%">SL</th>
                                    <th width="10%">Name</th>
                                    {{--<th width="10%">Net Salary</th>
                                    <th width="10%">Gross Salary</th>
                                    <th width="10%">Deduction</th>
                                    <th width="10%" >Salary Status</th>--}}
                                    <th width="10%">Status</th>
                                    <th width="10%">Late employee</th>
                                    <th width="10%">Check In</th>
                                    <th width="10%">Check Out</th>
                                    <th width="10%">Day</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($record as $row)
                                    <tr>
                                        <td>{{$loop->index}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->status}}</td>
                                        <td>{{ $row->date."-".$row->in_time  }}</td>
                                        <td>{{ $row->date."-".$row->out_time  }}</td>
                                        <td>{{$row->day}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
