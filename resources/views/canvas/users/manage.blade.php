@extends('canvas.layouts.dashboard.mainlayout')

@section('title')
	<title>{{ Config::get('app.name') }} | Manage user</title>
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
						<i class="icon-user"></i>User Management
					</div>
				</div>
				<div class="portlet-body form">
					<div class="table-toolbar">
						
					</div>
					<table class="table table-striped table-bordered table-hover" id="UsersTable">
						<thead>
							<tr>
								<th>Image</th>
                            	<th>Email</th>
                            	<th>Position</th>
                            	<th>Status</th>
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



@endsection


@section('buttom_scripts')

	<!-- BEGIN PAGE SCRIPTS -->
	<script type="text/javascript" src="{{ asset('packages/select2/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('packages/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('packages/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
	<script src="{{ asset('packages/jquery-validation/js/jquery.validate.js') }}" type="text/javascript"></script>

	<script src="{{ asset('js/admin/pages/users/manage.js')}}"></script>
	<script>
	jQuery(document).ready(function() {   
	   Manage.init();
	});
	</script>

	<!-- END PAGE SCRIPTS -->

@stop