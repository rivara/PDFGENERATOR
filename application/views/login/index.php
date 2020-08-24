
<body class="login-content">
<!-- Login -->
<?php echo form_open(base_url().'login/authenticate'); ?>
	<div class="lc-block toggled" id="l-login">
		<div class="input-group m-b-20">
			<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
			<div class="fg-line">
				<input type="text" class="form-control" placeholder="Username" name="nombre">
			</div>
		</div>
		<div class="input-group m-b-20">
			<span class="input-group-addon"><i class="zmdi zmdi-male"></i></span>
			<div class="fg-line">
				<input type="password" class="form-control" placeholder="Password" name="clave">
			</div>
		</div>
		<div class="clearfix"></div>
		<button type="submit" class="btn btn-login btn-danger btn-float"><i class="zmdi zmdi-arrow-forward"></i></button>
	</div>
<?php echo form_close(); ?>







