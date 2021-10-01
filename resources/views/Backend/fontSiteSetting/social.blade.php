@extends("Backend.layout.master_layout")
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Social</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href={{route("social")}}>Social</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">Social</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
    <div class="page-content">
        <div id="table-panel-tab" class="tab-pane">
            <div class="row">
                @include("Backend.partial.message")
                <div class="col-lg-6">
                    <div class="portlet portlet-white">
                        <div class="portlet-header pam mbn">
                            <div class="caption">All Social Icon</div>
                        </div>
                        <div class="portlet-body pan">
                            <table class="table table-hover table-striped table-bordered table-advanced tablesorter mbn">
                                <thead>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th width="15%">Icon</th>
                                    <th width="15%">Url</th>
                                    <th width="15%">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($social as $row)
                                    <tr>
                                        <td>{{$loop->index}}</td>
                                        <td>{{$row->icon}}</td>
                                        <td>{{$row->link}}</td>
                                        <td>
                                            <a id="delete" href="{{route("delete.social", $row->id)}}" class="btn btn-danger btn-xs"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="panel panel-white">
                        <div class="panel-heading">Add Social Icon</div>
                        <div class="panel-body pan">
                            <form action={{route("add.social")}} method="post" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body pal">

                                    <div class="form-group">
                                        <label for="inputName" class="col-md-3 control-label">Social Icon Name
                                        </label>


                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <span class='require'>Example: facebook, twitter</span>
                                                <input type="text" placeholder="Enter Icon Name" name="social_icon" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-md-3 control-label">Color</label>

                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <input  type="color" name="color" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName" class="col-md-3 control-label">Social Icon Link</label>

                                        <div class="col-md-9">
                                            <div class="input-icon right">
                                                <input type="text" placeholder="Enter Social Link" name="social_url" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-actions">
                                    <div class="form-group mbn">
                                        <div class="col-md-offset-3 col-md-6">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
@endsection
