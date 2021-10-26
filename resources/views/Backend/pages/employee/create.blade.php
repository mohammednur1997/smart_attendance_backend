@extends("Backend.layout.master_layout")
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Employee</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href={{route("employees")}}>Employee</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">Employee Create</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
    <div class="page-content">
        <div class="row">
            @include("Backend.partial.message")
            <div class="col-lg-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">Add New Employee</div>
                    <div class="panel-body pan">
                        <form action={{route("employee.store")}} method="post" class="horizontal-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body pal">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Employee Name
                                                <span class='require'>*</span></label>
                                            <input name="name" type="text" placeholder="Employee Name" class="form-control" required/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Mobile Number
                                                <span class='require'>*</span></label>
                                            <input name="phone" type="text" placeholder="Mobile Number" class="form-control" required/>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label for="inputFirstName" class="control-label">Email
                                                <span class='require'>*</span></label>
                                            <input name="email" type="email" placeholder="Employee Email" class="form-control" required/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label for="inputFirstName" class="control-label">Job Position
                                                <span class='require'>*</span></label>
                                            <input name="job_position" type="text" placeholder="Job Position" class="form-control" required/>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group"><label>Select Day Off</label>

                                            <div class="checkbox-list">

                                                <label class="checkbox-inline">
                                                    <input style="margin-left: -10px;" name="day_off[]" type="checkbox" value="saturday"/>&nbsp;
                                                    Saturday</label>

                                                <label class="checkbox-inline">
                                                    <input style="margin-left: -10px;" name="day_off[]" type="checkbox" value="sunday"/>&nbsp;
                                                    Sunday</label>


                                                <label class="checkbox-inline">
                                                    <input style="margin-left: -10px;" name="day_off[]" type="checkbox" value="monday"/>&nbsp;
                                                    Monday</label>


                                                <label class="checkbox-inline">
                                                    <input style="margin-left: -10px;" name="day_off[]" type="checkbox" value="tuesday"/>&nbsp;
                                                    Tuesday</label>


                                                <label class="checkbox-inline">
                                                    <input style="margin-left: -10px;" name="day_off[]" type="checkbox" value="wednesday"/>&nbsp;
                                                    Wednesday </label>

                                                <label class="checkbox-inline">
                                                    <input style="margin-left: -10px;" name="day_off[]" type="checkbox" value="thursday"/>&nbsp;
                                                    Thursday</label>

                                                <label class="checkbox-inline">
                                                    <input style="margin-left: -10px;" name="day_off[]" type="checkbox" value="friday"/>&nbsp;
                                                    Friday</label>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Working Hours (Total)
                                                <span class='require'>*</span></label>
                                            <input name="work_hour" type="text" placeholder="Working Hours" class="form-control" required/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="selGender" class="control-label">Gender
                                                <span class='require'>*</span></label>
                                            <select id="gender" name="gender" class="form-control" required>
                                                <option value="0">===Select Gender===</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputBirthday" class="control-label">Start Work
                                                <span class='require'>*</span></label>
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text" name="start_work" class="timepicker-24hr form-control" id="timepicker1" required/><span
                                                    class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                            </div>
                                            {{--<input name="shift_period" type="text" placeholder="Start Work" class="form-control"/>--}}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputBirthday" class="control-label">End Work
                                                <span class='require'>*</span></label>
                                            <div class="input-group bootstrap-timepicker">
                                                <input type="text" name="end_work" class="timepicker-24hr form-control" id="timepicker2" required/><span
                                                    class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                            </div>
                                          {{--  <input name="shift_period" type="text" placeholder="End Work" class="form-control"/>--}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputBirthday" class="control-label">image(600 * 600)</label>
                                            <input name="employee_image" type="file" class="form-control" required/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Birthday</label>
                                           <input type="text" name="birthday" id="datepicker" data-date-format="dd-mm-yyyy"
                                                                         placeholder="dd/mm/yyyy"
                                                                         class="datepicker-default form-control"/>

                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Net Salary
                                                <span class='require'>*</span></label>
                                            <input name="salary" type="text" placeholder="Net Salary" class="form-control" required/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Join Date
                                                <span class='require'>*</span></label>
                                            <input type="text" name="join_date" id="datepicker2" data-date-format="dd-mm-yyyy"
                                                   placeholder="dd/mm/yyyy"
                                                   class="datepicker-default form-control"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Salary Due Date (optional)</label>
                                            <input name="salary_due" type="text" placeholder="Salary Due Date" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Password
                                                <span class='require'>*</span></label>
                                            <input name="password" type="text" placeholder="Password" class="form-control" required/>
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

            <script>
                $( function() {
                    $( "#datepicker2" ).datepicker();
                } );
            </script>

            <script>
                $( function() {
                    $( "#datepicker3" ).datepicker();
                } );
            </script>

            <script type="text/javascript">
                $('#timepicker1').timepicker();
            </script>

            <script type="text/javascript">
                $('#timepicker2').timepicker();
            </script>
@endsection

