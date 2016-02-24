@extends('canvas.layouts.dashboard.mainlayout')

@section('title')
	<title>{{ Config::get('app.name') }} | Manage Contact </title>
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
						<i class="icon-notebook"></i>Contact Promos
					</div>
				</div>
				<div class="portlet-body form">
					<div class="table-toolbar">
						<div class="row">
							<div class="col-md-6">
								<div class="btn-group ">
									<a href="#add_promo" data-toggle="modal" class="btn green">
										Add New <i class="fa fa-plus"></i>
									</a>
								</div>
							</div>
							<div class="col-md-6">
							</div>
						</div>
					</div>

					<table class="table table-striped table-bordered table-hover" id="Table">
						<thead>
							<tr>
								<th>Actions</th>
                            	<th>Name</th>
                            	<th>Address</th>
                            </tr>
						</thead>
						<tbody id="table_body">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	{{-- MODALS --}}
	<!-- /.modal -->
	<div class="modal fade bs-modal-lg" id="add_promo" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button> -->
					<h4 class="modal-title">Add Contact</h4>
				</div>
				<div class="modal-body">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Contact Form
							</div>
						</div>
						<div class="portlet-body">
							{!! Form::open(array('action' => 'Canvas\ContactController@create' ,'class'=>'form-horizontal form_article', 'id' => 'form_article', 'method'=>'post','files'=> 'true')) !!}

								<div class="form-body">
									
									<div class="form-group">
										<label class="col-md-3 control-label">Name</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="name" id="name" placeholder="Enter text">
											<span class="help-block">
											Office / Store Name</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Address Line 1</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="address1" id="address1" placeholder="Enter text">
											<span class="help-block">
											Unit / Building Name and Number</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Address Line 2</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="address2" id="address2" placeholder="Enter text">
											<span class="help-block">
											Street Name</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Address Line 3</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="address3" id="address3" placeholder="Enter text">
											<span class="help-block">
											Subdivision / Barangay </span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Address Line 4</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="address4" id="address4" placeholder="Enter text">
											<span class="help-block">
											City</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Address Line 5</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="address5" id="address5" placeholder="Enter text">
											<span class="help-block">
											Province</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Country</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="country" id="country" placeholder="Enter text">
											<span class="help-block">
											Country</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">ZIP Code</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Enter text">
											<span class="help-block">
											ZIP CODE</span>
										</div>
									</div>


									<div class="form-group">
										<label class="col-md-3 control-label">Mobile 1</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="mobile1" id="mobile1" placeholder="Enter text">
											<span class="help-block">
											Contact Number Mobile</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Mobile 2</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="mobile2" id="mobile2" placeholder="Enter text">
											<span class="help-block">
											Contact Number Mobile</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Mobile 3</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="mobile3" id="mobile3" placeholder="Enter text">
											<span class="help-block">
											Contact Number Mobile</span>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Landline 1</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="landline1" id="landline1" placeholder="Enter text">
											<span class="help-block">
											Contact Number Landline</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Landline 2</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="landline2" id="landline2" placeholder="Enter text">
											<span class="help-block">
											Contact Number Landline</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Landline 3</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="landline3" id="landline3" placeholder="Enter text">
											<span class="help-block">
											Contact Number Landline</span>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Fax 1</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="fax1" id="fax1" placeholder="Enter text">
											<span class="help-block">
											Fax Number</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Fax 2</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="fax2" id="fax2" placeholder="Enter text">
											<span class="help-block">
											Fax Number</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Fax 3</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="fax3" id="fax3" placeholder="Enter text">
											<span class="help-block">
											Fax Number</span>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Email 1</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="email1" id="email1" placeholder="Enter text">
											<span class="help-block">
											email address</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Email 2</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="email2" id="email2" placeholder="Enter text">
											<span class="help-block">
											email address</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Email 3</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="email3" id="email3" placeholder="Enter text">
											<span class="help-block">
											email address</span>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Longtitude</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="long" id="long" placeholder="Enter text">
											<span class="help-block">
											Store / Office location</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Latitude</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="lat" id="lat" placeholder="Enter text">
											<span class="help-block">
											Store / Office location</span>
										</div>
									</div>

								</div>

								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green">Save</button>
										</div>
									</div>
								</div>
							{!! Form::close() !!}
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn default" data-toggle="modal" href="#uploadImage">Upload</button> -->
					<button type="button" class="btn default" data-dismiss="modal" >Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	
	<!-- Selecting Primary Photo -->
	@include('canvas.modals.selectimagemodal')

	<!-- /.modal -->
	<div class="modal fade bs-modal-lg" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button> -->
					<h4 class="modal-title">Edit Contact</h4>
				</div>
				<div class="modal-body">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Contact Form
							</div>
						</div>
						<div class="portlet-body">
							{!! Form::open(array('action' => 'Canvas\ContactController@update' ,'class'=>'form-horizontal form_article', 'id' => 'form_article', 'method'=>'post','files'=> 'true')) !!}

								<div class="form-body">
									<input type="hidden" class="form-control" name="edit_id" id="edit_id" >
									<div class="form-group">
										<label class="col-md-3 control-label">Name</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_name" id="edit_name" placeholder="Enter text">
											<span class="help-block">
											Office / Store Name</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Address Line 1</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_address1" id="edit_address1" placeholder="Enter text">
											<span class="help-block">
											Unit / Building Name and Number</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Address Line 2</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_address2" id="edit_address2" placeholder="Enter text">
											<span class="help-block">
											Street Name</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Address Line 3</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_address3" id="edit_address3" placeholder="Enter text">
											<span class="help-block">
											Subdivision / Barangay </span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Address Line 4</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_address4" id="edit_address4" placeholder="Enter text">
											<span class="help-block">
											City</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Address Line 5</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_address5" id="edit_address5" placeholder="Enter text">
											<span class="help-block">
											Province</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Country</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_country" id="edit_country" placeholder="Enter text">
											<span class="help-block">
											Country</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">ZIP Code</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_zipcode" id="edit_zipcode" placeholder="Enter text">
											<span class="help-block">
											ZIP CODE</span>
										</div>
									</div>


									<div class="form-group">
										<label class="col-md-3 control-label">Mobile 1</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_mobile1" id="edit_mobile1" placeholder="Enter text">
											<span class="help-block">
											Contact Number Mobile</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Mobile 2</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_mobile2" id="edit_mobile2" placeholder="Enter text">
											<span class="help-block">
											Contact Number Mobile</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Mobile 3</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_mobile3" id="edit_mobile3" placeholder="Enter text">
											<span class="help-block">
											Contact Number Mobile</span>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Landline 1</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_landline1" id="edit_landline1" placeholder="Enter text">
											<span class="help-block">
											Contact Number Landline</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Landline 2</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_landline2" id="edit_landline2" placeholder="Enter text">
											<span class="help-block">
											Contact Number Landline</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Landline 3</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_landline3" id="edit_landline3" placeholder="Enter text">
											<span class="help-block">
											Contact Number Landline</span>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Fax 1</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_fax1" id="edit_fax1" placeholder="Enter text">
											<span class="help-block">
											Fax Number</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Fax 2</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_fax2" id="edit_fax2" placeholder="Enter text">
											<span class="help-block">
											Fax Number</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Fax 3</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_fax3" id="edit_fax3" placeholder="Enter text">
											<span class="help-block">
											Fax Number</span>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Email 1</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_email1" id="edit_email1" placeholder="Enter text">
											<span class="help-block">
											email address</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Email 2</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_email2" id="edit_email2" placeholder="Enter text">
											<span class="help-block">
											email address</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Email 3</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_email3" id="edit_email3" placeholder="Enter text">
											<span class="help-block">
											email address</span>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Longtitude</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_long" id="edit_long" placeholder="Enter text">
											<span class="help-block">
											Store / Office location</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Latitude</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="edit_lat" id="edit_lat" placeholder="Enter text">
											<span class="help-block">
											Store / Office location</span>
										</div>
									</div>

								</div>

								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green">Save</button>
										</div>
									</div>
								</div>
							{!! Form::close() !!}
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn default" data-toggle="modal" href="#uploadImage">Upload</button> -->
					<button type="button" class="btn default" data-dismiss="modal" >Close</button>
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

	<script src="{{ asset('js/admin/pages/pages/contact.js')}}"></script>
	<script>
	jQuery(document).ready(function() {   
	   Contact.init();
	   Contact.initImages();
	});
	</script>

	<!-- END PAGE SCRIPTS -->

@stop