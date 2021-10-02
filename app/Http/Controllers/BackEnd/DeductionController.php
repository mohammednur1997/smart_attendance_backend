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
}
