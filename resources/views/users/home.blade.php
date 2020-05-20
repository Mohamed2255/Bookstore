
@extends('layouts.app')
@section('content')
<!--  start navbar  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
    <a class="navbar-brand" href="#">Library Book</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
    <a class="nav-link" >{{Auth::user()->username}}</a>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    Settings
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @if(Auth::user()->is_admin==1)
    <a class="dropdown-item" href="{{url('authors/create')}}">Add Author</a>
        <a class="dropdown-item" href="{{url('books/create')}}">Add Book</a>
        @endif
    <a class="dropdown-item" href="{{url('users/logout')}}">Logout</a>
    </li>
    </ul>
    </div>
    </div>
    </nav>
    <!--endnavbar-->
    <!--card-->
    <div class="container-fluid">
    <h1 class="text-muted text-center pt-5 my-5">The Library Book </h1>
    <div class="row">
        @foreach ($books as $book)    
        <div class="card  col-md-3 m-5 ">
            <img src="{{asset('storage/'.$book->image)}}" class="card-img-top" alt="cover">
            <div class="card-body">
                <h2 class="card-title">{{$book->name}}</h2>
            <p>{{$book->desc}}</p>
            <h3>{{$book->author->name}}</h3>
            <p>{{$book->author->bio}}</p>
    @if(Auth::user()->is_admin==1)
        <a href="{{url('/books/edit',$book->id)}}" class="btn btn-success">Edit</a>
    <a href="{{url('/books/delete',$book->id)}}" class="btn btn-danger">Delete</a>
    @endif
</div>
</div>
@endforeach
</div>
</div>
<!--contact us-->
    <div class=" container-fluid no-gutters">
    <div class=" row">
    <div class="myform col-md-12">
    <h2>Contact Us</h2>
    <form method="POST" action="{{url('/messages/store')}}">
        @csrf
    <input  name="name"type="text" placeholder="Name" size="40">
    <input name="email" type="email" placeholder="Email" ><br>     
    <textarea name="message"value="message" >   
    </textarea><br>
    <button class="btn3" type="submit">Send message</button>    
</form>
    </div>      
    </div>
    </div>
    
    
    <!--foooter-->
    <div class=" container-fluid no-gutters">
    <div class=" row">
    <div class="footer col-md-12">   
    <p class="footerp">Copy Right 2020 © By <span>Book store</span> All Rights Reserved</p>   
    </div>
    </div>
    </div>
    
    @endsection
    
    
    