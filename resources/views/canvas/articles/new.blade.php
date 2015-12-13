@extends('canvas.layouts.dashboard.mainlayout')

@section('title')
	<title>{{ Config::get('app.name') }} | Article</title>
@stop

@section('head')
	<!-- BEGIN PAGE STYLES -->
	<link href="{{ asset('packages/select2/select2.css')}}" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('packages/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
	<!-- END PAGE STYLES -->
@stop


@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="portlet light">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-notebook"></i>Article Edit
					</div>
				</div>
				<div class="portlet-body form">
					<?php 
					$result = Session::get('error');
					?>
					@if($result == 'Failed')
						<div class="alert alert-danger ">
							<button class="close" data-close="alert"></button>
							<span>
							{{ Session::get('message') }}</span>
						</div>
					@endif
					{!! Form::open(array('action' => 'Canvas\ArticleController@create' ,'class'=>'form-horizontal form_article', 'id' => 'form_article', 'method'=>'post','files'=> 'true')) !!}

						<div class="form-body">
							{{-- Title --}}
							<div class="form-group form-md-line-input">
								<label class="col-md-3 control-label">Title</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="title" id="title" placeholder="Enter text">
								</div>
							</div>

							{{-- Article Type --}}
							<div class="form-group form-md-line-input">
								<label class="col-md-3 control-label">Article Type</label>
								<div class="col-md-6">
									<select class="form-control select2me" name="articleType" id="articleType">
										
									</select>
								</div>
							</div>

							{{-- Article Content --}}
							<div class="form-group form-md-line-input">
								<label class="col-md-3 control-label">Article Content</label>
								<div class="col-md-9">
									<textarea class="ckeditor form-control" name="content" id="content" rows="6"></textarea>
								</div>
							</div>

							{{-- primary photo --}}
							<div class="form-group form-md-line-input">
								<label class="col-md-3 control-label">Featured Photo</label>
								<div class="col-md-4" id="displayImg">
									<a class="btn default" data-toggle="modal" href="#image_selection" onclick="loadImages()">Select a Primary Photo </a>
								</div>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn green">Save</button>
									<a class=" btn default" href="{{ URL::to('/canvas/articles/manage') }}">Back</a>
								</div>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	{{-- MODALS --}}
	<!-- /.modal -->
	<div class="modal fade bs-modal-lg" id="image_selection" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Select an Image</h4>
				</div>
				<div class="modal-body">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Image Table
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
						
							</div>
							<table class="table table-striped table-bordered table-hover" id="imageTable">
								<thead>
									<tr>
										<th>Image</th>
                            	  		<th>URL</th>
                            	  		<th>Actions</th>
                            	  	</tr>
								</thead>
								<tbody id="table_body">
								</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn default" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

@endsection


@section('buttom_scripts')

	<!-- BEGIN PAGE SCRIPTS -->
	<script type="text/javascript" src="{{ asset('packages/select2/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('packages/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('packages/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
	<script src="{{ asset('packages/jquery-validation/js/jquery.validate.js') }}" type="text/javascript"></script>
	<script type="text/javascript" src="{{ asset('packages/ckeditor/ckeditor.js') }}"></script>

	<script src="{{ asset('js/admin/pages/articles/new.js')}}"></script>
	<script>
	jQuery(document).ready(function() {    
	   Article.initImages(); 
	   Article.initArticleTypes();
	   Article.init();
	});
	</script>

	<!-- END PAGE SCRIPTS -->

@stop