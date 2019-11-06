@extends('cd-admin.admin')
@section('content')
<section class="content">
  <div class="row">
    <section class="content-header">
      <h1>
        Admin
        <small>Detail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="{{url('/viewroom')}}">Admin</a></li>
        <li class="active"><a href="{{url()->current()}}">Add Admin</a></li>
      </ol>
    </section>
        <div class="col-md-12">
         <div class="box">
          <div class="box-header">
            <h3 class="box-title">Add Admin Details</h3>
          </div>
          <form action="{{url('/storeadmin')}}" method="POST">
            @csrf
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name" value="{{old('name')}}" >
                  <div class="text text-danger">{{ $errors->first('name') }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Email" value="{{old('email')}}" >
                  <div class="text text-danger">{{ $errors->first('email') }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="password" class="form-control" id="exampleInputEmail1" name="password" placeholder="Enter Password" value="{{old('password')}}" >
                  <div class="text text-danger">{{ $errors->first('password') }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Confirm Password</label>
                  <input type="password" class="form-control" id="exampleInputEmail1" name="password_confirmation" placeholder="Enter Confirm Password" value="{{old('password_confirmation')}}" >
                  <div class="text text-danger">{{ $errors->first('password_confirmation') }}</div>
                </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Role</label><br>
            <input type="radio" name="role" checked value="SuperAdmin"> SuperAdmin &nbsp; &nbsp; &nbsp; &nbsp;
            <input type="radio" name="role" value="Admin"> Admin
          </div>

                <div>
                  <button type="submit" class="btn btn-info" name="insert">Add Admin</button>
                </div>
              </form>
              <a href="{{URL()->previous()}}"><button type="button" class="btn btn-default pull-right" data-dismiss="modal">Back</button></a>
            </div>

          </div>
    </div>
  </section> 
  @endsection