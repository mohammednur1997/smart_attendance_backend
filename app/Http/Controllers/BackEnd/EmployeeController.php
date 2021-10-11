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

      /*  $request->validate([
            'name' => 'required|max:255',
            'company' => 'required|max:255',
            'comment' => 'required|max:255',
            'cl_image' => 'image',
        ],[
                "name.required"=>"Client Name is Required",
                "company.required"=>"Client Company is Required",
                "comment.required"=>"Client Comment is Required",
                "cl_image.image"=>"Main Image Extension Must be: .jpg, .png, .jpeg, .gif",
            ]
        );*/

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
