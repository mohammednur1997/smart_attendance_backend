<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Employee;
use App\Model\Deduction;

class DeductionController extends Controller
{
    //
    public function index($id){
        $employee = Employee::find($id);
        $deduction = Deduction::all();
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
}
