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
      </ol>
    </section>
        <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{e($program)}}</h3>

              <p>Tailored Programs</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{url('/viewtailoredprograms')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$countreplied}}</h3>

              <p>Replied Feedback</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{url('/feedback')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$countnotreplied}}</h3>

              <p>Not Replied Feedback</p>
            </div>
            <div class="icon">
              
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{url('/feedback')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$countquickmail}}</h3>
              <p>Quick Mail</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('/viewquickmail')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Quick Email</h3>
              <!-- tools box -->
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form action="{{url('/storequickmail')}}" method="post">
                @csrf
                <div class="form-group">
                  <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" placeholder="Subject">
                </div>
                <div>
                  <textarea class="textarea" name="message" placeholder="Message"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              
            </div>
            <div class="box-footer clearfix">
              <button type="submit" class="pull-right btn btn-default" id="sendEmail">Send
                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
            </form>
          </div>

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
          <div class="box box-info">
          <!-- Map box -->

            <div class="table-responsive mailbox-messages">

              <h3 class="box-title" align="center">Recent Quick Email</h3>
                <table class="table table-hover table-striped">
                  <tbody>
                  @foreach($quick as $quiks)
                    <tr>
                    <td class="mailbox-name"><a href=""data-toggle="modal" data-target="#modal{{$quiks->id}}">{{$quiks->emailto}}</a></td>
                    <td class="mailbox-subject">{!!str_limit(e($quiks->subject),$limit='10')!!}</td>
                    <td class="mailbox-subject">{!!str_limit($quiks->message,$limit='10')!!}</td>
                    <td class="mailbox-date"><?php $to_time = strtotime($quiks->created_at);
                    $now = Carbon\Carbon::now('Asia/Kathmandu');
$from_time = strtotime($now);
$difftime = round(abs($to_time - $from_time) / 60,2). " minute";
echo $difftime;


 ?></td>
                  </tr>
                  @endforeach

                  </tbody>
                </table>
                <!-- /.table -->
                <div class="box-tools" align="center">
                <a href="{{url('/viewquickmail')}}"><button type="button" class="btn btn-info btn-sm">View Quick Emails</button></a>
              </div>
              </div>
              <!-- /.mail-box-messages -->
            </div>

          <!-- /.box -->
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->


    @foreach($quick as $quiks)
    <div class="modal fade" id="modal{{$quiks->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
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