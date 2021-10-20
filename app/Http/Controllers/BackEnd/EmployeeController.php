<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Employee;
use Image;
use File;


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

       $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|unique:employees',
            'salary' => 'required|max:255',
            'work_hour' => 'required',
            'start_work' => 'required',
            'end_work' => 'required',
            'password' => 'required',
            'employee_image' => 'image',
        ]);

       $checkNumber =  preg_match('/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/', $request->phone);
       if (!$checkNumber){
           $notification=array(
               'message'=>'Enter a valid number with country code',
               'alert-type'=>'error'
           );
           return Redirect()->back()->with($notification);
       }


        $employee = new Employee();
        $employee->name = $request->name;
        $employee->gender = $request->gender;
        $employee->birthday = $request->birthday;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->salary = $request->salary;
        $employee->job_position = $request->job_position;
        $employee->work_hour = $request->work_hour;
        $employee->start_work = $request->start_work;
        $employee->end_work = $request->end_work;
        $employee->join_date = $request->join_date;
        $employee->password = $request->password;

        if ($request->salary_due){
            $employee->salary_due = $request->salary_due;
        }else{
            $employee->salary_due = 25;
        }


        if ($request->day_off){
            $string='';
            foreach ($request->day_off as $value){
                $string .=  $value.',';
            }
            $employee->day_off = $string;
        }


        if ($request->employee_image){
            $bigImage = $request->file('employee_image');
            $big_img = time().'.'. $bigImage->getClientOriginalExtension();
            $location = public_path('image/employee/'.$big_img);
            Image::make($bigImage)->save($location);
            $employee->image = $big_img;
        }

        $employee->save();
        $notification=array(
            'message'=>'Successfully Create New Employee',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);


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
