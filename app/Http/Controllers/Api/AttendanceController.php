<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Record;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //
    public function attendance(Request $request){

        $CheckRecord = Record::where("date", $request->date)->first();
        if($CheckRecord){
            $CheckRecord->out_time = $request->out_time;
            $CheckRecord->check_out = $request->date." ".$request->out_time;

            $start = Carbon::parse($CheckRecord->in_time);
            $end = Carbon::parse($request->out_time);
            $hours = $end->diffInHours($start);
            $CheckRecord->total_hours = $hours;
            $result = $CheckRecord->save();
            if ($result){
                return response([
                    "result"=> "pass",
                    "message" => "Successfully Complete the Check Out",
                ], 200);
            }else{
                return response([
                    "result"=> "fail",
                    "message" => "Please try again or Use Password",
                ], 200);
            }

        }else{
            $record = new Record();
            $record->employee_id = $request->employee_id;
            $record->date = $request->date;
            $record->in_time = $request->in_time;
            $record->check_in = $request->date." ".$request->in_time;
            $record->day = $request->day;

            $result = $record->save();
            if ($result){
                return response([
                    "result"=> "pass",
                    "message" => "Successfully Get The Attendance",
                ], 200);
            }else{
                return response([
                    "result"=> "fail",
                    "message" => "Please try again or Use Password",
                ], 200);
            }
        }




    }
}
