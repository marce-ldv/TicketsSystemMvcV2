<?php include URL_VIEW . "navbar.php" ?>

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row jusify-content-center">

                <div class="col-md-6">
                    <form action="<?= VIEW_URL ?>calendar/method/" method="post">

                        <div class="form-group">
                            <label for="inlineFormCustomSelect">Elegir evento</label>
                            <select class="custom-select mr-sm-1" id="inlineFormCustomSelect">
                                <option selected>Elija un evento...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Calendario</label>
                            <input class="form-control" type="date" value="2011-08-19" id="">
                        </div>

                        <div class="form-group">
                            <label for="inlineFormCustomSelect">Tipo de plaza</label>
                            <select class="custom-select mr-sm-1" id="inlineFormCustomSelect">
                                <option selected>Elija tipo de plaza...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inlineFormCustomSelect">Cantidad total</label>
                            <textarea class="form-control" name="" id="" cols="1" rows="1"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="inlineFormCustomSelect">Remanente</label>
                            <textarea class="form-control" name="" id="" cols="1" rows="1"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="inlineFormCustomSelect">Precio</label>
                            <textarea class="form-control" name="" id="" cols="1" rows="1"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Aceptar</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<br><br><br><br><br><br>