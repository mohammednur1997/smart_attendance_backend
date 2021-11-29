@extends("Backend.layout.master_layout")
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Pay Salary</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href={{route("salary")}}>Employee List</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">Pay Salary</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
    <div class="page-content">
        <div class="row">
            @include("Backend.partial.message")
            <div class="col-lg-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">Pay Salary</div>
                    <div class="panel-body pan">
                        <form action={{route("salary.update", $employee->id)}} method="post" class="horizontal-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body pal">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Employee Name</label>
                                            <input name="name" readonly type="text" value="{{ $employee->name }}" class="form-control" required/>
                                            <input name="employee_id"  type="hidden" value="{{ $employee->id }}" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Mobile Number</label>
                                            <input name="phone" readonly type="text" value="{{ $employee->phone }}" class="form-control"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label for="inputFirstName" class="control-label">Email</label>
                                            <input name="email" readonly type="text" value="{{ $employee->email }}" class="form-control" required/>
                                        </div>
                                    </div>



                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label for="inputFirstName" class="control-label">Job Position</label>
                                            <input name="job_position" readonly type="text" value="{{ $employee->job_position }}" class="form-control" required/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Weekly Off Day</label>
                                            <input name="day_off" readonly type="text" value="{{ $employee->day_off }}" class="form-control"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Working Hours</label>
                                            <input name="work_hour" readonly type="text" value="{{ $employee->work_hour }}" class="form-control" required/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Salary Due Date</label>
                                            <input name="work_hour" readonly type="text" value="25th" class="form-control" required/>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="salary" class="control-label">Salary Per Month</label>
                                            <input name="salary" readonly type="text" value="{{ $employee->salary }}" class="form-control" required/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Present Day
                                                <span class='require'>*</span></label>
                                            <input name="present" type="text" value="{{ $present }}" class="form-control" readonly/>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Absence Day
                                                <span class='require'>*</span></label>
                                            <input name="absence" type="text" value="{{ $absence }}" class="form-control" readonly/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Reward
                                                <span class='require'>*</span></label>
                                            <input name="reward" type="text" value="{{ $reward }}" class="form-control" readonly/>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Deduction
                                                <span class='require'>*</span></label>
                                            <input name="deduction" type="text" value="{{ $deduction }}" class="form-control" readonly/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Amount Paid
                                                <span class='require'>*</span></label>
                                            <input name="paid" type="text" value="" class="form-control" required/>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Calculate Salary
                                                <span class='require'>(Based On Attendance/Absence)</span></label>
                                            <input name="salary_amount" type="text" value="{{ $round_total }}" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Paid At (Default date Today)
                                                <span class='require'>*</span></label>
                                            <input type="text" id="datepicker" name="date" value="{{ \Carbon\Carbon::now()->toDateString() }}" data-date-format="yyyy-mm-dd"
                                                   placeholder="yyyy-mm-dd"
                                                   class="datepicker-default form-control" required/>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-actions text-left pal">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
        @section("backendScript")
            <script>
                $( function() {
                    $( "#datepicker" ).datepicker();
                } );
            </script>
@endsection

