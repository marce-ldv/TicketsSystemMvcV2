<?php include URL_VIEW . "navbar.php" ?>

<div class="cont-todo">
    
    <?php foreach ($calendars as $calendar) {
        $calendar->initializeEventAreas(); ?>
        <div class="event-item card">
            <div class="card-header" style="background-color: #333">
                <h4><?= $calendar->getEvent()->getTitleEvent() ?> </h4>
            </div>
            <div class="card-body" style="background-color: #333">
                <div><?= $calendar->getPlaceEvent()->getDescription() ?></div>
                <div><?= "Desde " . $calendar->getDateStart() . " Hasta " . $calendar->getDateEnd() ?></div>
                <div>
                    <span class="badge badge-pill badge-info"><?= $calendar->getEvent()->getCategory()->getNameCategory() ?></span>
                </div>
                <div>Artistas (lista)</div>
                <!-- Acordeaon       ---------------------------------------->
                <div class="contenedor">
                    
                    <?php foreach ($calendar->getEventsAreas() as $eventArea) { ?>
                        <div class="card item-flexible">
                            <div class="card-header" style="background-color: #333">
                                <h5 class="mb-0">
                                    <?= $eventArea->getTypeArea()->getDescriptionTypeArea() ?>
                                </h5>
                            </div>

                            <div class="">
                                <div class="card-body" style="background-color: #333">
                                    <div>Precio <?= $eventArea->getPrice() ?></div>
                                    <div>Cantidad de lugares disponibles <?= $eventArea->getRemainder() ?></div>
                                    <form action="<?= FRONT_VIEW ?>/cart/addToCart" method="post">
                                        <button class="btn btn-success">Agregar al carrito <i
                                                    class="fas fa-shopping-cart"></i></button>
                                        <input type="hidden" name="data[idEventArea]"
                                               value="<?= $eventArea->getIdEventArea() ?>">
                                        <input type="number" value="1" name="data[quantity]" id="add-quantity"
                                               class="form-control">
                                    </form>
                                </div>
                            </div>
                        </div>
                    
                    <?php } ?>
                </div>

            </div>
        </div>
    <?php } ?>
</div>


<br><br><br><br>