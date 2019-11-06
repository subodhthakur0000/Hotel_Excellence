@extends('cd-admin.admin')
@section('content')
<section class="content-header">
	<h1>
		Facilities
		<small>Detail</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{url('/dashboard')}}"><i class="fa fa-file-photo-o"></i> Home</a></li>
		<li class="active"><a href="{{url('/viewfacilities')}}">Facilities</a></li>
		<li class="active"><a href="{{url()->current()}}">Album</a></li>
    	</ol>
</section>
<section class="content">
  <div class="row">
	<div class="col-md-12">
     <div class="box">
      <div class="box-header">
        <h3 class="box-title">Add Album Image</h3>
      </div>
      <form role="form" action="{{url('/storeimage',$facilities['id'])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <strong>Album Name</strong><br>
            {{$facilities['title']}}
            <input type="hidden" name="facilities_id" value="{{$facilities['id']}}">
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
            <button type="submit" class="btn btn-info pull-left">Add Image</button>
          </div>
        </div>
      </form>
      <a href="{{URL()->previous()}}"><button type="button" class="btn btn-default">Back</button></a>
    </div>
  </div>
</div>
</section> 
@endsection