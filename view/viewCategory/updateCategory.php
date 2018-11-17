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
				<form action = "<?= FRONT_VIEW ?>/category/modify" method="post">

					<div class="form-group">
				    <input value="<?= $searchedItem->getNameCategory(); ?>"
				    type="text" class="form-control" placeholder="Ingrese el nombre de la categoria" name="categoryData[name_category]">
				  	</div>
				  <input type="hidden" name="categoryData[id]" value="<?= $searchedItem->getIdCategory(); ?>">
			  	<button type="submit" class="btn btn-primary col-md-4 ml-auto ">Modificar</button>
				</form>
				<a href="<?= FRONT_VIEW ?>/category/list/ " type="submit" class="btn btn-primary col-md-4 ml-auto">Volver al listado</a>

			</div>
		</div>

<br><br><br><br><br><br><br><br><br><br><br><br>
