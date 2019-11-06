@extends('cd-admin.admin')
@section('content')
<section class="content-header">
  <h1>
    Tailored<small> Programs</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-suitcase"></i> Home</a></li>
    <li class="active"><a href="{{url('/viewtailoredprograms')}}">Tailored Programs</a></li>
    <li class="active"><a href="{{url('/addtailoredprograms')}}">Add</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add Tailored Program
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{url('/storetailoredprogram')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter Tailored Program Title" value="{{old('title')}}">
                <div class="text text-danger">{{ $errors->first('title') }}</div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Summary</label>
                <input type="text" class="form-control" name="summary" placeholder="Enter Tailored Program Summary" value="{{old('summary')}}">
                <div class="text text-danger">{{ $errors->first('summary') }}</div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <textarea id="summernote" name="description" placeholder="Enter Tailored Program Description">{{old('description')}}</textarea>
                <div class="text text-danger">{{ $errors->first('description') }}</div>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Image Upload</label>
                <input type="file" name="image" value="{{old('image')}}">
                <div class="text text-danger">{{ $errors->first('image') }}</div>

                <p class="help-block">Choose Tailored Program Image.</p>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Image Description</label>
                <input type="text" class="form-control" name="imagedescription" placeholder="Enter Alternative Image Description" value="{{old('imagedescription')}}">
                <div class="text text-danger">{{ $errors->first('imagedescription') }}</div>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Status</label><br>
                <input type="radio" name="status" checked value="Active"> Active &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" name="status" value="Inactive"> Inactive
                <input type="hidden" name="slug" checked value="">
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info ">Add Tailored Program</button>
              </div>
            </div>
          </form>
          <a href="{{url()->previous()}}"><button type="button" class="btn btn-default pull-right">Back</button></a>
        </div>
      </div>
      </div>
  </section>
  @endsection