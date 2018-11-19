<?php include URL_VIEW . "navbar.php" ?>

<br>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 col-12">
			<div class="row jusify-content-center">
				<!-- limita la cantidad de columnas de boostrap -->
				<div class="col-md-6 col-12">
					<form action="<?= FRONT_VIEW ?>/event/add" method="post" id="eventos">

						<div class="form-group">
							<label>Nombre del evento</label>
							<input type="text" class="form-control" id="" aria-describedby="" placeholder="Ingrese el nombre del evento"
							 name="data[title]">
						</div>

						<div class="form-group">
							<label for="">Categoria</label>
							<select class="form-control" id="" name="data[idCategory]" form="eventos">
								<?php foreach ($categories as $category) { ?>
								<option value=" <?= $category->getIdCategory() ?>">
									<?= $category->getNameCategory() ?>
								</option>
								<?php	}?>
							</select>
						</div>

						<button type="submit" class="btn btn-success">Agregar</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>

<br><br>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">ID evento</th>
						<th scope="col">Nombre</th>
						<th scope="col">Categoria</th>
						<th scope="col">Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($items)){
					foreach ($items as $item) {?>
					<tr>
						<th scope="row">
							<?= $item->getIdEvent() ?>
						</th>
						<td>
							<?= $item->getTitleEvent() ?>
						</td>
						<td scope="row">
							<?= $item->getCategory()->getNameCategory() ?>
						</td>
						<td>

							<a class="btn btn-primary" href="<?= FRONT_VIEW ?>/event/viewEdit/<?= $item->getIdEvent() ?>">Editar</a>

							<form action="<?= FRONT_VIEW ?>/event/remove" method="post">
								<div class="form-group">
									<input type="hidden" value="<?= $item->getIdEvent() ?>" name="data[idEvent]">
									<input type="submit" class="btn btn-danger" value="Eliminar"></input>
								</div>
							</form>
						</td>
					</tr>
					<?php }
						}?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<br><br><br><br>


<br><br><br><br><br><br><br><br><br><br>
