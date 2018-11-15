<?php include(URL_VIEW . 'navbar.php'); ?>
<!-- HOME -->
<header id="home-section">
  <div class="dark-overlay">
    <div class="home-inner">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 d-none d-sm-block">
            <h1 class="display-4">Sistema de venta de tickets de eventos, Laboratorio IV.</h1>

            <!-- check -->
            <div class="d-flex flex-row">
              <div class="p-4 align-self-start">
                <i class="fas fa-certificate"></i>
              </div>
              <div class="p-4 align-self-end">
                <h3>CRUDS/CR A CREAR:</h3>
                <ul>
                  <li>Terminar el de crear artista (CRUD) artistController</li>
                  <li>Carrito de comprar (session y no es un crud, solo CR)</li>
                  <li>CRUD para los tipos de plazas typeareaController || usar helpers (typeAreaController) convertCase</li>
                  <li>CRUD para las plazas areaController (tipo)</li>
                  <li>CRUD de categorias categoryController ()</li>
                  <li>CRUD de lugar de evento eventareaController() || usar helpers (eventAreaController) convertCase</li>
                  <li>CRUD para eventos  eventController</li>
                  <li>CRUD PLACE EVENT para saber cuantos tickets se tienen que vender</li>
                  <li>CRUD type Area, o sea tipo de asiento</li>
                </ul>
              </div>
            </div>
            <!-- check -->
            <div class="d-flex flex-row">
              <div class="p-4 align-self-start">
                <i class="fas fa-certificate"></i>
              </div>
              <div class="p-4 align-self-end">
                Item 2 ipsum dolor sit amet, consectetur adipisicing elit. Earum eaque nam eos soluta, est velit magnam
                modi delectus amet, eveniet.
              </div>
            </div>
            <!-- check -->
            <div class="d-flex flex-row">
              <div class="p-4 align-self-start">
                <i class="fas fa-certificate"></i>
              </div>
              <div class="p-4 align-self-end">
                Item 3 ipsum dolor sit amet, consectetur adipisicing elit. Earum eaque nam eos soluta, est velit magnam
                modi delectus amet, eveniet.
              </div>
            </div>


          </div>
          <!-- SECOND COLUMN FORMULARIO -->
          <?php if ( ! $this->isLogged()) {?>
          <div class="col-lg-4 ">
            <div class="card text-center form-login">
              <div class="card-body">

                <?php if (isset($alert)) {?>
                <div class="done">
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo $alert ?>
                  </div>
                </div>
                <?php } ?>

                <h3>Iniciar Sesion.</h3>
                <p>Ingrese su usuario o email, y la contraseña para ingresar al sistema.</p>
                <form action="<?= VIEW_URL ?>/user/login/" method="post">

                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Username" name="registerData[username]">
                  </div>

                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" placeholder="Password" name="registerData[pass]">
                  </div>

                  <input type="submit" value="Login" class="btn btn-primary btn-block">
                </form>

                <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#form-register-modal">
                  Registrate
                </button>

                <button type="button" class="fb-login-button btn btn-primary" onclick="login()" name="button">Login con Facebook</button>


              </div>
            </div>
          </div>
        <?php }?>
        </div>
      </div>
    </div>
  </div>
</header>




<!-- INFO HEAD -->
<section class="info-head-section" id="info">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <div class="p-5">
          <h1 class="display-4">Info</h1>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus provident expedita optio
            magnam maiores deleniti perferendis quibusdam veniam. Quas quasi alias rerum, hic et adipisci culpa
            provident odit fugiat atque!</p>
          <a href="#" class="btn btn-outline-secondary">Lorem ipsum dolor.</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="info-section bg-light text-muted py-5" id="info-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="<?= URL_IMG ?>img1.png" alt="" class="img-fluid mb-3 rouded-circle">
      </div>
      <div class="col-md-6">
        <h3>SERVICES AND PRODUCTS</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste maxime quos obcaecati quod iusto. Debitis,
          eius, at! Labore totam quaerat nisi commodi ullam nesciunt eligendi, accusamus corporis in optio sapiente.</p>
        <!-- check -->
        <div class="d-flex flex-row">
          <div class="p-4 align-self-start">
            <i class="fas fa-certificate"></i>
          </div>
          <div class="p-4 align-self-end">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eaque nam eos soluta, est velit magnam modi
            delectus amet, eveniet.
          </div>
        </div>
        <!-- check -->
        <div class="d-flex flex-row">
          <div class="p-4 align-self-start">
            <i class="fas fa-certificate"></i>
          </div>
          <div class="p-4 align-self-end">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eaque nam eos soluta, est velit magnam modi
            delectus amet, eveniet.
          </div>
        </div>
        <!-- check -->
        <div class="d-flex flex-row">
          <div class="p-4 align-self-start">
            <i class="fas fa-certificate"></i>
          </div>
          <div class="p-4 align-self-end">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eaque nam eos soluta, est velit magnam modi
            delectus amet, eveniet.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- HEAD SECTION -->
<section class="info-head-section bg-danger">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <div class="p-5">
          <h1 class="display-4">Info</h1>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus provident expedita optio
            magnam maiores deleniti perferendis quibusdam veniam. Quas quasi alias rerum, hic et adipisci culpa
            provident odit fugiat atque!</p>
          <a href="#" class="btn btn-outline-secondary text-white">Lorem ipsum dolor.</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="info-section bg-light text-muted py-5" id="info-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>SERVICES AND PRODUCTS</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste maxime quos obcaecati quod iusto. Debitis,
          eius, at! Labore totam quaerat nisi commodi ullam nesciunt eligendi, accusamus corporis in optio sapiente.</p>
        <!-- check -->
        <div class="d-flex flex-row">
          <div class="p-4 align-self-start">
            <i class="fas fa-certificate"></i>
          </div>
          <div class="p-4 align-self-end">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eaque nam eos soluta, est velit magnam modi
            delectus amet, eveniet.
          </div>
        </div>
        <!-- check -->
        <div class="d-flex flex-row">
          <div class="p-4 align-self-start">
            <i class="fas fa-certificate"></i>
          </div>
          <div class="p-4 align-self-end">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eaque nam eos soluta, est velit magnam modi
            delectus amet, eveniet.
          </div>
        </div>
        <!-- check -->
        <div class="d-flex flex-row">
          <div class="p-4 align-self-start">
            <i class="fas fa-certificate"></i>
          </div>
          <div class="p-4 align-self-end">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eaque nam eos soluta, est velit magnam modi
            delectus amet, eveniet.
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <img src="<?= URL_IMG ?>img2.png" alt="" class="img-fluid mb-3 rouded-circle">
      </div>
    </div>
  </div>
</section>


<!-- Map section -->

<div class="map-google">
  <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1570.6220260496634!2d-57.54332104207982!3d-38.049094591530654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sar!4v1541287417940"
    width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<!-- Pongo el footer aca por que si no la ventana modal me lo pisa -->
<!-- Footer -->
<footer class="page-footer font-small mdb-color lighten-3 pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-3">

        <!-- Content -->
        <h5 class="font-weight-bold text-uppercase mb-4">INFO</h5>
        <p>Siguenos en nuestras redes sociales.</p>
        <p>Para contactarte con nosostros, puedes hacerlo haciendo click <a href="#">aqui</a>.</p>

      </div>


      <!-- Grid column -->
      <div class="col-md-3">

        <!-- Contact details -->
        <h5 class="font-weight-bold text-uppercase mb-4">DIRECCION</h5>

        <ul class="list-unstyled">
          <li>
            <p>
              <i class="fa fa-home mr-3"></i> Av. Dorrego ,281, Mar del plata</p>
            </li>
            <li>
              <p>
                <i class="fa fa-envelope mr-3"></i> info@cosmefulanito.com</p>
              </li>
              <li>
                <p>
                  <i class="fa fa-phone mr-3"></i> + 54 234 567 88</p>
                </li>
                <li>
                  <p>
                    <i class="fa fa-print mr-3"></i> + 54 234 567 89</p>
                  </li>
                </ul>

              </div>
              <!-- Grid column -->

              <hr class="clearfix w-100 d-md-none">

              <!-- Grid column -->

              <div class="col-md-6">

                <form action="<?= VIEW_URL ?>/phpmailer/send/" method="post">

                  <fieldset class="form-group">
                    <input type="email" class="form-control" name="formData[emailContact]" placeholder="Ingrese su email.." required>
                  </fieldset>
                  <fieldset class="form-group">
                    <textarea class="form-control" name="formData[msgContact]" placeholder="Escriba aqui su mensaje.." required></textarea>
                  </fieldset>
                  <fieldset class="form-group text-right">
                    <input type="submit" class="btn btn-primary btn-lg" value="Enviar"></input>
                  </fieldset>
                </form>
              </div>

              <!-- Grid column -->

            </div>
            <!-- Grid row -->

          </div>
          <!-- Footer Links -->

          <!-- Copyright -->
          <div class="footer-copyright text-center py-3">© 2018 Copyright:
            <a href="https://google.com/"> Sistema de venta de tickets</a>
          </div>
          <!-- Copyright -->

        </footer>
        <!-- Footer -->


<!-- Modal Register-->
<div id="form-register-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <!-- Modal Header-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- END Modal Header-->

      <!-- Modal Body -->
      <div class="card text-center modal-body-register">

        <div class="modal-body card-body">
          <h3>Registrate.</h3>
          <p>Ingrese su usuario o email, y la contrasena para ingresar al sistema.</p>
          <form action="<?= VIEW_URL ?>/user/register/" method="post">

            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder="Username" name="registerData[username]">
            </div>

            <div class="form-group">
              <input type="password" class="form-control form-control-lg" placeholder="Contrasena" name="registerData[pass]">
            </div>

            <div class="form-group">
              <input type="password" class="form-control form-control-lg" placeholder="Ingrese su contrasena de nuevo"
                name="registerData[passAgain]">
            </div>

            <div class="form-group">
              <input type="email" class="form-control form-control-lg" placeholder="Correo electronico" name="registerData[email]">
            </div>

            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder="Nombre" name="registerData[name_user]">
            </div>

            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder="Apellido" name="registerData[surname]">
            </div>

            <div class="form-group">
              <input type="text" class="form-control form-control-lg" placeholder="Dni" name="registerData[dni]">
            </div>

            <div class="form-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="registerData[avatar]">
                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
              </div>
            </div>

            <input type="submit" value="Registrarse" class="btn btn-outline-light btn-block">
          </form>
        </div>
      </div>
      <!-- END Modal Body -->


    </div>
  </div>
  <!-- END Modal View -->
