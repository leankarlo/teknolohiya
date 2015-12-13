@extends('canvas.layouts.dashboard.mainlayout')

@section('title')
	<title>{{ Config::get('app.name') }} | Manage Images</title>
@stop

@section('head')
	<!-- BEGIN PAGE STYLES -->
	<link rel="stylesheet" type="text/css" href="{{ asset('packages/select2/select2.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('packages/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
	<!-- END PAGE STYLES -->
@stop


@section('content')

	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet light">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-globe"></i>Image Table
					</div>
				</div>
				<div class="portlet-body">
					<div class="table-toolbar">
						<div class="row">
							<div class="col-md-6">
								<div class="btn-group ">
									<a href="{{ URL::to('canvas/images/upload') }}" class="btn green">
										Add New <i class="fa fa-plus"></i>
									</a>
								</div>
							</div>
							<div class="col-md-6">
							</div>
						</div>
					</div>

					<table class="table table-striped table-bordered table-hover" id="imageTable">
					<thead>
						<tr>
                            <th>Image</th>
                            <th>Filename</th>
                            <th>URL</th>
                            <th>Actions</th>
                        </tr>
					</thead>
					<tbody>
					
					</tbody>
					</table>
				</div>
			</div>
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>


	<!-- /.modal -->
	<div class="modal fade bs-modal-sm" id="alert" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Alert!</h4>
				</div>
				<div class="modal-body">
					 Are you sure you want to Delete this Image?
				</div>
				<div class="modal-footer" id="modal_footer">
					
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

	<script src="{{ asset('js/admin/pages/images/manage.js')}}"></script>
	<!-- END PAGE SCRIPTS -->
	<script>
	jQuery(document).ready(function() {    
	   Images.initImages(); 
	});
	</script>

	

@stop