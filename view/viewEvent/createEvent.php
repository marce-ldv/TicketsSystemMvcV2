<?php include URL_VIEW . "navbar.php" ?>

<br>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 col-12">
			<div class="row jusify-content-center">
				<!-- limita la cantidad de columnas de boostrap -->
				<div class="col-md-6 col-12">
					<form action = "<?= VIEW_URL ?>/artist/save" method="post">
						
            <div class="form-group">
							<label>Nombre del evento</label>
							<input type="text" class="form-control" id="" aria-describedby="" placeholder="Ingrese el nombre del evento" name="data[name]">
						</div>
						<div class="form-group">
							<label>Descripcion</label>
							<input type="text" class="form-control" id="" aria-describedby="" placeholder="Ingrese la descripcion del evento" name="data[description]">
						</div>

						<div class="form-group">
              <label for="">Categoria</label>
              <select class="form-control" id="" name="data[category]">
                <option>Categoria 1</option>
                <option>Categoria 2</option>
                <option>Categoria 3</option>
                <option>Categoria 4</option>
                <option>Categoria 5</option>
              </select>
            </div>

						<button type="submit" class="btn btn-success">Agregar</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>


<br><br><br><br><br><br><br><br><br><br>
