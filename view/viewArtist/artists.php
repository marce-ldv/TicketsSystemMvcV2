<?php include URL_VIEW . "navbar.php" ?>

<br>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 col-12">
			<div class="row jusify-content-center">
				
				<div class="col-md-6 col-12">
					<form action = "<?= VIEW_URL ?>/artist/save" method="post">
						
						<div class="form-group">
							<label>Alias Artista</label>
							<input type="text" class="form-control" id="" aria-describedby="" placeholder="Ingrese el alias del artista" name="registerData[nickname]">
						</div>
						<div class="form-group">
							<label>Nombre Artista</label>
							<input type="text" class="form-control" id="" aria-describedby="" placeholder="Ingrese el nombre del artista" name="registerData[name]">
						</div>
						<div class="form-group">
							<label>Apellido Artista</label>
							<input type="text" class="form-control" id="" aria-describedby="" placeholder="Ingrese el apellido del artista" name="registerData[surname]">
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
			      <th scope="col">Nombre</th>
			      <th scope="col">Apellido</th>
						<th scope="col">Accion</th>
			    </tr>
			  </thead>
				<tbody>
				<?php
				if(isset($artists)){
				 foreach ($artists as $artist) {?>
					<tr>
			      <td><?= $artist->getNickname() ?></td>
			      <td><?= $artist->getName() ?></td>
						<td><?= $artist->getSurname() ?></td>
			      <td>

							<a class="btn btn-primary" href="<?= VIEW_URL ?>/artist/viewEditArtist/<?= $artist->getIdArtist() ?>">Editar</a>

							<form action="<?= VIEW_URL ?>/artist/delete" method="post">
								<div class="form-group">
									<input type="hidden" value="<?= $artist->getIdArtist() ?>" name="artistData[id]">
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

