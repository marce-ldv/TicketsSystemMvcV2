<?php  include(URL_VIEW . 'navbar.php') ;?>
<div class="container">

	<div class="modal" tabindex="-1" role="dialog" id="modal-view">
		  <div class="modal-dialog" role="document">

		    <div class="modal-content">

		      <div class="modal-header">
		        <h5 class="modal-title">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>

		      <div class="modal-body">
		        <p>Modal body text goes here.</p>
		      </div>

		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary">Save changes</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>

		    </div>

		  </div>
	</div>

	<div class="bg-contact2">
		<div class="container-contact2">
			<div class="wrap-contact2">
				<form class="contact2-form validate-form" action="<?= VIEW_URL ?>/user/login/" method="post">
					<span class="contact2-form-title">
						Login
					</span>

					<?php if (isset($alert)) {?>
						<div class="done">
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">×</button>
								Thank you!
							</div>
						</div>
					<?php } ?>

					<div class="wrap-input2 validate-input" data-validate="Userame is required">
						<input class="input2" type="text" name="nickname">
						<span class="focus-input2" data-placeholder="Type your username or email"></span>
					</div>

					<div class="wrap-input2 validate-input" data-validate = "Pass is required">
						<input class="input2" type="password" name="pass">
						<span class="focus-input2" data-placeholder="Type your password"></span>
					</div>


					<div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn">
							<div class="contact2-form-bgbtn"></div>
							<button class="contact2-form-btn">
								Login
							</button>
						</div>
					</div>

					<!--modal test -->
					<div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn">
							<div class="contact2-form-bgbtn"></div>
							<button class="btn btnn-success" data-target="#modal-view">
								Modal
							</button>
						</div>
					</div>
					<!--modal test -->
				</form>
			</div>
		</div>
	</div>

</div>
