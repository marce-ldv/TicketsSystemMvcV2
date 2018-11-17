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
				<form action = "<?= FRONT_VIEW ?>/artist/modify" method="post">

					<div class="form-group">
				    <input value="<?= $searchedItem->getNickname() ?>"
				    type="text" class="form-control" placeholder="Ingrese el nickname del artista" name="artistData[nickname]">
				  </div>

				  <div class="form-group">
				    <input value="<?= $searchedItem->getNameArtist() ?>"
				    type="text" class="form-control" placeholder="Ingrese el nombre del artista" name="artistData[name]">
				  </div>

					<div class="form-group">
				    <input value="<?= $searchedItem->getSurname() ?>"
				    type="text" class="form-control" placeholder="Ingrese el apellido del artista" name="artistData[surname]">
				  </div>

				  <input type="hidden" name="artistData[id]" value="<?= $searchedItem->getIdArtist() ?>">
			  <button type="submit" class="btn btn-primary col-md-4 ml-auto ">Modificar</button>
			</form>
<<<<<<< HEAD
			<a href="<?= VIEW_URL ?>/artist/list/ " type="submit" class="btn btn-danger col-md-4 ml-auto">Volver al listado</a>
=======
			<a href="<?= FRONT_VIEW ?>/artist/list/ " type="submit" class="btn btn-primary col-md-4 ml-auto">Volver al listado</a>
>>>>>>> 4b2ea1dd6a7b4a3191cea6faff4f87696823395b

		</div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br>
