<?php

$host = "localhost";
$user = "u725112231_contactos";
$pass = "Hidedark0306";
$dbname = "u725112231_contactos";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {

    http_response_code(500);

    echo json_encode(["error" => "Error de conexión a la base de datos"]);

    exit;

}

$conn->set_charset("utf8");


?>