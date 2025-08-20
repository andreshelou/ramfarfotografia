<?php
session_start();
include '../config/db.php';

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] !== 'ADM') {
    header("Location: ../index.php");
    exit;
}

// Verificar si se recibió un file_id
$file_id = $_POST['file_id'] ?? null;
if (!$file_id) {
    header("Location: ./manageFiles.php");
    exit;
}

// Obtener los usuarios asignados que fueron seleccionados
$assigned_users = $_POST['assigned_users'] ?? [];

// Comenzar una transacción para asegurar la integridad de los datos
try {
    $pdo->beginTransaction();

    // Eliminar las asignaciones existentes para ese archivo
    $stmtDelete = $pdo->prepare("DELETE FROM user_files WHERE file_id = ?");
    $stmtDelete->execute([$file_id]);

    // Insertar las nuevas asignaciones
    if (!empty($assigned_users)) {
        $stmtInsert = $pdo->prepare("INSERT INTO user_files (user_id, file_id) VALUES (?, ?)");
        foreach ($assigned_users as $user_id) {
            $stmtInsert->execute([$user_id, $file_id]);
        }
    }

    // Confirmar la transacción
    $pdo->commit();

    // Redirigir a la página de gestión de archivos con un mensaje de éxito
    header("Location: ./manageAssignments.php?file_id=" . $file_id . "&success=1");
    exit;

} catch (PDOException $e) {
    // En caso de error, hacer rollback de la transacción
    $pdo->rollBack();
    // Redirigir a la página de gestión de archivos con un mensaje de error
    header("Location: ./manageAssignments.php?file_id=" . $file_id . "&error=" . urlencode($e->getMessage()));
    exit;
}
