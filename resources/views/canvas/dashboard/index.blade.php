@extends('canvas.layouts.dashboard.mainlayout')

@section('title')
	<title>{{ Config::get('app.name') }}</title>
@stop

@section('head')
	<!-- BEGIN PAGE STYLES -->
	{{-- <link href="{{ URL::to('stylesheets/admin/pages/newsfeed/newsfeed.css') }}" rel="stylesheet" type="text/css"/> --}}
	<!-- END PAGE STYLES -->
@stop


@section('content')

	<div class="row">
		<div class="col-md-12" style="text-align:center;">
			<h1 class="title logo-default" style="color: #000;font-size:112px;">{{ Config::get('app.name') }}</h1>
			<p>Your online management system. Made for small businesses, bloggers and for profile website. Can be easily expand and integrate to other system.</p>
		</div>
	</div>

@endsection


@section('buttom_scripts')

	<!-- BEGIN PAGE SCRIPTS -->

	<script>
	jQuery(document).ready(function() {    
	   // Login.init(); 
	});
	</script>

	<!-- END PAGE SCRIPTS -->

@stop