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
				<form action = "<?= VIEW_URL ?>/artist/update" method="post">
				<!-- este es el form donde se ingresa el nombre del artista -->				
				  <div class="form-group">
				    <label for="exampleInputEmail1">Modifique el nombre del artista seleccionado</label>

				    <input value="<?= $searchedArtist->getNameArtist() ?>"
				    type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese el nombre del artista" name="nombre">
				  
				  </div>
				  <input type="hidden" name="id_artist" value="<?= $searchedArtist->getIdArtist() ?>">
			  <button type="submit" class="btn btn-primary col-md-6 ">Modificar</button>
			</form>
			<a href="<?= VIEW_URL ?>/artist/list/ " type="submit" class="btn btn-primary col-md-6 pull-right">Volver al listado</a>

		</div>
</div>
