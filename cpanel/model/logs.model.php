<?php 

require_once "conexion.php";   
 
class ModelLogs{  

/*=============================================
	MOSTRAR LOGS
	=============================================*/

	static public function mdlShowLogs($table, $item, $value, $field, $order){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $table ORDER BY $field $order");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}


	static public function mdlAddLog($table, $data){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $table(action, type, user_id, private_id, public_id, eject) VALUES (:action, :type, :user_id, :private_id, :public_id, :eject)");

		$stmt->bindParam(":action", $data["action"], PDO::PARAM_STR);
		$stmt->bindParam(":type", $data["type"], PDO::PARAM_STR);
		$stmt->bindParam(":user_id", $data["user_id"], PDO::PARAM_STR);
		$stmt->bindParam(":private_id", $data["private_id"], PDO::PARAM_STR);
		$stmt->bindParam(":public_id", $data["public_id"], PDO::PARAM_STR);
		$stmt->bindParam(":eject", $data["eject"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;


	}






}




?>