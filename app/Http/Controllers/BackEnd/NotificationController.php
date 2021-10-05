<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Model\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function index(){
        $notification = Notification::all();
        return view("Backend.pages.notification.index", compact("notification"));
    }
}
