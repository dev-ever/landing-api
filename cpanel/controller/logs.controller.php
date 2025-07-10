<?php 

class ControllerLogs{
    
	/*=============================================
	MOSTRAR LOGS
	=============================================*/

	static public function ctrShowLogs($item, $value, $field, $order){

		$table = "tb_logs";

		$result = ModelLogs::mdlShowLogs($table, $item, $value, $field, $order);

		return $result;

	}


	 public function ctrAddLogs($itemSession, $orden){

		date_default_timezone_set("America/Mexico_City");

		$nameMachine = gethostbyaddr($_SERVER['REMOTE_ADDR']);

		$ipClient = $_SERVER['REMOTE_ADDR'];


		$tabla = "tb_logs";
		$datos = array("action"=>"Se cancelo la orden ".$orden,
						"type"=>"Cancelado",
						"user_id"=>$itemSession,
						"private_id"=>$nameMachine,
						"public_id"=>$ipClient,
						"eject"=>date("Y-m-d H:i:s"));  

		$resultLog = ModelLogs::mdlAddLog($tabla,$datos);

		return $resultLog;

	}




}


?>