@extends('canvas.layouts.dashboard.mainlayout')

@section('title')
	<title>{{ Config::get('app.name') }} | Upload Image</title>
@stop

@section('head')
	<!-- BEGIN PAGE STYLES -->
	<link rel="stylesheet" type="text/css" href="{{ asset('packages/dropzone/css/dropzone.css')}}"/>
	{{-- <link href="{{ URL::to('stylesheets/admin/pages/newsfeed/newsfeed.css') }}" rel="stylesheet" type="text/css"/> --}}
	<!-- END PAGE STYLES -->
@stop


@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="col-md-12">
				<div class="portlet light">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-file-picture-o"></i>Image Form
						</div>
					</div>
					<div class="portlet-body">
						<div class="row">
							<div class="col-md-12">
								<p>
									<span class="label label-danger">
									NOTE: </span>
									&nbsp; Kindly use recomended browsers Latest Chrome, Firefox, Safari, Opera & Internet 	Explorer 10.
								</p>
								{!! Form::open(array('action' => 'Canvas\ImageController@uploadImages', 'class'=>'dropzone', 'id'=>'my-	dropzone','files'=> 'true')) !!}
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection


@section('buttom_scripts')

	<!-- BEGIN PAGE SCRIPTS -->
	<script type="text/javascript" src="{{ asset('packages/dropzone/dropzone.js')}}"></script>
	<script>
	jQuery(document).ready(function() {    
	   // Login.init(); 
	});
	</script>

	<!-- END PAGE SCRIPTS -->

@stop