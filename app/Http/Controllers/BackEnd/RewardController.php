<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Employee;
use App\Model\Reward;

class RewardController extends Controller
{
    //
    public function index($id){
        $employee = Employee::find($id);
        $reward = Reward::all();
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
}
