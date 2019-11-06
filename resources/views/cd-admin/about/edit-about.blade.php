@extends('cd-admin.admin')
@section('content')
        <section class="content-header">
          <h1>
            About
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('/dashboard')}}"><i class="fa fa-info"></i>Home</a></li>
            <li class="active"><a href="{{url('/viewabout')}}">About</a></li>
            <li class="active"><a href="{{url()->current()}}">Edit</a></li>
          </ol>
        </section>
<section class="content">
  <div class="row">
  <div class="col-md-12 ">
     <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit About Details</h3>
            </div>
          <form action="{{route('aboutupdate',$about->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
                    <form role="form">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Edit Title" value="{{$about['title']}}">
                          <div class="text text-danger">{{ $errors->first('title') }}</div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Summary</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" name="summary" placeholder="Edit Summary" value="{{$about['summary']}}" >
                          <div class="text text-danger">{{ $errors->first('summary') }}</div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Description</label>
                          <textarea id="summernote" placeholder="Edit Description" name="description">{{$about['description']}}</textarea>
                          <div class="text text-danger">{{ $errors->first('description') }}</div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">Image Upload</label>
                          <input type="file" name="image">
                          <div class="text text-danger">{{ $errors->first('image') }}</div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Image Description</label>
                          <input type="text" class="form-control" id="" name="imagedescription" placeholder="Enter Alternative Image Description" value="{{$about['imagedescription']}}" >
                          <div class="text text-danger">{{ $errors->first('imagedescription') }}</div>
                        </div>
                      <div>
                        <a href=""><button type="submit" class="btn btn-info" name="update">Update</button></a>
                      </div>
                    </form>
                    <a href="{{URL()->previous()}}"><button type="button" class="btn btn-default pull-right" data-dismiss="modal">Back</button></a>
                </div>
              </div>
              </div>
</section> 
        @endsection