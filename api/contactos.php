<?php
require 'db.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {

    $result = $conn->query("SELECT * FROM tb_contacts ORDER BY idContacto DESC");

    $contactos = [];

    while ($row = $result->fetch_assoc()) {

        $contactos[] = $row;
    }

    echo json_encode($contactos);

    exit;

} else if ($method === 'DELETE') {

    // Extraer el ID desde la URL
    $url = explode('/', $_SERVER['REQUEST_URI']);

    $id = end($url);

    if (!is_numeric($id)) {

        http_response_code(400);

        echo json_encode(["error" => "ID inválido"]);

        exit;

    }

    $stmt = $conn->prepare("DELETE FROM tb_contacts WHERE idContacto = ?");

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {

        echo json_encode(["mensaje" => "Contacto eliminado"]);

    } else {

        http_response_code(500);

        echo json_encode(["error" => "Error al eliminar contacto"]);

    }

    $stmt->close();
    
    exit;

}





?>