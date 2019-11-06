@extends('cd-admin.admin')
@section('content')
<section class="content-header">
  <h1>
    Facilities 
    <small>Details</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-file-image-o"></i> Home</a></li>
    <li class="active"><a href="{{url('/viewfacilities')}}">Facilities</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-xs-12">
      @if(Session::has('success'))
      <div class="alert alert-success alert-dismissible">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Image Inserted Successfully</strong>
        {{Session::get("message", '')}}
      </div>
      @elseif(Session::has('deletesuccess'))
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Image Deleted Successfully</strong>
        {{Session::get("message", '')}}
      </div>
      @endif
      <div>
        <a href="{{URL('/addfacilities')}}">
          <button type="button" class="btn btn-info">
          Add Album</button></a>
        </div><br>
        <div class="box box-primary">
          <div class="box-header with-border">
            <div>
              <h3 class="box-title">View Facilities Album</h3><br><br>
            </div>

            @foreach($facilities as $facility)
            <div class="container" id="status">
              <div>
                <h3>{{$facility['title']}}</h3>
              </div>
              <form action="{{url('/updatefacilities/'.$facility->id)}}" method="POST">
                @csrf
                <div class="btn-group pull-right">
                 @if($facility->status == 'Active')
                 <button type="button" class="btn btn-success">{{$facility->status}}</button>
                 @else
                 <button type="button" class="btn btn-danger">{{$facility->status}}</button>
                 @endif
                 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                @if($facility->status == 'Active')
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
            <div>
              <img src="{{ url('public/uploads/'.$facility->image)}}" alt="">
            </div>
            <div>
              <button class="btn btn-danger pull-left"  data-toggle="modal" data-target="#modal-danger{{$facility->id}}"><i class="fa fa-trash"></i></button>
              <a href="{{URL('/viewimage',$facility['id'])}}"><button class="btn btn-success pull-right">View</button></a>
            </div>
          </div>
          
          
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<!-- css of album -->
<style type="text/css">

  .container{
    width: calc(48% - 6px);
    overflow:hidden;
    height: fit-content;
    margin:3px;
    padding: 0;
    display:block;
    position:relative;
    float:left;
  }
  img{
    width: 1200px;
    height: 300px;
    transition-duration: .3s;
    max-width: 100%;
    display:block;
    overflow:hidden;
    cursor:pointer;
  }

  #status{
    border-radius: 5px;
    border: 5px solid #FFFFFF;
    margin: 10px;
    box-shadow: 0px 0px 0px 5px rgba(0, 0, 0, 0.3), 
             0px 10px 5px 0px rgba(0, 0, 0, 0.6);
  }
  @media only screen and (max-width: 900px) {
    .container {
      width: calc(50% - 6px);
    }
  }
  @media only screen and (max-width: 400px) {
    .container {
      width: 100%;
    }
  }
</style>

      @foreach($facilities as $facility)

      <!--Models for delete image-->
      <div class="modal modal-danger fade" id="modal-danger{{$facility->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Facilities</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete {{e($facility['title'])}}?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <form action="{{url('/deletefacilities/'.$facility->id)}}" method="POST">
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