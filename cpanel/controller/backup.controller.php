<?php 

class ControllerBackups{
   
/*=============================================
	MOSTRAR 
=============================================*/ 
	static public function ctrShowBackups($item, $value, $field, $order){

		$table = "tb_backup";

		$result = ModelBackUps::mdlShowBackup($table, $item, $value, $field, $order);

		return $result;
	}


	static public function ctrBackUpDb(){ 

		if(isset($_POST["newHost"])){


			$confData = array("host" => $_POST["newHost"],
							  "user" => $_POST["newUser"],
							  "password" => $_POST["newPassword"],
							  "nameBD" => $_POST["newDataBase"],
							  "observation" => $_POST["newObservationsId"]);

			$host     = $confData["host"];
			$user  = $confData["user"];
			$password = $confData["password"];
			$nameBD = $confData["nameBD"];
			$observation = $confData["observation"];

		 	// Nombre del archivo de respaldo
			$backupFile = $nameBD . '_' . date("YmdHis") . '.sql';

			// Ruta temporal
			$linkBackup = 'backups/' . $backupFile;

			// Asegúrate de que exista la carpeta respaldos/
			if (!file_exists("backups")) {

				mkdir("backups", 0777, true);
			}


			// Comando para generar el backup
			$comando = "mysqldump --user=$user --password=$password --host=$host $nameBD > $linkBackup";

			// Ejecutar el comando y capturar resultado
			system($comando, $resultado);

			// Verificar resultado
			if ($resultado === 0 && file_exists($linkBackup)) {


			// Registrar en la base de datos
			$table = "tb_backup";
			$data = array(
							"backup" => $backupFile,
							"observations" => $observation,
							"created_at" => date("Y-m-d H:i:s"),
							"link" => $linkBackup,
							"user_id" => $_SESSION["id"]);

			   $result = ModelBackUps::mdlAddBackup($table, $data);

			   if($result == "ok"){

			   	echo '<script>

								Swal.fire({
									position: "center",
									icon: "success",
									title: "¡Backup executed successfully!",
									showConfirmButton: true,
									allowOutsideClick: false,
									confirmButtonText: "Aceptar"

									}).then((result)=> {

										if(result.value){

											window.location = "backup";
										}

									});

							</script>';

			   }else{

			   		echo '<script>

						Swal.fire({
							position: "center",
							icon: "error",
							title: "¡Backup could not be executed!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"


							}).then((result)=> {

							if(result.value){

								window.location = "backup";
							}

							}); 

						</script>'; 



			   }

			
			
			} else {
	
			    echo '<script>

						Swal.fire({
							position: "center",
							icon: "error",
							title: "¡Error generating backup!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"


							}).then((result)=> {

							if(result.value){

								window.location = "backup";
							}

							}); 

						</script>'; 
	
			}

		}

	}



}