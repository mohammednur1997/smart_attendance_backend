@extends("Backend.layout.master_layout")
@section("content")
    @php
        $userGuard = Auth::guard("admin")->user();
    @endphp
    <!--BEGIN CONTENT-->
    <div class="page-content">
        <div id="page-user-profile" class="row">
            <div class="col-md-12">
                <div class="row">
                    @include("Backend.partial.message")
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="text-center mbl">
                                <img
                                    src="{{ asset("assets/images/user/".$userGuard->image) }}"
                                    width="100px"
                                    style="border: 5px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);"
                                    class="img-circle"/></div>
                        </div>
                        <table class="table table-striped table-hover">
                            <tbody>
                            <tr>
                                <td width="50%">User Name</td>
                                <td>{{ $userGuard->first_name." ".$userGuard->last_name }}</td>
                            </tr>
                            <tr>
                                <td width="50%">Email</td>
                                <td>{{ $userGuard->email }}</td>
                            </tr>
                            <tr>
                                <td width="50%">Address</td>
                                <td>{{ $userDetails->address }}</td>
                            </tr>
                            <tr>
                                <td width="50%">Status</td>
                                <td><span class="label label-success">
                                        @if($userGuard->status == 1 )
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                    </span></td>
                            </tr>
                            <tr>
                                <td width="50%">Rating</td>
                                <td><i class="fa fa-star text-yellow fa-fw"></i><i
                                        class="fa fa-star text-yellow fa-fw"></i><i
                                        class="fa fa-star text-yellow fa-fw"></i><i
                                        class="fa fa-star text-yellow fa-fw"></i><i
                                        class="fa fa-star text-yellow fa-fw"></i></td>
                            </tr>
                            <tr>
                                <td width="50%">Join Since</td>

                                <td>{{ \Carbon\Carbon::parse($userGuard->created_at)->format('M d, Y')  }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-9">

                        <ul class="nav nav-tabs ul-edit responsive">
                            <li>
                                <a href="#" ><i class="fa fa-edit"></i>&nbsp;
                                    Edit Profile</a>
                            </li>
                        </ul>

                        <div>
                            <div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="tab-content">
                                            <div id="tab-profile-setting" class="tab-pane fade in active">
                                                <form action="{{ route("profile.update", $userGuard->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    @csrf
                                                    <div class="form-group"><label
                                                            class="col-sm-3 control-label">First Name</label>

                                                        <div class="col-sm-9 controls"><input type="text"
                                                                                              name="firstname"
                                                                                              value="{{ $userGuard->first_name }}"
                                                                                              placeholder="first name"
                                                                                              class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><label
                                                            class="col-sm-3 control-label">Last Name</label>

                                                        <div class="col-sm-9 controls"><input type="text"
                                                                                              name="lastname"
                                                                                              value="{{ $userGuard->last_name }}"
                                                                                              placeholder="last name"
                                                                                              class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><label
                                                            class="col-sm-3 control-label">Gender</label>

                                                        <div class="col-sm-9 controls">
                                                            <div class="radio-list">
                                                                <label class="radio-inline mr-3"><input
                                                                        type="radio" value="male" name="gender"
                                                                        {{ $userGuard->gender == "male"? "checked":"" }}/>&nbsp;
                                                                    Male</label>
                                                                <label class="radio-inline"><input
                                                                        type="radio" value="female" name="gender"
                                                                        {{ $userGuard->gender == "female"? "checked":"" }}
                                                                    />&nbsp;
                                                                    Female</label></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><label
                                                            class="col-sm-3 control-label">Birthday</label>

                                                        <div class="col-sm-9 controls">
                                                            <div class="row">
                                                                <div class="col-xs-6">
                                                                    <input type="text" data-date-format="dd/mm/yyyy"
                                                                           value="{{ $userDetails->birthday }}"
                                                                           name="birthday"
                                                                           placeholder="dd/mm/yyyy"
                                                                           class="datepicker-normal form-control"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><label
                                                            class="col-sm-3 control-label">Marital
                                                            Status</label>

                                                        <div class="col-sm-9 controls">
                                                            <div class="row">
                                                                <div class="col-xs-6">
                                                                    <select class="form-control" name="marite">
                                                                        <option value="1" {{ $userDetails->marite == 1? "selected":"" }}>Single</option>
                                                                        <option value="2" {{ $userDetails->marite == 2? "selected":"" }}>Married</option>
                                                                    </select></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><label
                                                            class="col-sm-3 control-label">Position</label>

                                                        <div class="col-sm-9 controls">
                                                            <div class="row">
                                                                <div class="col-xs-6">
                                                                    <select class="form-control" name="position">
                                                                        <option value="1" {{ $userDetails->marite == 1? "selected":"" }}>CEO</option>
                                                                        <option value="2" {{ $userDetails->marite == 2? "selected":"" }}>Director</option>
                                                                        <option value="3" {{ $userDetails->marite == 3? "selected":"" }}>Manager</option>
                                                                        <option value="4" {{ $userDetails->marite == 4? "selected":"" }}>Staff</option>
                                                                        <option value="5" {{ $userDetails->marite == 5? "selected":"" }}>Office Boy</option>
                                                                    </select></div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group"><label
                                                            class="col-sm-3 control-label">Select Image(80 * 80)</label>
                                                        <div class="col-sm-9 controls">
                                                            <input type="file" name="image"   class="form-control"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group"><label
                                                            class="col-sm-3 control-label">Address</label>

                                                        <div class="col-sm-9 controls"><input type="text"
                                                                                              name="address"
                                                                                              value="{{ $userDetails->address }}"
                                                                                              placeholder="Address"
                                                                                              class="form-control"/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group"><label
                                                            class="col-sm-3 control-label">About</label>

                                                        <div class="col-sm-9 controls">
                                                            <textarea rows="3" name="about" class="form-control"> {!! $userDetails->about !!}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mbn"><label
                                                            class="col-sm-3 control-label"></label>

                                                        <div class="col-sm-9 controls">
                                                            <button type="submit" class="btn btn-success"><i
                                                                    class="fa fa-save"></i>&nbsp;
                                                                Save
                                                            </button>
                                                            &nbsp; &nbsp;<a href="#" class="btn btn-default">Cancel</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div id="tab-account-setting" class="tab-pane fade">
                                                <form action="{{ route("profile.update", $userGuard->id) }}" method="post" class="form-horizontal">
                                                    @csrf
                                                    <div class="form-body">
                                                        <div class="form-group"><label
                                                                class="col-sm-3 control-label">Email</label>

                                                            <div class="col-sm-9 controls"><input type="email"
                                                                                                  name="email"
                                                                                                  value="{{ $userGuard->email }}"
                                                                                                  placeholder="email@yourcompany.com"
                                                                                                  class="form-control"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group"><label
                                                                class="col-sm-3 control-label">Username</label>

                                                            <div class="col-sm-9 controls"><input type="text"
                                                                                                  name="username"
                                                                                                  value="{{ $userGuard->username }}"
                                                                                                  placeholder="username"
                                                                                                  class="form-control"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group"><label
                                                                class="col-sm-3 control-label">Password</label>

                                                            <div class="col-sm-9 controls">
                                                                <div class="row">
                                                                    <div class="col-xs-6">
                                                                        <input type="password"
                                                                               placeholder=""
                                                                               name="password"
                                                                               class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group"><label
                                                                class="col-sm-3 control-label">Confirm
                                                                Password</label>

                                                            <div class="col-sm-9 controls">
                                                                <div class="row">
                                                                    <div class="col-xs-6"><input type="password"
                                                                                                 name="password_confirmation"
                                                                                                 placeholder=""
                                                                                                 class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mbn"><label
                                                                class="col-sm-3 control-label"></label>

                                                            <div class="col-sm-9 controls">
                                                                <button type="submit" class="btn btn-success"><i
                                                                        class="fa fa-save"></i>&nbsp;
                                                                    Save
                                                                </button>
                                                                &nbsp; &nbsp;<a href="#"
                                                                                class="btn btn-default">Cancel</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div id="tab-contact-setting" class="tab-pane fade">
                                                <form action="{{ route("profile.update", $userGuard->id) }}" method="post" class="form-horizontal">
                                                    @csrf
                                                    <div class="form-group"><label
                                                            class="col-sm-3 control-label">Mobile Phone</label>

                                                        <div class="col-sm-9 controls"><input type="text"
                                                                                              name="mobile"
                                                                                              value="{{ $userDetails->mobile }}"
                                                                                              placeholder="0-123-456-789"
                                                                                              class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><label
                                                            class="col-sm-3 control-label">Website</label>

                                                        <div class="col-sm-9 controls"><input type="text"
                                                                                              name="website"
                                                                                              value="{{ $userDetails->website }}"
                                                                                              placeholder="http://website.com"
                                                                                              class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><label
                                                            class="col-sm-3 control-label">Facebook</label>

                                                        <div class="col-sm-9 controls"><input type="text"
                                                                                              name="facebook"
                                                                                              value="{{ $userDetails->facebook }}"
                                                                                              placeholder=""
                                                                                              class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><label
                                                            class="col-sm-3 control-label">Twitter</label>

                                                        <div class="col-sm-9 controls"><input type="text"
                                                                                              name="twitter"
                                                                                              value="{{ $userDetails->twitter }}"
                                                                                              placeholder=""
                                                                                              class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mbn"><label
                                                            class="col-sm-3 control-label"></label>

                                                        <div class="col-sm-9 controls">
                                                            <button type="submit" class="btn btn-success"><i
                                                                    class="fa fa-save"></i>&nbsp;
                                                                Save
                                                            </button>
                                                            &nbsp; &nbsp;<a href="#" class="btn btn-default">Cancel</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li class="active"><a href="#tab-profile-setting" data-toggle="tab"><i
                                                        class="fa fa-folder-open"></i>&nbsp;
                                                    Profile Setting</a></li>
                                            <li><a href="#tab-account-setting" data-toggle="tab"><i
                                                        class="fa fa-cogs"></i>&nbsp;
                                                    Account Setting</a></li>
                                            <li><a href="#tab-contact-setting" data-toggle="tab"><i
                                                        class="fa fa-envelope-o"></i>&nbsp;
                                                    Contact Setting</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
