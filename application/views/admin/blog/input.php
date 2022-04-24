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
						<?=form_open('', ['id' => 'form_blog']);?>
							<img src="<?=base_url();?>assets/dist/img/boxed-bg.png" style="width: 100%; height: 120px" id="img-desc" class="img img-fluid" alt="">
							<div class="form-group">
								<label for="blog_title">Image</label> <span id="span-image" class=""></span>
								<input type="text" class="form-control" id="blog_image" placeholder="Url"
									name="blog_image">
							</div>
							<div class="form-group">
								<label for="blog_title">Url</label> <span id="span-url" class=""></span>
								<input type="text" class="form-control" id="blog_url" placeholder="Url"
									name="blog_url" readonly>
							</div>
							<div class="form-group">
								<label for="blog_title">Judul</label>
								<input type="text" class="form-control" id="blog_title" placeholder="Judul Post"
									name="blog_title">
							</div>
							<div class="form-group">
								<label for="blog_desc">Deskripsi</label>
								<textarea type="text" class="form-control" id="blog_desc" name="blog_desc"
									placeholder="Deskripsi"></textarea>
							</div>
							<div class="pb-2">
								<button type="button" class="btn btn-default btn-sm" onclick="modal_file()"><i
										class="fa fa-file"></i> File</button>
							</div>
							<textarea id="summernote" name="blog_text"></textarea>
							<?=form_submit(['class' => 'btn btn-primary'], 'Simpan')?>
						<?=form_close();?>
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
										<a class="nav-link" id="custom-tabs-three-file-tab" data-toggle="pill"
											href="#custom-tabs-three-file" role="tab"
											aria-controls="custom-tabs-three-file" aria-selected="false">File</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="custom-tabs-detail-file-tab" data-toggle="pill"
											href="#custom-tabs-detail-file" role="tab"
											aria-controls="custom-tabs-detail-file" aria-selected="false">Detail File</a>
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
									<div class="tab-pane fade" id="custom-tabs-three-file" role="tabpanel"
										aria-labelledby="custom-tabs-three-file-tab">
										<div class="row" id="div_file">
											
										</div>
										<div class="pagination"></div>
									</div>
									<div class="tab-pane fade" id="custom-tabs-detail-file" role="tabpanel"
										aria-labelledby="custom-tabs-detail-file-tab">
										<div class="row">
											<div class="col-md-4">
												<img src="<?=base_url().'assets/dist/img/avatar5.png';?>" alt="" id="img-file" class="img img-rounded" style="height: 260px; width: 100%">
											</div>
											<div class="col-md-8">
												<?=form_open('', ['id' => 'form_edit_file', 'class' => 'form-horizontal'], ['file_id' => '']);?>
												<div class="form-group">
													<label for="file_desc">File Desc</label>
													<?=form_input(['name' => 'file_desc', 'class'=>'form-control']);?>
												</div>
												<div class="form-group">
													<label for="file_path">File Path</label>
													<?=form_input(['name' => 'file_path', 'class'=>'form-control']);?>
												</div>
												<?=form_submit(['class' => 'btn btn-primary'], 'Simpan')?>
												<?=form_close() ;?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /.card -->
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
