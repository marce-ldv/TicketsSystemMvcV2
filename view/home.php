<?php  include(URL_VIEW . 'navbar.php'); ?>
<div class="container">

    <section id="about">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Bienvenido</h2>
          <p class="lead">Este es un sistema de venta de tickets de eventos, como pueden ser recitales, cines y demas</p>
          <ul>
            <li>Clickable nav links that smooth scroll to page sections</li>
            <li>Responsive behavior when clicking nav links perfect for a one page website</li>
            <li>Bootstrap's scrollspy feature which highlights which section of the page you're on in the navbar</li>
            <li>Minimal custom CSS so you are free to explore your own unique design options</li>
          </ul>
        </div>
      </div>
    </section>

    <!--Aqui se mostrara el alert-->
    <?php if (isset($alert)) { ?>
      <div class="container">
        <div class="alert alert-success alert-dismissible fade in show" role="alert">
          <?php echo $alert; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    <?php } ?>

    <!--Carousel -->
    <div>
      <div id="carouselZ" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselZ" data-slide-to="0" class="active"></li>
          <li data-target="#carouselZ" data-slide-to="1"></li>
          <li data-target="#carouselZ" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="<?= URL_IMG ?>eventos.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?= URL_IMG ?>eventos2.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?= URL_IMG ?>eventos.jpg" alt="Third slide">
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
    
    
    <section id="sucursales">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Lorem ipsum <b>Lorem ipsum</b></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <hr class="primary">
          </div>
        </div>
      </div>
    </section>
    <div class="clearfix">
    </div>

</div>
