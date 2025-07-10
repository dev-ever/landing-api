<?php 

require_once "conexion.php"; 
 
class ModelBackUps{


	static public function mdlShowBackup($table, $item, $value, $field, $order){ 

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




	static public function mdlAddBackup($table, $data){


		$pdo = Conexion::conectar();
		
		$stmt = $pdo -> prepare("INSERT INTO $table(backup, observations, created_at, link, user_id) VALUES (:backup, :observations, :created_at, :link, :user_id)");

		$stmt->bindParam(":backup", $data["backup"], PDO::PARAM_STR);
		$stmt->bindParam(":observations", $data["observations"], PDO::PARAM_STR);
		$stmt->bindParam(":created_at", $data["created_at"], PDO::PARAM_STR);
		$stmt->bindParam(":link", $data["link"], PDO::PARAM_STR);
		$stmt->bindParam(":user_id", $data["user_id"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;


	}






}