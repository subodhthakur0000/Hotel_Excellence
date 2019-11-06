@extends('home-master')

<!-- page title -->
@section('page-title',$seo->seotitle)
@section('keyword',$seo->seokeyword)	
@section('description',$seo->seodescription)	


<!-- website content -->
@section('content')

<div class="container pad-top excellence-top">
	<h1>{{$accomodation->title}}</h1>
	<p>{!!$accomodation->headdescription!!}</p>
	<div class="container">
		<div class="row">
			@foreach($tailoredprograms as $t)
			<div class="col-md-3">
				<div class="excellence-card">
					<div class="excellence-card-image">
						<img class="img-fluid" src='{{ url("public/uploads/".$t->image)}}'>
					</div>
					<p>{{e($t->title)}}</p>
					<hr>
					<!-- Button trigger modal -->
					<div class="treasure-global-btn1">
						<a href="{{url('about')}}" style="margin-top: 15px;" data-toggle="modal" data-target="#exampleModal{{$t->id}}">
							<p><span>LEARN MORE</span></p>
						</a>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="exampleModal{{$t->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">{{e($t->title)}}</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>{!!$t->description!!}</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach	
		</div>
	</div>

	<p>{!!$accomodation->bodydescription!!}</p>
@endsection