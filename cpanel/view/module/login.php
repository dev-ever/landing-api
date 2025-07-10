<div class="background">
	
	<div class="login-box"> 

		<div class="card card-outline card-success"> 

			<div class="card-header"> 

				<h1 class="mb-0 text-center"> <b>Login</b></h1> 

			</div> 

			<div class="card-body login-card-body"> 

				<p class="login-box-msg">Sign in to start your session</p> 

				<form method="post"> 

					<div class="input-group mb-1"> 

						<div class="form-floating"> 

							<input id="loginEmail" name="ingUser" type="text" class="form-control" placeholder="" value="admin"> 

							<label for="loginEmail">User</label> 

						</div> 

						<div class="input-group-text"> <span class="bi bi-envelope"></span> </div> 

					</div> 

					<div class="input-group mb-1"> 

						<div class="form-floating"> 

							<input id="loginPassword" name="ingPassword" type="password" class="form-control" placeholder="" value="admin"> 

							<label for="loginPassword">Password</label> 

						</div> 

						<div class="input-group-text"> 

							<span class="bi bi-lock-fill"></span> 

						</div> 

					</div> 

					<div class="row py-2"> 

						<div class="col-12 col-md-8 mx-auto"> 

							<div class="d-grid gap-2"> 

								<button type="submit" class="btn btn-warning btn-lg border-0"><b>SIGN IN</b></button> 

							</div> 

						</div> 

					<?php 

						$login = new ControllerUsers();
						$login -> ctrLoginUser();
					 ?>

					</div> 

				</form> 


			</div> 

		</div> 

	</div> 

</div>