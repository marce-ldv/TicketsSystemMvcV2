
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


        <script src="https://www.gstatic.com/firebasejs/5.5.8/firebase.js"></script>

        <script>
        // Initialize Firebase
        // TODO: Replace with your project's customized code snippet
        var config = {
          apiKey: "<API_KEY>",
          authDomain: "<PROJECT_ID>.firebaseapp.com",
          databaseURL: "https://<DATABASE_NAME>.firebaseio.com",
          projectId: "<PROJECT_ID>",
          storageBucket: "<BUCKET>.appspot.com",
          messagingSenderId: "<SENDER_ID>",
        };
        firebase.initializeApp(config);
        </script>

        <script>
        function login(){
          var provider = new firebase.auth.FacebookAuthProvider();

          firebase.auth().signInWithPopup(provider).then(function(result) {
            // This gives you a Facebook Access Token. You can use it to access the Facebook API.
            var token = result.credential.accessToken;
            // The signed-in user info.
            var user = result.user;
            // ...
          }).catch(function(error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            // The email of the user's account used.
            var email = error.email;
            // The firebase.auth.AuthCredential type that was used.
            var credential = error.credential;
            // ...
          });
        }
        </script>

        <!-- JS -->
        <script language="javascript" src="<?= JQUERYJS ?>"></script>
        <script language="javascript" src="<?= BOOTSTRAPJS ?>"></script>


      </body>

      </html>
