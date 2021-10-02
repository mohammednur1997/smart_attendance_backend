<?php

namespace App\Http\Controllers\BackEnd\BackEndSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use PDF;

class HomeController extends Controller
{
   public function __construct()
   {
       $this->middleware("guest");
   }


    public function index(){
        return view("Backend.dashboard.deshboard");
    }

    public function invoice(){
        return view("Backend.pages.clients.invoice");
    }
}
