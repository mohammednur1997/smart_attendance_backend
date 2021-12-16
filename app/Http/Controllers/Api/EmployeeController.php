<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Employee;

class EmployeeController extends Controller
{
    //
    function onRegistration(Request $request){
        $employee_id = $request->employee_id;
        $employee = Employee::find($employee_id);
        $employee->photo_descriptor = $request->photo_descriptor;
        $result = $employee->save();

        if($result){
            return 1;
        }else{
            return 0;
        }
    }


    function onList(){
        $result=  Employee::all();
        return $result;
    }
}
