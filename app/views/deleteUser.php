<?php
session_start();
include '../config/db.php'; 

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] !== 'ADM') {
    header("Location: ../index.php");
    exit;
}

// Verificar que se pase un 'user_id' por la URL
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Eliminar registros en la tabla de logins relacionados con el usuario
    $stmt = $pdo->prepare("DELETE FROM logins WHERE user_id = :user_id");
    $stmt->execute(['user_id' => $user_id]);

    // Eliminar el usuario de la tabla 'users'
    $stmt = $pdo->prepare("DELETE FROM users WHERE user_id = :user_id");
    $stmt->execute(['user_id' => $user_id]);

    // Redirigir de vuelta al panel de administración
    header("Location: manageUsers.php");
    exit;
} else {
    // Si no se pasó el 'user_id', redirigir a una página de error o a la página de administración
    header("Location: manageUsers.php");
    exit;
}
?>
