<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Model\Vacation;
use Illuminate\Http\Request;
use DB;

class VacationController extends Controller
{
    //
    public function index(){
        $vacation = DB::table("vacations")
                          ->join("employees", "vacations.employee_id", "=", "employees.id")
                           ->select('employees.name', 'vacations.*')
                          ->get();
        return view("Backend.pages.vacation.index", compact("vacation"));
    }

    public function confirm($id){
        $confirm = Vacation::find($id);
        if ($confirm){
            $confirm->status = "approve";
            $confirm->save();

            $notification=array(
                'message'=>'Accept The Vacation',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back();
        }
    }

    public function reject($id){
        $reject = Vacation::find($id);
        if ($reject){
            $reject->status = "reject";
            $reject->save();

            $notification=array(
                'message'=>'Reject The Vacation',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            return Redirect()->back();
        }
    }
}
