<?php
session_start();
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $fileName = $_FILES['file']['name'];           // Nombre del archivo
    $coment = $_POST['coment'];                   // Comentario del formulario
    $fileTmpName = $_FILES['file']['tmp_name'];   // Ruta temporal del archivo
    $fileSize = $_FILES['file']['size'];          // Tamaño del archivo en bytes
    $fileType = $_FILES['file']['type'];          // Tipo MIME del archivo
    $fileDestination = '../upload/' . $fileName;  // Ruta final para guardar el archivo

    // Mover el archivo al destino deseado
    if (move_uploaded_file($fileTmpName, $fileDestination)) {
        // Preparar y ejecutar la consulta para guardar los datos en la base de datos
        $stmt = $pdo->prepare("INSERT INTO files (name, coment, content, size, Type, cliente) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$fileName, $coment, 'upload/', $fileSize, $fileType, $_SESSION['user_id']])) {
            http_response_code(200); // Éxito
            echo "Archivo subido y guardado correctamente.";
        } else {
            http_response_code(500); // Error al guardar en la base de datos
            echo "Error al guardar los datos en la base de datos.";
        }
    } else {
        http_response_code(500); // Error al mover el archivo
        echo "Error al mover el archivo al destino.";
    }
} else {
    http_response_code(400); // Solicitud inválida
    echo "Solicitud inválida o archivo no enviado.";
}
?>
