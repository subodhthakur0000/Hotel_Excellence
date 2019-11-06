@extends('cd-admin.admin')
@section('content')
<section class="content-header">
  <h1>
    Feedback
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-search"></i>Home</a></li>
    <li class="active"><a href="{{'/feedback'}}">Feedback</a></li>
    <li class="active"><a href="{{url()->current()}}">Reply</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
        <div class="col-md-12">
         <div class="box">
          <div class="box-header">
            <h3 class="box-title">Reply Form</h3>
          </div>
          <form action="{{url('/replystore',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <p>{{$data['email']}}</p>
                  <input type="hidden"   name="email"  value="{{$data['email']}}" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Message</label>
                  <textarea id="summernote" placeholder="Enter Description" name="message" ></textarea>
                </div>
                 <input type="hidden" name="status"checked value="Replied">
                <div>
                  <button type="submit" class="btn btn-info">Send</button>
                </div>
              </form>
              <a href="{{URL()->previous()}}"><button type="button" class="btn btn-default pull-right" data-dismiss="modal">Back</button></a>
            </div>

          </div>
        </div>
  </section> 
  @endsection