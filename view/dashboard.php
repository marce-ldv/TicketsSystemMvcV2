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
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
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

<br>

<div class="container">
  <div class="row">

    <div class="col-md-6">
      <h2><a href="<?= VIEW_URL ?>/default/viewArtist/">Artistas</a></h2>
      <p class="lead">This is a great place to talk about your webpage. This template is purposefully unstyled so you can use it as a boilerplate or starting point for you own landing page designs! This template features:</p>
    </div>

    <div class="col-md-6">
      <h2><a href="<?= VIEW_URL ?>/default/viewCategory/">Categorias</a></h2>
      <p class="lead">This is a great place to talk about your webpage. This template is purposefully unstyled so you can use it as a boilerplate or starting point for you own landing page designs! This template features:</p>
    </div>

    <div class="col-md-6">
      <h2><a href="<?= VIEW_URL ?>/default/viewEvent/">Eventos</a></h2>
      <p class="lead">This is a great place to talk about your webpage. This template is purposefully unstyled so you can use it as a boilerplate or starting point for you own landing page designs! This template features:</p>
    </div>

    <div class="col-md-6">
      <h2><a href="<?= VIEW_URL ?>/default/viewPurchase/">Compras</a></h2>
      <p class="lead">This is a great place to talk about your webpage. This template is purposefully unstyled so you can use it as a boilerplate or starting point for you own landing page designs! This template features:</p>
    </div>

    <div class="col-md-6">
      <h2><a href="<?= VIEW_URL ?>/default/viewTypeArea/">Tipo de area(tipo plaza) palco,platea</a></h2>
      <p class="lead">This is a great place to talk about your webpage. This template is purposefully unstyled so you can use it as a boilerplate or starting point for you own landing page designs! This template features:</p>
    </div>

    <div class="col-md-6">
      <h2><a href="<?= VIEW_URL ?>/default/viewPlaceEvent/">Tipo de place event(Lugar de evento) capacidad 95000 personas, Estadio libertadores de america por ejemplo</a></h2>
      <p class="lead">This is a great place to talk about your webpage. This template is purposefully unstyled so you can use it as a boilerplate or starting point for you own landing page designs! This template features:</p>
    </div>

    <div class="col-md-6">
      <h2><a href="<?= VIEW_URL ?>/default/viewEventArea/">Tipo de event area(asientos)</a></h2>
      <p class="lead">This is a great place to talk about your webpage. This template is purposefully unstyled so you can use it as a boilerplate or starting point for you own landing page designs! This template features:</p>
    </div>

    <div class="col-md-6">
      <h2>asd</h2>
      <p>users (usuarios), categories (categorias), events(eventos),
      artists, calendars(calendario), place_events (lugar_evento), type_areas(tipo plazas),
      area_events (plaza evento), calendars_x_artists(calendarios por artistas),
      purchases (compras), lines_purchases (lineas compras), tickets ya esta</p>
    </div>

  </div>
</div> <!-- end container -->
