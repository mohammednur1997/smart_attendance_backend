<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Notification;
use App\Model\Vacation;
use Illuminate\Http\Request;

class VacationController extends Controller
{
    //
    public function vacation(Request $request, $id){
        $vacation = Vacation::where("employee_id", $id)->get();
        return response([
            "result"=> "pass",
            "vacation" => $vacation,
        ], 200);
    }

    public function vacationByID(Request $request, $id){
        $vacation = Vacation::find($id);
        return response([
            "result"=> "pass",
            "vacation" => $vacation,
        ], 200);
    }

    public function store(Request $request){
        if ($request->id){
            $vacationUpdate = Vacation::find($request->id);
            if($vacationUpdate->status == "approve"){
                return response([
                    "result"=> "pass",
                    "message" => "Unable to Update vacation, Contact with Admin",
                ], 200);
            }elseif ($vacationUpdate->status == "reject"){
                return response([
                    "result"=> "pass",
                    "message" =>  "Unable to Update vacation, Contact with Admin",
                ], 200);
            }else{
                $vacationUpdate = Vacation::find($request->id);
                $vacationUpdate->employee_id = $request->employee_id;
                $vacationUpdate->start_date = $request->start_date;
                $vacationUpdate->end_date = $request->end_date;
                $vacationUpdate->reason = strip_tags($request->reason);
                $vacationUpdate->status = 1;
                $vacationUpdate->save();
                return response([
                    "result"=> "pass",
                    "message" => "Successfully Update the information",
                ], 200);
            }

        }else{
            $vacation = New Vacation();
            $vacation->employee_id = $request->employee_id;
            $vacation->start_date = $request->start_date;
            $vacation->end_date = $request->end_date;
            $vacation->reason = strip_tags($request->reason);
            $vacation->status = "pending";
            $vacation->save();
            return response([
                "result"=> "pass",
                "message" => "Successfully Apply For Vacation",
            ], 200);
        }
    }

    public function delete($id){
        $vacation = Vacation::find($id);
        if($vacation->status == "approve"){
            return response([
                "result"=> "pass",
                "message" =>  "Unable to Delete vacation, Contact with Admin",
            ], 200);
        }elseif ($vacation->status == "reject"){
            return response([
                "result"=> "pass",
                "message" => "Unable to Delete vacation, Contact with Admin",
            ], 200);
        }else{
            $vacation->delete();
            return response([
                "result"=> "pass",
                "message" => "Successfully Delete The Request",
            ], 200);
        }

    }

    public function AllMessage($id){
        $message = Notification::where("employee_id", $id)->get();

        return response([
            "result"=> "pass",
            "message" => $message,
        ], 200);
    }

    public function AllMessageByID($id){
        $message = Notification::find($id);

        return response([
            "result"=> "pass",
            "message" => $message,
        ], 200);
    }


}
