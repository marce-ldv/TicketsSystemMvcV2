<?php include URL_VIEW . "navbar.php" ?>
<div class="row">
    <div class="col-md-6 offset-3" style="color: #333333">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Carrito</span>
            <span class="badge badge-secondary badge-pill"><?= count($itemsCart) ?></span>
        </h4>
        <ul class="list-group mb-8">
            <?php foreach ($itemsCart as $item) {?>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"><i class="fas fa-trash"></i> <?= $item['tituloEvento'] ?> </h6>
                    </div>
                    
                    <span class="text-muted"><?= $item['price'] ?>(<?= $item['quantity'] ?>)</span>
                    
                </li>
            <?php }?>
            <li class="list-group-item d-flex justify-content-between">
                <span>Total</span>
                <strong>$<?= $total ?></strong>
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-6 offset-3">
        <a href="<?= FRONT_VIEW ?>/cart/buyPage/" class="btn btn-primary ml-auto">Ir a pagos</a>
    </div>
</div>
