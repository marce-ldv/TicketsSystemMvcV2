<?php include URL_VIEW . "navbar.php" ?>

<div class="container-fluid align-content-center">
    
    <div class="col-6 offset-3">
        <h4 class="mb-3">Datos de Pago</h4>
        <form class="needs-validation" novalidate action="<?= FRONT_VIEW ?>/cart/buy/">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">Nombre</label>
                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Apellido</label>
                    <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="email">Email <span class="text-muted">(Opcional)</span></label>
                <input type="email" class="form-control" id="email" placeholder="tu@email.com">
            </div>

            <div class="mb-3">
                <label for="address">Direccion</label>
                <input type="text" class="form-control" id="address" placeholder="pasaje C 2444" required>
            </div>

            <div class="mb-3">
                <label for="zip">Codigo Postal</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
            </div>

            <hr class="mb-4">

            <h4 class="mb-3">Opciones de Pago</h4>

            <div class="d-block my-3">
                <div class="custom-control custom-radio">
                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                    <label class="custom-control-label" for="credit">Tarjeta de credito</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                    <label class="custom-control-label" for="debit">Tarjeta de debito</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cc-name">Nombre que figura en la tarjeta</label>
                    <input type="text" class="form-control" id="cc-name" placeholder="" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cc-number">Numero de la tarjeta</label>
                    <input type="text" class="form-control" id="cc-number" placeholder="" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">Fecha de vencimiento</label>
                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">Codigo de seguridad</label>
                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Comprar ahora</button>
        </form>
    </div>
</div>
