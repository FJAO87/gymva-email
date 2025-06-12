<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $asunto = $_POST['asunto'] ?? 'Sin asunto';
    $mensaje = $_POST['mensaje'] ?? '';

    $destino = "gymva.sap@gmail.com";
    $cabeceras = "From: contacto@gymva.com\r\n";
    $cabeceras .= "Content-Type: text/plain; charset=utf-8\r\n";

    $contenido = "Mensaje desde el formulario de Puntos de Fidelidad:\n\n";
    $contenido .= "Asunto: $asunto\n";
    $contenido .= "Mensaje:\n$mensaje\n";

    if (mail($destino, "GYMVA - $asunto", $contenido, $cabeceras)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "No se pudo enviar el mensaje."]);
    }
} else {
    http_response_code(405);
    echo json_encode(["error" => "Método no permitido"]);
}
?>
