<?php include URL_VIEW . "navbar.php" ?>

<br>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 col-12">
			<div class="row jusify-content-center">

				<div class="col-md-6 col-12">
					<form action = "<?= FRONT_VIEW ?>/placeEvent/add" method="post">

						<div class="form-group">
							<label>Capacidad</label>
							<input type="text" class="form-control" id="" aria-describedby="" placeholder="Ingrese la capacidad" name="registerData[capacity]">
						</div>
						<div class="form-group">
							<label>Descripcion</label>
							<input type="text" class="form-control" id="" aria-describedby="" placeholder="Ingrese la descripcion" name="registerData[_description]">
						</div>
						<button type="submit" class="btn btn-success">Agregar</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>

<br>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Capacidad</th>
			      <th scope="col">Descripcion</th>
						<th scope="col">Acciones</th>
			    </tr>
			  </thead>
				<tbody>
				<?php
				if(isset($items)){
				 foreach ($items as $item) {?>
					<tr>
			      <td><?= $item->getCapacity() ?></td>
			      <td><?= $item->getDescription() ?></td>
			      <td>

							<a class="btn btn-primary" href="<?= FRONT_VIEW ?>/placeEvent/viewEdit/<?= $item->getIdPlaceEvent() ?>">Editar</a>

							<form action="<?= FRONT_VIEW ?>/placeEvent/remove" method="post">
								<div class="form-group">
									<input type="hidden" value="<?= $item->getIdPlaceEvent() ?>" name="data[idPlaceEvent]">
									<input type="submit" class="btn btn-danger" value="Eliminar"></input>
								</div>
						</form>
						</td>
			    </tr>
				<?php }
						} ?>
			  </tbody>
			</table>
		</div>
	</div>
</div>

<br><br><br><br>
