<?php 
 
class ControllerUsers{


	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrShowUser($item, $value){

		$table = "tb_users";

		$respuesta = ModelUser::mdlShowUsers($table, $item, $value);

		return $respuesta;
	}

	static public function ctrShowUserContact($item, $value){

		$table = "tb_contacts";

		$respuesta = ModelUser::mdlShowUsers($table, $item, $value);

		return $respuesta;
	}

 
	static public function ctrNewUser()
	{
		if(isset($_POST["nuevoUsuario"])) {
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) && 
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) && 
			   preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i', $_POST["nuevoEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){


			   	/*=====================================
			   	VALIDAR IMAGE
			   	======================================*/
			   	$ruta =  "";

			   	if(isset($_FILES["nuevaFoto"]["tmp_name"])){
			   		list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
			   		$nuevoAncho = 500;
			   		$nuevoAlto = 500;

			   		/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];
					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

					/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/
						$aleatorio = mt_rand(100,999);
						$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";
						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto,$ancho, $alto);
						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaFoto"]["type"] == "image/png"){

					/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/
						$aleatorio = mt_rand(100,999);
						$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";
						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto,$ancho, $alto);
						imagepng($destino, $ruta);

					}
			   	}


			   	$table = "tb_users";

			    $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			    $data = array("nombre" => $_POST["nuevoNombre"],
							  "usuario" => $_POST["nuevoUsuario"],
							  "email" => $_POST["nuevoEmail"],
							  "password" => $encriptar,
							  "foto" => $ruta,
							  "perfil" => $_POST["nuevoPerfil"]);

			   $respuesta = ModelUser::mdlNewUser($table, $data);



			   if($respuesta == "ok"){

			   		echo '<script>

			   				Swal.fire({
							  position: "center",
							  icon: "success",
							  title: "El usuario ha sido guardado correctamente!",
							  showConfirmButton: true,
							  confirmButtonText: "Aceptar"
					
							}).then((result)=> {

					 			if(result.value){
					 				window.location = "usuarios";
					 			}

					 		});

			   			</script>';


			   }


			}else{

				echo '<script>

						Swal.fire({
							  position: "center",
							  icon: "error",
							  title: "¡El usuario no puede ir vacio o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							

							}).then((result)=> {

								if(result.value){
									window.location = "usuarios";
								}

							}); 

						

					</script>';
			}

		} 

	}



 
static public function ctrLoginUser(){

		if(isset($_POST["ingUser"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUser"]) && 
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

				$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$table = "tb_users";

				$item = "user";

				$valor = $_POST["ingUser"];

				$result = ModelUser::mdlShowUsers($table, $item, $valor);

				if($result["user"] == $_POST["ingUser"] && $result["password"] == $encriptar){

					if($result["state"] == 1){
						$_SESSION["sessionStart"] = "ok";
						$_SESSION["id"] = $result["idUser"];
						$_SESSION["name"] = $result["name"];
						$_SESSION["user"] = $result["user"];
						$_SESSION["photo"] = $result["photo"];
						$_SESSION["profile"] = $result["profile"];
						$_SESSION["created_at"] = $result["created_at"];
						$_SESSION["email"] = $result["email"];

						date_default_timezone_set('America/Mexico_City');

						$date = date('Y-m-d');
						$time = date('H:i:s');

						$hoy = $date.' '.$time;

						$item1 = 'lastLogin';
						$value1 = $hoy;

						$item2 = 'idUser';
						$value2 = $result["idUser"];

						$lastLogin = ModelUser::mdlUpdateItem($table, $item1, $value1, $item2, $value2);

						if($lastLogin == "ok"){

							//LOGS
							$nameMachine = gethostbyaddr($_SERVER['REMOTE_ADDR']);
							$ipClient = $_SERVER['REMOTE_ADDR'];

							$table = "tb_logs";
							$data = array("action" => "Ingreso al sistema, user: ".$result["name"],
											"type" => "Enter Session",
											"user_id" => $_SESSION["id"],
											"private_id" => $nameMachine,
											"public_id" => $ipClient,
											"eject" => date('Y-m-d H:i:s'));
											
							$resultLogs = ModelLogs::mdlAddLog($table, $data);

							echo 	'<script>window.location = "home";</script>';

						}				

					}else{

						echo '<br>

							<div class="alert alert-warning text-center">The user is not yet activated</div>';
					}

				}else{

					echo '<br><div class="alert alert-danger text-center">Error logging in, please try again.</div>';
				}

			}

		}

	}





}



?>
