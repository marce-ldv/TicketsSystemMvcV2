<?php include URL_VIEW . "navbar.php" ?>

<br>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12 col-12">
      <div class="row jusify-content-center">
        <!-- limita la cantidad de columnas de boostrap -->
        <div class="col-md-6 col-12">

          <form action = "<?= FRONT_VIEW ?>/category/add" method="post">

            <div class="form-group">
              <label>Nombre del tipo de plaza</label>
              <input type="text" class="form-control" id="" aria-describedby="" placeholder="Ingrese el nombre del tipo de plaza" name="registerData[description]">
            </div>

              <button type="submit" class="btn btn-success">Agregar</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <br>

    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-md-12">
    			<table class="table">
    			  <thead>
    			    <tr>
    			      <th scope="col"># ID</th>
    						<th scope="col">Descripcion</th>
                <th scope="col">Accion</th>
    			    </tr>
    			  </thead>
    				<tbody>
              <?php
              if(isset($items)){
              foreach ($items as $item) {?>
    					<tr>
                <th scope="row"> <?= $item->getIdTypeArea() ?> </th>
    			      <td><?= $item->getDescriptionTypeArea() ?></td>
    			      <td>

                <a class="btn btn-primary" href="<?= FRONT_VIEW ?>/typeArea/viewEdit/<?= $item->getIdTypeArea() ?>">Editar</a>

                <form action="<?= FRONT_VIEW ?>/typeArea/remove" method="post">
                  <div class="form-group">
                    <input type="hidden" value="<?= $item->getIdTypeArea() ?>" name="data[id]">
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
