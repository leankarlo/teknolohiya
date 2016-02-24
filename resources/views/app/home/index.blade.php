@extends('app.layouts.base_layout')

@section('title')
	<title>{{ Config::get('app.clientapp') }}</title>
@stop

@section('head')

@stop


@section('content')

	<div class="page-cover style-2 parallax" style="background-image: url('images/background/cover.jpg');">
		<div class="page-cover-content">
			{{-- <form action="search.html" method="get" data-form="submit">
				<input type="text" placeholder="Search Write-ups">
			</form> --}}
			<h2><img src="images/logos/LogoName_White_Transparent_289px.png"></h2>
			<h4>We put art on TECHNOLOGY</h4>
		</div>
	</div>
	<section class="container element element-spacing">
		<div class="row">
			<div class="blog-masonry">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="btn btn-lg masonry-more">Load More</div>
			</div>
		</div>
	</section>


@endsection


@section('buttom_scripts')
<script src="{{ asset('js/app/pages/home/articles.js')}}"></script>
	<script>
	jQuery(document).ready(function() {   
	   Articles.init();
	});
	</script>
@stop