<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Model\Deduction;
use App\Model\Record;
use App\Model\Reward;
use App\Model\Salary;
use App\Model\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SalarisController extends Controller
{
    //
    public function all(){
        $employee = Employee::all();
        /*$getSalary = Salary::whereMonth('date', Carbon::now()->month)->get();*/
        $getSalary = DB::table("salaries")
                             ->join("employees", "employees.id", "=", "salaries.employee_id")
                              ->select("salaries.*", "employees.*")
                               ->whereMonth('date', Carbon::now()->month)
                               ->get();

        return view("Backend.pages.salary.index", compact("employee", "getSalary"));
    }


    public function show(Request $request){
        $salary = DB::table("salaries")
                     ->join('employees', 'salaries.employee_id', '=', 'employees.id')
                      ->select("salaries.*", "employees.*")
                     ->get();

        return view("Backend.pages.salary.salary", compact("salary"));
    }

    public function edit($id){
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


        return view("Backend.pages.salary.edit", compact("employee", "round_total", "present", "absence", "deduction", "reward"));
    }

    public function update(Request $request, $id){

        $request->validate([
            "paid" => "required",
            "date" => "required"
        ]);

        // check this month salary already paid or not ?
        $check = Salary::where("employee_id", $id)->whereMonth('date', Carbon::now()->month)->count();
        if ($check){
            $notification=array(
                'message'=>'Already Pay Salary For This Month',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }else{
            $salaries = new Salary();
            $salaries->employee_id = $request->employee_id;
            $salaries->date = $request->date;
            $salaries->reward_salary = $request->reward;
            $salaries->deducation_salary = $request->deduction;
            $salaries->amount_paid = $request->paid;
            $salaries->salary_status = "paid";

            $salaries->save();

            $notification=array(
                'message'=>'Successfully Pay the Salary',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }

    }

    public function searchSalary(Request $request){
        $salary = Record::where('date', 'like', '%' .$request->date . '%')->get();
        return view("Backend.pages.salary.salary", compact("salary"));

    }
}
