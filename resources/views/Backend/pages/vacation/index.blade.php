@extends("Backend.layout.master_layout")
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Vacation Request</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href={{route("employees")}}>Employees</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">Vacation Request</li>
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
                            <div class="caption">Vacation Request</div>
                        </div>
                        <div class="portlet-body pan">
                            <table class="table table-hover table-striped table-bordered table-advanced tablesorter mbn">
                                <thead>
                                <tr>
                                    <th width="3%">SL</th>
                                    <th width="10%">Name</th>
                                    <th width="10%">Start Date</th>
                                    <th width="10%">End Date</th>
                                    <th width="10%">Reason</th>
                                    <th width="10%">Status</th>
                                    <th width="10%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vacation as $row)
                                    <tr>
                                        <td>{{$loop->index}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->start_date}}</td>
                                        <td>{{$row->end_date}}</td>
                                        <td>{{$row->reason}}</td>
                                        <td>
                                            @if($row->status == 0)
                                                <span class="badge badge-danger">Pending</span>
                                            @elseif($row->status == 1)
                                                <span class="badge badge-success">Accept</span>
                                            @elseif($row->status == 2)
                                                <span class="badge badge-danger">Reject</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a id="confirm"  href={{route("vacation.confirm", $row->id)}}  type="button" class="btn btn-default btn-xs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Confirm
                                            </a>

                                            <a id="reject" href={{route("vacation.reject", $row->id)}} type="button" class="btn btn-danger btn-xs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Reject
                                            </a>
                                        </td>
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
                $(document).on("click", "#confirm", function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    swal({
                            title: "Are you sure?",
                            text: "You will Confirm The Vacation!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "Yes, Confirm it!",
                            cancelButtonText: "No, cancel!",
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                swal("Deleted!", "Your Data has been deleted.", "success");
                                window.location.href = link;
                            } else {
                                swal("Cancelled", "Your Data is safe :)", "error");
                            }
                        });
                });
            </script>

            <script>
                $(document).on("click", "#reject", function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    swal({
                            title: "Are you sure?",
                            text: "You will Reject The Vacation!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "Yes, Reject it!",
                            cancelButtonText: "No, cancel!",
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                swal("Deleted!", "Your Data has been deleted.", "success");
                                window.location.href = link;
                            } else {
                                swal("Cancelled", "Your Data is safe :)", "error");
                            }
                        });
                });
            </script>
@endsection

