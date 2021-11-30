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
            <li class="active">Pay Salary</li>
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
                            <div class="caption">Employee List</div>
                        </div>
                        <div class="portlet-body pan">
                            <table class="table table-hover table-striped table-bordered table-advanced tablesorter mbn" id="myTable">
                                <thead>
                                <tr>
                                    <th width="3%">SL</th>
                                    <th width="10%">Name</th>
                                    <th width="10%">Email</th>
                                    <th width="10%">Phone</th>
                                    <th width="10%">Salary</th>
                                    <th width="10%">Job Position</th>
                                    <th width="5%">Work Hour</th>
                                    <th width="15%">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employee as $row)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->phone}}</td>
                                        <td>{{$row->salary}}</td>
                                        <td>{{$row->job_position}}</td>
                                        <td>{{$row->work_hour}}</td>
                                        <td>
                                            <a href={{route("salary.edit", $row->id)}}  type="button" class="btn btn-default btn-xs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Pay
                                            </a>

                                            <a href={{route("salary.deduction", $row->id)}} type="button" class="btn btn-danger btn-xs"><i
                                                class="fa fa-edit"></i>&nbsp;
                                            Deduct
                                            </a>

                                            <a  href={{route("salary.reward", $row->id)}} type="button" class="btn btn-info btn-xs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Reward
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th width="3%">SL</th>
                                    <th width="10%">Name</th>
                                    <th width="10%">Email</th>
                                    <th width="10%">Phone</th>
                                    <th width="10%">Salary</th>
                                    <th width="10%">Job Position</th>
                                    <th width="5%">Work Hour</th>
                                    <th width="15%">Actions</th>
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
