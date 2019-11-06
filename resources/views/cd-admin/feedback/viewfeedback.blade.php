@extends('cd-admin.admin')
@section('content')
<section class="content-header">
  <h1>
    Feedback
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-search"></i>Home</a></li>
    <li class="active"><a href="{{url('/feedback')}}">Feedback</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div>
       <a href="{{url('/addfeedback')}}"> <button type="button" class="btn btn-info">Add Feedback</button></a>
       <a href="{{url('/sentmessage')}}"> <button type="button" class="btn btn-info">Sent Message</button></a>

     </div>
     <br>
      @if(Session::has('success'))
          <div class="alert alert-success alert-dismissible">
            <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>New Feedback Received!!!!!!!</strong>
            {{Session::get("message", '')}}
          </div>
          @elseif(Session::has('replysuccess'))
          <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Message Replied</strong>
            {{Session::get("message", '')}}
          </div>
          @elseif(Session::has('deletesuccess'))
          <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Feedback Deleted Successfully</strong>
            {{Session::get("message", '')}}
          </div>
          @endif

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Feedback</h3>

             
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                
                <!-- /.btn-group -->
                <a href="{{url('/feedback')}}"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>
              
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  @foreach($feed as $feeds)
                    <tr>
                    <td><a href="" class="btn btn-danger"  data-toggle="modal" data-target="#modal-danger{{$feeds->id}}"><i class="fa fa-trash"></i></a></td>
                    <td><a class="btn btn-default"  data-toggle="modal" data-target="#modal-view{{$feeds->id}}"><i class="fa fa-eye"></i></a></td>
                    <td class="mailbox-name">{{e($feeds->email)}}</td>
                    <td class="mailbox-subject">{!!$feeds->message!!}</td>
                    <td>
                    @if($feeds['status']=="Not Replied")
                    <button type="button" class="btn btn-warning">Not Replied</button>
                    @else
                      <button type="button" class="btn btn-primary">{{$feeds['status']}}</button>
                    @endif
                   </td>
                    <td class="mailbox-date">
                      <?php $date = Carbon\Carbon::parse($feeds->created_at);
                     $now = Carbon\Carbon::now();
                      $diff = $date->diffForHumans($now);
                      ?>
                      {{$diff}}</td>
                  </tr>
                  @endforeach

                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                
             
                <!-- /.btn-group -->
                <a href="{{url('/feedback')}}"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>
             
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>

      </section>

@foreach($feed as $feeds)

        <div class="modal fade" id="modal-view{{$feeds->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">View Feedback</h4>
              </div>
              <div class="modal-body">
                <p><b>Email ID:</b></p>
                <p>{{e($feeds->email)}}</p><br>
                <p><b>Message:</b></p>
                <p>{!!$feeds->message!!}</p><br>
                <p><b>Sent At:</b></p>
                <p>{{ Carbon\Carbon::parse($feeds->created_at)->format('d-m-Y i') }}</p><br>
                
              </div>
              <div class="modal-footer">
                <a href="{{url('replymessage',$feeds->id)}}"><button class="btn btn-primary">Reply</button></a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <!--Models for delete -->
        <div class="modal modal-danger fade" id="modal-danger{{$feeds->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Feedback</h4>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to delete {{e($feeds['email'])}}?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                  <form action="{{url('/deletefeedback/'.$feeds->id)}}" method="POST">
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