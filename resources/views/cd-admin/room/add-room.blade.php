@extends('cd-admin.admin')
@section('content')
<section class="content">
  <div class="row">
    <section class="content-header">
      <h1>
        Room
        <small>Detail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="{{url('/viewroom')}}">Room</a></li>
        <li class="active"><a href="{{url()->current()}}">Add Room</a></li>
      </ol>
    </section>
        <div class="col-md-12">
         <div class="box">
          <div class="box-header">
            <h3 class="box-title">Add About Details</h3>
          </div>
          <form action="{{url('/storeroom')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Enter Title" value="{{old('title')}}" >
                  <div class="text text-danger">{{ $errors->first('title') }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Summary</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="summary" placeholder="Enter Summary" value="{{old('summary')}}" >
                  <div class="text text-danger">{{ $errors->first('summary') }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea id="summernote" placeholder="Enter Description" name="description" >{{old('description')}}</textarea>
                  <div class="text text-danger">{{ $errors->first('description') }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image Upload</label>
                  <input type="file" name="image" value="{{old('image')}}">
                  <div class="text text-danger">{{ $errors->first('image') }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Image Description</label>
                  <input type="text" class="form-control" id="" name="imagedescription" placeholder="Enter Alternative Image Description" value="{{old('imagedescription')}}" >
                  <div class="text text-danger">{{ $errors->first('imagedescription') }}</div>
                </div>
                <div class="form-group">
            <label for="exampleInputPassword1">Status</label><br>
            <input type="radio" name="status" checked value="Active"> Active &nbsp; &nbsp; &nbsp; &nbsp;
            <input type="radio" name="status" value="Inactive"> Inactive
          </div>

                <div>
                  <button type="submit" class="btn btn-info" name="insert">Add Room</button>
                </div>
              </form>
              <a href="{{URL()->previous()}}"><button type="button" class="btn btn-default pull-right" data-dismiss="modal">Back</button></a>
            </div>

          </div>
    </div>
  </section> 
  @endsection