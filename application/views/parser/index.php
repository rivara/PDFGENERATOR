<!-- Following CSS are used only for the Demp purposes thus you can remove this anytime. -->

<style type="text/css">
	.toggle-switch .ts-label {
		min-width: 130px;
	}
</style>


<body>
<?php if(isset($error))
{echo 'error';} ?>
<section id="content">
	<div class="container">
		<div class="block-header">
			<h2>Formulario</h2>
		</div>

		<div class="card">
			<div class="card-header">
				<h2>Datos Empresa<small>Extend form controls by adding text or buttons before, after, or on both sides of any
						text-based inputs.</small></h2>
			</div>
			<div class="card-body card-padding">
				<?php echo form_open_multipart('parser/generate');?>
				<div class="row">
					<!-- lado izquierdo -->
					<div class="col-sm-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
							<div class="fg-line">
								<input type="text" class="form-control" placeholder="Nombre" name="nombre">
							</div>
						</div>
						<br/>
						<div class="input-group">
							<span class="input-group-addon"><i class="zmdi zmdi-file-add"></i></span>
							<div class="fg-line">
								<label>Logo Princial</label>
								<input type="file" class="form-control" name="logoPrincipal" id="logoPrincipal">
							</div>
						</div>

						<br/>

						<div class="input-group">
							<span class="input-group-addon"><i class="zmdi zmdi-colorize"></i></span>
							<div class="fg-line">
								<input data-jscolor="">
							</div>
						</div>

					</div>
					<!-- lado derecho -->
					<div class="col-sm-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="zmdi  zmdi-my-location"></i></span>
							<div class="fg-line">
								<input type="text" class="form-control" placeholder="Dirección" name="direccion" >
							</div>
						</div>


						<div class="input-group">
							<span class="input-group-addon"><i class="zmdi zmdi-view-web"></i></span>
							<div class="fg-line">
								<input type="text" class="form-control" placeholder="Web" name="web">
							</div>
						</div>


						<div class="input-group">
							<span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
							<div class="fg-line">
								<input type="text" class="form-control" placeholder="Email de contacto" name="mail">
							</div>
						</div>


					</div>
				</div>
				<br />
				<hr>
				<br />
				<div class="card-header">
					<h2>Datos Catalogo<small>Extend form controls by adding text or buttons before, after, or on both sides of any
							text-based inputs.</small></h2>
				</div>

				<div class="row">

					<!-- lado izquierdo -->
					<div class="col-sm-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
							<div class="fg-line">
								<input type="text" class="form-control" placeholder="Nombre del catalogo">
							</div>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="zmdi zmdi-file-add"></i></span>
							<div class="fg-line">
								<label>Input file para CSV de productos</label>
								<input type="file" class="form-control" name="csv">
							</div>
						</div>
					</div>
					<!-- lado derecho -->
					<div class="col-sm-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="zmdi zmdi-file-add"></i></span>
							<div class="fg-line">
								<label>Input file para un ZIP con imágenes de productos</label>
								<input type="file" class="form-control" name="zip">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-login btn-danger btn-float"><i class="zmdi zmdi-arrow-forward"></i></button>
		<?php echo  form_close(); ?>
	</div>
</section>







