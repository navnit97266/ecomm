@extends('master')
@section('content')
<div class="container custom-login">
<div class="row">
<div class="col-lg-4 col-lg col-sm-offset-4">
    <form action="/login" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" value='{{old("email")}}' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <span style="color:red ">@error('email'){{$message}}@enderror</span>
  </div>
        
  <div class="form-group">
      @csrf
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    <span style="color:red ">@error('password'){{$message}}@enderror</span>
  </div>
        
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
</div>
</div>

@endsection

