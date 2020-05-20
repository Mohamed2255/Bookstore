<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use App\Author;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function registerform()
    {
        return view('users.register');
    }

    function handleregister(Request $request)
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
        $user->save();
        return view('users.login');

    }

    function loginform()
    {
        return view('users.login');
    }

    function handlelogin(Request $request)
    {
        $username=$request->username;
        $password=$request->password;
        if (Auth::attempt(['username' => $username,
         'password' => $password])) {
        return redirect('users/home');
       }
       else
       {
           return redirect('users/login');
       }
    }

    function home()
    {
        $book=Book::all();
        return view('users.home',['books'=>$book]);
    }
    function logout()
    {
        Auth::logout();
        return redirect('users/login');
    }

}
