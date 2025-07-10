<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand--> 

	<div class="sidebar-brand">

		<a href="home" class="brand-link">

			<img src="<?php echo $host.$dataTemplate['logo'] ?>" alt="Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> 

			<span class="brand-text fw-light nameProfileCompany text-uppercase"><?php echo $dataTemplate['company'] ?></span> <!--end::Brand Text--> 

		</a> 




	</div> 




	<div class="sidebar-wrapper"> 


		<nav class="mt-2"> 

			<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation" data-accordion="false" id="navigation">
				<!-- MENU HOME -->
				<li class="nav-item">

					<a href="home" class="nav-link">

						<i class="bi bi-speedometer"></i> 

						<p>Home</p> 
					</a> 

				</li> 


				<!-- SUBMENU -->

				<li class="nav-item"> 

					<a href="#" class="nav-link"> 

						<i class="bi bi-menu-app-fill"></i>

						<p> Catalog <i class="nav-arrow bi bi-chevron-right"></i> </p>

					</a> 

					<ul class="nav nav-treeview"> 

						<li class="nav-item"> 

							<a href="contact-web" class="nav-link"> 

								<i class="bi bi-people-fill"></i>

								<p>Contacts Web</p> 

							</a> 

						</li> 

					</ul>

				</li>



				<li class="nav-item"> 

					<a href="#" class="nav-link"> 

						<i class="bi bi-sliders"></i>

						<p> Config <i class="nav-arrow bi bi-chevron-right"></i> </p>

					</a> 

					<ul class="nav nav-treeview"> 

						<li class="nav-item"> 

							<a href="#" class="nav-link"> 

								<i class="bi bi-people-fill"></i>

								<p>Users</p> 

							</a> 

						</li> 
						
						<li class="nav-item"> 

							<a href="configuration" class="nav-link"> 

								<i class="bi bi-gear-fill"></i>

								<p>Configuration</p> 

							</a> 

						</li> 

					</ul> 

				</li> 

							
		

			</ul> <!--end::Sidebar Menu--> 

		</nav> 

	</div> <!--end::Sidebar Wrapper--> 


</aside>