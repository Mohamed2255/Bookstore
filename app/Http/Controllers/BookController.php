<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function create()
    {
        $authors=Author::get();
        return view('book.create',compact('authors'));
    }
    function edit(Book $book)
    {
        $authors=Author::all();
        return view('book.edit',['book'=>$book],['authors'=>$authors]);
    }
    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:50',
            'desc' => 'required|min:5|max:255',
            'image' => 'required',
        ]);
        $name=$request->name;
        $desc=$request->desc;
        $author_id=$request->author_id;
        $image=$request->image->store('images','public');
        $book=new Book();
        $book->name=$name;
        $book->desc=$desc;
        $book->image=$image;
        $book->author_id=$author_id;
        $book->save();
        return redirect('users/home');
    }
    function update($book)
    {
        request()->validate([
            'name' => 'required|min:5|max:50',
            'desc' => 'required|min:5|max:255',
        ]);
        $name=request()->name;
        $desc=request()->desc;
        $author_id=request()->author_id;
        $book=Book::findorfail($book);
        $book->name=$name;
        $book->desc=$desc;
        $book->author_id=$author_id;
        $book->save();
        return redirect('users/home');
    }

    function delete($book)
    {
        $book=Book::where('id','=',$book)->first();
        $book->delete();
        return redirect('users/home');
    }

}
