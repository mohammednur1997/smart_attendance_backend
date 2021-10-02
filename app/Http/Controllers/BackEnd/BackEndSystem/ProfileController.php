<?php

namespace App\Http\Controllers\BackEnd\BackEndSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Model\Admin;
use Illuminate\Support\Facades\Hash;
use Image;
use File;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest");
    }
    //
    public function profilePage(){
        $adminId = Auth::guard('admin')->user();
        $userDetails = DB::table("admin_info")->where("admin_id", $adminId->id)->first();
        return view("Backend.adminProfile.profile", compact("userDetails"));
    }

    public function update(Request $request, $id){

        $request->validate([
            'email' => 'max:255|unique:admins,email,'.$id,
            'password' => 'confirmed'
        ],[
                "email.unique"=>"Email Already exist",
            ]
        );

        $admin = Admin::find($id);
        if ($request->firstname){
            $admin->first_name = $request->firstname;
        }
        if ($request->lastname){
            $admin->last_name = $request->lastname;
        }

        if ($request->email){
            $admin->email = $request->email;
        }

        if ($request->username){
            $admin->username = $request->username;
        }

        if ($request->gender){
            $admin->gender = $request->gender;
        }

        if ($request->password){
            $admin->password = Hash::make($request->password);
        }


        if($request->file('image')){
            $adminImage = DB::table("admins")->where('id', $id)->first();
            if (!is_null($adminImage)) {
                if (File::exists('assets/images/user/'. $adminImage->image)) {
                    File::delete('assets/images/user/'. $adminImage->image);
                }
            }

            $mainImage = $request->file('image');
            $main_img = time().'.'. $mainImage->getClientOriginalExtension();
            $location = public_path('assets/images/user/'.$main_img);
            Image::make($mainImage)->save($location);
            $admin->image = $main_img;
        }
        $admin->save();


        $adminData = array();
        if ($request->birthday){
            $adminData["birthday"] =  $request->birthday;
        }

        if ($request->marite){
            $adminData["marite"] =  $request->marite;
        }

         if ($request->position){
             $adminData["position"] =  $request->position;
         }

         if ($request->about){
             $adminData["about"] =  $request->about;
         }

         if ($request->mobile){
             $adminData["mobile"] =  $request->mobile;
         }

          if ($request->website){
              $adminData["website"] =  $request->website;
          }

          if ($request->facebook){
              $adminData["facebook"] =  $request->facebook;
          }

           if ($request->twitter){
               $adminData["twitter"] =  $request->twitter;
           }

           if ($request->address){
               $adminData["address"] =  $request->address;
           }

          DB::table("admin_info")->where("admin_id", $id)->update($adminData);

        $notification=array(
            'message'=>'Successfully Update Profile data',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }


}
