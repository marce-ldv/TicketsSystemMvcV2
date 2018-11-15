<?php include URL_VIEW . "navbar.php" ?>

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row jusify-content-center">

                <div class="col-md-6">
                    <form action="<?= VIEW_URL ?>/artist/save" method="post">

                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="inlineFormCustomSelect">Fecha Inicio</label>
                                    <div class="form-group">
                                    <input class="form-control" type="number" value="" name="day">
                                    </div>
                                    <div class="form-group">
                                    <input class="form-control" type="number" value="" name="month">
                                    </div>
                                    <div class="form-group">
                                    <input class="form-control" type="number" value="" name="year">
                                    </div>
                                
                            </div>  
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label for="inlineFormCustomSelect">Fecha Fin</label>
                                    <div class="form-group">
                                    <input class="form-control" type="number" value="" name="day">
                                    </div>
                                    <div class="form-group">
                                    <input class="form-control" type="number" value="" name="month">
                                    </div>
                                    <div class="form-group">
                                    <input class="form-control" type="number" value="" name="year">
                                    </div>
                                
                            </div>  
                        </div>


                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="inlineFormCustomSelect">Elegir evento</label>
                                <select class="custom-select mr-sm-1" id="inlineFormCustomSelect">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember my
                                        preference</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">Agregar</button>
                        </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>


<br><br><br><br>

