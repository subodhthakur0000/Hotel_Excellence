@extends('cd-admin.admin')
@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <section class="content-header">
         <h1> About<small>Details</small></h1>
         <ol class="breadcrumb">
          <li><a href="{{url('/dashboard')}}"><i class="fa fa-info"></i>Home</a></li>
          <li class="active"><a href="{{url('/viewabout')}}">About</a></li>
        </ol>
      </section>
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
          <br>
      <div>
        <a href="{{url('/insertabout')}}"><button type="button" class="btn btn-info">ADD ABOUT</button></a>
      </div>
      <br>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">View About Details</h3>
        </div>

        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Title</th>
                <th>Summary</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($about as $abouts)
              <tr>
                <td>{{e($abouts['title'])}}</td>
                <td>{!!str_limit(e($abouts['summary']),$limits='50')!!}</td>
                <td> 
                 <div class="btn-group">
                   <button type="button" class="btn btn-default">Action</button>
                   <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                     <span class="caret"></span>
                     <span class="sr-only">Toggle Dropdown</span>
                   </button>
                   <ul class="dropdown-menu" role="menu">
                     <li><a data-toggle="modal" data-target="#modal{{$abouts->id}}">View</a></li>
                     <li><a href="{{URL('/editabout',$abouts->id)}}">Edit</a></li>
                     <li><a data-toggle="modal" data-target="#modal-danger{{$abouts->id}}">Delete</a></li>
                   </ul>
                 </div>
               </td>
             </tr>
             @endforeach

           </tbody>
         </table>
       </div>
     </div>
   </div>
 </div>
</section> 


@foreach($about as $abouts)
<div class="modal fade creatuimg" id="modal{{$abouts->id}}">
  <div class="modal-dialog">
    <div class="modal-content creatuimg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">view About</h4>
        </div>
        <div class="modal-body">
          <strong>Title</strong>
          <p>{!!e($abouts['title'])!!}</p><br>
          <strong>Summary</strong>
          <p>{!!e($abouts['summary'])!!}</p><br>
          <strong>Description</strong>
          <p>{!!$abouts['description']!!}</p><br>
          <strong>Image Upload</strong>
          <p><img src='{{ url("public/uploads/".$abouts->image)}}' class="image"></p>
          <strong>Image Description</strong>
          <p>{!!e($abouts['imagedescription'])!!}</p><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


    <!--Models for delete -->
        <div class="modal modal-danger fade" id="modal-danger{{$abouts->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">About</h4>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to delete {{e($abouts->title)}}?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                  <form action="{{url('/deleteabout/'.$abouts->id)}}" method="POST">
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline">Yes</button>
                    @csrf
                  </form>
                </div>
              </div>
            </div>
          </div>

    <style>
      .image {
        height: 100px;
        width: 100px;
      }
    </style>
    
    @endforeach
    @endsection