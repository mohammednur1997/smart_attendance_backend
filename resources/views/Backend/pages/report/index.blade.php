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
                                <form role="form" action="{{ route("search") }}" class="form-horizontal form-separated" method="post">
                                    @csrf
                                    <div class="form-body pdl">

                                        <div class="form-group">

                                            <div class="col-md-3">
                                                <label for="selGender" class="control-label">Late comers </label>
                                                <select id="late" name="late" class="form-control">
                                                    <option value="yes">Late</option>
                                                    <option value="no">In Time</option>
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="selGender" class="control-label">Attendance</label>
                                                <select id="attendance" name="attendance" class="form-control">
                                                    <option value="present">Present</option>
                                                    <option value="absence">Absence</option>
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="date" class="control-label">Date</label>
                                                <select id="date" name="date" class="form-control">
                                                    <option value="20/15/2021">Today</option>
                                                    <option value="20/15/2021">This Week</option>
                                                    <option value="20/15/2021">This Month</option>
                                                    <option value="20/15/2021">This Year</option>
                                                </select>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-actions text-left pal">
                                                    <button type="submit"  class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="portlet-body pan">
                            <table class="text-center table table-hover table-striped table-bordered table-advanced tablesorter mbn" id="myTable">
                                <thead class="text-center">
                                <tr>
                                    <th width="3%" class="text-center">SL</th>
                                    <th width="15%" class="text-center">Name</th>
                                    <th width="15%" class="text-center">Late comers</th>
                                    <th width="15%" class="text-center">Attendance</th>
                                    <th width="10%" class="text-center">Total Work</th>
                                    <th width="10%" class="text-center">Check In</th>
                                    <th width="10%" class="text-center">Check Out</th>
                                    <th width="10%" class="text-center">Day</th>
                                    <th width="15%" class="text-center">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($record as $row)
                                    <tr>
                                        <td>{{$loop->index}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>
                                            @if($row->late == "yes")
                                                <span class="badge badge-danger">Late</span>
                                            @else
                                                <span class="badge badge-info">in Time</span>
                                            @endif

                                        </td>

                                        <td>
                                            @if($row->present_status == "present")
                                                <span class="badge badge-info">Present</span>
                                            @else
                                                <span class="badge badge-danger">Absence</span>
                                            @endif
                                        </td>
                                        <td>{{$row->total_hours}}</td>
                                        <td>
                                            @if($row->in_time == null)
                                                <span class="badge badge-danger">take Leave</span>
                                            @else
                                                {{ $row->in_time }}
                                            @endif
                                        </td>

                                        <td>
                                            @if($row->out_time == null)
                                                <span class="badge badge-danger">forget to Exist</span>
                                            @else
                                                {{ $row->out_time }}
                                            @endif

                                        </td>

                                        <td>{{ $row->day }}</td>
                                        <td>{{ $row->date }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfooter>
                                    <tr>
                                        <th width="3%" class="text-center">SL</th>
                                        <th width="15%" class="text-center">Name</th>
                                        <th width="15%" class="text-center">Late comers</th>
                                        <th width="15%" class="text-center">Attendance</th>
                                        <th width="10%" class="text-center">Total Work</th>
                                        <th width="10%" class="text-center">Check In</th>
                                        <th width="10%" class="text-center">Check Out</th>
                                        <th width="10%" class="text-center">Day</th>
                                        <th width="15%" class="text-center">Date</th>
                                    </tr>
                                </tfooter>
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


