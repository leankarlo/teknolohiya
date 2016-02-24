@extends('canvas.layouts.dashboard.mainlayout')

@section('title')
	<title>{{ Config::get('app.name') }} | Edit User</title>
@stop

@section('head')
	<!-- BEGIN PAGE STYLES -->
	<link href="{{ asset('packages/select2/select2.css')}}" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('packages/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('packages/dropzone/css/dropzone.css')}}"/>
	<!-- END PAGE STYLES -->
@stop


@section('content')

	<div class="row">
		<div class="col-md-9">
			<div class="portlet light">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-user"></i>User Update Form
					</div>
				</div>
				<div class="portlet-body form">
					{!! Form::open(array('action' => 'Canvas\UserController@update' ,'class'=>'form-horizontal form_edit_user', 'id' => 'form_edit_user', 'method'=>'post','files'=> 'true')) !!}
						<input type="hidden" class="form-control" name="id" id="id">
						<div class="form-body">
							{{-- Email --}}
							<div class="form-group form-md-line-input">
								<label class="col-md-3 control-label">Email Address</label>
								<div class="col-md-6">
									<input type="text" class="form-control email" name="email" id="email" placeholder="Enter text">
								</div>
							</div>

							{{-- password --}}
							{{-- <div class="form-group form-md-line-input">
								<label class="col-md-3 control-label">Password</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password" id="password" placeholder="Enter text">
								</div>
							</div> --}}

							{{-- access type --}}
							<div class="form-group form-md-line-input">
								<label class="col-md-3 control-label">Access Type</label>
								<div class="col-md-6">
									<select class="form-control accessType" name="accessType" id="accessType">
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
									<input type="text" class="form-control positionTitle" name="positionTitle" id="positionTitle" placeholder="Enter text">
								</div>
							</div>

							{{-- primary photo --}}
							<div class="form-group form-md-line-input">
								<label class="col-md-3 control-label">Primary Photo</label>
								<div class="col-md-4" id="displayImg">
									<a class="btn default" data-toggle="modal" href="#image_selection" onclick="loadImageTable()">Select a Primary Photo </a>
								</div>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn green">Save</button>
									<a class=" btn default" href="{{ URL::to('/canvas/users/management') }}">Back</a>
								</div>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	{{-- MODALS --}}
	@include('canvas.modals.selectimagemodal')

@endsection


@section('buttom_scripts')

	<!-- BEGIN PAGE SCRIPTS -->
	<script type="text/javascript" src="{{ asset('packages/select2/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('packages/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('packages/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
	<script src="{{ asset('packages/jquery-validation/js/jquery.validate.js') }}" type="text/javascript"></script>
	<script type="text/javascript" src="{{ asset('packages/dropzone/dropzone.js')}}"></script>

	<script src="{{ asset('js/admin/pages/users/edit.js')}}"></script>
	<script>
	jQuery(document).ready(function() {    
	   User.initImages(); 
	   User.initUser();
	   User.init();
	});
	</script>

	<!-- END PAGE SCRIPTS -->

@stop