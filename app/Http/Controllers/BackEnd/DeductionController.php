<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Model\Salary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Model\Employee;
use App\Model\Deduction;

class DeductionController extends Controller
{
    //
    public function index($id){
        $employee = Employee::find($id);
        $deduction = Deduction::where("employee_id", $id)->get();
        return view("Backend.pages.deduction.index", compact("employee", "deduction"));
    }

    public function store(Request $request){
        $deduction = new Deduction();
        $deduction->name = $request->name;
        $deduction->dd_amount = $request->amount;
        $deduction->date = $request->deduction_date;
        $deduction->reason = $request->reason;
        $deduction->employee_id = $request->employee_id;
        $deduction->save();

        $notification=array(
            'message'=>'Successfully add Deduction Money',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($id){
        $deduct = Deduction::find($id);
        $date= $deduct->date;
        $month = Carbon::parse($date)->format("m");
        $year = "20".Carbon::parse($date)->format("y");
        $employee_id = $deduct->employee_id;

        $salaries = Salary::where("employee_id", $employee_id)->whereMonth("date", $month)->whereYear("date", $year)->count();
        if ($salaries > 0){
            $notification=array(
                'message'=>'Already Pay Salary For This Month, unavailable to Update',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }else{
            return view("Backend.pages.deduction.edit", compact( "deduct"));
        }
    }

    public function update(Request $request, $id){
        $deduct = Deduction::find($id);
        $employee_id = $deduct->employee_id;
        $deduct->dd_amount = $request->amount;
        $deduct->date = $request->deduction_date;
        $deduct->reason = $request->reason;
        $deduct->save();
        $notification=array(
            'message'=>'Successfully Update Deduction',
            'alert-type'=>'success'
        );
        return Redirect()->route("salary.deduction", $employee_id);

    }

    public function delete($id){
        $deduct = Deduction::find($id);
        $date= $deduct->date;
        $month = Carbon::parse($date)->format("m");
        $year = "20".Carbon::parse($date)->format("y");
        $employee_id = $deduct->employee_id;

        $salaries = Salary::where("employee_id", $employee_id)->whereMonth("date", $month)->whereYear("date", $year)->count();
        if ($salaries > 0){
            $notification=array(
                'message'=>'Already Pay Salary For This Month, unavailable to Delete',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }else{
            $deduct->delete();
            $notification=array(
                'message'=>'Successfully Delete Deduction Money',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

}
