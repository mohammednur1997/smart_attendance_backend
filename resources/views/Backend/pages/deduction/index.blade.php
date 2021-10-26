@extends("Backend.layout.master_layout")
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Deduction</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href={{route("salary")}}>Salary</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">Deduction Manage</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
    <div class="page-content">
        <div class="row">
            @include("Backend.partial.message")

            <div class="col-lg-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">Deduction Employee</div>
                    <div class="panel-body pan">
                        <form action={{route("salary.deduction.store")}} method="post" class="horizontal-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body pal">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group has-success"><label
                                                for="title" class="control-label">Employee Name
                                                <span class='require'>*</span></label>
                                            <input name="name" type="text" readonly value={{ $employee->name }} class="form-control" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group has-success"><label
                                                for="title" class="control-label">Amount of Deduction
                                                <span class='require'>*</span></label>
                                            <input name="amount" type="text" placeholder="Enter amount of deduction" class="form-control" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group has-success"><label
                                                for="title" class="control-label">Date
                                                <span class='require'>*</span></label>
                                            <input type="text" id="datepicker" name="deduction_date" data-date-format="yyyy-mm-dd"
                                                   placeholder="yyyy-mm-dd"
                                                   class="datepicker-default form-control" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description" class="control-label">Reason</label>
                                            <textarea name="amount" rows="6" class="ckeditor form-control" required></textarea>
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

            <div class="col-lg-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">Manage Deduction</div>
                    <br>
                    <div class="panel-body pan">
                        <table class="table table-hover table-striped table-bordered table-advanced tablesorter mbn m-20" id="myTable">
                            <thead>
                            <tr>
                                <th width="3%">ID</th>
                                <th width="20%">Name</th>
                                <th width="20%">Amount</th>
                                <th width="20%">Reason</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deduction as $row)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->dd_amount}}</td>
                                    <td>{!! $row->reason !!}</td>
                                    <td>
                                        <a href={{route("salary.deduction.edit", $row->id)}}  type="button" class="btn btn-default btn-xs"><i
                                                class="fa fa-edit"></i>&nbsp;
                                            Edit
                                        </a>

                                        <a id="delete" href={{route("salary.deduction.delete", $row->id)}} type="button" class="btn btn-danger btn-xs"><i
                                                class="fa fa-edit"></i>&nbsp;
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>

                            <tr>
                                <th width="3%">ID</th>
                                <th width="20%">Name</th>
                                <th width="20%">Amount</th>
                                <th width="20%">Reason</th>
                                <th width="15%">Action</th>
                            </tr>

                            </tfoot>
                        </table>
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

