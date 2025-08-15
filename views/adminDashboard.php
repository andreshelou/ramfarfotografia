<?php
session_start();
include '../config/db.php';

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['user_id']) || $_SESSION['admin'] == 'ADM') {
    header("Location: ../index.php");
    exit;
}

// Obtener estadísticas generales
$stmt = $pdo->query("SELECT COUNT(*) AS total_users FROM users");
$totalUsers = $stmt->fetch()['total_users'];

$stmt = $pdo->query("SELECT COUNT(*) AS total_files FROM files");
$totalFiles = $stmt->fetch()['total_files'];

// Obtener liste de usuarios
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchALL();

// Obtener liste de archivos
$stmt = $pdo->query("SELECT * FROM files");
$files = $stmt->fetchALL();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RamFar | Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <img src="../images/Firma.png" alt="Logo" class="logo">
        Dashboard
    </header>

    <nav>
        <a href="adminDashboard.php">Dashboard</a>
        <a href="./manageFiles.php">Gestionar Archivos</a>
        <a href="./manageUsers.php">Usuarios</a>
	<a href="../logout.php">Cerrar sesión</a>
    </nav>

    <div class="container">
        <div class="card">
            <table width=40px class="table" border=0 cellpadding=4>
                <tr>
                    <td><h3>Gestionar Archivos</h3></td>
                    <td>Total de archivos subidos: <?php echo $totalFiles ?></td>
                </tr>
            </table>
        	<table width=40px class="table" border=1 cellpadding=4>
                <thead>
                    <tr>
                        <th align="left">Nombre de archivo</th>
                        <th>Fecha de subida</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($files as $file): ?>
                        <tr>
                            <td><?php echo $file['name']; ?></td>
                            <td width=150 align="center"><?php echo $file['date']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card">
        <table width=100% class="table" border=0 cellpadding=4>
                <tr>
                    <td><h3>Gestionar Usuarios</h3></td>
                    <td>Total de usuarios activos: <?php echo $totalUsers ?></td>
                </tr>
            </table>
        	<table width=100% class="table" border=1 cellpadding=4>
                <thead>
                    <tr>
                        <th align="left">Nombre de usuario</th>
                        <th>ID de usuario</th>
                        <th>Tipo de usuario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['user']; ?></td>
                            <td align="center"><?php echo $user['user_id']; ?></td>
                            <td align='center'>
                                <?php echo $user['admin']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Estudio Fotográfico. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
