<?php include URL_VIEW . "navbar.php" ?>

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row jusify-content-center">

                <div class="col-md-6">
                    <form action="<?= FRONT_VIEW ?>/calendar/add/" method="post" id="calendar">

                        <div class="form-group">
                            <label>Fecha Inicio</label>
                            <input class="form-control" type="date" value="2018-08-19" name="data[dateStart]">
                        </div>

                        <div class="form-group">
                            <label>Fecha Fin</label>
                            <input class="form-control" type="date" value="2018-08-30" name="data[dateEnd]">
                        </div>

                        <div class="form-group">
                            <label for="inlineFormCustomSelect">Elegir evento</label>
                            <select class="custom-select mr-sm-1" id="inlineFormCustomSelect" form="calendar" name="data[idEvent]">
                                <?php foreach ($events as $event) { ?>
                                <option value="<?= $event->getIdEvent() ?>">
                                    <?= $event->getTitleEvent() ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inlineFormCustomSelect">Elegir lugar de evento</label>
                            <select class="custom-select mr-sm-1" id="inlineFormCustomSelect" form="calendar" name="data[idPlaceEvent]">
                                <?php foreach ($placeEvents as $placeEvent) { ?>
                                <option value="<?= $placeEvent->getIdPlaceEvent() ?>">
                                    <?= $placeEvent->getDescription() ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Aceptar</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Evento</th>
                        <th scope="col">Lugar</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
              if(isset($items)){
              foreach ($items as $item) {?>
                    <tr>
                        <td>
                            <?= $item->getEvent()->getTitleEvent() ?>
                        </td>
                        <td>
                            <?= $item->getPlaceEvent()->getDescription() ?>
                        </td>
                        <td>
                            <?= "Desde ".$item->getDateStart()." Hasta ".$item->getDateEnd() ?>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="<?= FRONT_VIEW ?>/calendar/viewEdit/<?= $item->getIdCalendar() ?>">Editar</a>

                            <form action="<?= FRONT_VIEW ?>/calendar/remove" method="post">
                                <div class="form-group">
                                    <input type="hidden" value="<?= $item->getIdCalendar() ?>" name="data[idCalendar]">
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


<br><br><br><br><br><br>
