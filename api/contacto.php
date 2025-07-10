<?php

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['nombre'], $data['email'], $data['telefono'], $data['mensaje'])) {

        http_response_code(400);

        echo json_encode(["error" => "Faltan campos obligatorios"]);

        exit;
    }

    $stmt = $conn->prepare("INSERT INTO tb_contacts (nombre, email, telefono, mensaje) VALUES (?, ?, ?, ?)");

    $stmt->bind_param("ssss", $data['nombre'], $data['email'], $data['telefono'], $data['mensaje']);

    if ($stmt->execute()) {

        http_response_code(201);

        echo json_encode(["mensaje" => "Contacto guardado"]);

    } else {

        http_response_code(500);

        echo json_encode(["error" => "No se pudo guardar el contacto"]);
    }

    $stmt->close();

}

?>