@extends('layouts.app')
@section('content')
<div class="cover">
    <div class="container">
        <div class="inps text-center">
        <form method="POST" action="{{url('/users/handlelogin')}}">
            @csrf
                <div class="form-group">
                  <input name="username" type="text" class="form-control"  placeholder="Enter Username">
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control"  placeholder="Enter Password">
                </div>
                <button type="submit" value="login" class="btn1 btn-primary w-100">Submit</button>
                <small id="emailHelp" class="d-block mt-2 text-muted"><a href="" class="text-muted" data-toggle="modal" data-target="#exampleModalCenter">Sign Up here.</a> </small>

              </form>
            </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
            <h2 class="text-center text-muted">Registration Form</h2>
        <form method="POST" action="{{url('/users/handleregister')}}">
            @csrf
                        <div class="row mt-3">
                                <div class="col">
                                <input name="username" type="text" class="form-control" placeholder="Enter Username">
                                      </div>
                        </div>
                        <div class="row mt-3 mb-3">
                                <div class="col">
                                <input name="password"  type="text" class="form-control" placeholder="Enter Password">
                                      </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>

                </form>
        </div>
      
      </div>
    </div>
  </div>
    
@endsection
