<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Model\Employee;
use App\Model\Notification;
use Illuminate\Http\Request;
use DB;


class NotificationController extends Controller
{
    //
    public function index(){
        $notification = DB::table("notifications")
                         ->join("employees", "employees.id", "=", "notifications.employee_id")
                         ->select("notifications.*", "employees.name")
                         ->get();

        return view("Backend.pages.notification.index", compact("notification"));
    }

    public function store(Request $request){

        if($request->select == "all"){
            $employee = Employee::all();
            foreach ($employee as $emp){
                $message = new Notification();
                $message->employee_id = $emp->id;
                $message->message = $request->message;
                $message->save();
            }

            $notification=array(
                'message'=>'Successfully sent the message',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $message = new Notification();
            $message->employee_id = $request->employee_id;
            $message->message = $request->message;
            $message->save();

            $notification=array(
                'message'=>'Successfully sent the message',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }



    }

    public function edit($id){
        dd($id);
    }

    public function update(Request $request, $id){
        dd($request);
    }

    public function delete($id){
        $message = Notification::find($id);
        $message->delete();
        $notification=array(
            'message'=>'Successfully Delete the message',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }



}
