<?php 

	$users = ControllerUsers::ctrShowUser(null,null);
	$user = count($users);

	$contacts = ControllerUsers::ctrShowUserContact(null,null);
	$contact = count($contacts);

 ?>
<main class="app-main" id="main">

	<div class="app-content-header">

		<div class="container-fluid">

			<div class="row">
				
				<div class="col-sm-6"> 

					<h3 class="mb-0">Dashboard TI Services (Admin Panel)</h3> 

				</div>
				
				<div class="col-sm-6"> 

					<ol class="breadcrumb float-sm-end">

						<li class="breadcrumb-item">

							<a href="home">Home</a>

						</li>

						<li class="breadcrumb-item active text-bold" aria-current="page">
							Dashboard
						</li>

					</ol> 

				</div>	


			
			</div>
			
		</div>	

	</div>

	<div class="app-content">

		<div class="container-fluid">

			<div class="row">

				<div class="col-lg-3 col-6">

					<div class="small-box text-bg-primary">

						<div class="inner">
						
							<h3>1</h3>
						
							<p>Company</p>
						
						</div>

						<div class="small-box-icon">

							<i class="bi bi-buildings-fill"></i>

						</div>

						<a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"> More Info <i class="bi bi-link-45deg"></i></a>	

					</div>
					
				</div>

				<div class="col-lg-3 col-6">

					<div class="small-box text-bg-success">

						<div class="inner">
						
							<h3>1</h3>
						
							<p>Profiles</p>
						
						</div>

						<div class="small-box-icon">

							<i class="bi bi-person-square"></i>

						</div>

						<a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"> More Info <i class="bi bi-link-45deg"></i></a>	

					</div>
					
				</div>

				<div class="col-lg-3 col-6">

					<div class="small-box text-bg-info">

						<div class="inner">
						
							<h3><?php echo $user; ?></h3>
						
							<p> Users</p>
						
						</div>

						<div class="small-box-icon">

							<i class="bi bi-person-circle"></i>

						</div>

						<a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"> More Info <i class="bi bi-link-45deg"></i></a>	

					</div>
					
				</div>

				<div class="col-lg-3 col-6">
					
					<div class="small-box text-bg-warning">

						<div class="inner">
						
							<h3><?php echo $contact;  ?></h3>
						
							<p>Contact</p>
						
						</div>

						<div class="small-box-icon">

							<i class="bi bi-person-lines-fill"></i>

						</div>

						<a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"> More Info <i class="bi bi-link-45deg"></i></a>	

					</div>

				</div>

			</div>
			
		</div>
		
	</div>
	
</main>