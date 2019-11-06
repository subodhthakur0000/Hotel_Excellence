@extends('cd-admin.admin')
@section('content')

<section class="content-header">
  <h1>
    SEO
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-search"></i>Home</a></li>
    <li class="active"><a href="{{url('/viewseo')}}">SEO</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div>
       <a href="{{url('/addseo')}}"> <button type="button" class="btn btn-info">Add SEO</button></a>
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
          @elseif(Session::has('deletesuccess'))
          <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Deleted Successfully</strong>
            {{Session::get("message", '')}}
          </div>
          @endif
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">SEO</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Page Title</th>
                <th>SEO Title</th>
                <th>SEO Keyword</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($seo as $seos)
              <tr>
                <td>{{e($seos['pagetitle'])}}</td>
                <td>{{e($seos['seotitle'])}}
                </td>
                <td>{{e($seos['seokeyword'])}}</td>
                <td> 
                 <div class="btn-group">
                   <button type="button" class="btn btn-default">Action</button>
                   <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                     <span class="caret"></span>
                     <span class="sr-only">Toggle Dropdown</span>
                   </button>
                   <ul class="dropdown-menu" role="menu">
                     <li><a data-toggle="modal" data-target="#modal">View</a></li>
                     <li><a data-toggle="modal" href="{{url('/editseo',$seos->id)}}">Edit</a></li>
                     <li><a data-toggle="modal" data-target="#modal-danger{{$seos->id}}">Delete</a></li>
                   </ul>
                 </div>
               </td>
             </tr>
             @endforeach
   </tbody>
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
@foreach($seo as $seos)
<!-- pop up models for view-->
<div class="modal fade" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">View SEO</h4>
        </div>
        <div class="modal-body">
          <strong>Page Title</strong>
                <p>{!!e($seos['pagetitle'])!!}</p><br>
                <strong>SEO Title</strong>
                <p>{!!e($seos['seotitle'])!!}</p><br>
                <strong>SEO Keyword</strong>
                <p>{!!e($seos['seokeyword'])!!}</p><br>
                <strong>SEO Description</strong>
                <p>{!!$seos['seodescription']!!}</p><br>
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
        <div class="modal modal-danger fade" id="modal-danger{{$seos->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">SEO</h4>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to delete {{e($seos['pagetitle'])}} ?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                  <form action="{{url('/deleteseo/'.$seos->id)}}" method="POST">
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


  <!-- pop up models for edit-->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit SEO</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form role="form">
                    <div class="box-body">
                      <div class="form-group">
                        <label>Select Page Title</label>
                        <select class="form-control">
                          <option>Home</option>
                          <option>About</option>
                          <option>Accomodation </option>
                          <option>Room </option>
                          <option>Facilities </option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">SEO Title</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Edit Title">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">SEO Description</label>
                        <textarea id="compose-textarea" class="form-control" style="height: 300px">


                        </textarea>
                      </div>
                    </form>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-info">Update</button>
                    </div>
                  </div>

                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
          </div>
        </div>
      </div>
    </div>

    @endforeach
    @endsection