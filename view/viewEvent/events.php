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

            <label>Fecha</label>
            <div class="form-group row">

              <div class="form-group row">
                <label for="example-date-input" class="col-2 col-form-label">Date</label>
                  <input class="form-control" type="date" value="2011-08-19" id="">
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
