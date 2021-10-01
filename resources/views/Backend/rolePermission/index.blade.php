@extends("Backend.layout.master_layout")
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Role</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href={{route("role.all")}}>Role Management</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">Role</li>
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
                            <div class="caption">All Role</div>
                            <div class="actions"><a href={{route("role.create")}} class="btn btn-info btn-sm"><i
                                    class="fa fa-plus"></i>&nbsp;
                                Add Role & Permission</a>&nbsp;
                            </div>
                        </div>
                        <div class="portlet-body pan">
                            <table class="table table-hover table-striped table-bordered table-advanced tablesorter mbn">
                                <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="10%">Name</th>
                                    <th width="70%">Permission</th>
                                    <th width="10%">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $row)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>
                                            @foreach($row->permissions as $per)
                                                <span class="badge badge-info">
                                                    {{$per->name}}
                                                </span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if(Auth::guard("admin")->user()->can("role.edit"))
                                            <a href={{route("role.edit", $row->id)}}  type="button" class="btn btn-default btn-xs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
                                            </a>
                                            @endif

                                            @if(Auth::guard("admin")->user()->can("role.delete"))
                                            <a id="delete" href={{route("role.delete", $row->id)}} type="button" class="btn btn-danger btn-xs"><i
                                                    class="fa fa-trash"></i>&nbsp;
                                                Delete
                                            </a>
                                                @endif

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
