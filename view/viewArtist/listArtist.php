<?php include URL_VIEW . "navbar.php" ?>

<!-- vista de listar artistas -->
<div class="container">	
	<div class="row justify-content-center">
		<div class="col-md-6">
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col"># ID</th>
			      <th scope="col">Nombre</th>
			      <th></th>
			      <th></th>
			    </tr>
			  </thead>
			  <tbody>
				<?php foreach ($listArtists as $key => $value) { ?>
			    <tr>
			      <th scope="row"> <?= $value->getIdArtist() ?> </th>
			      <td> <?= $value->getNameArtist() ?> </td>
			      <td><button class="btn btn-primary"> Editar </button></td>
			      <td><button class="btn btn-danger">Eliminar</button></td>
			    </tr>
				<?php } ?>
			  </tbody>
			</table>
		</div>
	</div>
</div>