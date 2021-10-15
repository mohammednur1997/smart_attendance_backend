<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    //

        public function index(){
            /* $salary = Salary::find(1);
             $deduction = Deduction::find(1);
             $employee = Employee::find(1);
             $record = Record::all();*/

            $record = DB::table('records')
                ->join('employees', 'records.employee_id', '=', 'employees.id')
                ->select('records.*', 'employees.*')
                ->get();
            return view("Backend.pages.report.index", compact("record"));
        }

    public function search(Request $request){
        $record = DB::table('records')
            ->join('employees', 'records.employee_id', '=', 'employees.id')
            ->select('records.*', 'employees.*')
            ->where(function($q) use ($request) {
                if(!empty($request->late)) {
                    $q->orWhere("late",'LIKE','%'.$request->late.'%');
                }
                if(!empty($request->attendance)) {
                    $q->orWhere('present_status','LIKE','%'.$request->attendance.'%');
                }
                if(!empty($request->date)) {
                    $q->orWhere('date','LIKE','%'.$request->date.'%');
                }

            })
            /*->where('site', $site_code)*/
            ->get();

        return view("Backend.pages.report.index", compact("record"));

    }

}
