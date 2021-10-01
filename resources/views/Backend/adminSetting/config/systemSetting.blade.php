

<div class="panel-body pan">
    <form action={{route("system")}} method="post" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="form-body pal">

            <div class="form-group">
                <label for="inputName" class="col-md-3 control-label">Site Name</label>
                <div class="col-md-9">
                    <div class="input-icon right"><i class="fa fa-user"></i>
                        <input  type="text" placeholder="Enter site Name" value="{{app_config('AppName')}}" name="app_name" class="form-control"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="col-md-3 control-label">Site Title</label>
                <div class="col-md-9">
                    <div class="input-icon right"><i class="fa fa-user"></i>
                        <input  type="text" placeholder="Enter Site Title" value="{{app_config('AppTitle')}}" name="app_title" class="form-control"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="col-md-3 control-label">Mobile</label>
                <div class="col-md-9">
                    <div class="input-icon right"><i class="fa fa-user"></i>
                        <input  type="text" placeholder="Enter Mobile number" value="{{app_config('mobile')}}" name="mobile" class="form-control"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="col-md-3 control-label">Email</label>
                <div class="col-md-9">
                    <div class="input-icon right"><i class="fa fa-user"></i>
                        <input  type="text" placeholder="Enter Email Address" value="{{app_config('email')}}" name="email" class="form-control"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="col-md-3 control-label">Address</label>
                <div class="col-md-9">
                    <div class="input-icon right"><i class="fa fa-user"></i>
                        <input  type="text" placeholder="Enter Address" value="{{app_config('address')}}" name="address" class="form-control"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="col-md-3 control-label">Footer</label>
                <div class="col-md-9">
                    <div class="input-icon right"><i class="fa fa-user"></i>
                        <textarea name="FooterTxt" rows="4" class="ckeditor form-control">{{app_config('FooterTxt')}}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="col-md-3 control-label">About Footer</label>
                <div class="col-md-9">
                    <div class="input-icon right"><i class="fa fa-user"></i>
                        <textarea name="about_footer" rows="4" class="ckeditor form-control">{{app_config('about_footer')}}</textarea>
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

