<?php  include(URL_VIEW . 'navbar.php') ;?>


<div class="container" style="margin-top:30px;">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 text-center">
			<h2 class="section-heading" style="color:white">Login</h2>
			<hr class="primary">
			<p>
				<strong style="color:white">
					Iniciar Sesion.
				</strong>
			</p>
			<div class="regularform">
				<div class="done">
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">×</button>
						Thank you!
					</div>
				</div>
				<form id="form_r" method="post" action="<?= VIEW_URL ?>/user/login/" id="loginform" class="text-left "autocomplete="off" enctype= 'multipart/form-data'>

					<p style="text-align: center;">
						<strong style="color:white">
							Necesitamos que introduzcas un nombre de usuario y una contraseña.
						</strong>
					</p>

					<input  name="nickname" autocomplete="off" type="text" class="col-md-12 norightborder btn1" placeholder="Nickname de Usuario">
					<input  name="pass" autocomplete="off" type="password" class="col-md-12 norightborder btn1" placeholder="Contraseña">
					<button type="submit" class="contact submit btn btn-primary btn-xl pull-right " style="  border-radius:15px;">Login</button>

				</form>
			</div>
		</div>
	</div>
</div>
