@extends("Backend.layout.master_layout")
@section("content")
    <script src={{asset("assets/js/jquery-1.10.2.min.js")}}></script>
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">FontSite</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Slider Create</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
    <div class="page-content">
        <div class="row">
            @include("Backend.partial.message")
            <div class="col-lg-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">Add New Slider</div>
                    <div class="panel-body pan">
                        <form action={{route("add.slider")}} method="post" class="horizontal-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body pal">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Bold Text
                                                <span class='require'>*</span></label>
                                            <input name="b_text" type="text" placeholder="Enter Bold Text" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Mid Text
                                                <span class='require'>*</span></label>
                                            <input name="m_text" type="text" placeholder="Enter Middle Text" class="form-control"/>
                                        </div>
                                    </div>
                                   </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label for="inputFirstName" class="control-label">Small Text</label>
                                            <span class='require'>*</span></label>
                                            <input name="s_text" type="text" placeholder="Enter Small Text" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Image
                                                <span class='require'>*</span></label>
                                            <input name="image" type="file" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions text-right pal">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                &nbsp;
                                <button type="button" class="btn btn-green">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="page-pricing" class="row">
            <div class="col-md-12">
                <h2>All Slider</h2>
                <div class="row row-merge">
                    @foreach($slider as $row)
                    <div class="col-md-3 col-sm-6">
                        <div class="pricing-widget active">
                            <div class="pricing-body">
                                    <img src="{{asset("image/slider/".$row->image)}}" width="100%" height="400px" alt="">
                                <ul class="pricing-list text-center">
                                    <li>Bold Text <strong>{{$row->bold_text}}</strong></li>
                                    <li>Middle Text <strong>{{$row->middle_text}}</strong></li>
                                    <li>Small Text <strong>{{$row->small_text}}</strong></li>
                                    <li class="text-center"><button data-target="#modal-default{{$row->id}}" data-toggle="modal" class="btn btn-success">Edit</button> <a id="delete" href="{{route("delete.slider", $row->id)}}" class="btn btn-danger">Delete</a></li>
                                </ul>
                            </div>
                        </div>

                        <!--Modal Default-->
                        <div id="modal-default{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default-label"
                             aria-hidden="true" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                                class="close">&times;</button>
                                        <h4 id="modal-default-label" class="modal-title">Edit Slider</h4></div>
                                    <form action={{route("update.slider", $row->id)}} method="post" class="form-horizontal" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body pal">

                                            <div class="form-group">
                                                <label for="inputName" class="col-md-3 control-label">Bold Text</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right" style="margin-left: 10px">
                                                        <input  value="{{$row->bold_text}}" type="text"  name="b_text" class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputName" class="col-md-3 control-label">Middle Text</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right" style="margin-left: 10px">
                                                        <input  value="{{$row->middle_text}}" type="text"  name="m_text" class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputName" class="col-md-3 control-label">Small Text</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right" style="margin-left: 10px">
                                                        <input  value="{{$row->small_text}}" type="text"  name="s_text" class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="inputName" class="col-md-3 control-label">Image</label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right" style="margin-left: 10px">
                                                        <img src={{asset("image/slider/".$row->image)}} height="150px" width="150px" alt="">
                                                        <input  type="file"  name="image" class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>

@endsection

