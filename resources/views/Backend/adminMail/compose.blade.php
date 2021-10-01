@extends("Backend.layout.master_layout")
@section("content")
    <!--BEGIN CONTENT-->
    <div class="page-content">
        <div class="mtl mbl"></div>
        <div class="row">
            <div class="col-sm-3 col-md-2"><a href="#" role="button" class="btn btn-danger btn-sm btn-block">COMPOSE</a>

                <div class="mtm mbm"></div>
                <ul style="background: #fff" class="nav nav-pills nav-stacked">
                    <li class="active"><a href="{{ route("mail") }}"><span class="badge pull-right">{{ DB::table("message")->get()->count() }}</span><i
                                class="fa fa-inbox fa-fw mrs"></i>Inbox</a></li>
                    <li><a href="#"><i class="fa fa-star-o fa-fw mrs"></i>Starred</a></li>
                    <li><a href="#"><i class="fa fa-info-circle fa-fw mrs"></i>Important</a></li>
                    <li><a href="#"><i class="fa fa-plane fa-fw mrs"></i>Sent Mail</a></li>
                    <li><a href="#"><span class="badge badge-orange pull-right">3</span><i
                                class="fa fa-edit fa-fw mrs"></i>Drafts</a></li>
                </ul>
                <hr/>
                <ul style="background: #fff" class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#">Buddy Online</a></li>
                    <li><a href="#"><i class="fa fa-circle text-yellow pull-right"></i>Home</a></li>
                    <li><a href="#"><i class="fa fa-circle text-success pull-right"></i>Work</a></li>
                    <li><a href="#"><i class="fa fa-circle text-red pull-right"></i>Family</a></li>
                    <li><a href="#"><i class="fa fa-circle text-muted pull-right"></i>Other</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-md-10">
                <div class="compose-mail">
                    <div class="portlet box portlet-white">
                        <div class="portlet-header">
                            <div class="caption">Compose Mail</div>
                            <div class="tools"><a
                                    onclick="$(this).hide(); $('#cc').parent().parent().removeClass('hidden'); $('#cc').focus();"
                                    href="javascript:;" class="mrm">Cc</a><a
                                    onclick="$(this).hide(); $('#bcc').parent().parent().removeClass('hidden'); $('#bcc').focus();"
                                    href="javascript:;">Bcc</a></div>
                        </div>
                        <div class="portlet-body">
                            <form action="{{ route("mail.compose.send") }}" enctype="multipart/form-data" role="form-horizontal" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group"><span class="input-group-addon">To:</span>
                                        <input id="to" type="text" placeholder="" name="to" class="form-control"/></div>
                                </div>
                                <div class="form-group hidden">
                                    <div class="input-group"><span class="input-group-addon">Cc:</span><input
                                            id="cc" type="text" placeholder="" class="form-control"/></div>
                                </div>
                                <div class="form-group hidden">
                                    <div class="input-group"><span class="input-group-addon">Bcc:</span><input
                                            id="bcc" type="text" placeholder="" class="form-control"/></div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group"><span
                                            class="input-group-addon">Subject:</span>
                                        <input id="subject" type="text" placeholder="" name="subject" class="form-control"/>
                                    </div>
                                </div>
                                <div class="compose-editor mbl">
                                    <textarea rows="6" name="message" class="wysihtml5 form-control"></textarea>
                                </div>
                                <div class="form-group"><input type="file"/>

                                    <p class="help-block"><i class="fa fa-paperclip"></i>&nbsp;
                                        Attachments</p></div>
                                <hr/>
                                <div class="compose-btn">
                                    <button class="btn btn-sm btn-primary"><i class="fa fa-check"></i>&nbsp;
                                        Send
                                    </button>
                                    &nbsp;
                                    <button class="btn btn-default btn-sm"><i class="fa fa-times"></i>&nbsp;
                                        Discard
                                    </button>
                                    &nbsp;
                                    <button class="btn btn-sm btn-default">Draft</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END CONTENT-->
@endsection
