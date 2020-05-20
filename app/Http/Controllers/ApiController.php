<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    function createuser(Request $request)
    {
        $request->validate([
            'username' => 'required|min:5|max:50',
            'password' => 'required|min:5|max:255',
        ]);
        $username=$request->username;
        $password=$request->password;
        $user=new User();
        $user->username=$username;
        $user->password=Hash::make($password);
        $user->api_token=Str::random(40);
        $user->save();
        $data=array('status'=>'success',
        'api_token'=>$user->api_token);
        return response()->json($data);
    }
}
