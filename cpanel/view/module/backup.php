<?php 

if($_SESSION["profile"] == "1" || $_SESSION["profile"] == "2") {

 ?>
<main class="app-main" id="main">

	<div class="app-content-header">

		<div class="container-fluid">

			<div class="row">
				
				<div class="col-sm-6"> 

					<h3 class="mb-0">Back - Up</h3> 

				</div>
				
				<div class="col-sm-6"> 

					<ol class="breadcrumb float-sm-end">

						<li class="breadcrumb-item">

							<a href="home">Home</a>

						</li>

						<li class="breadcrumb-item active text-bold" aria-current="page">
							Back Up
						</li>

					</ol> 

				</div>	
			
			</div>
			
		</div>	

	</div>

	<div class="app-content">

		<div class="container-fluid">

			<div class="row">

				<div class="col-md-4">

	    			<div class="card card-border-info-2 border-top border-light p-3">

	    				<form method="post" enctype="multipart/form-data">

	    					<div class="mb-3 px-4 py-1">

								<label for="newHostId">Host: </label>

								<div  class="input-group mb-2 mr-sm-2">

									<div class="input-group-text bg-transparent border-right-0"><i class="bi bi-database-fill-add"></i></div>

									<input type="text" name="newHost" id="newHostId" required="" class="form-control" maxlength="50" placeholder="Host del servidor" value="localhost"> 

								</div>

							</div>

							<div class="mb-3 px-4 py-1">

								<label for="newUserId">User: </label>

								<div  class="input-group mb-2 mr-sm-2">

									<div class="input-group-text bg-transparent border-right-0"><i class="bi bi-person-circle"></i></div>

									<input type="text" name="newUser" id="newUserId" required="" class="form-control" maxlength="50" placeholder="Usuario del servidor" value="u725112231_jwf"> 

								</div>

							</div>

							<div class="mb-3 px-4 py-1">

								<label for="newPasswordId">Password: </label>

								<div  class="input-group mb-2 mr-sm-2">

									<div class="input-group-text bg-transparent border-right-0"><i class="bi bi-key-fill"></i></div>

									<input type="text" name="newPassword" id="newPasswordId" required="" class="form-control" maxlength="50" placeholder="Password del servidor" value="Hidedark0306"> 

								</div>

							</div>

							<div class="mb-3 px-4 py-1">

								<label for="newDataBaseId">Base de datos: </label>

								<div  class="input-group mb-2 mr-sm-2">

									<div class="input-group-text bg-transparent border-right-0"><i class="bi bi-database-fill-add"></i></div>

									<input type="text" name="newDataBase" id="newDataBaseId" required="" class="form-control" maxlength="50" placeholder="Nombre de base de datos" value="u725112231_jwf"> 

								</div>

							</div>

							<div class="mb-3 px-4 py-1">

								<label for="newObservationsId">Observations: </label>

								<div  class="input-group mb-2 mr-sm-2">

									<div class="input-group-text bg-transparent border-right-0"><i class="bi bi-chat-fill"></i></div>

									<textarea name="newObservationsId" id="newObservationsId"  required="" class="form-control" maxlength="250" required="" placeholder="Observaciones"><?php echo "Backup: ".ControllerTemplate::formatedDateLarge(date("Y-m-d")); ?></textarea>

								</div>

							</div>

							<div  class="mb-2 mr-sm-2 p-3">

							
								<button class="btn btn-dark float-end text-uppercase">DataBase Backup</button>
								
							</div>


							<?php 
								$backUp = new ControllerBackups();
								$backUp -> ctrBackUpDb();
							 ?>

						</form>
	    				
	    			</div>
	    			
	    		</div>


	    		<div class="col-md-8 pt-sm-4">

	    			<div class="table-responsive">

		    			<table class="table table-striped table-sm order-column tablas compact tableBackup" style="width:100%">

		    				<thead>

		    					<tr>

		    						<th style="width:10px" class="text-center">#</th>
		    						<th class="text-center">Respaldo</th>
		    						<th class="text-center">Observaciones</th>
		    						<th class="text-center">Fecha de Respaldo</th>
		    						<th class="text-center">DownLoad</th>
		    						<th class="text-center">Delete</th>
		    					</tr>

		    				</thead>

		    				<tbody class="table-group-divider">

		    					<?php 

		    						$backups = ControllerBackups::ctrShowBackups(null, null, "created_at", "DESC");

		    						foreach ($backups as $key => $value) {
		    							
		    							echo '<tr>
		    									<td class="text-center">'.($key+1).'</td>
		    									<td class="text-center">'.$value["backup"].'</td>
		    									<td class="text-center">'.$value["observations"].'</td>
		    									<td class="text-center">'.$value["created_at"].'</td>
		    									<td class="text-center">

		    									   <a data-bs-tooltip="tooltip" data-bs-title="DownLoad" href="backups/'.$value['backup'].'" target="_blank" download>

		    									      <i class="bi bi-link-45deg"></i>

		    									    <a>

		    									</td>

		    									<td class="text-center">

		    										<button class="btn btn-danger btn-md btnDeleteBackUp" data-bs-tooltip="tooltip" data-bs-title="Eliminar"><i class="bi bi-trash3-fill"></i></button>

		    									</td>

		    							     </tr>';
		    						}

		    					 ?>



		    				</tbody>

		    			</table>

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