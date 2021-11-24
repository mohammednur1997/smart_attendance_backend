<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Notifications\OneSingnals;
use Illuminate\Http\Request;
use Ladumor\OneSignal\OneSignal;
use DB;


class NotificationController extends Controller
{
    //
    public function index(){
        $notification = DB::table("notifications")->get();
        return view("Backend.pages.notification.index", compact("notification"));
    }

    public function store(Request $request){
       /* $data = OneSignal::getNotifications();
        dd($data);*/


      /*  $fields['include_player_ids'] = ['9575b204-f235-4427-807b-318fa992606a'];
        $notificationMsg = 'Hello!! A tiny web push notification.!';
        $result = OneSignal::sendPush($fields, $notificationMsg);

        dd($result);*/

         New OneSingnals();

    }



}
