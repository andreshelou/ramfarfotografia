<?php
include '../config/db.php';

// Verificar que el parámetro file_id está presente
if (!isset($_GET['file_id'])) {
    http_response_code(400);
    echo "ID de archivo no especificado.";
    exit;
}

$file_id = $_GET['file_id'];

// Consultar el archivo
$stmt = $pdo->prepare("SELECT name, Type, content FROM files WHERE file_id = :file_id");
$stmt->execute(['file_id' => $file_id]);
$file = $stmt->fetch();

if (!$file) {
    http_response_code(404);
    echo "Archivo no encontrado.";
    exit;
}

// Construir la ruta completa del archivo
$filePath = __DIR__ . '/../' . $file['content'] . $file['name'];

if (!file_exists($filePath)) {
    http_response_code(404);
    echo "El archivo no se encuentra en el servidor.";
    exit;
}

// Enviar encabezados para forzar la descarga
header('Content-Description: File Transfer');
header('Content-Type: ' . $file['Type']);
header('Content-Disposition: attachment; filename="' . basename($file['name']) . '"');
header('Content-Length: ' . filesize($filePath));
readfile($filePath);
exit;

