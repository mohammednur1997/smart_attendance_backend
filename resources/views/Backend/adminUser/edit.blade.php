@extends("Backend.layout.master_layout")
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">admins</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href={{route("admin.all")}}>Admin Users</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">Admin Edit</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
    <div class="page-content">
        <div class="row">
            @include("Backend.partial.message")
            <div class="col-lg-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">Update admin user</div>
                    <div class="panel-body pan">
                        <form action={{route("admin.update", $admin->id)}} method="post" class="horizontal-form" enctype="multipart/form-data">
                            @csrf

                            <div class="form-body pal">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">First Name
                                                <span class='require'>*</span></label>
                                            <input name="f_name" type="text" value="{{ $admin->first_name }}" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label for="inputFirstName" class="control-label">Last Name</label>
                                            <input name="l_name" type="text" value="{{ $admin->last_name }}" class="form-control"/>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Email
                                                <span class='require'>*</span></label>
                                            <input name="email" type="text" value="{{ $admin->email }}" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Gender" class="control-label">Gender
                                                <span class='require'>*</span></label>
                                            <select id="status" name="gender" class="form-control">
                                                <option value="">==Choose Gender==</option>
                                                <option value="male" {{ $admin->gender == "male" ? "selected": ""  }}>Male</option>
                                                <option value="female" {{ $admin->gender == "female" ? "selected": ""  }}>Female</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success"><label
                                                for="inputFirstName" class="control-label">Password
                                                <span class='require'>*</span></label>
                                            <input name="password" type="text" placeholder="Password" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label for="inputFirstName" class="control-label">Confirm Password</label>
                                            <input name="password_confirmation" type="text" placeholder="Confirm Password" class="form-control"/>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label for="inputFirstName" class="control-label">Username</label>
                                            <input name="username" type="text" value="{{ $admin->username }}" class="form-control"/>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <img src="{{ asset('assets/images/user/'.$admin->image) }}" alt="image" height="100px" width="100px">
                                            <label for="inputBirthday" class="control-label">Image(80 * 80)</label>
                                            <input name="image" type="file" class="form-control"/>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="role" class="control-label">Select Role
                                            <span class='require'>*</span></label>

                                        <select data-placeholder="Choose the role" multiple class="chosen-select" name="role[]">
                                            @foreach($role as $ro)
                                                <option value={{$ro->name}} {{ $admin->hasRole($ro->name)? "selected": "" }}>{{$ro->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="selGender" class="control-label">Status
                                                <span class='require'>*</span></label>
                                            <select id="status" name="status" class="form-control">
                                                <option value="">==Choose Status==</option>
                                                <option value="1" {{ $admin->status == "1" ? "selected": ""  }}>Active</option>
                                                <option value="2" {{ $admin->status == "2" ? "selected": ""  }}>InActive</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-actions text-left">
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

