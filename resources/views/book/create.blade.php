@extends('layouts.app')
@section('content')
<div class="adminCover pb-1">
    <div class="container">
    <h2 class="text-muted text-center pt-5 pt-1 admin">Admin Page</h2>
    <div class="adminIps pt-5">
    <form method="POST" action="{{url('/books/store')}}" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="form-group">
    <input name="name"type="text" class="form-control" id="" placeholder="Enter Book Name">
    </div>
    <div class="form-group">
    <input  name="desc" type="text" class="form-control" id="" placeholder="Enter Description">
    </div>
    <div class="form-group">
        <label class="admin" for="exampleInputPassword1">Enter Book Image </label>
        <input name="image" type="file" class="form-control" id="exampleInputPassword1" >
        </div>
        <select name="author_id" class="form-control"  >
            @foreach ($authors as $author)
            <option value="{{$author->id}}">{{$author->name}}</option>
            @endforeach
        </select>
    <button type="submit" class="btn btn-primary w-20 mt-3">Add Book</button>
    </form>
    </div>
    </div>
    </div>
    @endsection