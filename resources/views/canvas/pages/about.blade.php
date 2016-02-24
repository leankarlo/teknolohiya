@extends('layouts.admin_layout')

@section('head')
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{ URL::to('packages/select2/select2.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::to('packages/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::to('packages/bootstrap-markdown/css/bootstrap-markdown.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::to('packages/bootstrap-datepicker/css/datepicker.css') }}"/>
<!-- END PAGE LEVEL SCRIPTS -->
@stop

@section('content')
	
	<h3 class="page-title">
		About Us <small>Management</small>
	</h3>

	<div class="row">
		<div class="col-md-12">
			<?php 
			$result = Session::get('result');
			?>
			@if($result == 'Failed')
				<div class="alert alert-danger ">
					<button class="close" data-close="alert"></button>
					<span>
					{{ Session::get('message') }}</span>
				</div>
			@elseif($result == 'Success')
				<div class="alert alert-success ">
					<button class="close" data-close="alert"></button>
					<span>
					{{ Session::get('message') }}</span>
				</div>
			@endif
			<!-- BEGIN VALIDATION STATES-->
			<div class="portlet">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i>About Us Form
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					{{ Form::open(array('action' => 'AboutUsController@edit','class'=>'form-horizontal', 'method'=>'post','files'=> 'true')) }}
						<div class="form-body">
							<div class="alert alert-danger display-hide">
								<button class="close" data-close="alert"></button>
								You have some form errors. Please check below.
							</div>
							<div class="alert alert-success display-hide">
								<button class="close" data-close="alert"></button>
								Your form validation is successful!
							</div>
							
							<div class="form-group">
								<label class="control-label col-md-3">WYSIHTML5 Editor <span class="required">
								* </span>
								</label>
								<div class="col-md-9">
									<textarea class="wysihtml5 form-control" rows="6" name="content" data-error-container="#editor1_error">{{ $about->content }}</textarea>
									<div id="editor1_error">
									</div>
								</div>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn green">Submit</button>
								</div>
							</div>
						</div>
					{{ Form::close() }}
					<!-- END FORM-->
				</div>
				<!-- END VALIDATION STATES-->
			</div>
		</div>
	</div>

@endsection

@section('buttom_scripts')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{ URL::to('packages/jquery-validation/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('packages/jquery-validation/js/additional-methods.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('packages/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('packages/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('packages/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('packages/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('packages/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('packages/bootstrap-markdown/js/bootstrap-markdown.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('packages/bootstrap-markdown/lib/markdown.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL STYLES -->
<script src="{{ URL::to('javascripts/admin/pages/about/about.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL STYLES -->
<script>
jQuery(document).ready(function() {
   	FormValidation.init();
});
</script>
@stop