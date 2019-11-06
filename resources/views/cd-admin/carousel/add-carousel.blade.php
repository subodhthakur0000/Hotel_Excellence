@extends('cd-admin.admin')
@section('content')
<section class="content">
<div class="col-md-12 ">
  <div class="row">
    <section class="content-header">
      <h1>
        Carousel 
        <small>Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-file-image-o"></i> Home</a></li>
        <li><a href="{{url('/viewcarousel')}}">Carousel</a></li>
        <li><a href="{{url()->current()}}">Add</a></li>
      </ol>
    </section><br>

     <div class="box">
      <div class="box-header">
        <h3 class="box-title">Add Carousel Details</h3>
      </div>
      <form role="form" action="{{url('/storecarousel')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputPassword1"> Image Title</label>
            <input type="text" class="form-control" id="" placeholder="Enter Album Title" name="title" value="{{old('title')}}">
            <div class="text text-danger">{{ $errors->first('title') }}</div>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Image Upload</label>
            <input type="file" id="exampleInputFile" name="image" value="{{old('image')}}">
            <div class="text text-danger">{{ $errors->first('image') }}</div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Image Description</label>
            <input type="text" class="form-control" id="" placeholder="Enter Alternative Image Description" name="imagedescription" value="{{old('imagedescription')}}">
            <div class="text text-danger">{{ $errors->first('imagedescription') }}</div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Status</label><br>
            <input type="radio" name="status" checked value="Active"> Active &nbsp; &nbsp; &nbsp; &nbsp;
            <input type="radio" name="status" value="Inactive"> Inactive
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-info pull-left">Add Carousel</button>
          </div>
        </div>
      </form>
      <a href="{{URL()->previous()}}"><button type="button" class="btn btn-default">Back</button></a>
    </div>
  </div>
</div>
</section> 
@endsection