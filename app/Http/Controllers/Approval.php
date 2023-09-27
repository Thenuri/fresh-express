<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Approval extends Controller
{

    public function switchStatus(Request $request, User $user)
    {
        $request->offsetSet('status', $request->status == 1 ? 1 : 0);


        $user->update([
            'status' => $request->status,
        ]);

    
       
       return response()->redirectTo('/dashboard/employee');
    }
}


