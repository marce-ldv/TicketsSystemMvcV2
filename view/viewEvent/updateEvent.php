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
				<form action = "<?= FRONT_VIEW ?>/event/modify" method="post" id="events">

					<div class="form-group">
				    <input value="<?= $searchedItem->getTitleEvent() ?>"
				    type="text" class="form-control" placeholder="Ingrese el titulo del evento" name="data[title]">
				  </div>

          <div class="form-group">
            <label for="">Categoria</label>
            <select class="form-control" id="" name="data[idCategory]" form="events" value="<?= $searchedItem->getCategory()->getIdCategory() ?>">
              <?php foreach ($categories as $category) { ?>
                <option value=" <?= $category->getIdCategory() ?>">
                  <?= $category->getNameCategory() ?>
                </option>
            <?php	}?>
            </select>
          </div>

				  <input type="hidden" name="data[idEvent]" value="<?= $searchedItem->getIdEvent() ?>">
			  <button type="submit" class="btn btn-primary col-md-4 ml-auto ">Modificar</button>
			</form>
			<a href="<?= FRONT_VIEW ?>/event/list/ " type="submit" class="btn btn-primary col-md-4 ml-auto">Volver al listado</a>

		</div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br>
