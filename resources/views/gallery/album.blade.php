@extends('home-master')

<!-- page title -->
@section('page-title',$seo->seotitle)
@section('keyword',$seo->seokeyword)	
@section('description',$seo->seodescription)

<!-- website content -->
@section('content')
<div class="container padding-tb top-bg">
	<h2>album</h2>
	<div class="row">
		@foreach($facilities as $f)
		<div class="col-md-6">
			<a href="{{url('/images',$f->id)}}" class="album-link">
				<div class="album-img relative-container">
					<img src="{{ url('public/uploads/'.$f->image)}}" class="img-responsive album-image">
					<div class="relative-albumcontent album-content ">
						<span>
							<h3>{{e($f->title)}}</h3>
						</span>
					</div>
				</div>
			</a>
		</div>
		@endforeach
		
		
		<!-- <div class="col-md-6">
			<a href="{{url('floor-plan')}}" class="album-link">
				<div class="album-img relative-container">
					<img src="{{url('public/images/floor/floor1.jpg')}}" class="img-responsive album-image">
					<div class="relative-albumcontent album-content">
						<span>
							<h3>Floor Plan</h3>
						</span>
					</div>
				</div>
			</a>
		</div> -->
	</div>
</div>	
@endsection