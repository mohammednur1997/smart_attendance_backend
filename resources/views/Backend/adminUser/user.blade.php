@extends("Backend.layout.master_layout")
@section("content")
    <!--BEGIN CONTENT-->
    <div class="page-content">
        <div class="row">
            <div class="col-md-8">
                <div class="portlet box portlet-yellow">
                    <div class="portlet-header">
                        <div class="caption">All Admin User</div>

                        <div class="tools">
                            <i class="fa fa-chevron-up"></i>
                            <i data-toggle="modal" data-target="#modal-config" class="fa fa-cog"></i>
                            <i class="fa fa-refresh"></i>
                        </div>
                        <div class="actions"><a href="{{route("admin.create")}}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>&nbsp;
                            Add New User</a>&nbsp;
                        </div>

                    </div>
                    <div class="portlet-body pan">
                        <div class="table-responsive">
                            <table id="user-last-logged-table"
                                   class="table table-striped table-hover thumb-small">
                                <thead>
                                <tr class="condensed">
                                    <th scope="col"><span class="column-sorter"></span></th>
                                    <th scope="col">User<span class="column-sorter"></span></th>
                                    <th scope="col">Username<span class="column-sorter"></span></th>
                                    <th scope="col">Active<span class="column-sorter"></span></th>
                                    <th scope="col">Roles<span class="column-sorter"></span></th>
                                    <th scope="col">Status<span class="column-sorter"></span></th>
                                    <th scope="col">Last Access<span class="column-sorter"></span></th>
                                    <th scope="col">Action<span class="column-sorter"></span></th>
                                </tr>
                                </thead>
                                <tbody class="media-thumb">
                               @foreach($admin as $row)
                                <tr>
                                    <td>
                                        <span class="img-shadow">
                                            <img src="{{ asset("assets/images/user/".$row->image) }}"
                                                 class="media-object thumb"/></span></td>
                                    <td><a href="javascript:void(0)"><h6 class="media-heading">{{ $row->first_name." ".$row->last_name }}</h6>
                                        </a>

                                        <div>{{$row->email}}</div>
                                    </td>
                                    <td>[<span>{{$row->username}}</span>]</td>
                                    <td><span>
                                            @if($row->status == 1)
                                             Yes
                                            @else
                                              No
                                            @endif
                                        </span></td>
                                    <td>
                                       @foreach($row->roles as $rol)
                                           <span class="badge badge-info mr-1">
                                               {{$rol->name}}
                                           </span>
                                        @endforeach
                                    </td>
                                    <td><span class="label label-success">online</span></td>
                                    <td>
                                        <ul class="data">
                                            <li><em>2 min 21 sec</em>ago</li>
                                            <li>IP:<strong class="user-list-ip">{{ $row->ip }}</strong></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <a href={{route("admin.edit", $row->id)}}  type="button" class="btn btn-default btn-xs"><i
                                                class="fa fa-edit"></i>&nbsp;
                                            Edit
                                        </a>

                                        <a id="delete" href={{route("admin.delete", $row->id)}} type="button" class="btn btn-danger btn-xs"><i
                                                class="fa fa-edit"></i>&nbsp;
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
            </div>
        </div>
    </div>
    <!--END CONTENT-->
@endsection
