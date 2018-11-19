<?php include URL_VIEW . "navbar.php" ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID evento</th>
            <th scope="col">Nombre</th>
            <th scope="col">Categoria</th>
            <th scope="col">Accion</th>
          </tr>
        </thead>
        <tbody>
          <?php
					if(isset($items)){
					foreach ($items as $item) {?>
          <tr>
            <th scope="row">
              <?= $item->getIdEvent() ?>
            </th>
            <td>
              <?= $item->getTitleEvent() ?>
            </td>
            <td scope="row">
              <?= $item->getCategory()->getNameCategory() ?>
            </td>
            <td>

              <form class="" action="<?php echo FRONT_VIEW ?>/purchase/add" method="post">
                <input class="btn btn-primary" type="submit" name="" value="Agregar al carrito">
              </form>

              <form action="<?= FRONT_VIEW ?>/event/remove" method="post">
                <div class="form-group">
                  <input type="hidden" value="<?= $item->getIdEvent() ?>" name="data[idEvent]">
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

<br><br><br><br>