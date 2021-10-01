@extends("Backend.layout.master_layout")
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Footer</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Footer</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href={{route("footer.all")}}>Footers</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">Footer</li>
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
                            <div class="caption">All Footers</div>
                        </div>
                        <div class="portlet-body pan">
                            <table class="table table-hover table-striped table-bordered table-advanced tablesorter mbn">
                                <thead>
                                <tr>
                                    <th width="3%">SL</th>
                                    <th width="10%">Email</th>
                                    <th width="10%">Mobile</th>
                                    <th width="10%">Facebook</th>
                                    <th width="10%">Youtube</th>
                                    <th width="10%">Github</th>
                                    <th width="10%">Instragram</th>
                                    <th width="10%">Footer Cradit</th>
                                    <th width="10%">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($footer as $row)
                                    <tr>
                                        <td>{{$loop->index}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->mobile}}</td>
                                        <td>{{$row->facebook_url}}</td>
                                        <td>{{$row->youtube_url}}</td>
                                        <td>{{$row->github_link}}</td>
                                        <td>{{$row->instragram_link}}</td>
                                        <td>{{$row->footer_cradits}}</td>
                                        <td>
                                            <a href={{route("footer.edit", $row->id)}}  type="button" class="btn btn-default btn-xs"><i
                                                    class="fa fa-edit"></i>&nbsp;
                                                Edit
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
