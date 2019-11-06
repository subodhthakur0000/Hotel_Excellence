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
        <li class="active"><a href="{{url()->current()}}">Edit Room</a></li>
      </ol>
    </section>
    <div class="col-xs-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Room
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{url('/updateroom',$room['id'])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
             <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Enter Title" value="{{$room['title']}}" >
              <div class="text text-danger">{{ $errors->first('title') }}</div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Summary</label>
              <input type="text" class="form-control" name="summary" placeholder="Enter Tailored Program Summary" value="{{$room['summary']}}">
              <div class="text text-danger">{{ $errors->first('summary') }}</div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <textarea id="summernote" name="description" placeholder="Enter Tailored Program Description">{{$room['description']}}</textarea>
              <div class="text text-danger">{{ $errors->first('description') }}</div>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Image Upload</label>
              <input type="file" name="image" value="{{$room['image']}}">
              <div class="text text-danger">{{ $errors->first('image') }}</div>

              <p class="help-block">Choose Room Image.</p>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Image Description</label>
              <input type="text" class="form-control" name="imagedescription" placeholder="Enter Alternative Image Description" value="{{$room['imagedescription']}}">
              <div class="text text-danger">{{ $errors->first('imagedescription') }}</div>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Status</label><br>
              <input type="radio" name="status" checked value="Active"> Active &nbsp; &nbsp; &nbsp; &nbsp;
              <input type="radio" name="status" value="Inactive"> Inactive
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-info ">Update Room</button>
          </div>
        </form>
        <a href="{{url()->previous()}}"><button type="button" class="btn btn-default pull-right">Back</button></a>
      </div>
      <!-- /.box -->

    </div>
  </div>
</section>
@endsection