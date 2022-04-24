<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Blog</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item">Blog</li>
						<li class="breadcrumb-item active">View</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title">
							Post
						</h3>
						<div class="card-tools">
							<a href="<?=base_url();?>admin/blog/input" class="btn btn-primary"><i class="fa fa-plus"></i> Buat Post</a>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="tableData" class="table table-hover">
							<thead>
								<tr>
									<th style="width: 5%;">No</th>
									<th style="width: 20%;">URL</th>
									<th style="width: 20%;">Title</th>
									<th style="width: 40%;">Description</th>
									<th style="width: 15%;">Action</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
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
