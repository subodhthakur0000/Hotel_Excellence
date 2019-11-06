<div class="container-fluid fixed-top header-bg">
  <nav class="container navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand header-logo" href="{{url('/')}}"><img src="{{url('public/images/logo.png')}}" alt="" class="img-fluid"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse header-menu" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/')}}">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('about')}}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('accomodation')}}">Accomodation</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle">Room</a>
          <div class="dropdown-menu">
            <?php $room = App\Room::all();?>
            @foreach($room as $rooms)
            <a class="dropdown-item" href="{{url('/room',$rooms->id)}}">{{$rooms->title}}</a>
            @endforeach
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('album')}}">Facilities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('contact')}}">Contact</a>
        </li>
      </ul>
    </div>
  </nav>
</div>

<div class="container" style="margin-top: 90px;">

</div>