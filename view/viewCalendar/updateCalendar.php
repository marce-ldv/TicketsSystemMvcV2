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
				<form action="<?= FRONT_VIEW ?>/calendar/modify/" method="post" id="calendar">

						<div class="form-group">
								<label>Fecha Inicio</label>
								<input class="form-control" type="date" value="<?= $searchedItem->getDateStart() ?>" name="data[dateStart]">
						</div>

						<div class="form-group">
								<label>Fecha Fin</label>
								<input class="form-control" type="date" value="<?= $searchedItem->getDateEnd() ?>" name="data[dateEnd]">
						</div>

						<div class="form-group">
								<label for="inlineFormCustomSelect">Elegir evento</label>
								<select class="custom-select mr-sm-1" id="inlineFormCustomSelect" form="calendar" value="<?= $searchedItem->getEvent()->getIdEvent() ?>" name="data[idEvent]">
										<?php foreach ($events as $event) { ?>
												<option value="<?= $event->getIdEvent() ?>"><?= $event->getTitleEvent() ?></option>
										<?php } ?>
								</select>
						</div>

						<div class="form-group">
								<label for="inlineFormCustomSelect">Elegir lugar de evento</label>
								<select class="custom-select mr-sm-1" id="inlineFormCustomSelect" form="calendar" value="<?= $searchedItem->getPlaceEvent()->getIdPlaceEvent() ?>" name="data[idPlaceEvent]">
										<?php foreach ($placeEvents as $placeEvent) { ?>
												<option value="<?= $placeEvent->getIdPlaceEvent() ?>"><?= $placeEvent->getDescription() ?></option>
										<?php } ?>
								</select>
						</div>

						<input type="hidden" name="data[idCalendar]" value="<?= $searchedItem->getIdCalendar() ?>">
						<button type="submit" class="btn btn-primary">Modificar</button>

				</form>
			<a href="<?= FRONT_VIEW ?>/calendar/list/ " type="submit" class="btn btn-primary col-md-4 ml-auto">Volver al listado</a>

		</div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br>
