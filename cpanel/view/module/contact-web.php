<?php 

if($_SESSION["profile"] == "1" || $_SESSION["profile"] == "2") {

 ?>
<main class="app-main" id="main">

	<div class="app-content-header">

		<div class="container-fluid">

			<div class="row">
				
				<div class="col-sm-6"> 

					<h3 class="mb-0">IT Consulting Contacts</h3> 

				</div>
				
				<div class="col-sm-6"> 

					<ol class="breadcrumb float-sm-end">

						<li class="breadcrumb-item">

							<a href="home">Home</a>

						</li>

						<li class="breadcrumb-item active text-bold" aria-current="page">
							Contact Web
						</li>

					</ol> 

				</div>	


			
			</div>
			
		</div>	

	</div>

	<div class="app-content">

		<div class="container-fluid">

			<div class="row">

				<div class="col-12 col-md-12">
					
					<div class="card"> 

						<div class="card-header">

							<h3 class="card-title text-center float-end">

								<a href="view/module/reportes/down-excel.php?gral=gral">

									<button class="btn btn-success">

										<i class="bi bi-file-earmark-excel-fill"></i> Excel (xlsx)

									</button>

								</a>
								
							</h3>
						
						</div>

						 <div class="card-body">

						 	<table class="table table-striped table-hover compact order-column row-border compact tableContacts" style="width:100%">

						 		<thead>

						 			<tr>

						 				<th style="width:10px" class="text-center">#</th>
						 				<th class="text-center">Name</th>
						 				<th class="text-center">Email</th>
						 				<th class="text-center">Phone</th>
						 				<th class="text-center">Message</th>
						 				<th class="text-center">Contact Date</th>
						 				<th class="text-center">Actions</th>
						 				
						 			</tr>

						 		</thead>

						 		<tbody> 

						 	

						 		</tbody>

						 		</table>


						 	</div>

						 </div>

						</div>



				

			</div>
			
		</div>
		
	</div>
	
</main>


<?php 

}else{


	echo '<script> window.location = "home" </script>';


}

 ?>

