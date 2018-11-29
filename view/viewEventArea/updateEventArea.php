<?php include URL_VIEW . "navbar.php" ?>
<br>
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
            <form action = "<?= FRONT_VIEW ?>/eventArea/modify" method="post" id="eventAreas">
    
                <div class="form-group">
                    <label>Cantidad de asientos en la seccion</label>
                    <input type="number" class="form-control" id="" aria-describedby=""
                           placeholder="Ingrese la cantidad de asientos en la seccion"
                           name="data[quantity]" value="<?= $searchedItem->getQuantityAvaliable() ?>">
                </div>
    
                <div class="form-group">
                    <label>Precio</label>
                    <input type="number" class="form-control" id="" aria-describedby=""
                           placeholder="Ingrese de los asientos"
                           name="data[price]" value="<?= $searchedItem->getPrice() ?>">
                </div>
    
                <div class="form-group">
                    <label for="">Tipo de asientos</label>
                    <select class="form-control" id="" name="data[idTypeArea]" form="eventAreas"
                            value="<?= $searchedItem->getTypeArea()->getIdTypeArea() ?>">
                        <?php foreach ($typeAreas as $typeArea) { ?>
                            <option value=" <?= $typeArea->getIdTypeArea() ?>">
                                <?= $typeArea->getDescriptionTypeArea() ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
    
                <div class="form-group">
                    <label for="">Fecha de la disponibilidad del asiento</label>
                    <select class="form-control" id="" name="data[idCalendar]" form="eventAreas"
                    value="<?= $searchedItem->getCalendar()->getIdCalendar() ?>">
                        <?php foreach ($calendars as $calendar) { ?>
                            <option value=" <?= $calendar->getIdCalendar() ?>">
                                <?= $calendar->getDateStart() . " " . $calendar->getDateEnd() . "(" . $calendar->getEvent()->getTitleEvent() . ")" ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                
                <input type="hidden" name="data[id]" value="<?= $searchedItem->getIdEventArea() ?>">
                <button type="submit" class="btn btn-primary col-md-4 ml-auto ">Modificar</button>
            </form>
            <a href="<?= FRONT_VIEW ?>/event/list/ " type="submit" class="btn btn-primary col-md-4 ml-auto">Volver al listado</a>
        
        </div>
    </div>
    
    <br><br><br><br><br><br><br><br><br><br><br><br>
