<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="form-horizontal form-row-seperated" action="#">
	<div class="portlet light">
		<div class="portlet-title">
			<div class="caption">
				<i class="icon-basket font-green-sharp"></i>
				<span class="caption-subject font-green-sharp bold uppercase">
				Product </span>
			</div>
			<div class="actions btn-set">				
				<button class="btn green-haze" id="submit"><i class="fa fa-check"></i> Save</button>
				<button class="btn green-haze" id="submitAndContinue"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>
				<button class="btn btn-warning deleteBtn" id="delete"><i class="fa fa-trash"></i> Delete</button>
			</div>
		</div>
		<div class="portlet-body">
			<div class="tabbable">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#tab_general" id="tab_general" data-toggle="tab">
						General </a>
					</li>
					<li>
						<a href="#tab_category" id="tab_category" data-toggle="tab">
						Category </a>
					</li>
					<li>
						<a href="#tab_images" id="tab_images" data-toggle="tab">
						Images </a>
					</li>
				</ul>
				<div class="tab-content no-space">
					<div class="tab-pane active" id="tab_general">
						{!! Form::open(array('action' => 'Canvas\UserController@create' ,'class'=>'form-horizontal form_product', 'id' => 'form_product', 'method'=>'post','files'=> 'true')) !!}
						<div class="form-body">
							<div class="form-group">
								<label class="col-md-2 control-label">Primary Image: <span class="required">
								* </span>
								</label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="product_primary_image" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Name: <span class="required">
								* </span>
								</label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="product_name" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Description: <span class="required">
								* </span>
								</label>
								<div class="col-md-10">
									<textarea class="form-control" name="product_description"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Price: <span class="required">
								* </span>
								</label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="product_price" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Status: <span class="required">
								* </span>
								</label>
								<div class="col-md-10">
									<select class="table-group-action-input form-control input-medium" name="product_status">
										<option value="0">Not Published</option>
										<option value="1">Published</option>
									</select>
								</div>
							</div>
						</div>
						{!! Form::close() !!}
					</div>
					<div class="tab-pane" id="tab_category">
						<div class="alert alert-warning margin-bottom-10">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
							<i class="fa fa-warning fa-lg"></i> Products without category will still not appear on search or filters via category.
						</div>
						<div id="tab_images_uploader_container" class="text-align-reverse margin-bottom-10 form-group row">
							<a id="tab_images_uploader_uploadfiles" href="javascript:;" class="btn green">
							<i class="fa fa-plus"></i> Add Category </a>
							<select class="table-group-action-input input-medium" name="product_color">
								<option value="0">Not Published</option>
								<option value="1">Published</option>
							</select>
						</div>
						<table class="table table-bordered table-hover">
							<thead>
								<tr role="row" class="heading">
									<th width="70%">
										 Name
									</th>
									<th width="30%">
									Action
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										Sample
									</td>
									<td>
										<a href="javascript:;" class="btn default btn-sm">
										<i class="fa fa-times"></i> Remove </a>
									</td>
								</tr>
								<tr>
									<td>
										Sample
									</td>
									<td>
										<a href="javascript:;" class="btn default btn-sm">
										<i class="fa fa-times"></i> Remove </a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="tab_images">
						<div class="alert alert-success margin-bottom-10">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
							<i class="fa fa-warning fa-lg"></i> Image without color type will automatically be on standard color
						</div>
						<div id="tab_images_uploader_container" class="text-align-reverse margin-bottom-10">
							<a id="tab_images_uploader_pickfiles" href="javascript:;" class="btn yellow">
							<i class="fa fa-plus"></i> Select Files </a>
							<a id="tab_images_uploader_uploadfiles" href="javascript:;" class="btn green">
							<i class="fa fa-share"></i> Upload Files </a>
						</div>
						<div class="row">
							<div id="tab_images_uploader_filelist" class="col-md-6 col-sm-12">
							</div>
						</div>
						<table class="table table-bordered table-hover">
							<thead>
								<tr role="row" class="heading">
									<th width="8%">
										 Image
									</th>
									<th width="25%">
										 Label
									</th>
									<th width="28%">
										 Color
									</th>
									<th width="20%">
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<a href="../../assets/admin/pages/media/works/img1.jpg" class="fancybox-button" data-rel="fancybox-button">
										<img class="img-responsive" src="../../assets/admin/pages/media/works/img1.jpg" alt="" height="100px" width="100px">
										</a>
									</td>
									<td>
										<a>Red</a>
									</td>
									<td>
										<select class="table-group-action-input form-control input-medium" name="product[status]">
											<option value="0">Not Published</option>
											<option value="1">Published</option>
										</select>
									</td>
									<td>
										<a href="javascript:;" class="btn default btn-sm">
										<i class="fa fa-times"></i> Remove </a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- END EXAMPLE TABLE PORTLET-->
