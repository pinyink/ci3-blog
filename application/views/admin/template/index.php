<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="token_name" content="<?=$this->security->get_csrf_token_name();?>" />
	<meta name="token_hash" content="<?=$this->security->get_csrf_hash();?>" />
	<title>AdminLTE 3 | Starter</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?=base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url();?>assets/dist/css/adminlte.min.css">
<?php foreach ($css as $v_css) {
    echo '<link rel="stylesheet" href="'.base_url().$v_css.'">'.PHP_EOL;
} ?>
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<!-- Show Nav Bar -->
		<?=$navbar;?>
		<!-- Show Sidebar -->
		<?=$sidebar;?>

		<!-- show content -->
		<?=$content;?>

		<!-- Main Footer -->
		<footer class="main-footer">
			<!-- To the right -->
			<div class="float-right d-none d-sm-inline">
				Anything you want
			</div>
			<!-- Default to the left -->
			<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
			reserved.
		</footer>
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->
	<script>
		const baseUrl = '<?=base_url();?>';
	</script>
	<!-- jQuery -->
	<script src="<?=base_url();?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?=base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?=base_url();?>assets/dist/js/adminlte.min.js"></script>
	<script src="<?=base_url();?>assets/js/global.js"></script>
<?php foreach ($js as $v_js) {
    echo '<script src="'.base_url().$v_js.'"></script>'.PHP_EOL;
} ?>
</body>

</html>
