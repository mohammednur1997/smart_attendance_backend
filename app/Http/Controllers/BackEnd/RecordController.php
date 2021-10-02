<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Record;
use App\Model\Employee;
use App\Model\Deduction;
use App\Model\Salary;
use DB;

class RecordController extends Controller
{
    //
    //
    public function index(){
       /* $salary = Salary::find(1);
        $deduction = Deduction::find(1);
        $employee = Employee::find(1);
        $record = Record::all();*/

        $record = DB::table('record')
            ->join('employees', 'record.employee_id', '=', 'employees.id')
            ->join('salary', 'record.employee_id', '=', 'salary.employee_id')
            ->join('deductions', 'record.employee_id', '=', 'deductions.employee_id')
            ->select('record.*', 'employees.*', 'salary.salary_status', "deductions.amount")
            ->get();
        return view("Backend.pages.record.index", compact("record"));
    }
}
