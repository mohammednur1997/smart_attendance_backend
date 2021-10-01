

<div class="panel-body pan">
    <form action={{route("update.useFullPage")}} method="post" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="form-body pal">

            <div class="form-group">
                <label for="inputName" class="col-md-3 control-label">Disclaimer</label>
                <div class="col-md-9">
                    <div class="input-icon right"><i class="fa fa-user"></i>
                        <textarea name="disclaimer" rows="8" class="ckeditor form-control">{{app_config('disclaimer')}}</textarea>
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

