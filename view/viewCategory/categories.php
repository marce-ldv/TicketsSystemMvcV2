<?php include URL_VIEW . "navbar.php" ?>

<br>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12 col-12">
      <div class="row jusify-content-center">
        <!-- limita la cantidad de columnas de boostrap -->
        <div class="col-md-6 col-12">

          <form action = "<?= VIEW_URL ?>/category/save" method="post">
            <!-- este es el form donde se ingresa el nombre de la categoria -->
            <div class="form-group">
              <label>Descripcion de la categoria</label>
              <input type="text" class="form-control" id="" aria-describedby="" placeholder="Ingrese el nombre de la categoria" name="registerData[description]">
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
    			      <th scope="col">Descripcion</th>
    						<th scope="col">Accion</th>
    			    </tr>
    			  </thead>
    				<tbody>
              <?php
              if(isset($categories)){
              foreach ($categories as $category) {?>
    					<tr>
                <th scope="row"> <?= $value->getIdCategory() ?> </th>
    			      <td><?= $category->getDescription() ?></td>
    			      <td>
    							<button class="btn btn-primary"> Editar </button>
    							<button class="btn btn-danger">Eliminar</button>
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
