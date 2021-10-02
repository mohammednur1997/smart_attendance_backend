<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Employee;

class EmployeeController extends Controller
{
    //
    public function all(){
        $employee = Employee::all();
     return view("Backend.pages.employee.index", compact("employee"));
    }

    public function create(){
     return view("Backend.pages.employee.create");
    }

    public function store(Request $request){

    }

    public function edit($id){
        $employee = Employee::find($id);
        return view("Backend.pages.employee.edit", compact("employee"));
    }

    public function update(Request $request, $id){

    }

    public function delete($id){

    }

}
