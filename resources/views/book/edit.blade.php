@extends('layouts.app')
@section('content')
<div class="adminCover pb-1">
    <div class="container">
    <h2 class="text-muted text-center pt-5 pt-1 admin">Admin Page</h2>
    <div class="adminIps pt-5">
    <form method="POST" action="{{url('/books/update',$book->id)}}">
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
        
    <input value="{{$book->name}}" name="name"type="text" class="form-control" >
    </div>
    <div class="form-group">
    <input value="{{$book->desc}}" name="desc" type="text" class="form-control">
    </div>
    <select name="author_id" class="form-control"  >
        @foreach ($authors as $author)
        <option value="{{$author->id}}">{{$author->name}}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary w-20 mt-3">Update</button>
    </form>
    </div>
    </div>
    </div>
    @endsection