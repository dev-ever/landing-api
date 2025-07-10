<?php  

 ini_set("display_errors", 1);
 ini_set("display_startup_errors", 1);
 error_reporting(E_ALL);
 ini_set('error_reporting', E_ALL);


 if(!isset($_SESSION)) 
 { 
 	session_start(); 
 } 


require_once "controller/route.controller.php";
require_once "controller/template.controller.php";
require_once "controller/users.controller.php";
require_once "controller/logs.controller.php";
require_once "controller/backup.controller.php";
require_once "controller/contact.controller.php";



require_once "model/users.model.php";
require_once "model/logs.model.php";
require_once "model/template.model.php";
require_once "model/backup.model.php";
require_once "model/contact.model.php";


$template = new ControllerTemplate();

$template -> ctrTemplate();



 ?>