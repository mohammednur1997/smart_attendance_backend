<?php

namespace App\Http\Controllers\BackEnd\BackEndSystem;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    public $user;

    public function __construct(){
        $this->middleware(function ($request, $next){
           $this->user = Auth::guard("admin")->user();
           return $next($request);
        });
    }


    public function allRole(){
           if (is_null($this->user) || !$this->user->can("role.view")){
               abort(403, "Sorry ! you are unauthorized to view Role, talk with super admin");
           }
        $roles = Role::all();
        return view("BackEnd.rolePermission.index", compact("roles"));
    }

    public function create(){
        if (is_null($this->user) || !$this->user->can("role.create")){
            abort(403, "Sorry ! you are unauthorized to create Role, talk with super admin");
        }

        $all_permissions = Permission::all();
        $permissionGroup = User::getAllGroupName();
        return view("BackEnd.rolePermission.create", compact("all_permissions", "permissionGroup"));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|max:255|unique:roles',
        ],[
                "name.required"=>"Write a Role Name",
            ]
        );

        //create new role
        $role =  Role::create(['name' => $request->name]);
        $permission =  $request->permission;

        if (!empty($permission)){
            $role->syncPermissions($permission);
        }

        $notification=array(
            'message'=>'Successfully Added New Role',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($id){
        if (is_null($this->user) || !$this->user->can("role.edit")){
            abort(403, "Sorry ! you are unauthorized to edit Role, talk with super admin");
        }

        $roleName = Role::findById($id);
        $all_permissions = Permission::all();
        $permissionGroup = User::getAllGroupName();
        return view("BackEnd.rolePermission.edit", compact("all_permissions", "permissionGroup", "roleName"));
    }

    public function update(Request $request, $id){
        if (is_null($this->user) || !$this->user->can("role.update")){
            abort(403, "Sorry ! you are unauthorized to update Role, talk with super admin");
        }

        $request->validate([
            'name' => 'required|max:255|unique:roles,name,'.$id,
        ],[
                "name.required"=>"Write a Role Name",
            ]
        );


        $role =  Role::findById($id);
        $permission =  $request->permission;

        if (!empty($permission)){
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($permission);
        }

        $notification=array(
            'message'=>'Successfully Update The Role',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function delete($id){
        if (is_null($this->user) || !$this->user->can("role.delete")){
        abort(403, "Sorry ! you are unauthorized to delete Role, talk with super admin");
        }

        $role =  Role::findById($id);
        if (!is_null($role)){
            $role->delete();
        }
        $notification=array(
            'message'=>'Successfully Delete The Role',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

}
