<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function checkRoleid()
    {
       if(Auth::user()->role_id == 1)
       {   
         $adminStatusController = new AdminDashboardStatusController();
           return $adminStatusController->index();
       }
       if(Auth::user()->role_id == 2)
       {
           return redirect()->route('employee.dashboard');
       }
       if(Auth::user()->role_id == 3)
       {
           return redirect()->route('driver.dashboard');
       }
    }   
}
