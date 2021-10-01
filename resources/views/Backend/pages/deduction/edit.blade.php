@extends("Backend.layout.master_layout")
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Category</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("admindeshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href={{route("admin.categories")}}>Category</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">Category Update</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
    <div class="page-content">
        <div class="row">
            @include("Backend.partial.message")

            <div class="col-lg-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">Update Category</div>
                    <div class="panel-body pan">
                        <form action={{route("admin.category.update", $categories->id)}} method="post" class="horizontal-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body pal">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group has-success"><label
                                                for="title" class="control-label">Name
                                                <span class='require'>*</span></label>
                                            <input name="name" type="text" value="{{ $categories->name }}" placeholder="Category name" class="form-control"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <img src="{{ asset('img/category/'.$categories->image) }}" width="100" alt="Card">
                                            <label for="inputBirthday" class="control-label">Category Image (Optional)(600 * 600)</label>
                                            <input name="image" type="file" class="form-control"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description" class="control-label">Description</label>
                                            <textarea name="description" rows="6" class="ckeditor form-control">
                                                {{ $categories->description }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-actions text-left pal">
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


