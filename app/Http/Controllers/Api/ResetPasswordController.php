<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Employee;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    // Change Password
    public function ChangePass(Request $request){

        $employee = Employee::find($request->employee_id);
        $password = $employee->password;

        if ($request->oldPass === $password){
            $employee->password = $request->newPass;
            $employee->save();
            return response([
                "result"=> "pass",
                "message" => "SuccessFully Change Password",
            ], 200);

        }else{
            return response([
                "result"=> "fail",
                "message" => "Sorry! Old Password Not Match",
            ], 200);
        }




    }


}
