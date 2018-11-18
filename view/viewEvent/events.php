<?php include URL_VIEW . "navbar.php" ?>

<br>


<div class="container">
  <div class="row">

    <div class="col-md-12">
      <h1 style="text-align:center;">Evenmtos</h1>

      <br>

      <div id="carouselZ" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselZ" data-slide-to="0" class="active"></li>
          <li data-target="#carouselZ" data-slide-to="1"></li>
          <li data-target="#carouselZ" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="<?= URL_IMG ?>eventos.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <h2>asdadasds</h2>
              <p>asd</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?= URL_IMG ?>eventos2.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
              <h2>asdadasds</h2>
              <p>asd</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?= URL_IMG ?>eventos.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h2>asdadasds</h2>
              <p>asd</p>
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


  <br>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Titulo</th>
              <th scope="col">Categoria</th>
            </tr>
          </thead>
          <!--aqui va el foreach-->
          <tr>
            <td>das</td>
            <td>asd</td>
          </tr>
          <!--aqui temrina el foreach-->
        </tbody>
      </table>
    </div>
  </div>
</div>

<br><br><br><br>
