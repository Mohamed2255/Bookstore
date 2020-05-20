@extends('layouts.app')
@section('content')
<div class="adminCover pb-1">
    <div class="container">
    <h2 class="text-muted text-center pt-5 pt-1 admin">Admin Page</h2>
    <div class="adminIps pt-5">
    <form method="POST" action="{{url('/authors/store')}}">
        @csrf
    <div class="form-group">
    <input name="name"type="text" class="form-control" id="" placeholder="Enter Author">
    </div>
    <div class="form-group">
    <input  name="bio" type="text" class="form-control" id="" placeholder="Enter Bio">
    </div>
    <button type="submit" class="btn btn-primary w-20">Add Author</button>
    </form>
    </div>
    </div>
    </div>
    @endsection