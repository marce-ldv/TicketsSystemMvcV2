<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href=" <?= FRONT_VIEW ?> "><img src="<?= URL_IMG ?>logo.jpg" style="height: 60px;"> Sistema de Tickets</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <?php if ( $this->isLogged()) {?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $this->getToken()->getUsername(); ?>
          
            <img src="<?= FRONT_IMAGE_UPLOADS.$this->getToken()->getProfilePicture() ?>" height="50" width="50" alt="" style="border-radius: 50px 50px 50px 50px">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?= FRONT_VIEW ?>/default/dashboard"><i class="far fa-compass fa-spin""></i> Dashboard</a>
          <a class="dropdown-item" href="<?= FRONT_VIEW ?>/test/"><i class="far fa-circle"></i> Shop</a>
          <a class="dropdown-item" href="<?= FRONT_VIEW ?>/purchase/"><i class="fas fa-shopping-cart"></i> Carrito</a>
            <a class="dropdown-item" href="<?= FRONT_VIEW ?>/user/logout/"><i class="fas fa-sign-out-alt"></i> Salir</a>
          <?php if ($this->getToken()->getRoleUser() == "admin") { ?>
          <a class="dropdown-item" href="<?= FRONT_VIEW ?>/artist/create">create</a>
        <?php  }?>
        </div>
      </li>
      <?php }else {?>
      <li class="nav-item">
        <a class="nav-link js-scroll-trigger" href="#home-section">Inicio </a>
      </li>
      <li class="nav-item">
        <a class="nav-link js-scroll-trigger" href="#info">Contacto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link js-scroll-trigger" href="#info">Acerca de</a>
      </li>
      <?php } ?>

      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
    </ul>
  </div>
</nav>


<?php if(isset($notifiaciones)) { ?>
  <!-- Modal -->

  <div class="modal fade" id="notiModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">NOTIFICACIONES</h4>
        </div>
        <div class="modal-body">
          <?php foreach($notifiaciones as $notificacion){ ?>
            <table class="table">
              <thead>
                <tr>
                  <th>
                    MENSAJE
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-chico">
                    <?= $notificacion->getMensaje() ?>
                  </td>
                </tr>
              </tbody>
            </table>
            <form method="post" action="/notificacion/eliminar">
              <input type="hidden" name="id" value=<?= $notificacion->getId() ?>>
              <button type="submit" style="border-color: black" class="btn btn-danger">ELIMINAR NOTIFICACION</button>
            </form>
          <?php } ?>

        </div>
        <div class="modal-footer">

          <button type="button" style="border-color: black" class="btn btn-success" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
