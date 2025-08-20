<?php
session_start();
include '../config/db.php';


// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit;
}

$user_id = $_SESSION['user_id'];


// Consultar archivos asignados al usuario
$stmt = $pdo->prepare("
    SELECT f.file_id, f.name 
    FROM user_files uf
    INNER JOIN files f ON uf.file_id = f.file_id
    WHERE uf.user_id = :user_id
");
$stmt->execute(['user_id' => $user_id]);
$files = $stmt->fetchAll();


// Consultar el nombre y apellido del usuario logueado
$userStmt = $pdo->prepare("
    SELECT fname, lname 
    FROM users 
    WHERE user_id = :user_id
");
$userStmt->execute(['user_id' => $user_id]);
$user = $userStmt->fetch();

// Verificar que se obtuvieron datos del usuario
if ($user) {
    $fname = $user['fname'];
    $lname = $user['lname'];
} else {
    $fname = 'Usuario';
    $lname = '';
}

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
        <?php echo "Hola $fname"; ?> - RamFar Estudio Fotográfico
    </header>

    <nav>
        <a href="#">Inicio</a>
        <a href="#">Mis Archivos</a>
	<a href="../logout.php">Cerrar sesión</a>
    </nav>

    <div class="container">
        <div class="card">

            <h1>Mis Archivos</h1>
            <table  width=40px class="table" border=1 cellpadding=4>
                <thead>
                    <tr>
                        <th>Nombre del Archivo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($files) > 0): ?>
                        <?php foreach ($files as $file): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($file['name']); ?></td>
                                <td>
                                    <a href="download.php?file_id=<?php echo $file['file_id']; ?>"> [Y] </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2">No tienes archivos asignados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>


    <footer>
        <p>&copy; 2024 Estudio Fotográfico. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
