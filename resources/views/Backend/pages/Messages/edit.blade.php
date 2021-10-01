@extends("Backend.layout.master_layout")
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Home Component</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href={{route("home.all")}}>Home Component</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">Home Update</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
    <div class="page-content">
        <div class="row">
            @include("Backend.partial.message")
            <div class="col-lg-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">Update Home</div>
                    <div class="panel-body pan">
                        <form action={{route("home.update", $home->id)}} method="post" class="horizontal-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body pal">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Name
                                                <span class='require'>*</span></label>
                                            <input name="name" type="text" value="{{$home->name}}" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label for="inputFirstName" class="control-label">Title</label>
                                            <input name="title" type="text" value="{{$home->title}}" class="form-control"/>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label for="inputFirstName" class="control-label">Skill Video</label>
                                            <input name="skillVideo_url" type="text" value="{{$home->skillVideo_url}}" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label for="inputFirstName" class="control-label">About Video</label>
                                            <input name="aboutVideo_url" type="text" value="{{$home->aboutVideo_url}}" class="form-control"/>
                                        </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label for="inputFirstName" class="control-label">Complete Project</label>
                                            <input name="complete_project" type="text" value="{{$home->complete_project}}" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label for="inputFirstName" class="control-label">Cups Coffee</label>
                                            <input name="cups_coffee" type="text" value="{{$home->cups_coffee}}" class="form-control"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label for="inputFirstName" class="control-label">Happy Customer</label>
                                            <input name="happy_customer" type="text" value="{{$home->happy_customer}}" class="form-control"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <img src="{{ asset('image/HomeImage/'.$home->header_image) }}" alt="image" height="100px" width="100px">
                                            <label for="inputBirthday" class="control-label">Header Image(354 * 354)</label>
                                            <input name="header_image" type="file" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <img src="{{ asset('image/HomeImage/'.$home->parallel_image) }}" alt="image" height="100px" width="100px">
                                            <label for="inputBirthday" class="control-label">Parallel Image(1920 * 750)</label>
                                            <input name="parallel_image" type="file" class="form-control"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-actions text-right pal">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    &nbsp;
                                    <button type="button" class="btn btn-green">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection

