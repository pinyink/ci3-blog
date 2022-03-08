<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Profile</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">User Profile</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">

					<!-- Profile Image -->
					<div class="card card-primary card-outline">
						<div class="card-body box-profile">
							<div class="text-center">
								<img class="profile-user-img img-fluid img-circle imgProfil"
									src="<?=$this->session->userdata('user_image');?>" alt="User profile picture">
							</div>

							<h3 class="profile-username text-center" id="textName"></h3>

							<p class="text-muted text-center" id="textEmail">Software Engineer</p>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->

					<!-- About Me Box -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">About Me</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<strong><i class="fas fa-book mr-1"></i> Education</strong>

							<p class="text-muted" id="textEducation">
							</p>

							<hr>

							<strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

							<p class="text-muted" id="textLocation"></p>

							<hr>

							<strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

							<p class="text-muted" id="textSkills">
							</p>

							<hr>

							<strong><i class="far fa-file-alt mr-1"></i> Experience</strong>

							<p class="text-muted" id="textExperience"></p>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
				<div class="col-md-9">
					<div class="card card-primary card-outline card-outline-tabs">
						<div class="card-header p-0 border-bottom-0">
							<ul class="nav nav-tabs">
								<li class="nav-item"><a class="nav-link active" href="#activity"
										data-toggle="tab">Activity</a></li>
								</li>
								<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
								</li>
							</ul>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content">
								<div class="active tab-pane" id="activity">

								</div>
								<!-- /.tab-pane -->

								<div class="tab-pane" id="settings">
									<div id="div_setting">
										<form class="form-horizontal" id="formSetting">
											<div class="form-group row">
												<label for="inputName" class="col-sm-2 col-form-label">Name</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="inputName"
														name="inputName" placeholder="Name">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
												<div class="col-sm-10">
													<input type="email" class="form-control" id="inputEmail"
														name="inputEmail" placeholder="Email">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputEducation"
													class="col-sm-2 col-form-label">Education</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="inputEducation"
														name="inputEducation" placeholder="Education">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputLocation"
													class="col-sm-2 col-form-label">Location</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="inputLocation"
														name="inputLocation" placeholder="Location">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="inputSkills"
														name="inputSkills" placeholder="Skills">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputExperience"
													class="col-sm-2 col-form-label">Experience</label>
												<div class="col-sm-10">
													<textarea class="form-control" id="inputExperience"
														name="inputExperience" placeholder="Experience"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label for="inputSkills" class="col-sm-2 col-form-label">Profil</label>
												<div class="col-sm-10">
													<img class="profile-user-img img-fluid imgProfil" id="imgPreview"
														src="<?=$this->session->userdata('user_image')?>" alt=""
														srcset="">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputSkills" class="col-sm-2 col-form-label"></label>
												<div class="col-sm-10">
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="inputImage" name="inputImage">
														<label class="custom-file-label" for="inputImage">Choose
															file</label>
													</div>
												</div>
											</div>

											<div class="form-group row">
												<div class="offset-sm-2 col-sm-10">
													<button type="submit" class="btn btn-danger">Submit</button>
												</div>
											</div>
										</form>
									</div>
								</div>
								<!-- /.tab-pane -->
							</div>
							<!-- /.tab-content -->
						</div><!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
