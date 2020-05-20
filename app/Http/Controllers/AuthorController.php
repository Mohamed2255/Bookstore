<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    function create()
    {
        return view('author.create');
    }
    function store(Request $request)
    {
        $name=$request->name;
        $bio=$request->bio;
        $author=new Author();
        $author->name=$name;
        $author->bio=$bio;
        $author->save();
        return redirect('users/home');
    }

}
