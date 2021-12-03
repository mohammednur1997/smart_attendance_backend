<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Model\Deduction;
use App\Model\Salary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Model\Employee;
use App\Model\Reward;

class RewardController extends Controller
{
    //
    public function index($id){
        $employee = Employee::find($id);
        $reward = Reward::where("employee_id", $id)->get();
        return view("Backend.pages.reward.index", compact("employee", "reward"));
    }

    public function store(Request $request){

        $reward = new Reward();
        $reward->name = $request->name;
        $reward->re_amount = $request->amount;
        $reward->reason = $request->reason;
        $reward->date = $request->reward_date;
        $reward->employee_id = $request->employee_id;
        $reward->save();

        $notification=array(
            'message'=>'Successfully add Reward Money',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);


    }

    public function edit($id){
        $reward = Reward::find($id);
        $date= $reward->date;
        $month = Carbon::parse($date)->format("m");
        $year = "20".Carbon::parse($date)->format("y");
        $employee_id = $reward->employee_id;

        $salaries = Salary::where("employee_id", $employee_id)->whereMonth("date", $month)->whereYear("date", $year)->count();
        if ($salaries > 0){
            $notification=array(
                'message'=>'Already Pay Salary For This Month, unavailable to Update',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }else{
            return view("Backend.pages.reward.edit", compact( "reward"));
        }
    }

    public function update(Request $request, $id){
        $reward = Reward::find($id);
        $employee_id = $reward->employee_id;
        $reward->re_amount = $request->amount;
        $reward->date = $request->deduction_date;
        $reward->reason = $request->reason;
        $reward->save();
        $notification=array(
            'message'=>'Successfully Update Deduction',
            'alert-type'=>'success'
        );
        return Redirect()->route("salary.reward", $employee_id);

    }

    public function delete($id){
        $reward = Reward::find($id);
        $date= $reward->date;
        $month = Carbon::parse($date)->format("m");
        $year = "20".Carbon::parse($date)->format("y");
        $employee_id = $reward->employee_id;

        $salaries = Salary::where("employee_id", $employee_id)->whereMonth("date", $month)->whereYear("date", $year)->count();
        if ($salaries > 0){
            $notification=array(
                'message'=>'Already Pay Salary For This Month, unavailable to Delete',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }else{
            $reward->delete();
            $notification=array(
                'message'=>'Successfully Delete Reward Money',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
