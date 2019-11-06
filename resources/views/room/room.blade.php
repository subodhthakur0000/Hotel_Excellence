@extends('home-master')

<!-- page title -->
@section('page-title',$seo->seotitle)
@section('keyword',$seo->seokeyword)	
@section('description',$seo->seodescription)	

<!-- website content -->
@section('content')
<div class="container pad-top pad-bot deluxe-room-top">
	@foreach($data as $d)
	<h2>{{e($d->title)}}</h2>
	<p>{!!$d->description!!}</p>
	@endforeach

	<h4>Images</h4>
	<div class="row">
		@foreach($data as $d)
		<div class="col-md-4">
			<a class="thumbnail fancybox album-link" href='{{ url("public/uploads/".$d->image)}}' rel="lightbox">
				<div class="deluxe-room-image relative-container">
					<img class="img-responsive album-image" alt="" src='{{ url("public/uploads/".$d->image)}}'>
					<div class="relative-albumcontent deluxe-room-content ">
						<span>
							<h3>{{e($d->imagedescription)}}</h3>
						</span>
					</div>
				</div>
			</a>
		</div>
		@endforeach
	</div>
</div>



@endsection