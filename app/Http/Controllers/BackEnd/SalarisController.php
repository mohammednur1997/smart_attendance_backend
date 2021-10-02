<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Model\Salary;
use App\Model\Employee;
use Illuminate\Http\Request;

class SalarisController extends Controller
{
    //
    public function all(){
        $employee = Employee::all();
        return view("Backend.pages.salary.index", compact("employee"));
    }


    public function store(Request $request){

    }

    public function edit($id){
        $employee = Employee::find($id);
        return view("Backend.pages.salary.edit", compact("employee"));
    }

    public function update(Request $request, $id){

    }

    public function delete($id){

    }
}
