<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Employee;
use App\Model\Record;
use App\Model\Vacation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class AttendanceController extends Controller
{
    //
    public function attendance(Request $request){

        // check day off
        $checkOffDay = Employee::where(["id" => $request->employee_id])->first();
        $dayOff = $checkOffDay->day_off;
        $checkDay = str_contains($dayOff, $request->day);

        //check Vacation
        $checkVacation = DB::table("vacations")
            ->where(["employee_id"=> $request->employee_id, "status" => "approve"])
            ->whereRaw('"'.$request->date.'" between `start_date` and `end_date`')
            ->first();

        //Check record
        $CheckRecord = DB::table("records")->where(["employee_id"=> $request->employee_id, "date"=> $request->date])->first();

        if ($checkDay){
            return response([
                "result"=> "fail",
                "message" => "Weekly off Day",
            ], 200);
        }elseif ($checkVacation){
            $vacationStart = Carbon::parse($checkVacation->start_date);
            $vacationEnd = Carbon::parse($checkVacation->end_date);
            $checkdate = Carbon::parse($request->date);

            if ($checkdate->between($vacationStart, $vacationEnd)){
                return response([
                    "result"=> "fail",
                    "message" => "You will get Leave for this day",
                ], 200);
            }
        }elseif ($CheckRecord){
            return $this->updateAttendance($CheckRecord, $request);
        }else{
            return $this->storeAttendance($request);
        }
    }

    public function storeAttendance($request){
        $employee = Employee::where("id",  $request->employee_id)->first();

        $record = new Record();
        $record->employee_id = $request->employee_id;
        $record->present_status = "present";
        $record->date = $request->date;
        $record->in_time = $request->in_time;
        $record->check_in = $request->date." ".$request->in_time;
        $record->day = $request->day;


        $start_time = Carbon::parse($employee->start_work);
        $in_time = Carbon::parse($request->in_time);

        $newDateTime = $start_time->addMinutes(15);

            if($in_time->gte($newDateTime)){
                $record->late = "yes";
            }else{
                $record->late = "no" ;
            }

            $result = $record->save();
            if ($result){
                return response([
                    "result"=> "pass",
                    "message" => "Successfully Get The Attendance",
                ], 200);
            }else{
                return response([
                    "result"=> "fail",
                    "message" => "Sorry! Fail to get Attendance",
                ], 200);
            }





    }

    public function updateAttendance($CheckRecord, $request){
        $CheckRecord->out_time = $request->out_time;
        $CheckRecord->check_out = $request->date." ".$request->out_time;

        $start = Carbon::parse($CheckRecord->in_time);
        $end = Carbon::parse($request->out_time);

        $hours = $end->diffInHours($start);
        $CheckRecord->total_hours = $hours;

        $result = DB::table("records")->update(["out_time" => $request->out_time, "total_hours"=>$hours ]);

        if ($result){
            return response([
                "result"=> "pass",
                "message" => "Successfully Complete the Check Out",
            ], 200);
        }else{
            return response([
                "result"=> "fail",
                "message" => "Already Check Out Done",
            ], 200);
        }

    }

    public function search(Request $request){
        $record = DB::table('records')
            ->join('employees', 'records.employee_id', '=', 'employees.id')
            ->select('records.*', 'employees.*')
            ->where(function($q) use ($request) {
                    if(!empty($request->late)) {
                        $q->orWhere("late",'LIKE','%'.$request->late.'%');
                    }
                    if(!empty($request->attendance)) {
                        $q->orWhere('present_status','LIKE','%'.$request->attendance.'%');
                    }
                    if(!empty($request->date)) {
                        $q->orWhere('date','LIKE','%'.$request->date.'%');
                    }

            })
            /*->where('site', $site_code)*/
            ->get();

        return view("Backend.pages.report.index", compact("record"));

    }

    public function CheckLogin(Request $request){
         $email = $request->email;
         $password = $request->password;
         $checkLogin = Employee::where(["email"=> $email, "password"=> $password])->first();
            try {

                if ($checkLogin) {
                    return response([
                        "result"=> "pass",
                        "message" => "Successfully Login",
                        "employee" => $checkLogin
                    ], 200);
                }

            }catch(Exception $exception){
                return response([
                    "message"=>$exception->getMessage()
                ],200);
            }

            return response([
                "result"=> "fail",
                "message"=>"Invalid Email Or Password"
            ],200);

    }

    public function GetAttendanceById(Request $request, $id){
        $attendance = DB::table("records")->where("employee_id", $id)->get();
        return response([
            "attendance"=> $attendance,
        ],200);
    }

    public function getDataByDate(Request $request, $id){

        $EmployeeData = DB::table('employees')
            ->where(["employees.id" => $id, "salary.date" => "20-5-2021", "deductions.date" => "20-5-2021", "rewards.date" => "20-5-2021"])
            ->join('salary', 'employees.id', '=', 'salary.employee_id')
            ->join('deductions', 'employees.id', '=', 'deductions.employee_id')
            ->join('rewards', 'employees.id', '=', 'rewards.employee_id')
            ->select('employees.*', 'salary.salary_status', "deductions.dd_amount", "rewards.re_amount")
            ->first();

        return response([
            "EmployeeData"=> $EmployeeData,
        ],200);

    }

}
