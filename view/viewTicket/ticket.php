<?php include URL_VIEW . "navbar.php" ?>

<br>


<div class="container">
    <div class="row">

        <div class="col-md-1 ml-auto">
            <td>
                <?php echo 'Nro Ticket: ';/*$this->getLinePurchase()*/ ?>
            </td>
        </div>

        <div class="col-md-12">
            <h1>Ticket</h1>
            -----------------------------------------------------------------------------
            <td>
                <?php echo 'Ticket Impreso'?>
            </td>
            ------------------------------------------------------------------------------
            <br><br>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Line purchase</th>
                        <th scope="col">Event area</th>
                    </tr>
                </thead>
                <tbody clas="table-hover">
                    <?php
				if(isset($tickets)){
				 foreach ($tickets as $ticket) {?>
                    <tr>
                        <td>
                            <?= $ticket->getLinePurchase() ?>
                        </td>
                        <td>
                            <?= $ticket->getEventArea() ?>
                        </td>
                    </tr>
                    <?php }
						} ?>
                </tbody>
            </table>
        </div>

    </div>
</div>




<div class="container">
    <div class="row">
        <div class="col-md-5 mr-auto">
            <label for="">Total</label>
            <textarea class="form-control" name="" id="" cols="1" rows="1" placeholder="$.."><?php //$ticket->getTotal(); ?></textarea>
        </div>

        <div class="col-md-2 ml-auto">
            <!--<textarea class="form-control" name="" id="" cols="1" rows="1"><?php //$ticket->getQr(); ?></textarea>-->
            <img src="<?=URL_IMG?>qr.png" alt="">
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p>Gracias por utilizar nuestros servicios</p>
        </div>
    </div>
</div>




<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>