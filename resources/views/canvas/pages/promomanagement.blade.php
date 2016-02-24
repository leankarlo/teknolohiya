@extends('canvas.layouts.dashboard.mainlayout')

@section('title')
	<title>{{ Config::get('app.name') }} | Manage Promos </title>
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
						<i class="icon-notebook"></i>Manage Promos
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

					<table class="table table-striped table-bordered table-hover" id="PromoTable">
						<thead>
							<tr>
								<th>Title</th>
                            	<th>Status</th>
                            	<th>Image</th>
                            	<th>Action</th>
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
					<h4 class="modal-title">Add Promo</h4>
				</div>
				<div class="modal-body">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Promo Form
							</div>
						</div>
						<div class="portlet-body">
							{!! Form::open(array('action' => 'Canvas\PromosController@create' ,'class'=>'form-horizontal form_article', 'id' => 'form_article', 'method'=>'post','files'=> 'true')) !!}

								<div class="form-body">
									{{-- Title --}}
									<div class="form-group form-md-line-input">
										<label class="col-md-3 control-label">Title</label>
										<div class="col-md-6">
											<input type="text" class="form-control" name="title" id="title" placeholder="Enter text">
										</div>
									</div>
		
									{{-- Article Content --}}
									<div class="form-group form-md-line-input ">
										<label class="col-md-3 control-label">Desciption</label>
										<div class="col-md-9">
											<textarea class="form-control" name="content" id="content" rows="6"></textarea>
										</div>
									</div>
		
									{{-- primary photo --}}
									<div class="form-group form-md-line-input">
										<label class="col-md-3 control-label">Featured Photo</label>
										<div class="col-md-4" id="displayImg">
											<a class="btn default" data-toggle="modal" href="#image_selection" onclick="loadImageTable()">Select a Primary Photo </a>
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

@endsection


@section('buttom_scripts')

	<!-- BEGIN PAGE SCRIPTS -->
	<script type="text/javascript" src="{{ asset('packages/select2/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('packages/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('packages/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
	<script src="{{ asset('packages/jquery-validation/js/jquery.validate.js') }}" type="text/javascript"></script>

	<script src="{{ asset('js/admin/pages/pages/promos.js')}}"></script>
	<script>
	jQuery(document).ready(function() {   
	   Promos.init();
	   Promos.initImages();
	});
	</script>

	<!-- END PAGE SCRIPTS -->

@stop