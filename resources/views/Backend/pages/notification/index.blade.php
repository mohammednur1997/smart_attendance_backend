@extends("Backend.layout.master_layout")
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Notification</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href={{route("salary")}}>Salary</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">Notification Manage</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
    <div class="page-content">
        <div class="row">
            @include("Backend.partial.message")

            <div class="col-lg-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">Notification Create</div>
                    <div class="panel-body pan">
                        <form action={{route("notification.store")}} method="post" class="horizontal-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body pal">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group has-success"><label
                                                for="title" class="control-label">Title
                                                <span class='require'>*</span></label>
                                            <input name="name" type="text"  value="Enter Title" class="form-control" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description" class="control-label">Message</label>
                                            <textarea name="amount" rows="6" class="ckeditor form-control" ></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputBirthday" class="control-label">image</label>
                                                <input name="image" type="file" class="form-control"/>
                                            </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group has-success"><label
                                                for="title" class="control-label">URl</label>
                                            <input name="name" type="text"  value="Enter The Url" class="form-control" />
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
                    <div class="panel-heading">Manage Notification</div>
                    <br>
                    <div class="panel-body pan">
                        <table class="table table-hover table-striped table-bordered table-advanced tablesorter mbn m-20" id="myTable">
                            <thead>
                            <tr>
                                <th width="3%">ID</th>
                                <th width="20%">Title</th>
                                <th width="20%">Message</th>
                                <th width="20%">Image</th>
                                <th width="20%">URL</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($notification as $row)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$row->title}}</td>
                                    <td>{!! $row->message !!}</td>
                                    <td>
                                        <img src="{{ asset('image/employee/image/'.$row->image) }}" alt="image" height="50px" width="50px">
                                    </td>
                                    <td>{{$row->url}}</td>
                                    <td>
                                        <a href={{route("notification.edit", $row->id)}}  type="button" class="btn btn-default btn-xs"><i
                                                class="fa fa-edit"></i>&nbsp;
                                            Edit
                                        </a>

                                        <a id="delete" href={{route("notification.delete", $row->id)}} type="button" class="btn btn-danger btn-xs"><i
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
                                <th width="20%">Title</th>
                                <th width="20%">Message</th>
                                <th width="20%">Image</th>
                                <th width="20%">URL</th>
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

