<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Users</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item">User</li>
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
							Users
						</h3>
						<div class="card-tools">
							<a href="javascript:;" class="btn btn-primary" onclick="modal_add()"><i class="fa fa-plus"></i> Tambah User</a>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="tableData" class="table table-hover">
							<thead>
								<tr>
									<th style="width: 5%;">No</th>
									<th style="width: 40%;">username</th>
									<th style="width: 20%;">Created At</th>
									<th style="width: 20%;">Active</th>
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

<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Default Modal</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?=form_open('', ['id' => 'form-user'], ['user_id' => '']);?>
			<div class="modal-body">
				<div class="form-group">
					<?=form_label('Username', 'username');?>
					<?=form_input('username', '', ['class' => 'form-control', 'placeholder' => 'username', 'required' => 'required']);?>
				</div>
				<div class="form-group">
					<?=form_label('Password', 'password');?>
					<?=form_password('password', '', ['class' => 'form-control', 'placeholder' => 'password']);?>
				</div>
				<div class="form-group">
					<?=form_label('Ulangi Password', 'repassword');?>
					<?=form_password('repassword', '', ['class' => 'form-control', 'placeholder' => 'Ulangi Password']);?>
				</div>
				<div class="form-group">
					<?=form_label('Active', 'active');?>
					<?=form_dropdown('active', ['' => 'Pilih' ,'active' => 'Active', 'nonactive' => 'Non Active'], '', ['class' => 'form-control']);?>
				</div>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<?=form_submit('simpan', 'Simpan', ['class' => 'btn btn-primary']);?>
			</div>
			<?=form_close();?>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
