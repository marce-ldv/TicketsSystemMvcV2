<?php include URL_VIEW . "navbar.php" ?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6 col-12">
			<?php if(isset($mensaje)) { ?>
				<div class="alert alert-<?= $mensaje['tipo'] ?>" role="alert">
						<?= $mensaje['mensaje'] ?>
				</div>
			 <?php } ?>
		</div>
	</div>

	<!-- pone el form en el medio de la pagina y lo saca del footer -->
	<div class="row jusify-content-center">
		<!-- limita la cantidad de columnas de boostrap -->
			<div class="col-md-12 col-12">
				<form action = "<?= VIEW_URL ?>/artist/updateC" method="post">

					<div class="form-group">
				    <input value="<?= $searchedArtist->getNickname() ?>"
				    type="text" class="form-control" placeholder="Ingrese el nickname del artista" name="artistData[nickname]">
				  </div>

				  <div class="form-group">
				    <input value="<?= $searchedArtist->getName() ?>"
				    type="text" class="form-control" placeholder="Ingrese el nombre del artista" name="artistData[name]">
				  </div>

					<div class="form-group">
				    <input value="<?= $searchedArtist->getSurname() ?>"
				    type="text" class="form-control" placeholder="Ingrese el apellido del artista" name="artistData[surname]">
				  </div>

				  <input type="hidden" name="artistData[id]" value="<?= $searchedArtist->getIdArtist() ?>">
			  <button type="submit" class="btn btn-primary col-md-4 ml-auto ">Modificar</button>
			</form>
			<a href="<?= VIEW_URL ?>/artist/list/ " type="submit" class="btn btn-danger col-md-4 ml-auto">Volver al listado</a>

		</div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br>
