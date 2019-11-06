@extends('cd-admin.admin')
@section('content')
<section class="content-header">
  <h1>
    Carousel 
    <small>Details</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-file-image-o"></i> Home</a></li>
    <li class="active"><a href="{{url('/viewcarousel')}}">Carousel</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      @if(Session::has('success'))
      <div class="alert alert-success alert-dismissible">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Image Inserted Successfully</strong>
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
        <strong>Image Deleted Successfully</strong>
        {{Session::get("message", '')}}
      </div>
      @endif
      <div>
        <a href="{{URL('/addcarousel')}}">
          <button type="button" class="btn btn-info">
          Add Carousel</button></a>
        </div><br>
        <div class="box box-primary">
          <div class="box-header with-border">
            <div>
              <h3 class="box-title">View Carousel Images</h3><br><br>
            </div>
            @foreach($carousel as $carousels)
            <div class="container" id="status">
              <div>
                <h3>{{e($carousels['title'])}}</h3>
              </div>
              <form action="{{url('/updatecarousel/'.$carousels->id)}}" method="POST">
                @csrf
                <div class="btn-group pull-right">
                 @if($carousels->status == 'Active')
                 <button type="button" class="btn btn-success">{{$carousels->status}}</button>
                 @else
                 <button type="button" class="btn btn-danger">{{$carousels->status}}</button>
                 @endif
                 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                @if($carousels->status == 'Active')
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
              <img src="{{ url('public/uploads/'.$carousels->image)}}" alt="">
            </div>
            <div>
              <button class="btn btn-danger pull-left"  data-toggle="modal" data-target="#modal-danger{{$carousels->id}}"><i class="fa fa-trash"></i></button>
            </div>
          </div>
          @endforeach
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


      @foreach($carousel as $carousels)

      <!--Models for delete image-->
      <div class="modal modal-danger fade" id="modal-danger{{$carousels->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Carousel</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete {{e($carousels['title'])}} ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <form action="{{url('/deletecarousel/'.$carousels->id)}}" method="POST">
                  @method('DELETE')
                  <button type="submit" class="btn btn-outline">Yes</button>
                  @csrf
                </form>
              </div>
            </div>
          </div>
        </div>
      @endforeach



      @endsection