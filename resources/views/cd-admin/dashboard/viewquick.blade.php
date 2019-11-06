@extends('cd-admin.admin')
@section('content')
     <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="active"><a href="{{url('/viewquickmail')}}">Quick Email</a></li>
      </ol>
    </section>
     @if(Session::has('deletereply'))
          <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sent Message Deleted</strong>
            {{Session::get("message", '')}}
          </div>
      @endif
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div>
          <a href="{{URL()->previous()}}"><button type="button" class="btn btn-info">Back</button></a>
        </div><br>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Emails</h3>
              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
            </div>
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                </div>
              </div>
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                 @foreach($quick as $quiks)
                  <tr>
                    <td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger{{$quiks['id']}}"><i class="fa fa-trash-o"></i></button></td>
                    <td ><a data-toggle="modal" data-target="#modal{{$quiks['id']}}"> <button type="button" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></button></a></td>
                    <td class="mailbox-name">{{e($quiks['emailto'])}}</td>
                    <td class="">{{e($quiks['subject'])}}</td>
                    <td class="">{!!str_limit($quiks['message'],$limits='30')!!}
                    </td>
                    <td class="mailbox-date">{{ Carbon\Carbon::parse($quiks->created_at)->format('d-m-Y i') }}</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </section>



@foreach($quick as $quiks)
<!--Models for delete image-->
<div class="modal modal-danger fade" id="modal-danger{{$quiks['id']}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Quick Email</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete email ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
          <form action="{{url('/deletequick',$quiks['id'])}}" method="post">
            @csrf
            @method('DELETE')
          <button type="submit" class="btn btn-outline">Yes</button>
          </form>
        </div>
      </div>
    </div>
  </div>




<div class="modal fade" id="modal{{$quiks->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">View Quick Email</h4>
      </div>
        <div class="modal-body">
          <strong>Email To </strong>
          <p>{!!e($quiks['emailto'])!!}</p><br>
          <strong>Subject</strong>
          <p>{!!e($quiks['subject'])!!}</p><br>
          <strong>Message</strong>
          <p>{!!$quiks['message']!!}</p><br>
          <strong>Sent At</strong>
          <p>{!!$quiks['created_at']!!}</p><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>  
  </div>
@endforeach


@endsection