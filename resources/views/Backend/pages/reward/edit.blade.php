@extends("Backend.layout.master_layout")
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Reward</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><a href={{route("salary")}}>Salary</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">Reward Update</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
    <div class="page-content">
        <div class="row">
            @include("Backend.partial.message")

            <div class="col-lg-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">Update Reward</div>
                    <div class="panel-body pan">
                        <form action={{route("salary.reward.update", $reward->id)}} method="post" class="horizontal-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body pal">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group has-success"><label
                                                for="title" class="control-label">Amount of Deduction
                                                <span class='require'>*</span></label>
                                            <input name="amount" type="text" value="{{ $reward->re_amount }}" class="form-control" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group has-success"><label
                                                for="title" class="control-label">Date
                                                <span class='require'>*</span></label>
                                            <input type="text" id="datepicker" value="{{ $reward->date }}" name="reward_date" data-date-format="yyyy-mm-dd"
                                                   placeholder="yyyy-mm-dd"
                                                   class="datepicker-default form-control" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description" class="control-label">Reason</label>
                                            <textarea name="reason" rows="6" class="ckeditor form-control" required>
                                                {{ $reward->reason }}
                                            </textarea>
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
        </div>
@endsection


