<nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
    @php
      $userGuard = Auth::guard("admin")->user();
    @endphp
    <div class="sidebar-collapse menu-scroll">
        <ul id="side-menu" class="nav">
            <li class="user-panel">
                <div class="thumb"><img src="{{ asset("assets/images/user/".$userGuard->image) }}"  alt="" class="img-circle"/></div>
                <div class="info"><p>{{ $userGuard->first_name." ".$userGuard->last_name }}</p>
                    <ul class="list-inline list-unstyled">
                        <li><a href={{route("profile")}} data-hover="tooltip" title="Profile"><i
                                    class="fa fa-user"></i></a></li>
                        <li><a href={{route("mail")}} data-hover="tooltip" title="Mail"><i
                                    class="fa fa-envelope"></i></a></li>
                        <li><a href={{route("admin.all")}} data-hover="tooltip" title="All User"
                               ><i class="fa fa-cog"></i></a></li>

                        <li><a href={{ route("admin.logout") }} data-hover="tooltip" title="Logout"><i
                                    class="fa fa-sign-out"></i></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </li>
            <li class={{ Route::is("deshboard") ? "active":"" }}><a href={{route("deshboard")}}><i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Dashboard</span></a></li>


            <li  class={{ Route::is("employees") || Route::is("employee.create") || Route::is("employee.edit") ? "active":"" }}><a href="#"><i class="fa fa-laptop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Employees</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href={{route("employees")}}><i class="fa fa-align-justify"></i><span
                                class="submenu-title">All Employee</span></a></li>

                    <li><a href={{route("employee.create")}}><i class="fa fa-plus-circle"></i><span
                                class="submenu-title">Add Employee</span></a></li>
                </ul>
            </li>

            <li  class={{ Route::is("salary") || Route::is("salary.edit") ? "active":"" }}><a href="#"><i class="fa fa-laptop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Salary</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href={{route("salary")}}><i class="fa fa-align-justify"></i><span
                                class="submenu-title">Manege Salary</span></a></li>
                </ul>
            </li>

            <li  class={{ Route::is("employee.record") ? "active":"" }}><a href="#"><i class="fa fa-laptop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Employee Record</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href={{route("employee.record")}}><i class="fa fa-align-justify"></i><span
                                class="submenu-title">Manege Record</span></a></li>
                </ul>
            </li>

            <li  class={{ Route::is("employee.report") ? "active":"" }}><a href="#"><i class="fa fa-laptop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Admin Report</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href={{route("employee.report")}}><i class="fa fa-align-justify"></i><span
                                class="submenu-title">Manege Report</span></a></li>
                </ul>
            </li>


            <li  class={{ Route::is("vacation") ? "active":"" }}><a href="#"><i class="fa fa-laptop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Vacation Request</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href={{route("vacation")}}><i class="fa fa-align-justify"></i><span
                                class="submenu-title">Manege Vacation</span></a></li>
                </ul>
            </li>

            <li  class={{ Route::is("notification") ? "active":"" }}><a href="#"><i class="fa fa-laptop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Notification</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href={{route("notification")}}><i class="fa fa-align-justify"></i><span
                                class="submenu-title">Manege Notification</span></a></li>
                </ul>
            </li>




            @if($userGuard->can("role.view") || $userGuard->can("role.create"))
            <li class={{ Route::is("role.all") || Route::is("role.create") || Route::is("role.edit") ? "active":"" }}><a href="#"><i class="fa fa-lock fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Role And Permission</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    @if($userGuard->can("role.view"))
                    <li><a href={{route("role.all")}}><i class="fa fa-align-justify"></i><span
                                class="submenu-title">Role Management</span></a></li>
                    @endif

                        @if($userGuard->can("role.create"))
                    <li><a href={{route("role.create")}}><i class="fa fa-plus-circle"></i><span
                                class="submenu-title">Create Role & Permission</span></a></li>
                        @endif
                </ul>
            </li>
         @endif
            <!--li.charts-sum<div id="ajax-loaded-data-sidebar"></div>--></ul>
    </div>
</nav>
