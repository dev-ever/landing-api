<?php 

$item = "idTemplate";
$value = 1;

$dataTemplate = ControllerTemplate::ctrShowConfig($item, $value);


if($_SESSION["profile"] == "1" || $_SESSION["profile"] == "2") {

 ?>
<main class="app-main" id="main">

	<div class="app-content-header">

		<div class="container-fluid">

			<div class="row">
				
				<div class="col-sm-6"> 

					<h3 class="mb-0">Configuration</h3> 

				</div>
				
				<div class="col-sm-6"> 

					<ol class="breadcrumb float-sm-end">

						<li class="breadcrumb-item">

							<a href="home">Home</a>

						</li>

						<li class="breadcrumb-item active text-bold" aria-current="page">
							Configuration
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

	    			<div class="card card-border-info-2 border-top border-light">

	    				<div class="card-body">

	    					<div class="border border-1 my-2 rounded">

		    					<img class="profile-user-img img-responsive img-fluid rounded-circle img-thumbnail p-1 m-2 mx-auto d-flex previsualizarPerfil" src="<?php echo $host.$dataTemplate["logo"]; ?>" alt="photo profile company">
		    	

		    					<h4 class="profile-username text-center text-uppercase"><?php echo $dataTemplate["company"]; ?></h4>

		    					<h5 class="text-muted text-center text-uppercase"><?php echo $dataTemplate["commCompany"]; ?></h5>

		    					<h6 class="text-muted text-center text-info"><?php echo $dataTemplate["companyIde"]; ?></h6>

	    					</div>

	    					<ul class="list-group list-group-unbordered mb-3 listOptionsCompany">

	    						<li class="list-group-item">

	    							<b>Folio:</b> <a class="float-end"><?php echo $dataTemplate["folio"]; ?></a>

	    						</li>

	    						<li class="list-group-item">

	    							<b>Date Updated:</b> <a class="float-end"><?php echo ControllerTemplate::formatedDateLarge($dataTemplate["created_at"]); ?></a>

	    						</li>

	    						<li class="list-group-item">

	    							<b>Company:</b> <a class="float-end"><?php echo $dataTemplate["company"]; ?></a>

	    						</li>

	    						<li class="list-group-item">

	    							<b>Comercial:</b> <a class="float-end"><?php echo $dataTemplate["commCompany"]; ?></a>

	    						</li>

	    						<li class="list-group-item">

	    							<b>DNI/RFC:</b> <a class="float-end"><?php echo $dataTemplate["companyIde"]; ?></a>

	    						</li>

	    						<li class="list-group-item">

	    							<b>Address:</b> <a class="float-end"><?php echo $dataTemplate["address"]; ?></a>

	    						</li>

	    					</ul>
	    					
	    				</div>
	    				
	    			</div>
	    			
	    		</div>




	    		<div class="col-md-8">

	    			<div class="card card-border-info-2 border-top border-light">

		              <div class="card-header p-2">

		                <ul class="nav nav-pills">

		                  <li class="nav-item">

		                  	<div class="nav-link text-uppercase fw-bold">

		                  	 <i class="bi bi-pencil-fill"></i> company data editing form

		                  	</div>

		                  </li>
		                
		                </ul>

		              </div>


		              <div class="card-body">

		                <div class="tab-content">

		               

		                    <form class="form-horizontal" method="POST" id="formEditTemplate" enctype="multipart/form-data" autocomplete="off">

		                      <div class="form-group row mb-3">

		                        <label for="editFolioId" class="col-sm-2 col-form-label">Folio:</label>

		                        <div class="col-sm-10">

		                          <input type="text" class="form-control" id="editFolioId" name="editFolio" placeholder="Folio" value="<?php echo $dataTemplate["folio"]; ?>" required>

		                        </div>

		                      </div>

		                      <div class="form-group row mb-3">

		                        <label for="editIdCompany" class="col-sm-2 col-form-label">Company:</label>

		                        <div class="col-sm-10">

		                          <input type="text" class="form-control" id="editIdCompany" name="editCompany" placeholder="Company" value="<?php echo $dataTemplate["company"]; ?>" required>

		                        </div>

		                      </div>

		                      <div class="form-group row mb-3">

		                        <label for="editComercialCompanyId" class="col-sm-2 col-form-label">Comercial company:</label>

		                        <div class="col-sm-10">

		                          <input type="text" class="form-control" name="editComercialCompany" id="editComercialCompanyId" placeholder="Enter Comercial Company"  value="<?php echo $dataTemplate["commCompany"]; ?>">
		                          <input type="hidden" name="editCompanyId" value="<?php echo $dataTemplate["idTemplate"]; ?>" required="">

		                        </div>

		                      </div>

		                      <div class="form-group row mb-3">

		                        <label for="editComercialDNIId" class="col-sm-2 col-form-label">Comercial DNI/RFC:</label>

		                        <div class="col-sm-10">

		                         <input type="text" class="form-control" name="editComercialDNI" id="editComercialDNIId" placeholder="Enter DNI/RFC" required="" value="<?php echo $dataTemplate["companyIde"]; ?>" readonly>
	

		                        </div>

		                      </div>

		                       <div class="form-group row mb-3">

		                        <label for="editAddressId" class="col-sm-2 col-form-label">Address:</label>

		                        <div class="col-sm-10">

		                         
		                          <textarea name="editAddress" id="editAddressId" class="form-control" placeholder="Enter address"><?php echo $dataTemplate["address"]; ?></textarea>

		                        </div>

		                      </div>

		                      <div class="form-group row mb-3">

		                        <label for="editPhotoId" class="col-sm-2 col-form-label">Logo:</label>

		                        <div class="col-sm-10">
		                        	<input class="form-control" type="file" id="editPhotoId" name="editaPhotoProfile" class="editaPhotoProfile">
		                         <!-- <input type="file" id="editPhotoId" name="editaPhotoProfile" class="editaPhotoProfile"> -->
		                         <input type="hidden" name="photoTemplateActually" value="<?php echo $dataTemplate["logo"] ?>">

		                        </div>

		                      </div>



		                     <div class="form-group row mb-3">

		                        <label for="editfaviconId" class="col-sm-2 col-form-label">Favicon:</label>

		                        <div class="col-sm-10">

		                        	<input class="form-control" type="file" id="editfaviconId" name="editFaviconProfile" class="editFaviconProfile">
		                         <!-- <input type="file" id="editfaviconId" name="editFaviconProfile" class="editFaviconProfile"> -->
		                         <input type="hidden" name="faviconTemplateActually" value="<?php echo $dataTemplate["favicon"] ?>">


		                        </div>

		                      </div>




		                      <div class="form-group row mb-3">

		                        <div class="offset-sm-2 col-sm-10">

		                          <button type="submit" class="btn btn-info text-uppercase">Update Template</button>

		                        </div>

		                      </div>



		                      <?php 

		                      		$updateTemplate = new ControllerTemplate();
		                      		$updateTemplate -> ctrSaveConfig();
		                       ?>

		                      
		                    </form>

		                

		                </div>
		                <!-- /.tab-content -->

		              </div><!-- /.card-body -->

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