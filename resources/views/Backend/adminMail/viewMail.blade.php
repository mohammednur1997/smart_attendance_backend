@extends("Backend.layout.master_layout")
@section("content")
<!--BEGIN CONTENT-->
<div class="page-content">
    <div class="row">
        <div class="col-sm-3 col-md-2">
            <div class="btn-group btn-group-sm">
                <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Mail
                    &nbsp;<span class="caret"></span></button>
                <ul role="menu" class="dropdown-menu">
                    <li><a href="#">Mail</a></li>
                    <li><a href="#">Contacts</a></li>
                    <li><a href="#">Tasks</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-9 col-md-10"></div>
    </div>
    <div class="mtl mbl"></div>
    <div class="row">
        <div class="col-sm-3 col-md-2"><a href="#" role="button" class="btn btn-danger btn-sm btn-block">COMPOSE</a>

            <div class="mtm mbm"></div>
            <ul style="background: #fff" class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><span class="badge pull-right">42</span><i
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
                        <div class="caption">Excepteur sint occaecat cupidatat non proident</div>
                        <div class="tools"><a href="#" class="btn btn-default btn-xs"><i
                                    class="fa fa-mail-reply mln"></i>&nbsp;
                                Reply</a>&nbsp;<a href="#" data-hover="tooltip" title="Print"
                                                  class="btn btn-default btn-xs"><i class="fa fa-print mln"></i></a>&nbsp;<a
                                href="#" data-hover="tooltip" title="Trash"
                                class="btn btn-default btn-xs"><i class="fa fa-trash-o mln"></i></a></div>
                    </div>
                    <div class="portlet-body">
                        <div class="mail-content">
                            <div class="mail-sender">
                                <div class="row">
                                    <div class="col-md-8"><img
                                            src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/48.jpg"
                                            alt="" width="30px" class="img-circle mrm"/><strong>John
                                            Doe</strong> <span>[example@gmail.com]</span>&nbsp;
                                        to
                                        &nbsp;<strong>me</strong></div>
                                    <div class="col-md-4"><p class="date"> 4:15AM 04 April 2014</p></div>
                                </div>
                            </div>
                            <div class="mail-view"><p>Donec ultrices faucibus rutrum. Phasellus sodales
                                    vulputate urna, vel accumsan augue egestas ac. Donec vitae leo at sem
                                    lobortis porttitor eu consequat risus. <a href='#'>Mauris sed congue</a>
                                    orci. Donec ultrices faucibus rutrum. Phasellus sodales vulputate urna, vel
                                    accumsan augue egestas ac. Donec vitae leo at sem lobortis porttitor eu
                                    consequat risus. Mauris sed congue orci. Donec ultrices faucibus rutrum.
                                    Phasellus sodales vulputate urna, vel accumsan augue egestas ac. Donec vitae
                                    leo at sem lobortis porttitor eu consequat risus. Mauris sed congue orci.
                                </p>
                                <blockquote><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                        enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                        aliquip ex ea commodo consequat.<br/>At vero eos et accusamus et iusto
                                        odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti
                                        atque corrupti quos dolores et quas molestias excepturi sint occaecati
                                        cupiditate non provident<br/>Sed ut perspiciatis unde omnis iste natus
                                        error sit voluptatem accusantium doloremque laudantium, totam rem
                                        aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                        beatae vitae dicta sunt explicabo.</em></blockquote>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                    consectetur, adipisci velit, sed quia non numquam eius modi tempora
                                    incidunt ut labore et dolore magnam <a href='#'>aliquam quaerat</a>
                                    voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam
                                    corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
                                    Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse
                                    quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo
                                    voluptas nulla pariatur.Neque porro quisquam est, qui dolorem ipsum quia
                                    dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius
                                    modi tempora incidunt ut labore et dolore magnam <a href='#'>aliquam
                                        quaerat</a> voluptatem. Ut enim ad minima veniam, quis nostrum
                                    exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea
                                    commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea
                                    voluptate velit esse quam nihil molestiae consequatur, vel illum qui
                                    dolorem eum fugiat quo voluptas nulla pariatur.</p></div>
                            <div class="mail-attachment"><p><span><i class="fa fa-paperclip mrs"></i>3 attachments ---<a
                                            href="#" class="mrm mls">Download all attachments</a>|<a href="#"
                                                                                                     class="mlm">View
                                            all images</a></span></p>
                                <ul>
                                    <li><a href="#" class="thumb-attach"><img
                                                src="images/gallery/1.jpg"/></a><a href="#" class="name">IMG_001.jpg</a><br/><a
                                            href="#" class="link">
                                            <small>Download</small>
                                        </a></li>
                                    <li><a href="#" class="thumb-attach"><img
                                                src="images/gallery/2.jpg"/></a><a href="#" class="name">IMG_002.jpg</a><br/><a
                                            href="#" class="link">
                                            <small>Download</small>
                                        </a></li>
                                    <li><a href="#" class="thumb-attach"><img
                                                src="images/gallery/3.jpg"/></a><a href="#" class="name">IMG_003.jpg</a><br/><a
                                            href="#" class="link">
                                            <small>Download</small>
                                        </a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                            <hr/>
                            <p><a href="#" class="btn btn-default btn-xs"><i
                                        class="fa fa-mail-reply mln"></i>&nbsp;
                                    Reply</a>&nbsp;<a href="#" data-hover="tooltip" title="Print"
                                                      class="btn btn-default btn-xs"><i
                                        class="fa fa-print mln"></i></a>&nbsp;<a href="#" data-hover="tooltip"
                                                                                 title="Trash"
                                                                                 class="btn btn-default btn-xs"><i
                                        class="fa fa-trash-o mln"></i></a></p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END CONTENT-->
@endsection
