@extends('home-master')

<!-- page title -->
@section('page-title',$seo->seotitle)
@section('keyword',$seo->seokeyword)	
@section('description',$seo->seodescription)	

<!-- website content -->
@section('content')
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner home-carousel">
<!-- 		<div class="container-fluid pad-0 treasure-global-btn" style="position: relative;margin-bottom: -43px;z-index: 1;">
			<a href="{{url('floor-plan')}}" style="margin-top: 15px;">
				<p><span>LEARN ABOUT FUTURE PROJECT</span></p>
			</a>
		</div> -->
		@foreach ($carousel as $key => $carousels)
    	<div class="{{ $key == 0 ? 'carousel-item active' : 'carousel-item' }}">
        		<img class="d-block w-100" src="{{ url('public/uploads/'.$carousels->image)}}" alt="SliderImage">
   		 </div>
		@endforeach
	</div>
	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>




<div class="container pad-top pad-bot">
	<div class="row">
		<div class="col-md-5">
			<div class="home-about-image">
				<img src='{{ url("public/uploads/".$about->image)}}' alt="" class="img-fluid">
			</div>
		</div>
		<div class="col-md-7">
			<div class="home-about-text">
				<h2>Learn About <span>Hotel Excellence</span></h2>
				<p>{{e($about->summary)}}</p>
				<div class="container-fluid pad-0 treasure-global-btn">
					<a href="{{url('about')}}" style="margin-top: 15px;">
						<p><span>LEARN MORE</span></p>
					</a>
				</div>
			</div>
		</div>
	</div>	
</div>



<div class="container pad-bot home-excellence-card">
	<h3><!-- Center For <span>Excellence</span> -->Room</h3>
	@foreach($data as $key => $d)
	@if($key % 2 == 0)
	<div class="row pad-bot">
		<div class="col-md-6">
			<div class="home-excellence-image">
				<img src='{{ url("public/uploads/".$d->image)}}' alt="" class="img-fluid">
			</div>
		</div>
		<div class="col-md-6 home-excellence-text">
			<h5>{{e($d->title)}}</h5>
			<p>{{e($d->summary)}}</p>
		</div>
	</div>
	@else
	<div class="row pad-bot">
		<div class="col-md-6 home-excellence-text-1">
			<h5>{{e($d->title)}}</h5>
			<p>{{e($d->summary)}}</p>
		</div>
		<div class="col-md-6">
			<div class="home-excellence-image">
				<img src='{{ url("public/uploads/".$d->image)}}' alt="" class="img-fluid">
			</div>
		</div>
	</div>
	@endif
	@endforeach
	@foreach($data as $key => $d)
	@if($key == 0)
	<div class="container-fluid pad-0 treasure-global-btn">
		<a href="{{url('/room',$d->id)}}" style="margin-top: 15px;">
			<p><span>VIEW ALL</span></p>
		</a>
	</div>
	@endif
	@endforeach
</div>
</div>

@endsection