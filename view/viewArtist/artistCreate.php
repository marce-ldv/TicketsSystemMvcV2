<?php include URL_VIEW . "navbar.php" ?>
 
 
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6 col-12">
			<?php if(isset($mensaje)) { ?>
				<div class="alert alert-<?= $mensaje[1] ?>" role="alert">
						<?= $mensaje[0] ?>
				</div>
			 <?php } ?>
		</div>
	</div>
	<div class="row jusify-content-center">
		<!-- limita la cantidad de columnas de boostrap -->
		<div class="col-md-6 col-12">
			<form action = "<?= VIEW_URL ?>/artist/save" method="post">
			<!-- este es el form donde se ingresa el nombre del artista -->				
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nombre Artista</label>
			    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese el nombre del artista" name="nombre">
			  </div>
			  <button type="submit" class="btn btn-primary">Agregar</button>
			</form>
		</div>
	</div>

	
</div>







