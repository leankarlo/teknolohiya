@extends('canvas.layouts.dashboard.mainlayout')

@section('title')
	<title>{{ Config::get('app.name') }} | create user</title>
@stop

@section('head')
	<!-- BEGIN PAGE STYLES -->
	<link href="{{ asset('packages/select2/select2.css')}}" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('packages/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
	<!-- END PAGE STYLES -->
@stop


@section('content')

	<div class="row">
		<div class="col-md-9">
			<div class="portlet light">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-user"></i>User Create Form
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
					{!! Form::open(array('action' => 'Canvas\UserController@create' ,'class'=>'form-horizontal form_create_user', 'id' => 'form_create_user', 'method'=>'post','files'=> 'true')) !!}

						<div class="form-body">
							{{-- Email --}}
							<div class="form-group form-md-line-input">
								<label class="col-md-3 control-label">Email Address</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="email" id="email" placeholder="Enter text">
								</div>
							</div>

							{{-- password --}}
							<div class="form-group form-md-line-input">
								<label class="col-md-3 control-label">Password</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password" id="password" placeholder="Enter text">
								</div>
							</div>

							{{-- confirm password --}}
							<div class="form-group form-md-line-input">
								<label class="col-md-3 control-label">Confirm Password</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="confirm_password" placeholder="Enter text">
								</div>
							</div>

							{{-- access type --}}
							<div class="form-group form-md-line-input">
								<label class="col-md-3 control-label">Access Type</label>
								<div class="col-md-6">
									<select class="form-control select2me" name="accessType" id="accessType">
										<option value="">Select...</option>
										<option value="0">Super Admin</option>
										<option value="1">Manager</option>
										<option value="2">Associate</option>
									</select>
								</div>
							</div>

							{{-- position --}}
							<div class="form-group form-md-line-input">
								<label class="col-md-3 control-label">User Position</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="positionTitle" placeholder="Enter text">
								</div>
							</div>

							{{-- primary photo --}}
							<div class="form-group form-md-line-input">
								<label class="col-md-3 control-label">Primary Photo</label>
								<div class="col-md-4" id="displayImg">
									<a class="btn default" data-toggle="modal" href="#image_selection" onclick="loadImages()">Select a Primary Photo </a>
								</div>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn green">Add</button>
									<a class=" btn default" href="{{ URL::to('dashboard/products') }}">Cancel</a>
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

	<script src="{{ asset('js/admin/pages/users/create.js')}}"></script>
	<script>
	jQuery(document).ready(function() {    
	   Images.initImages(); 
	   Images.init();
	});
	</script>

	<!-- END PAGE SCRIPTS -->

@stop