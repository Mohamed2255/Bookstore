<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    function store(Request $request)
    {
        $name=$request->name;
        $email=$request->email;
        $msg=$request->message;
        $mesaage=new Message();
        $mesaage->name=$name;
        $mesaage->email=$email;
        $mesaage->message=$msg;
        $mesaage->save();
        return redirect('users/home');
    }
}
