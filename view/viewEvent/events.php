<?php include URL_VIEW . "navbar.php" ?>

<br>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12 col-12">
      <div class="row jusify-content-center">
        <!-- limita la cantidad de columnas de boostrap -->
        <div class="col-md-6 col-12">
          <form action = "<?= VIEW_URL ?>/artist/create" method="post">
            <!-- este es el form donde se ingresa el nombre del artista -->
            <div class="form-group">
              <label>Nombre Evento</label>
              <input type="text" class="form-control" id="" aria-describedby="" placeholder="Ingrese el nombre del evento" name="name">
            </div>


            <div class="form-group">


                <label>Fecha</label>
                  <input class="form-control" type="date" value="2011-08-19" id="">


              </div>
              <div class="form-group">
                <label for="">Artistas</label>
                <select class="form-control" name="" data-list="">
                  <option value="">Sergio</option>
                </select>
                <button type="button" name="button" class="btn btn-primary">Agregar mas artistas</button>
              </div>
              <button type="submit" class="btn btn-success">Agregar</button>
            </form>

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
              <th scope="col">Titulo</th>
              <th scope="col">Categoria</th>
              <th scope="col">Accion</th>
            </tr>
          </thead>
          <!--aqui va el foreach-->
          <tr>
            <td>das</td>
            <td>asd</td>
            <td>
              <button class="btn btn-primary">Editar</button>
              <button class="btn btn-danger">Eliminar</button>
            </td>
          </tr>
          <!--aqui temrina el foreach-->
        </tbody>
      </table>
    </div>
  </div>
</div>

<br><br><br><br>
