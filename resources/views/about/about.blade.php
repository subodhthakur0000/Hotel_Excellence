@extends('home-master')

<!-- page title -->
@section('page-title',$seo->seotitle)
@section('keyword',$seo->seokeyword)	
@section('description',$seo->seodescription)		



<!-- website content -->
@section('content')
<div class="container pad-top pad-bot about-top">
	<h2>{{e($about->title)}} <span>us</span></h2>
	<div class="about-image">
		<img src='{{ url("public/uploads/".$about->image)}}' alt="About Image" class="img-fluid">
	</div>
	<div class="about-text">
		<p>
		{!!$about->description!!}</p>
	</div>
</div>


<div class="container pad-bot">
	<div class="about-obj-text">
		<h3>The accommodation</h3>
		<p>Reasons to stay</p>
	</div>

	<div class="row">
		@foreach($data as $d)
		<div class="col-md-4 about-obj-card">
			<h5>{{e($d->title)}}</h5>
			<p>{{e($d->summary)}}</p>
		</div>
		@endforeach
	</div>
</div>
@endsection