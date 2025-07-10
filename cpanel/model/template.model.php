<?php 
require_once "conexion.php";

class ModelTemplate{


	static public function mdlShowTemplate($table){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $table");

		$stmt -> execute(); 

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	} 


	static public function mdlTemplateConfig($table, $item, $value){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}


	static public function mdlUpdateTemplateConfig($table, $data){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $table SET folio = :folio, company = :company, commCompany = :commCompany, logo = :logo, favicon = :favicon, address = :address, user_id = :user_id, created_at = :created_at  WHERE idTemplate = :idTemplate");

		$stmt -> bindParam(":folio", $data["folio"], PDO::PARAM_STR);
		$stmt -> bindParam(":company", $data["company"], PDO::PARAM_STR);
		$stmt -> bindParam(":commCompany", $data["commCompany"], PDO::PARAM_STR);
		// $stmt -> bindParam(":companyIde", $data["companyIde"], PDO::PARAM_STR);
		$stmt -> bindParam(":logo", $data["logo"], PDO::PARAM_STR);
		$stmt -> bindParam(":favicon", $data["favicon"], PDO::PARAM_STR);
		$stmt -> bindParam(":address", $data["address"], PDO::PARAM_STR);
		$stmt -> bindParam(":user_id", $data["user_id"], PDO::PARAM_STR);
		$stmt -> bindParam(":created_at", $data["created_at"], PDO::PARAM_STR);
		$stmt -> bindParam(":idTemplate", $data["idTemplate"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;
 
	}



}


 ?>