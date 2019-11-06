@extends('cd-admin.admin')
@section('content')
<section class="content">
<div class="row">
<div class="col-md-12 ">
   <section class="content-header">
    <h1>Accomodation<small>Detail</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{url('/dashboard')}}"><i class="fa fa-support"></i> Home</a></li>
      <li class="active"><a href="{{url('/viewaccomodation')}}">Accomodation</a></li>
      <li class="active"><a href="{{url()->current()}}">Add</a></li>
    </ol>
  </section><br>
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Add Accomodation Details</h3>
    </div>
    <form action="{{url('/storeaccomodation')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <form role="form">
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Edit Title" value="{{old('title')}}">
            <div class="text text-danger">{{ $errors->first('title') }}</div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Head Description</label>
            <textarea class="summernote" placeholder="Head Description" name="headdescription" >{{old('headdescription')}}</textarea>
            <div class="text text-danger">{{ $errors->first('headdescription') }}</div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Body Description</label>
            <textarea class="summernote" placeholder="Body Description" name="bodydescription" >{{old('bodydescription')}}</textarea>
            <div class="text text-danger">{{ $errors->first('bodydescription') }}</div>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Status</label><br>
            <input type="radio" checked name="status" value="Active"> Active <br>
            <input type="radio" name="status" value="Inactive">Inactive
          </div>
        <div>
          <button type="submit" class="btn btn-info" name="insert">Add Accomodation</button>
        </div>
        </div>
      </form>
      <a href="{{URL()->previous()}}"><button type="button" class="btn btn-default pull-right" data-dismiss="modal">Back</button></a>
    </div>
  </div>
</section> 
@endsection