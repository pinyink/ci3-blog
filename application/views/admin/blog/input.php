<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Blog Post</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item">Blog</li>
						<li class="breadcrumb-item active">Add</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-9">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">
							Post
						</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<form action="">
							<div class="form-group">
								<label for="inputJudul">Judul</label>
								<input type="text" class="form-control" id="inputJudul" placeholder="Judul Post"
									name="inputJudul">
							</div>
							<div class="form-group">
								<label for="inputDeskripsi">Deskripsi</label>
								<textarea type="text" class="form-control" id="inputDeskripsi" name="inputDeskripsi"
									placeholder="Deskripsi"></textarea>
							</div>
							<div class="pb-2">
								<button type="button" class="btn btn-default btn-sm" onclick="modal_file()"><i
										class="fa fa-file"></i> File</button>
							</div>
							<textarea id="summernote"></textarea>
						</form>
					</div>
					<div class="card-footer">
					</div>
				</div>
			</div>
			<!-- /.col-->
		</div>

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-file">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">List File</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary card-outline card-tabs">
							<div class="card-header p-0 pt-1 border-bottom-0">
								<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="custom-tabs-three-upload-tab" data-toggle="pill"
											href="#custom-tabs-three-upload" role="tab"
											aria-controls="custom-tabs-three-upload" aria-selected="true">Upload</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
											href="#custom-tabs-three-profile" role="tab"
											aria-controls="custom-tabs-three-profile" aria-selected="false">Profile</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill"
											href="#custom-tabs-three-messages" role="tab"
											aria-controls="custom-tabs-three-messages"
											aria-selected="false">Messages</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill"
											href="#custom-tabs-three-settings" role="tab"
											aria-controls="custom-tabs-three-settings"
											aria-selected="false">Settings</a>
									</li>
								</ul>
							</div>
							<div class="card-body">
								<div class="tab-content" id="custom-tabs-three-tabContent">
									<div class="tab-pane fade show active" id="custom-tabs-three-upload" role="tabpanel"
										aria-labelledby="custom-tabs-three-upload-tab">
										<div id="actions" class="row">
											<div class="col-lg-6">
												<div class="btn-group w-100">
													<span class="btn btn-success col fileinput-button">
														<i class="fas fa-plus"></i>
														<span>Add files</span>
													</span>
													<button type="submit" class="btn btn-primary col start">
														<i class="fas fa-upload"></i>
														<span>Start upload</span>
													</button>
													<button type="reset" class="btn btn-warning col cancel">
														<i class="fas fa-times-circle"></i>
														<span>Cancel upload</span>
													</button>
												</div>
											</div>
											<div class="col-lg-6 d-flex align-items-center">
												<div class="fileupload-process w-100">
													<div id="total-progress" class="progress progress-striped active"
														role="progressbar" aria-valuemin="0" aria-valuemax="100"
														aria-valuenow="0">
														<div class="progress-bar progress-bar-success" style="width:0%;"
															data-dz-uploadprogress></div>
													</div>
												</div>
											</div>
										</div>
										<div class="table table-striped files" id="previews">
											<div id="template" class="row mt-2">
												<div class="col-auto">
													<span class="preview"><img src="data:," alt=""
															data-dz-thumbnail /></span>
												</div>
												<div class="col d-flex align-items-center">
													<p class="mb-0">
														<span class="lead" data-dz-name></span>
														(<span data-dz-size></span>)
													</p>
													<strong class="error text-danger" data-dz-errormessage></strong>
												</div>
												<div class="col-4 d-flex align-items-center">
													<div class="progress progress-striped active w-100"
														role="progressbar" aria-valuemin="0" aria-valuemax="100"
														aria-valuenow="0">
														<div class="progress-bar progress-bar-success" style="width:0%;"
															data-dz-uploadprogress></div>
													</div>
												</div>
												<div class="col-auto d-flex align-items-center">
													<div class="btn-group">
														<button class="btn btn-primary start">
															<i class="fas fa-upload"></i>
															<span>Start</span>
														</button>
														<button data-dz-remove class="btn btn-warning cancel">
															<i class="fas fa-times-circle"></i>
															<span>Cancel</span>
														</button>
														<button data-dz-remove class="btn btn-danger delete">
															<i class="fas fa-trash"></i>
															<span>Delete</span>
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
										aria-labelledby="custom-tabs-three-profile-tab">
										Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris
										pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor
										sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus
										orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a
										luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus.
										Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc
										euismod pellentesque diam.
									</div>
									<div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel"
										aria-labelledby="custom-tabs-three-messages-tab">
										Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris.
										Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget
										condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum
										orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna
										a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam
										vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet
										sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum,
										lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem
										eu risus tincidunt eleifend ac ornare magna.
									</div>
									<div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel"
										aria-labelledby="custom-tabs-three-settings-tab">
										Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis
										tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque
										tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum
										consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec
										pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam.
										Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst.
										Praesent imperdiet accumsan ex sit amet facilisis.
									</div>
								</div>
							</div>
							<!-- /.card -->
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
