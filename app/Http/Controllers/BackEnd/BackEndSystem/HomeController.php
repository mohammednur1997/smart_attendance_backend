<?php

namespace App\Http\Controllers\BackEnd\BackEndSystem;

use App\Http\Controllers\Controller;
use App\Model\Deduction;
use App\Model\Employee;
use App\Model\Reward;
use App\Model\Vacation;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use PDF;

class HomeController extends Controller
{
   public function __construct()
   {
       $this->middleware("guest");
   }


    public function index(){
        $total_employee = Employee::all()->count();
        $vacation = Vacation::all()->count();
        $deduction = Deduction::all()->count();
        $reward = Reward::all()->count();

        return view("Backend.dashboard.deshboard", compact("total_employee", "vacation", "deduction", "reward"));
    }

    public function invoice(){
        return view("Backend.pages.clients.invoice");
    }
}
