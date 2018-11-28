<?php include URL_VIEW . "navbar.php" ?>

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-12">
            <div class="row jusify-content-center">
                <!-- limita la cantidad de columnas de boostrap -->
                <div class="col-md-6 col-12">
                    <form action="<?= FRONT_VIEW ?>/eventArea/add" method="post" id="eventAreas">

                        <div class="form-group">
                            <label>Cantidad de asientos en la seccion</label>
                            <input type="number" class="form-control" id="" aria-describedby=""
                                   placeholder="Ingrese la cantidad de asientos en la seccion"
                                   name="data[quantity]">
                        </div>

                        <div class="form-group">
                            <label>Precio</label>
                            <input type="number" class="form-control" id="" aria-describedby=""
                                   placeholder="Ingrese de los asientos"
                                   name="data[price]">
                        </div>

                        <div class="form-group">
                            <label for="">Tipo de asientos</label>
                            <select class="form-control" id="" name="data[idTypeArea]" form="eventAreas">
                                <?php foreach ($typeAreas as $typeArea) { ?>
                                    <option value=" <?= $typeArea->getIdTypeArea() ?>">
                                        <?= $typeArea->getDescriptionTypeArea() ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Fecha de la disponibilidad del asiento</label>
                            <select class="form-control" id="" name="data[idCalendar]" form="eventAreas">
                                <?php foreach ($calendars as $calendar) { ?>
                                    <option value=" <?= $calendar->getIdCalendar() ?>">
                                        <?= $calendar->getDateStart() . " " . $calendar->getDateEnd() . "(" . $calendar->getEvent()->getTitleEvent() . ")" ?>
                                    </option>
                                <?php } ?>
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
                    <th scope="col">Lugar de evento</th>
                    <th scope="col">Evento</th>
                    <th scope="col">Fechas</th>
                    <th scope="col">Cantidad de asientos</th>
                    <th scope="col">Disponibilidad</th>
                    <th scope="col">Precio de entrada</th>
                    <th scope="col">Tipo de plaza</th>
                    <th scope="col">Accion</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    if (isset($items)) {
                        foreach ($items as $item) { ?>
                            <tr>
                                <th scope="row">
                                    <?= $item->getCalendar()->getPlaceEvent()->getDescription() ?>
                                </th>
                                <td>
                                    <?= $item->getCalendar()->getEvent()->getTitleEvent() ?>
                                </td>
                                <td scope="row">
                                    <?= $item->getCalendar()->getDateStart() . " - " . $item->getCalendar()->getDateEnd() . "(" . $item->getCalendar()->getEvent()->getTitleEvent() . ")" ?>
                                </td>
                                <td>
                                    <?= $item->getQuantityAvaliable() ?>
                                </td>
                                <td>
                                    <?= $item->getRemainder() ?>
                                </td>
                                <td>
                                    <?= $item->getPrice() ?>
                                </td>
                                <td>
                                    <?= $item->getTypeArea()->getDescriptionTypeArea() ?>
                                </td>
                                <td>

                                    <a class="btn btn-primary"
                                       href="<?= FRONT_VIEW ?>/eventArea/viewEdit/<?= $item->getIdEventArea() ?>">Editar</a>

                                    <form action="<?= FRONT_VIEW ?>/eventArea/remove" method="post">
                                        <div class="form-group">
                                            <input type="hidden" value="<?= $item->getIdEventArea() ?>" name="data[id]">
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


<br><br><br><br><br><br><br><br><br><br>
