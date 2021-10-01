@extends("Backend.layout.master_layout")
@section("content")
    <!--BEGIN CONTENT-->
    <div class="page-content">
        <div class="mtl mbl"></div>
        <div class="row">
            <div class="col-sm-3 col-md-2"><a href={{route("mail.compose")}} role="button" class="btn btn-danger btn-sm btn-block">COMPOSE</a>

                <div class="mtm mbm"></div>
                <div class="panel">
                    <div class="panel-body pan">
                        <ul style="background: #fff" class="nav nav-pills nav-stacked">
                            <li class="active"><a href="{{ route("mail") }}"><span class="badge pull-right">{{ DB::table("message")->get()->count() }}</span><i
                                        class="fa fa-inbox fa-fw mrs"></i>Inbox</a></li>
                            <li><a href="#"><i class="fa fa-star-o fa-fw mrs"></i>Starred</a></li>
                            <li><a href="#"><i class="fa fa-info-circle fa-fw mrs"></i>Important</a></li>
                            <li><a href="#"><i class="fa fa-plane fa-fw mrs"></i>Sent Mail</a></li>
                            <li><a href="#"><span class="badge badge-orange pull-right">3</span><i
                                        class="fa fa-edit fa-fw mrs"></i>Drafts</a></li>
                        </ul>
                    </div>
                </div>
                <hr/>
                <div class="panel">
                    <div class="panel-body pan">
                        <ul style="background: #fff" class="nav nav-pills nav-stacked">
                            <li class="active"><a href="#">Buddy Online</a></li>
                            <li><a href="#"><i class="fa fa-circle text-yellow pull-right"></i>Home</a></li>
                            <li><a href="#"><i class="fa fa-circle text-success pull-right"></i>Work</a></li>
                            <li><a href="#"><i class="fa fa-circle text-red pull-right"></i>Family</a></li>
                            <li><a href="#"><i class="fa fa-circle text-muted pull-right"></i>Other</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-md-10">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab"><span
                                class="glyphicon glyphicon-inbox"></span>&nbsp;
                            Primary</a></li>
                </ul>
                <div class="tab-content">

                    <div id="home" class="tab-pane fade in active">
                        <div class="list-group mail-box">


                            @foreach($Allmail as $mail)
                            <a href="#" class="list-group-item"><input
                                    type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                    style="min-width: 120px; display: inline-block;"
                                    class="name">{{ $mail->name }}</span><span>{{ $mail->email }}</span>&nbsp; -
                                &nbsp;<span style="font-size: 11px;" class="text-muted">{{ $mail->message }}</span><span

                                    class="time-badge">12:10 AM</span><span class="pull-right mrl"><span

                                        class="glyphicon glyphicon-paperclip"></span></span>
                            </a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END CONTENT-->
@endsection
