<?php 

class ControllerTemplate{

	static public function ctrTemplate(){

		include "view/template.php";
		
	}

	static public function ctrShowTemplate(){

    	$table = "tb_template";

    	$result = ModelTemplate::mdlShowTemplate($table);

    	return $result;
    }


     static public function ctrShowConfig($item, $valor){ 

        $table = "tb_template";

        $result = ModelTemplate::mdlTemplateConfig($table, $item, $valor);

        return $result;  


     }



     static public function formatedDateShort($dates){

        $timezone = new \DateTimeZone("America/Mexico_City");

        $date = new \DateTime($dates);

        $date->setTimezone($timezone);

        $format = new \IntlDateFormatter('es_MX', \IntlDateFormatter::FULL, \IntlDateFormatter::MEDIUM, $timezone, \IntlDateFormatter::GREGORIAN, 'yyyy-MM-dd HH:mm:ss');

        $dateShort = $format->format($date);

        return $dateShort;

     }

     static public function formatedDateLarge($dates){

        $timezone = new \DateTimeZone("America/Mexico_City");

        $date = new \DateTime($dates, $timezone);

        $format = new \IntlDateFormatter('en_MX', \IntlDateFormatter::FULL, \IntlDateFormatter::NONE, $timezone);

        $dateLarge = $format->format($date);

        return $dateLarge;

     }



     static public function formatedDateMonth($dates){ 

      $timezone = new \DateTimeZone("America/Mexico_City");

      $date = new \DateTime($dates);

      $date->setTimezone($timezone);

      $format = new \IntlDateFormatter('es_MX', \IntlDateFormatter::FULL, \IntlDateFormatter::NONE, $timezone, \IntlDateFormatter::GREGORIAN, 'MMMM \', \' yyyy');

    // Formatear y devolver el resultado
      $dateShort = $format->format($date);

      return $dateShort;
    }





      static public function ctrSaveConfig(){

        if(isset($_POST["editCompanyId"])){

             if(preg_match('/^[^<>\'´´]+$/', $_POST["editFolio"]) && 
                preg_match('/^[^<>\'´´]+$/', $_POST["editCompany"]) && 
                preg_match('/^[^<>\'´´]+$/', $_POST["editComercialCompany"]) && 
                preg_match('/^[^<>\'´´]+$/', $_POST["editComercialDNI"]) && 
                preg_match('/^[^<>\'´´]+$/', $_POST["editAddress"])){

            /*=====================================
                VALIDAR IMAGEN DE LOGO
              ======================================*/
              $rutaPhoto =  $_POST["photoTemplateActually"];
              $rutaFavicon = $_POST["faviconTemplateActually"];


              if(isset($_FILES["editaPhotoProfile"]["tmp_name"]) && !empty($_FILES["editaPhotoProfile"]["tmp_name"])){

                list($ancho, $alto) = getimagesize($_FILES["editaPhotoProfile"]["tmp_name"]);

                $nuevoAncho = 100;

                $nuevoAlto = 100;

                $directorio = "view/img/template/".$_POST["editComercialDNI"];


              /*=============================================
              PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
              =============================================*/

              if(!file_exists($directorio)){

                	mkdir($directorio, 0777);

                }


              if(!empty($_POST["photoTemplateActually"])){

                	unlink($_POST["photoTemplateActually"]);

                }


              /*=============================================
              DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
              =============================================*/

              if($_FILES["editaPhotoProfile"]["type"] == "image/jpeg"){

              /*=============================================
                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                =============================================*/
                $aleatorio = mt_rand(100,999);

                $rutaPhoto = "view/img/template/".$_POST["editComercialDNI"]."/".$aleatorio.".jpg";

                $origenPhoto = imagecreatefromjpeg($_FILES["editaPhotoProfile"]["tmp_name"]);

                $destinoPhoto = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destinoPhoto, $origenPhoto, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagejpeg($destinoPhoto, $rutaPhoto);

            }


            if($_FILES["editaPhotoProfile"]["type"] == "image/png"){  

              /*=============================================
                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                =============================================*/
                $aleatorio = mt_rand(100,999);

                $rutaPhoto = "view/img/template/".$_POST["editComercialDNI"]."/".$aleatorio.".png";

                $origenPhoto = imagecreatefrompng($_FILES["editaPhotoProfile"]["tmp_name"]);

                $destinoPhoto = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagealphablending($destinoPhoto, FALSE);
                
                imagesavealpha($destinoPhoto, TRUE);

                imagecopyresized($destinoPhoto, $origenPhoto, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagepng($destinoPhoto, $rutaPhoto);

            }


        }


         
             if(isset($_FILES["editFaviconProfile"]["tmp_name"]) && !empty($_FILES["editFaviconProfile"]["tmp_name"])){

                list($ancho, $alto) = getimagesize($_FILES["editFaviconProfile"]["tmp_name"]);

                $nuevoAncho = 100;

                $nuevoAlto = 100;

                $directorio = "view/img/template/".$_POST["editComercialDNI"];


              /*=============================================
              PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
              =============================================*/

              if(!file_exists($directorio)){

                	mkdir($directorio, 0777);

                }


              if(!empty($_POST["faviconTemplateActually"])){

                	unlink($_POST["faviconTemplateActually"]);

                }


              /*=============================================
              DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
              =============================================*/

              if($_FILES["editFaviconProfile"]["type"] == "image/jpeg"){

              /*=============================================
                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                =============================================*/
                $aleatorio = mt_rand(100,999);

                $rutaFavicon = "view/img/template/".$_POST["editComercialDNI"]."/".$aleatorio.".jpg";

                $origenFavicon = imagecreatefromjpeg($_FILES["editFaviconProfile"]["tmp_name"]);

                $destinoFavicon = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destinoFavicon, $origenFavicon, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagejpeg($destinoFavicon, $rutaFavicon);

            }


            if($_FILES["editFaviconProfile"]["type"] == "image/png"){  

              /*=============================================
                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                =============================================*/
                $aleatorio = mt_rand(100,999);

                $rutaFavicon = "view/img/template/".$_POST["editComercialDNI"]."/".$aleatorio.".png";

                $origenFavicon = imagecreatefrompng($_FILES["editFaviconProfile"]["tmp_name"]);

                $destinoFavicon = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagealphablending($destinoFavicon, FALSE);
                
                imagesavealpha($destinoFavicon, TRUE);

                imagecopyresized($destinoFavicon, $origenFavicon, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagepng($destinoFavicon, $rutaFavicon);

            }


        }

 
 

                $table = "tb_template";
                $data = array("folio" => $_POST["editFolio"],
                               "company" => $_POST["editCompany"],
                               "commCompany" => $_POST["editComercialCompany"],
                               "logo" => $rutaPhoto,
                               "favicon" => $rutaFavicon,
                               "address" => $_POST["editAddress"],
                               "user_id" => $_SESSION["id"],
                               "created_at" => date("Y-m-d H:i:s"),
                               "idTemplate" => $_POST["editCompanyId"]);

                $respuesta = ModelTemplate::mdlUpdateTemplateConfig($table, $data);

                if($respuesta == "ok"){


                    $nombreEquipo = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                    $ipCliente = $_SERVER['REMOTE_ADDR'];

                    $nameMachine = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                    $ipClient = $_SERVER['REMOTE_ADDR'];


                    $table2 = "tb_logs";
                    $data2 = array("action" =>"Update Company ",
			                    	"type" => "Update",
			                    	"user_id" => $_SESSION["id"],
			                    	"private_id" => $nameMachine,
			                    	"public_id" => $ipClient,
			                    	"eject" => date("Y-m-d H:i:s"));

                    $respuestaLog = ModelLogs::mdlAddLog($table2, $data2);

                    echo '<script>

                            Swal.fire({
                              position: "center",
                              icon: "success",
                              title: "La configuración ha efectuado correctamente!",
                              showConfirmButton: true,
                              confirmButtonText: "Aceptar"
                    
                            }).then((result)=> {

                                if(result.value){

                                    window.location = "configuration";
                                }

                            });

                        </script>';
                }


            }else{

                echo '<script>

                        Swal.fire({
                              position: "center",
                              icon: "error",
                              title: "¡Los campos no puede ir vacio o llevar caracteres especiales!",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                            

                            }).then((result)=> {

                                if(result.value){

                                    window.location = "configuration";
                                }

                            }); 

                        

                    </script>';




            }


        }




      }



     static public function obtenerIpCliente() {

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

          return $_SERVER['HTTP_CLIENT_IP'];

        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

        return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0]; // Puede contener varias IPs

      } else {

        return $_SERVER['REMOTE_ADDR'];

      }

    }





}

 ?>
