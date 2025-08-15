<?php
session_start();
include '../config/db.php'; 

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] !== 'ADM') {
    header("Location: ../index.php");
    exit;
}

// Obtener los usuarios y asignaciones para un archivo específico
$file_id = $_POST['file_id'] ?? null;
if (!$file_id) {
    header("Location: ./manageFiles.php");
    exit;
}

// Obtener detalles del archivo
$stmtFile = $pdo->prepare("SELECT * FROM files WHERE file_id = ?");
$stmtFile->execute([$file_id]);
$file = $stmtFile->fetch();
if (!$file) {
    header("Location: ./manageFiles.php");
    exit;
}

// Obtener usuarios asignados
$stmtAssigned = $pdo->prepare("SELECT uf.user_id, u.user AS username FROM user_files uf INNER JOIN users u ON uf.user_id = u.user_id WHERE uf.file_id = ?");
$stmtAssigned->execute([$file_id]);
$assignedUsers = $stmtAssigned->fetchAll();

// Obtener todos los usuarios
$stmtUsers = $pdo->query("SELECT user_id, user AS username FROM users");
$allUsers = $stmtUsers->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RamFar | Asignaciones</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <img src="../images/Firma.png" alt="Logo" class="logo">
        Gestión de Asignaciones
    </header>
    <nav>
        <a href="adminDashboard.php">Dashboard</a>
        <a href="./manageFiles.php">Gestionar Archivos</a>
        <a href="./manageUsers.php">Usuarios</a>
        <a href="../logout.php">Cerrar sesión</a>
    </nav>

    <div class="container">
        <div class="card-addUser">
            <h1>Gestión de asignaciones para el archivo: <?php echo htmlspecialchars($file['name']); ?></h1>
            <form method="POST" action="assignHandler.php">
                <input type="hidden" name="file_id" value="<?php echo htmlspecialchars($file_id); ?>">
                <table width="100%" class="table" border="1" cellpadding="4">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Asignado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allUsers as $user): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user['username']); ?></td>
                                <td align="center">
                                    <input type="checkbox" name="assigned_users[]" value="<?php echo $user['user_id']; ?>"
                                        <?php echo in_array($user['user_id'], array_column($assignedUsers, 'user_id')) ? 'checked' : ''; ?>>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div style="text-align: center; margin-top: 20px;">
                    <button type="submit" class="btn">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Estudio Fotográfico. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
