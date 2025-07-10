<?php 


if (!isset($_SESSION)){

  session_start();

}

$host = ControllerRoute::ctrUrlFront();
$users = ControllerUsers::ctrShowUser("idUser", $_SESSION["id"]);


// var_dump($dataTemplate);

?>
<nav class="app-header navbar navbar-expand bg-body">

	<div class="container-fluid"> 

		<ul class="navbar-nav"> 

			<li class="nav-item"> 

				<a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> 

					<i class="bi bi-list"></i> 

				</a> 

			</li> 

			<li class="nav-item d-none d-md-block"> 

				<a href="home" class="nav-link">Home</a> 

			</li> 

			<li class="nav-item d-none d-md-block"> 

				<a href="configuration" class="nav-link">Config</a> 

			</li> 

		</ul> 

		<ul class="navbar-nav ms-auto"> 

			<li class="nav-item"> 

				<a class="nav-link" href="#" data-lte-toggle="fullscreen"> 

					<i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i> 

					<i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i> 

				</a> 

			</li> 

				<ul class="navbar-nav ms-auto">

					<li class="nav-item dropdown">

						<button class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">

							<span class="theme-icon-active">

								<i class="my-1"></i>

							</span>

							<span class="d-lg-none ms-2" id="bd-theme-text">Toggle theme</span>

						</button>

						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme-text" style="--bs-dropdown-min-width: 8rem;">

							<li>
								<button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light" aria-pressed="false">
								
									<i class="bi bi-sun-fill me-2"></i>Light <i class="bi bi-check-lg ms-auto d-none"></i>

								</button>
							</li>

							<li>
								<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
									
									<i class="bi bi-moon-fill me-2"></i> Dark <i class="bi bi-check-lg ms-auto d-none"></i>

								</button>
							</li>

							<li>
								<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="true">
									
									<i class="bi bi-circle-fill-half-stroke me-2"></i>Auto <i class="bi bi-check-lg ms-auto d-none"></i>

								</button>
								
							</li>

						</ul>

					</li>

				</ul>

				<li class="nav-item dropdown user-menu"> 

					<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">

						<img src="<?php echo $host.$users["photo"]; ?>" class="user-image rounded-circle shadow" alt="User Image"> 

						<span class="d-none d-md-inline"><?php echo $users["name"]; ?></span> 

					</a> 

					<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">  

						<li class="user-header text-bg-light"> 

							<img src="<?php echo $host.$users["photo"]; ?>" class="rounded-circle shadow" alt="User Image"> <p>

								<?php echo $users["name"]." - ". $users["user"]; ?>

								<small><?php echo $users["created_at"]; ?></small> </p> 

						</li>

						<li class="user-body"> 

							<div class="row"> 

								<div class="col-4 text-center"> 

									<a href="#">Followers</a> 

								</div> 

								<div class="col-4 text-center"> 

									<a href="#">Sales</a> 

								</div>

								<div class="col-4 text-center"> 

									<a href="#">Friends</a> 

								</div> 

							</div>

						</li> 

						<li class="user-footer"> 

							<a href="#" class="btn btn-outline-primary btn-flat border border-primary rounded-0">Profile</a> 

							<a href="quit" class="btn btn-outline-primary btn-flat float-end border border-primary rounded-0">Sign out</a> 

						</li>

					</ul> 

				</li> 

		</ul>


	</div>

</nav> 
