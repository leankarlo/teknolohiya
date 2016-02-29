@extends('canvas.layouts.dashboard.mainlayout')

@section('title')
	<title>{{ Config::get('app.name') }} | Products</title>
@stop

@section('head')
	<!-- BEGIN PAGE STYLES -->
	<link href="{{ asset('packages/select2/select2.css')}}" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('packages/jquery-nestable/jquery.nestable.css')}}"/>
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
								<th class="table-checkbox">
								</th>
								<th width="20%">Image</th>
								<th width="35%">Product Name</th>
								<th width="20%">Status</th>
                            	<th width="20%">Action</th>
                            </tr>
						</thead>
						<tbody id="table_body">
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="page-sidebar-wrapper">
				
				<div class="page-sidebar md-shadow-z-2-i  navbar-collapse collapse">
					<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
						<li>
							<a data-toggle="modal" href="#createProduct" id="AddProduct" onclick="DisableSubmitToEditButton()">
								<i class="icon-basket-loaded"></i>
								Add Product
							</a>
						</li>
						<li>
							<a data-toggle="modal" href="#" id="PublishProduct" onclick="PublishProduct()">
								<i class="icon-book-open"></i>
								Publish Selected
							</a>
						</li>
						<li>
							<a data-toggle="modal" href="#" id="UnPublishProduct" onclick="UnPublishProduct()">
								<i class="icon-ban"></i>
								Unpublish Selected
							</a>
						</li>
						<li>
							<a data-toggle="modal" href="#" id="DeleteMuntipleProduct" onclick="DeleteMuntipleProduct()">
								<i class="icon-trash"></i>
								Delete Selected
							</a>
						</li>
						<li>
							<a data-toggle="modal" href="#categoryLevelManagement" id="CategoryLevelManagement">
								<i class="icon-list"></i>
								Category Management
							</a>
						</li>
			
					</ul>
					<!-- END SIDEBAR MENU -->
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
	
	@include('canvas.products._categorymanage')

	@include('canvas.modals.selectimagemodal')

	<!-- /.modal -->
	<div class="modal fade bs-modal-md" id="createNewCategory" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="portlet light">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-tag font-green-sharp"></i>
							<span class="caption-subject font-green-sharp bold uppercase">
							Create New Category </span>
						</div>
					</div>
					<div class="portlet-body">
						<div class="form-horizontal">
							<div class="form-body">
								<div class="form-group">
									<label class="col-md-2 control-label">Name: <span class="required">
									* </span>
									</label>
									<div class="col-md-10">
										<input type="text" class="form-control" name="category_name" id="category_name" placeholder="">
									</div>
								</div>
							</div>
							<div class="form-actions noborder">
								<button type="submit" class="btn blue" data-dismiss="modal" onclick="CreateCategory()">Submit</button>
								<button type="button" data-dismiss="modal" class="btn default">Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<!-- /.modal -->
	<div class="modal fade bs-modal-lg" id="imageAddModal" tabindex="-1" role="dialog" aria-hidden="true">
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
							<div class="tools">
								<a href="javascript:;" class="reload" data-original-title="" title="" onclick="refreshTable()">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
						
							</div>
							<table class="table table-striped table-bordered table-hover" id="ImageAddTable">
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
					<button type="button" class="btn default" data-dismiss="modal" data-toggle="modal" href="#uploadImage">Upload</button>
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
<script type="text/javascript" src="{{ URL::to('packages/jquery-nestable/jquery.nestable.js')}}"></script>
	<script type="text/javascript" src="{{ URL::to('packages/nested-sortable/jquery.mjs.nestedSortable.js')}}"></script>
	<script type="text/javascript" src="{{ asset('packages/dropzone/dropzone.js')}}"></script>

	<script src="{{ asset('js/admin/pages/products/manage.js')}}"></script>
	<script src="{{ asset('js/admin/pages/products/ProductCreate.js')}}"></script>
	<script src="{{ asset('js/admin/pages/products/categorymanagement.js')}}"></script>

	<script>
	jQuery(document).ready(function() {   
	   Products.init();
	   ProductCreate.init();
	   Category.init();
	   ProductCreate.initCategory();
	   ImageSelection.initImages();
	   ProductCreate.initAddImages();
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