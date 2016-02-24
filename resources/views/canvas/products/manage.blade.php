@extends('canvas.layouts.dashboard.mainlayout')

@section('title')
	<title>{{ Config::get('app.name') }} | Products</title>
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
						<i class="icon-notebook"></i>My Products
					</div>
				</div>
				<div class="portlet-body form">
					<div class="table-toolbar">
						
					</div>
					<table class="table table-striped table-bordered table-hover" id="Table">
						<thead>
							<tr>
								<th></th>
								<th>Product Name</th>
                            	<th>Action</th>
                            </tr>
						</thead>
						<tbody id="table_body">
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="portlet light">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-notebook"></i>Actions
					</div>
				</div>
				<div class="portlet-body form">
					<div class="btn-group-vertical btn-group-solid">
						<button type="button" class="btn blue btn-lg" data-toggle="modal" href="#createProduct" id="AddProduct" onclick="DisableSubmitToEditButton()">Add Product</button>
						<button type="button" class="btn green btn-lg" id="PublishProduct" >Publish</button>
						<button type="button" class="btn red btn-lg" id="UnPublishProduct" >Unpublish</button>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- /.modal -->
	<div class="modal fade bs-modal-lg" id="createProduct" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				@include('canvas.products.new')
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	@include('canvas.modals.selectimagemodal')

@endsection


@section('buttom_scripts')

	<!-- BEGIN PAGE SCRIPTS -->
	<script type="text/javascript" src="{{ asset('packages/select2/select2.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('packages/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('packages/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
	<script src="{{ asset('packages/jquery-validation/js/jquery.validate.js') }}" type="text/javascript"></script>

	<script type="text/javascript" src="{{ asset('packages/dropzone/dropzone.js')}}"></script>
	<script src="{{ asset('js/admin/pages/products/manage.js')}}"></script>
	<script src="{{ asset('js/admin/pages/products/ProductCreate.js')}}"></script>

	<script>
	jQuery(document).ready(function() {   
	   Products.init();
	   ProductCreate.init();
	   ImageSelection.initImages();
	});
	</script>

	<script src="{{ asset('js/admin/global/imageselection.js')}}"></script>
	<script>
	jQuery(document).ready(function() {
	   ImageSelection.initImages();
	});
	</script>

	<!-- END PAGE SCRIPTS -->

@stop