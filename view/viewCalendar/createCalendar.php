<?php include URL_VIEW . "navbar.php" ?>

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row jusify-content-center">

                <div class="col-md-6">
                    <form action="<?= VIEW_URL ?>/artist/save" method="post">

                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker2'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker2').datetimepicker({
                                    locale: 'ru'
                                });
                            });
                        </script>

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