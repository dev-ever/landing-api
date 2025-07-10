<?php

if (!isset($_SESSION)){

  session_start();

}
setlocale(LC_TIME, "spanish");

$url = ControllerRoute::ctrUrlFront();
$dataTemplate = ControllerTemplate::ctrShowTemplate();



if(isset($_GET["route"])){

  $routes = explode("/", $_GET["route"]);

  $route = $routes[0];

  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TI - Techonologies | Services </title>

  <!--=====================================
              Plugins CSS           
  ======================================-->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="<?php echo $url.$dataTemplate["favicon"]; ?>">
   


 <link rel="stylesheet" href="<?php echo $url; ?>view/plugins/bootstrap/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $url; ?>view/plugins/bootstrap-icon/bootstrap-icons.css">
 <link rel="stylesheet" href="<?php echo $url; ?>view/plugins/sweetalert2/sweetalert2.min.css">
 <link rel="stylesheet" href="<?php echo $url; ?>view/plugins/adminlte/adminlte.min.css">


<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">


 

  <link rel="stylesheet" href="<?php echo $url; ?>view/css/style.css?v=<?=filemtime('view/css/style.css') ?>">
  
  <!--=====================================
              Plugins JAVASCRIPT           
  ======================================-->
  <script type="text/javascript" src="<?php  echo $url; ?>view/plugins/jquery/jquery-3.7.1.js"></script>  
  <script type="text/javascript" src="<?php  echo $url; ?>view/plugins/overlayscrollbars/overlayscrollbars.browser.es6.min.js"></script>
  <script type="text/javascript" src="<?php  echo $url; ?>view/plugins/bootstrap/popper.min.js"></script>
  <script type="text/javascript" src="<?php  echo $url; ?>view/plugins/bootstrap/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="<?php  echo $url; ?>view/plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <script type="text/javascript" src="<?php  echo $url; ?>view/plugins/adminlte/adminlte.min.js"></script>



  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
  <!-- Responsive JS -->
  <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

  <!-- Botones -->
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>

  <!-- Dependencias exportación -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>



</head>


<body class="layout-fixed sidebar-expand-lg sidebar-mini sidebar-collapse bg-body-tertiary">


<?php

  if(isset($_SESSION["sessionStart"]) && $_SESSION["sessionStart"] == "ok"){

   echo '<div class="app-wrapper">';

    /*=============================================
    CABEZOTE
    =============================================*/

    include "module/header.php";


    /*=============================================
    MENU
    =============================================*/

    include "module/menu.php";

    /*=============================================
    CONTENIDO
    =============================================*/

    if(isset($_GET["route"])){

      if($_GET["route"] == "home" ||
         $_GET["route"] == "users" ||
         $_GET["route"] == "profiles" ||
         $_GET["route"] == "contact-web" ||




         $_GET["route"] == "backup" ||
         $_GET["route"] == "configuration" ||



        $_GET["route"] == "quit"){

        include "module/".$_GET["route"].".php";

      }else{

        include "module/404.php";

      }

    }else{

      include "module/home.php";

    }

    /*=============================================
    FOOTER
    =============================================*/

    include "module/footer.php";

    echo '</div>';

  }else{

    include "module/login.php";

  }




?>


  
  <script src="<?php echo $url; ?>view/js/template.js"></script>




</body>


</html>