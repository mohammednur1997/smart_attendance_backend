<?php

namespace App\Http\Controllers\BackEnd\BackEndSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Model\Admin;
use App\User;
use DB;
use Image;
use File;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest");
    }
    //
    public function user(){
        $user = Admin::all();
        return view("Backend.adminUser.user", compact("user"));
    }
    public function create(){
        $role = Role::all();
        return view("Backend.adminUser.create", compact("role"));
    }



    public function store(Request $request){
        $request->validate([
            'f_name' => 'required|max:255',
            'l_name' => 'required|max:255',
            'email' => 'required|unique:admins',
            'gender' => 'required|max:255',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'username' => 'required|max:255',
            'role' => 'required',
            'status' => 'required',
            'image' => 'image',
        ],[
                "f_name.required"=>"First Name is Required",
                "l_name.required"=>"last Name is Required",
                "email.required"=>"Email Name is Required",
                "gender.required"=>"Gender is Required",
                "password.required"=>"Password is Required",
                "password_confirmation.required"=>"Confirm Password is Required",
                "username.required"=>"Username is Required",
                "role.required"=>"Role is Required",
                "status.required"=>"Status is Required",
                "image.image"=>"Main Image Extension Must be: .jpg, .png, .jpeg, .gif",
            ]
        );

        $user = new Admin();
        $user->first_name= $request->f_name;
        $user->last_name= $request->l_name;
        $user->email= $request->email;
        $user->gender= $request->gender;
        $user->password=Hash::make($request->password);
        $user->username= $request->username;
        $user->status= $request->status;
        $user->ip= $request->ip();

        //insert Member image
        if ($request->image){
            $bigImage = $request->file('image');
            $big_img = time().'.'. $bigImage->getClientOriginalExtension();
            $location = public_path('assets/images/user/'.$big_img);
            Image::make($bigImage)->save($location);
            $user->image = $big_img;
        }

        $user->save();

        if($request->role){
            $user->assignRole($request->role);
        }

        $notification=array(
            'message'=>'Successfully Create New User',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($id){
        $role = Role::all();
        $user = Admin::find($id);
        return view("Backend.adminUser.edit", compact("user", "role"));
    }

    public function update(Request $request, $id){
        $request->validate([
            'f_name' => 'required|max:255',
            'l_name' => 'required|max:255',
            'email' => 'required|unique:admins,email,'.$id,
            'gender' => 'required|max:255',
            'password' => 'nullable|confirmed',
            'username' => 'required|max:255',
            'role' => 'required',
            'status' => 'required',
            'image' => 'image',
        ],[
                "f_name.required"=>"First Name is Required",
                "l_name.required"=>"last Name is Required",
                "email.required"=>"Email Name is Required",
                "gender.required"=>"Gender is Required",
                "username.required"=>"Username is Required",
                "role.required"=>"Role is Required",
                "status.required"=>"Status is Required",
                "image.image"=>"Main Image Extension Must be: .jpg, .png, .jpeg, .gif",
            ]
        );

        $user = Admin::find($id);
        $user->first_name= $request->f_name;
        $user->last_name= $request->l_name;
        $user->email= $request->email;
        $user->gender= $request->gender;

        if ($request->password){
            $user->password = Hash::make($request->password);
        }

        $user->username= $request->username;
        $user->status= $request->status;

        //insert User image
        if ($request->image){
            $userImage = DB::table("admins")->where('id', $id)->first();
            if (!is_null($userImage)) {
                if (File::exists('assets/images/user/' . $userImage->image)) {
                    File::delete('assets/images/user/' . $userImage->image);
                }
            }

            $bigImage = $request->file('image');
            $big_img = time().'.'. $bigImage->getClientOriginalExtension();
            $location = public_path('assets/images/user/'.$big_img);
            Image::make($bigImage)->save($location);
            $user->image = $big_img;
        }

        $user->save();

        $user->roles()->detach();
        if($request->role){
            $user->assignRole($request->role);
        }

        $notification=array(
            'message'=>'Successfully Update User',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function destroy($id){
        $user = Admin::find($id);
        if (!is_null($user)){
            if (File::exists('assets/images/user/' . $user->image)) {
                File::delete('assets/images/user/' . $user->image);
            }
            $user->roles()->detach();
            $user->delete();
        }

        $notification=array(
            'message'=>'Successfully Delete the User',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

}
