@extends("Backend.layout.master_layout")
@section("content")
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left">
            <div class="page-title">Role And Permission</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-left">
            <li><i class="fa fa-home"></i>&nbsp;<a href={{route("deshboard")}}>Home</a>&nbsp;&nbsp;<i
                    class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="hidden"><a href={{route("role.all")}}>Role</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
            </li>
            <li class="active">Create Role</li>
        </ol>
        <div class="clearfix"></div>
    </div>
    <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
    <div class="page-content">
        <div class="row">
            @include("Backend.partial.message")
            <div class="col-lg-12">
                <div class="panel panel-yellow">
                    <div class="panel-heading">Create Role</div>
                    <div class="panel-body pan">
                        <form action={{route("role.store")}} method="post" class="horizontal-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body pal">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputFirstName" class="control-label">Name
                                                <span class='require'>*</span></label>
                                            <input name="name" type="text"  class="form-control"/>
                                        </div>
                                    </div>
                                  </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                <label>
                                                    <input type="checkbox" tabindex="7" id="checkAllCheckBox"/> All
                                                </label>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                               @php $i =1; @endphp
                                @foreach($permissionGroup as $group)
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                                    <label>
                                                        <input type="checkbox" tabindex="5" name="groupPermission[]" id="management-{{ $i }}"
                                                               onclick="CheckPermissionByGroup('role-{{$i}}-management-checkbox', this)"   />&nbsp;
                                                        {{$group->group_name}}
                                                    </label>

                                        </div>
                                    </div>

                                    <div class="col-md-9 role-{{$i}}-management-checkbox">
                                        <div class="form-group">
                                            @php
                                                $permissions = App\User::getPermissionByGroupName($group->group_name);
                                              $j =1;
                                            @endphp
                                            @foreach($permissions as $per)
                                                <div class="checkbox">
                                                    <label><input tabindex="5" name="permission[]"  onclick="checkSingleRole('role-{{$i}}-management-checkbox', 'management-{{ $i }}', {{count($permissions)}})" value={{$per->name}} type="checkbox"/>&nbsp;{{$per->name}}</label>
                                                </div>
                                                @php $j++ @endphp
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                                    @php $i++ @endphp
                                @endforeach


                                <div class="form-actions text-left pal">
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

        @section("backendScript")
            <script>
                $(document).ready(function() {

                    $('#checkAllCheckBox').change(function() {
                        if($(this).is(":checked")) {
                            //check all the checkbox
                            $("input[type=checkbox]").prop("checked", true)
                        }else{
                            //uncheck all the checkbox
                            $("input[type=checkbox]").prop("checked", false)
                        }
                    });
                });

                function CheckPermissionByGroup(className, checkThis) {
                    const groupIdName = $("#"+checkThis.id);
                    const classCheckBox = $("."+className+" input");

                    if(groupIdName.is(":checked")) {
                        classCheckBox.prop("checked", true)
                    }else{
                        classCheckBox.prop("checked", false)
                    }
                    implementAllChecked();
                }

                function checkSingleRole(className, groupID, totalPermission) {
                    const ClassName = $("."+className+ ' input');
                    const groupIdCheck = $("#"+groupID);

                    if($("."+className+ ' input:checked').length === totalPermission){
                        groupIdCheck.prop("checked", true);
                    }else{
                        groupIdCheck.prop("checked", false);
                    }
                    implementAllChecked();
                }

                function implementAllChecked() {
                    const getAllPermission = {{ count($all_permissions)  }};
                    const getAllGroupName = {{ count($permissionGroup)  }};


                    if($('input[type="checkbox"]:checked').length >= (getAllPermission + getAllGroupName)){
                        $("#checkAllCheckBox").prop("checked", true);
                    }else{
                        $("#checkAllCheckBox").prop("checked", false);
                    }

                }

            </script>
@endsection

