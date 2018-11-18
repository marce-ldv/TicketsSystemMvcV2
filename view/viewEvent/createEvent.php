<?php include URL_VIEW . "navbar.php" ?>

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
