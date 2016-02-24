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
							<div class="tools">
								<a href="javascript:;" class="reload" data-original-title="" title="" onclick="refreshTable()">
								</a>
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
					<button type="button" class="btn default" data-toggle="modal" href="#uploadImage">Upload</button>
					<button type="button" class="btn default" data-dismiss="modal" >Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<!-- /.modal upload image-->
	<div class="modal fade bs-modal-lg" id="uploadImage" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Select an Image</h4>
				</div>
				<div class="modal-body">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet">
						<div class="portlet-body">
							<div class="row">
								<div class="col-md-12">
									<div class="portlet light">
											<div class="portlet-title">
												<div class="caption">
													<i class="fa fa-file-picture-o"></i>Image Form
												</div>
											</div>
											<div class="portlet-body">
												<div class="row">
													<div class="col-md-12">
														<p>
															<span class="label label-danger">
															NOTE: </span>
															&nbsp; Kindly use recomended browsers Latest Chrome, Firefox, Safari, Opera & Internet 	Explorer 10.
														</p>
														{!! Form::open(array('action' => 'Canvas\ImageController@uploadImages', 'class'=>'dropzone', 'id'=>'my-	dropzone','files'=> 'true')) !!}
														{!! Form::close() !!}
													</div>
												</div>
											</div>
										</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn default" data-dismiss="modal" onclick="refreshTable()">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->


	<script type="text/javascript">
		
		// $().ready(function() {
		
		   
		
		// } );// END Ducement Ready

	</script>