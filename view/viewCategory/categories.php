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
              <label>Nombre de la categoria</label>
              <input type="text" class="form-control" id="" aria-describedby="" placeholder="Ingrese el nombre de la categoria" name="registerData[name_category]">
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
    						<th scope="col">Nombre</th>
                <th scope="col">Accion</th>
    			    </tr>
    			  </thead>
    				<tbody>
              <?php
              if(isset($categories)){
              foreach ($categories as $category) {?>
    					<tr>
                <th scope="row"> <?= $category->getIdCategory() ?> </th>
    			      <td><?= $category->getNameCategory() ?></td>
    			      <td>

                <a class="btn btn-primary" href="<?= FRONT_VIEW ?>/category/viewEdit/<?= $category->getIdCategory() ?>">Editar</a>

                <form action="<?= FRONT_VIEW ?>/category/remove" method="post">
                  <div class="form-group">
                    <input type="hidden" value="<?= $category->getIdCategory() ?>" name="artistData[id]">
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
