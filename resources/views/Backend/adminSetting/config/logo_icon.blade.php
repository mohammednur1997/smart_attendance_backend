

        <div class="panel-body pan">
            <form action={{route("logo")}} method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="form-body pal">
                    <div class="form-group">

                        <label for="inputName" class="col-md-3 control-label">Site Logo</label>
                        <div class="col-md-9">
                            <img src="{{asset("image/logos/".app_config('AppLogo'))}}" height="150px" width="150px" alt="">
                            <div class="input-icon right"><i class="fa fa-user"></i>
                                <input type="file"  name="logo" class="form-control"/>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputName" class="col-md-3 control-label">Favicon</label>

                        <div class="col-md-9">
                            <img src="{{asset("image/logos/".app_config('AppFav'))}}" height="150px" width="150px" alt="">
                            <div class="input-icon right"><i class="fa fa-user"></i>
                                <input type="file"  name="app_fav" class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputName" class="col-md-3 control-label">Footer Logo</label>

                        <div class="col-md-9">
                            <img src="{{asset("image/logos/".app_config('footer_logo'))}}" height="150px" width="150px" alt="">
                            <div class="input-icon right"><i class="fa fa-user"></i>
                                <input type="file"  name="footer_logo" class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputName" class="col-md-3 control-label">BreadCumb</label>

                        <div class="col-md-9">
                            <img src="{{asset("image/logos/".app_config('BreadCumb'))}}" height="150px" width="150px" alt="">
                            <div class="input-icon right"><i class="fa fa-user"></i>
                                <input type="file"  name="BreadCumb_logo" class="form-control"/>
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

