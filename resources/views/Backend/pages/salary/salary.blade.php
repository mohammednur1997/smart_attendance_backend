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
                           {{-- <div class="portlet-body pan">
                                <form role="form" action="{{ route("search.salary") }}" class="form-horizontal form-separated">
                                    @csrf
                                    <div class="form-body pdl">

                                        <div class="form-group">

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Filter By Date</label>
                                                    <input type="text" name="date" id="datepicker" data-date-format="yyyy-mm-dd"
                                                           placeholder="yyyy-mm-dd"
                                                           class="datepicker-default form-control"/>

                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-actions text-left pal">
                                                    <button type="submit"  class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>--}}
                      </div>
                    <div class="portlet-body pan">
                        <table class="table table-hover table-striped table-bordered table-advanced tablesorter mbn" id="myTable">
                            <thead>
                            <tr>
                                <th width="3%">SL</th>
                                <th width="10%">Name</th>
                                <th width="5%">Join Date</th>
                                <th width="5%">Paid Salary</th>
                                <th width="5%">Reward Salary</th>
                                <th width="5%">Deduction Salary</th>
                                <th width="5%">Status</th>
                                <th width="5%">Payment Date</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($salary as $row)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{Carbon\Carbon::parse($row->created_at)->format('d M y')}}</td>
                                    <td>{{$row->amount_paid}}</td>
                                    <td>
                                        @if($row->reward_salary == null)
                                            0
                                        @else
                                            {{$row->reward_salary}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($row->deducation_salary == null)
                                            0
                                        @else
                                        {{ $row->deducation_salary }}
                                        @endif
                                    </td>
                                    <td>{{$row->salary_status}}</td>
                                    <td>{{$row->date}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th width="3%">SL</th>
                                <th width="10%">Name</th>
                                <th width="5%">Join Date</th>
                                <th width="5%">Paid Salary</th>
                                <th width="5%">Reward Salary</th>
                                <th width="5%">Deduction Salary</th>
                                <th width="5%">Status</th>
                                <th width="5%">Payment Date</th>

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

            <script>
                $( function() {
                    $( "#datepicker" ).datepicker();
                } );
            </script>

@endsection
