@extends("Backend.layout.master_layout")
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Employee</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href={{route("employees")}}>Employees</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">Salary List</li>
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
                            <div class="caption">Manage Salary</div>
                      </div>
                    <div class="portlet-body pan">
                        <table class="table table-hover table-striped table-bordered table-advanced tablesorter mbn" id="myTable">
                            <thead>
                            <tr>
                                <th width="3%">SL</th>
                                <th width="10%">Name</th>
                                <th width="5%">Paid Salary</th>
                                <th width="5%">Reward Salary</th>
                                <th width="5%">Deduction Salary</th>
                                <th width="5%">Status</th>
                                <th width="5%">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($salary as $row)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->amount_paid}}</td>
                                    <td>{{$row->reward_salary}}</td>
                                    <td>{{$row->deducation_salary}}</td>
                                    <td>{{$row->salary_status}}</td>
                                    <td>{{$row->date}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th width="3%">SL</th>
                                <th width="10%">Name</th>
                                <th width="5%">Paid Salary</th>
                                <th width="5%">Reward Salary</th>
                                <th width="5%">Deduction Salary</th>
                                <th width="5%">Status</th>
                                <th width="5%">Date</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("backendScript")
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

@endsection