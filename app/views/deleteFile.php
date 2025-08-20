<?php
session_start();
include '../config/db.php'; 

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] !== 'ADM') {
    header("Location: ../index.php");
    exit;
}

// Verificar que se pase un 'file_id' por el método POST
if (isset($_POST['file_id'])) {
    $file_id = $_POST['file_id'];

    // Buscamos el archivo en la base de datos
    $stmt = $pdo->prepare("SELECT * FROM files WHERE file_id = :file_id");
    $stmt->execute(['file_id' => $file_id]);
    $file = $stmt->fetch();

    // Verificar si el archivo existe en la base de datos
    if ($file) {
        $filePath = '../' . $file['content'] . $file['name'];

        // Eliminar el archivo del sistema de archivos si existe
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Eliminar el registro de la base de datos
        $stmt = $pdo->prepare("DELETE FROM files WHERE file_id = :file_id");
        $stmt->execute(['file_id' => $file_id]);

        // Redirigir de vuelta al panel de administración
        header("Location: manageFiles.php?success=1");
        exit;
    } else {
        // Si el archivo no existe, redirigir a la página de administración
        header("Location: manageFiles.php?error=1");
        exit;
    }
} else {
    // Si no se pasó el 'file_id', redirigir a la página de administración
    header("Location: manageFiles.php?NoARCH");
    exit;
}
?>
