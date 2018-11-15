<?php  include(URL_VIEW . 'navbar.php');?>

<br>


<div class="container">
  <div class="row">

    <div class="col-md-12">
      <h1 style="text-align:center;">Menu principal</h1>

      <br>

      <div id="carouselZ" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselZ" data-slide-to="0" class="active"></li>
          <li data-target="#carouselZ" data-slide-to="1"></li>
          <li data-target="#carouselZ" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="<?= URL_IMG ?>lollapalooza.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <h2>Lollapalooza</h2>
              <p>Evento unico en bs as</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?= URL_IMG ?>evento3.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
              <h2>Concierto</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?= URL_IMG ?>evento4.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h2>Recital</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselZ" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselZ" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    </div>

  </div>
</div> <!-- end container -->

<br><br>

<div class="container">
<div class="row">
  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Artistas</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Categorias</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Eventos</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Compras</a>
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Tipo de area</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Lugar de evento</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Asientos</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">...</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list"><h2><a href="<?= VIEW_URL ?>/default/viewArtist/">Artistas</a></h2></div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list"><h2><a href="<?= VIEW_URL ?>/default/viewCategory/">Categorias</a></h2></div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list"><h2><a href="<?= VIEW_URL ?>/default/viewEvent/">Eventos</a></h2></div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list"><h2><a href="<?= VIEW_URL ?>/default/viewPurchase/">Compras</a></h2></div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list"><h2><a href="<?= VIEW_URL ?>/default/viewTypeArea/">Tipo de area(tipo plaza) palco,platea</a></h2></div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list"><h2><a href="<?= VIEW_URL ?>/default/viewPlaceEvent/">Tipo de place event(Lugar de evento) capacidad 95000 personas, Estadio libertadores de america por ejemplo</a></h2></div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list"><h2><a href="<?= VIEW_URL ?>/default/viewEventArea/">Tipo de event area(asientos)</a></h2></div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list"></div>

    </div>
  </div>
</div>

</div> <!-- end container -->

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>