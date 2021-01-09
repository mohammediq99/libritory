<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class ApiController extends Controller
{ 

    public function getProfile(Request $request){
        $user = User::where('username',$request->username) -> first();
        if (!\Hash::check($request->password, $user->password)) {
            // no they don't
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return response()->json($user,200);
    }
 
} 