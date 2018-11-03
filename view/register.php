<?php  include(URL_VIEW . 'navbar.php') ;?>


<div class="container" style="margin-top:30px;">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 text-center">
			<h2 class="section-heading" style="color:white">REGISTRARSE</h2>
			<hr class="primary">
			<p>
				<strong style="color:white">
					Registrate.
				</strong>
			</p>
			<div class="regularform">
				<?php if (isset($alert)) {?>
				<div class="done">
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<?php echo $alert ?>
					</div>
				</div>
				<?php } ?>

<!-- Codigo viejo
				  <div class="container">
				    <div class="alert alert-success alert-dismissible fade in show" role="alert">
				      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				        <span aria-hidden="true">&times;</span>
				      </button>
				    </div>
				  </div>

-->
				<form id="form_r" method="post" action="<?= VIEW_URL ?>/user/register/" id="contactform" class="text-left "autocomplete="off" enctype= 'multipart/form-data'>


					<input required name="username" type="text" class="col-md-12 norightborder btn1" placeholder="Nombre de usuario">

					<input required name="pass" type="password" class="col-md-12 norightborder btn1" placeholder="Contraseña">

					<input required name="email" type="email"  class="col-md-12 norightborder btn1" placeholder="E-mail">

					<button type="submit" class="contact submit btn btn-primary btn-xl pull-right" style=" border-radius:15px;">Registrarse</button>

				</form>
			</div>
		</div>
	</div>
</div>
