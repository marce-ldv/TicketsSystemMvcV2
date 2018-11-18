<?php include URL_VIEW . "navbar.php" ?>

<br>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 col-12">
			<div class="row jusify-content-center">
				<!-- limita la cantidad de columnas de boostrap -->
				<div class="col-md-6 col-12">
					<form action = "<?= VIEW_URL ?>/artist/save" method="post">
						<!-- este es el form donde se ingresa el nombre del artista -->
						<div class="form-group">
							<label>Alias Artista</label>
							<input type="text" class="form-control" id="" aria-describedby="" placeholder="Ingrese el nombre del artista" name="registerData[nickname]">
						</div>
						<div class="form-group">
							<label>Nombre Artista</label>
							<input type="text" class="form-control" id="" aria-describedby="" placeholder="Ingrese el nombre del artista" name="registerData[name]">
						</div>
						<div class="form-group">
							<label>Apellido Artista</label>
							<input type="text" class="form-control" id="" aria-describedby="" placeholder="Ingrese el nombre del artista" name="registerData[surname]">
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
			      <th scope="col">Nickname</th>
			      <th scope="col">Name</th>
			      <th scope="col">Surname</th>
						<th scope="col">Accion</th>
			    </tr>
			  </thead>
				<tbody>
				<?php foreach ($artists as $artist) {?>
					<tr>
			      <td><?= $artist->getNickname() ?></td>
			      <td><?= $artist->getName() ?></td>
						<td><?= $artist->getSurname() ?></td>
			      <td>
							<button class="btn btn-primary"> Editar </button>
							<button class="btn btn-danger">Eliminar</button>
						</td>
			    </tr>
				<?php } ?>
			  </tbody>
			</table>
		</div>
	</div>
</div>

<br><br><br><br>
