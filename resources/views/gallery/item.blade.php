@extends('home-master')

<!-- page title -->
@section('page-title',$album_name->seotitle)
@section('keyword',$album_name->seokeyword)	
@section('description',$album_name->seodescription)


<!-- website content -->
@section('content')
<div class="container padding-tb top-bg">
	<h2>{{e($album_name->title)}}</h2>
	<div class="row gallery-row-padding">
		@foreach($image as $images)
		<div class="col-md-4">
			<div class="gallery-img relative-container">
				<a class="thumbnail fancybox" href="{{ url('public/uploads/'.$images->image)}}" rel="lightbox">
					<img src="{{ url('public/uploads/'.$images->image)}}" class="img-responsive gallery-image">
					<img src="" alt="">
				</a>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection