@extends('layout')
@section('content')
<div>
    <h1>User Login</h1> 
    <div class="col-sm-6">
    <form method="post" action="login">
    @csrf
  <div class="form-group">
    <label>Email</label>
    <input type="text"  name ="email" class="form-control"placeholder="Enter Your Email">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password"  name ="password" class="form-control"placeholder="Enter Your Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@stop
