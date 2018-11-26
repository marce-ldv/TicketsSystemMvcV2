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
				<form action = "<?= FRONT_VIEW ?>/placeEvent/modify" method="post">

					<div class="form-group">
				    <input value="<?= $searchedItem->getCapacity() ?>"
				    type="text" class="form-control" placeholder="Ingrese la capacidad" name="data[capacity]">
				  </div>

				  <div class="form-group">
				    <input value="<?= $searchedItem->getDescription() ?>"
				    type="text" class="form-control" placeholder="Ingrese la descripcion" name="data[_description]">
				  </div>

				  <input type="hidden" name="data[id]" value="<?= $searchedItem->getIdPlaceEvent() ?>">
			  <button type="submit" class="btn btn-primary col-md-4 ml-auto ">Modificar</button>
			</form>
			<a href="<?= FRONT_VIEW ?>/placeEvent/list/ " type="submit" class="btn btn-primary col-md-4 ml-auto">Volver al listado</a>

		</div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br>
