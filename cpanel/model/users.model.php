<?php 

require_once "conexion.php"; 
 
class ModelUser{  
 
/*=============================================
	SHOW USERS
	=============================================*/

	static public function mdlShowUsers($table, $item, $value){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{ 

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $table");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ALL ACTIVE
	=============================================*/
	static public function mdlShowUsersActive($table, $item, $value){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

	}

	/*=============================================
	NEW 
	=============================================*/

	static public function mdlNewUser($table, $data){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $table(name, user, email, photo, password, perfil_id, created_at, state) VALUES (:name, :user, :email, :photo, :password, :perfil_id, :created_at, :user_id, :state)");

		$stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
		$stmt->bindParam(":user", $data["user"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
		$stmt->bindParam(":photo", $data["photo"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil_id", $data["perfil_id"], PDO::PARAM_STR);
		$stmt->bindParam(":created_at", $data["created_at"], PDO::PARAM_STR);
		$stmt->bindParam(":user_id", $data["user_id"], PDO::PARAM_STR);
		$stmt->bindParam(":state", $data["state"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}




/*=============================================
	UPDATE 
	=============================================*/

	static public function mdlUpdateItem($table, $item1, $value1, $item2, $value2){

		$stmt = Conexion::conectar()->prepare("UPDATE $table SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}



	/*=============================================
	EDIT
	=============================================*/
	static public function mdlEditUser($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, email = :email, password = :password, foto = :foto, perfil = :perfil  WHERE idUser = :idUser");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt -> bindParam(":idUser", $datos["idUser"], PDO::PARAM_STR);


		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;
 
	}


	/*=============================================
	DELETE
	// =============================================*/

	static public function mdlDeleteUser($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idUser = :idUser");

		$stmt -> bindParam(":idUser", $datos, PDO::PARAM_INT);

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