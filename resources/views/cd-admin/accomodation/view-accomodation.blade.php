@extends('cd-admin.admin')
@section('content')
<section class="content-header">
  <h1>Accomodation<small>Details</small></h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-support"></i> Home</a></li>
    <li class="active"><a href="{{url('/viewaccomodation')}}">Accomodation</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div>
       <a href="{{url('/insertaccomodation')}}"> <button type="button" class="btn btn-info">Add Accomodation</button></a>
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
        <h3 class="box-title">View Accomodation</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Title</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
           @foreach($accomodation as $accomodations)
           <tr>
            <td>{{e($accomodations['title'])}}</td>
            <td>{!!str_limit($accomodations['headdescription'],$limits='50')!!}
            </td>
            <td>
              <form action="{{url('/updateaccomodationstatus/'.$accomodations->id)}}" method="POST">
                @csrf
                <div class="btn-group">
                 @if($accomodations->status == 'Active')
                 <button type="button" class="btn btn-success">{{$accomodations->status}}</button>
                 @else
                 <button type="button" class="btn btn-danger">{{$accomodations->status}}</button>
                 @endif
                 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                @if($accomodations->status == 'Active')
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
                 <li><a data-toggle="modal" data-target="#modal{{$accomodations->id}}">View</a></li>
                 <li><a data-toggle="modal" href="{{URL('/editaccomodation',$accomodations->id)}}">Edit</a></li>
                 <li><a data-toggle="modal" data-target="#modal-danger{{$accomodations->id}}">Delete</a></li>
               </ul>
             </div>
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

@foreach($accomodation as $accomodaions)
<!-- pop up models for view -->
<div class="modal fade" id="modal{{$accomodations->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">View Accomodation</h4>
        </div>
        <div class="modal-body">
          <strong>Title</strong>
          <p>{!!e($accomodaions['title'])!!}</p><br>
          <strong>Summary</strong>
          <p>{!!$accomodations['headdescription']!!}</p><br>
          <strong>Description</strong>
          <p>{!!$accomodations['bodydescription']!!}</p><br>
          <strong>Status</strong>
          <p>{!!$accomodations['status']!!}</p><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
    
  </div>
  



       <!--Models for delete -->
        <div class="modal modal-danger fade" id="modal-danger{{$accomodations->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Accomodation</h4>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to delete {{e($accomodations->title)}}?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                  <form action="{{url('/deleteaccomodation/'.$accomodations->id)}}" method="POST">
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
        #status{
          border-left: 6px solid red;
          background-color: lightgrey;
          border-radius: 5px;
        }
      </style>

      @endsection