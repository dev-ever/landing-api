<?php 
ob_start();

require_once "../../../controller/contact.controller.php";
require_once "../../../model/contact.model.php";


$report = new ControllerContact();
$report -> ctrDescargarReporteGeneral(); 

ob_end_flush();

?> 