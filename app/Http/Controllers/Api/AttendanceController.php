<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Deduction;
use App\Model\Employee;
use App\Model\Record;
use App\Model\Reward;
use App\Model\Salary;
use App\Model\Vacation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class AttendanceController extends Controller
{
    //
    public function checkIn(Request $request){

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
      /*  $CheckRecord = DB::table("records")->where(["employee_id"=> $request->employee_id, "date"=> $request->date])->first();*/

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
        }else{
            return $this->storeAttendance($request);
        }
    }

    public function storeAttendance($request){
        $CheckRecord = DB::table("records")->where(["employee_id"=> $request->employee_id, "date"=> $request->date])->first();
        if ($CheckRecord){
            return response([
                "result"=> "fail",
                "message" => "Already get Attendance",
            ], 200);
        }

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

    public function checkOut(Request $request){
        //Check record
        $CheckRecord = DB::table("records")->where(["employee_id"=> $request->employee_id, "date"=> $request->date])->first();

        $check_out = $request->date." ".$request->out_time;
        $start = Carbon::parse($CheckRecord->in_time);
        $end = Carbon::parse($request->out_time);

        $hours = $end->diffInHours($start);


        /*$date = Carbon::now()->toDateString();*/

        $result = DB::table("records")->where(["employee_id"=> $request->employee_id, "date"=> $request->date])->update(["out_time"=> $request->out_time, "total_hours"=>$hours, "check_out"=> $check_out]);

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
            "result"=> "pass",
            "attendance"=> $attendance,
        ],200);
    }

    public function getDataByDate(Request $request, $id){

        $start = Carbon::now()->startOfMonth()->toDateString();
        $end =  Carbon::now()->endOfMonth()->toDateString();

        $salary = Salary::where("employee_id", $id)->whereBetween('date', [$start, $end])->pluck("salary_status");
        $deduction = Deduction::where("employee_id", $id)->whereBetween('date', [$start, $end])->pluck("dd_amount");
        $reward = Reward::where("employee_id", $id)->whereBetween('date', [$start, $end])->pluck("re_amount");


        return response([
            "salary"=> $salary,
            "deduction"=> $deduction,
            "reward"=> $reward,
        ],200);

    }

    public function frontSearch(Request $request){

        $record = DB::table('records')
            ->where(function($q) use ($request) {
                if(!empty($request->date && $request->date === "month")) {
                    $start= Carbon::now()->startOfMonth()->toDateString();
                    $end=  Carbon::now()->endOfMonth()->toDateString();
                    $q->orWhereBetween('date', [$start, $end]);
                }

                if(!empty($request->date)) {
                    $q->orWhere('date', $request->date);
                }

                if(!empty($request->present)) {
                    $q->orWhere('present_status', $request->present);
                }
            })
             ->where('employee_id', $request->employee_id)
            ->get();

        return response([
            "record"=> $record,
        ],200);

    }

    public function calculateSalary($id){
        $employee = Employee::find($id);
        $employee_salary = $employee->salary;
        $perDaySalary = $employee_salary/30;

        $present = Record::where(["present_status" => "present", "employee_id"=> $id])->whereMonth('date', Carbon::now()->month)->count();
        $absence = Record::where(["present_status" => "absence", "employee_id"=> $id])->whereMonth('date', Carbon::now()->month)->count();

        //check Deduction this month
        $deduction = Deduction::where("employee_id", $id)->whereMonth('date', Carbon::now()->month)->sum("dd_amount");

        //Check Reward This month
        $reward = Reward::where("employee_id", $id)->whereMonth('date', Carbon::now()->month)->sum("re_amount");

        //100 Riyal Deduction for per day absence in duty
        $deductionAbsence = $absence*100;

        // Calculate Present day money according to the Employee Salary
        $amount_paid = $perDaySalary*$present ;

        //Total Salary After minus the absence money
        $absenceSalary = $amount_paid - $deductionAbsence;

        //Total Salary After Reward this month;
        $rewardSalary = $absenceSalary + $reward;

        //Total Salary After Deduction this month
        $deductionSalary = $rewardSalary - $deduction;

        $round_total = round($deductionSalary, 2);


        return response([
            "gross"=> $round_total,
        ],200);
    }

    public function monthlyCalculation(Request $request){
        $id = $request->employee_id;

        $employee = Employee::find($id);
        $employee_salary = $employee->salary;
        $perDaySalary = $employee_salary/30;

        $present = Record::where(["present_status" => "present", "employee_id"=> $id])->whereMonth('date', $request->month)->count();
        $absence = Record::where(["present_status" => "absence", "employee_id"=> $id])->whereMonth('date', $request->month)->count();

        //check Deduction this month
        $deduction = Deduction::where("employee_id", $id)->whereMonth('date', $request->month)->sum("dd_amount");

        //Check Reward This month
        $reward = Reward::where("employee_id", $id)->whereMonth('date', $request->month)->sum("re_amount");

        //100 Riyal Deduction for per day absence in duty
        $deductionAbsence = $absence*100;

        // Calculate Present day money according to the Employee Salary
        $amount_paid = $perDaySalary*$present ;

        //Total Salary After minus the absence money
        $absenceSalary = $amount_paid - $deductionAbsence;

        //Total Salary After Reward this month;
        $rewardSalary = $absenceSalary + $reward;

        //Total Salary After Deduction this month
        $deductionSalary = $rewardSalary - $deduction;

        $round_total = round($deductionSalary, 2);

        return json_encode(['status' => 'success', "total"=> $round_total, "present"=> $present, "absence"=> $present, "deduction" =>$deduction, "reward"=>  $reward]);
    }

}
