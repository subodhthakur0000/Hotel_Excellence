@extends('cd-admin.admin')
@section('content')
<section class="content-header">
  <h1>Admin<small>Details</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-support"></i> Home</a></li>
    <li class="active"><a href="{{url('/viewadmin')}}">Admin</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      @foreach($data as $datas)
      @if($datas->role=="SuperAdmin" && $datas->name==Auth::user()->name)
      <div>
       <a href="{{url('/addadmin')}}"> <button type="button" class="btn btn-info">Add Admin</button></a>
     </div>
     @endif
     @endforeach
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
          @elseif(Session::has('deletesuccess'))
          <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Deleted Successfully</strong>
            {{Session::get("message", '')}}
          </div>
          @endif
     <div class="box">
      <div class="box-header">
        <h3 class="box-title">View Admin</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
           @foreach($data as $datas)
           <tr>
            <td>{{e($datas->name)}}</td>
            <td>{{e($datas->email)}}</td>
            <td>{{e($datas->role)}}</td>
            <td>
            @if($datas->role!="SuperAdmin" && $datas->name!=Auth::user()->name)       
            <a data-toggle="modal" data-target="#modal-danger{{$datas->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
            @endif
           </td>
         </tr>
         @endforeach
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

@foreach($data as $datas)
        <div class="modal modal-danger fade" id="modal-danger{{$datas->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Admin</h4>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to delete {{e($datas->name)}}?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                  <form action="{{url('/deleteadmin/'.$datas->id)}}" method="POST">
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

      @endsection