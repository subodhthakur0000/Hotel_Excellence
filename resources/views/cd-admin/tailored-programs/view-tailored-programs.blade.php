@extends('cd-admin.admin')
@section('content')
<section class="content-header">
  <h1>Tailored <small>Programs</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-support"></i> Home</a></li>
    <li class="active"><a href="{{url('/viewtailoredprograms')}}">Tailored Programs</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div>
        <a href="{{url('/addtailoredprograms')}}"><button type="button" class="btn btn-info">ADD PROGRAM</button></a>
      </div>
      <br>
      @if(Session::has('success'))
      <div class="alert alert-success alert-dismissible">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Inserted Successfully</strong>
        {{Session::get("message", '')}}
      </div>
      @elseif(Session::has('updatesuccess'))
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Updated Successfully</strong>
        {{Session::get("message", '')}}
      </div>
      @elseif(Session::has('statusupdatesuccess'))
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Status Updated Successfully</strong>
        {{Session::get("message", '')}}
      </div>
      @elseif(Session::has('deletesuccess'))
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Deleted Successfully</strong>
        {{Session::get("message", '')}}
      </div>
      @endif
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">View Tailored Programs Details</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Title</th>
                <th>Summary</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($program as $programs)
              <tr>
                <td>{{e($programs['title'])}}</td>
                <td>{{e($programs['summary'])}}</td>
                <td>
                  <form action="{{url('/updatetailoredstatus/'.$programs->slug)}}" method="POST">
                    @csrf
                    <div class="btn-group">
                     @if($programs->status == 'Active')
                     <button type="button" class="btn btn-success">{{$programs->status}}</button>
                     @else
                     <button type="button" class="btn btn-danger">{{$programs->status}}</button>
                     @endif
                     <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    @if($programs->status == 'Active')
                    <div class="dropdown-menu" role="menu" style="min-width: 0px;">
                      <li> <button class="btn btn-danger" type="submit">Inactive</button>
                      </li>
                    </div>
                    @else
                    <div class="dropdown-menu" role="menu" style="min-width: 0px;">
                      <li> <button class="btn btn-success" type="submit">Active</button>
                      </li>
                    </div>
                    @endif
                  </div> 
                </form>  
              </td>
              <td>
                <div class="btn-group">
                   <button type="button" class="btn btn-default">Action</button>
                   <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                     <span class="caret"></span>
                     <span class="sr-only">Toggle Dropdown</span>
                   </button>
                   <ul class="dropdown-menu" role="menu">
                    <li><a data-toggle="modal" data-target="#modal-default{{$programs->slug}}">View</a></li>
                    <li><a data-toggle="modal" href="{{URL('/edittailoredprogram',$programs['slug'])}}">Edit</a></li>
                    <li><a data-toggle="modal" data-target="#modal-danger{{$programs->slug}}">Delete</a></li>
                  </ul>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>Title</th>
            <th>Summary</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- ./wrapper -->

@foreach($program as $programs)

<!-- pop up models for view -->
<div class="modal fade" id="modal-default{{$programs->slug}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">View Tailored Programs</h4>
        </div>
        <div class="modal-body">
          <strong>Title</strong>
          <p>{{e($programs['title'])}}</p><br>
          <strong>Summary</strong>
          <p>{{e($programs['summary'])}}</p><br>
          <strong>Description</strong>
          <p>{!!$programs['description']!!}</p><br>
          <strong>Image Upload</strong>
          <p><img src='{{ url("public/uploads/".$programs->image)}}' class="image1"></p><br>
          <strong>Image Description</strong>
          <p>{{e($programs['imagedescription'])}}</p><br>
          <strong>Status</strong>
          <p>{{$programs['status']}}</p><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  <!--Models for delete -->
  <div class="modal modal-danger fade" id="modal-danger{{$programs->slug}}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tailored Program</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete {{e($programs->title)}}?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
            <form action="{{url('/deletetailoredprogram/'.$programs->slug)}}" method="POST">
              @method('DELETE')
              <button type="submit" class="btn btn-outline">Yes</button>
              @csrf
            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

  @endforeach


  <style type="text/css">
    .image1{
      height: 200px;
      width: 200px;
    }

  </style>

  @endsection