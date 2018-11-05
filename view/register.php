<?php  include(URL_VIEW . 'navbar.php'); ?>

  <!-- HOME -->
  <header id="home-section">
    <div class="dark-overlay">
      <div class="home-inner">
        <div class="container">
          <div class="row">
            
            <div class="container">
							<!-- SECOND COLUMN FORMULARIO -->
							<div class="col-lg-12">
								<div class="card text-center" style="background-color: #c0392b;">
									<div class="card-body">
										<h3>Registrate.</h3>
										<p>Ingrese su usuario o email, y la contraseña para ingresar al sistema.</p>
										<form action="<?= VIEW_URL ?>/user/register/" method="post">

											<div class="form-group">
												<input type="text" class="form-control form-control-lg" placeholder="Username" name="nickname">
											</div>

											<div class="form-group">
												<input type="password" class="form-control form-control-lg" placeholder="Contraseña" name="pass">
											</div>
											
											<div class="form-group">
												<input type="password" class="form-control form-control-lg" placeholder="Ingrese su contraseña de nuevo" name="pass">
											</div>
											
											<div class="form-group">
												<input type="email" class="form-control form-control-lg" placeholder="Correo electronico" name="nickname">
											</div>
											
											<div class="form-group">
												<input type="text" class="form-control form-control-lg" placeholder="Nombre" name="nickname">
											</div>
											
											<div class="form-group">
												<input type="text" class="form-control form-control-lg" placeholder="Apellido" name="nickname">
											</div>
											
											<div class="form-group">
												<input type="text" class="form-control form-control-lg" placeholder="Dni" name="nickname">
											</div>
											
											<div class="form-group">
												<input type="text" class="form-control form-control-lg" placeholder="Adjuntar imagen" name="nickname">
											</div>

											<input type="submit" value="Login" class="btn btn-outline-light btn-block">
										</form>
									</div>
								</div>
							</div>
							<!-- END SECOND COLUMN FORMULARIO -->
						</div>
							
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- INFO HEAD -->
  <section class="info-head-section">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="p-5">
            <h1 class="display-4">Info</h1>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus provident expedita optio magnam maiores deleniti perferendis quibusdam veniam. Quas quasi alias rerum, hic et adipisci culpa provident odit fugiat atque!</p>
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
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste maxime quos obcaecati quod iusto. Debitis, eius, at! Labore totam quaerat nisi commodi ullam nesciunt eligendi, accusamus corporis in optio sapiente.</p>
          <!-- check -->
          <div class="d-flex flex-row">
            <div class="p-4 align-self-start">
              <i class="fas fa-certificate"></i>
            </div>
            <div class="p-4 align-self-end">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eaque nam eos soluta, est velit magnam modi delectus amet, eveniet.
            </div>
          </div>
          <!-- check -->
          <div class="d-flex flex-row">
            <div class="p-4 align-self-start">
              <i class="fas fa-certificate"></i>
            </div>
            <div class="p-4 align-self-end">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eaque nam eos soluta, est velit magnam modi delectus amet, eveniet.
            </div>
          </div>
          <!-- check -->
          <div class="d-flex flex-row">
            <div class="p-4 align-self-start">
              <i class="fas fa-certificate"></i>
            </div>
            <div class="p-4 align-self-end">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eaque nam eos soluta, est velit magnam modi delectus amet, eveniet.
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
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus provident expedita optio magnam maiores deleniti perferendis quibusdam veniam. Quas quasi alias rerum, hic et adipisci culpa provident odit fugiat atque!</p>
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
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste maxime quos obcaecati quod iusto. Debitis, eius, at! Labore totam quaerat nisi commodi ullam nesciunt eligendi, accusamus corporis in optio sapiente.</p>
          <!-- check -->
          <div class="d-flex flex-row">
            <div class="p-4 align-self-start">
              <i class="fas fa-certificate"></i>
            </div>
            <div class="p-4 align-self-end">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eaque nam eos soluta, est velit magnam modi delectus amet, eveniet.
            </div>
          </div>
          <!-- check -->
          <div class="d-flex flex-row">
            <div class="p-4 align-self-start">
              <i class="fas fa-certificate"></i>
            </div>
            <div class="p-4 align-self-end">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eaque nam eos soluta, est velit magnam modi delectus amet, eveniet.
            </div>
          </div>
          <!-- check -->
          <div class="d-flex flex-row">
            <div class="p-4 align-self-start">
              <i class="fas fa-certificate"></i>
            </div>
            <div class="p-4 align-self-end">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eaque nam eos soluta, est velit magnam modi delectus amet, eveniet.
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
      <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1570.6220260496634!2d-57.54332104207982!3d-38.049094591530654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sar!4v1541287417940" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
