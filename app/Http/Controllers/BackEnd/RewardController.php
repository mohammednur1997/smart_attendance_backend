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
}
