@extends("Backend.layout.master_layout")
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Reports</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href={{route("employees")}}>Employees</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">Employees Reports</li>
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
                            <div class="caption">Employees Reports</div>

                                <div class="portlet-body pan">
                                <form role="form" class="form-horizontal form-separated">
                                    <div class="form-body pdl">

                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label class="col-md-3 control-label">Date</label>
                                                <div class="btn btn-blue reportrange"><i class="fa fa-calendar"></i>&nbsp;<span></span>&nbsp;report&nbsp;<i
                                                        class="fa fa-angle-down"></i>
                                                    <input type="hidden"name="datestart"/>
                                                    <input type="hidden" name="endstart"/>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="selGender" class="control-label">Late comers </label>
                                                <select id="gender" name="gender" class="form-control">
                                                    <option value="0">Late</option>
                                                    <option value="1">In Time</option>
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="selGender" class="control-label">Attendees</label>
                                                <select id="gender" name="gender" class="form-control">
                                                    <option value="0">Present</option>
                                                    <option value="1">Absence</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                   </form>
                                </div>

                        </div>
                        <div class="portlet-body pan">
                            <table class="table table-hover table-striped table-bordered table-advanced tablesorter mbn">
                                <thead>
                                <tr>
                                    <th width="3%">SL</th>
                                    <th width="10%">Name</th>
                                    <th width="10%">Net Salary</th>
                                    <th width="10%">Gross Salary</th>
                                    <th width="10%">Late comers</th>
                                    <th width="10%">Deduction</th>
                                    <th width="10%">Salary Status</th>
                                    <th width="10%">Status</th>
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
                                        <td>{{$row->salary}}</td>
                                        <td>{{$row->salary}}</td>
                                        <td>
                                            @if($row->late == 0)
                                                <span class="badge badge-danger">Late</span>
                                            @else
                                                <span class="badge badge-info">in Time</span>
                                            @endif

                                        </td>
                                        <td>{{$row->amount}}</td>
                                        <td>{{$row->salary_status}}</td>
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
@section("backendScript")
            <script>
                $('input[name="daterangepicker-default"]').daterangepicker(
                    {
                        format: 'YYYY-MM-DD',
                        startDate: '2013-01-01',
                        endDate: '2013-12-31'
                    },
                    function(start, end, label) {
                        alert('A date range was chosen: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                    }
                );
            </script>
@endsection
