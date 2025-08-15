<?php
session_start();
include 'config/db.php';

if (isset($_SESSION['user_id'])) {
    if ($_SESSION['is_admin'] === 'yes') {
        header("Location: views/adminDashboard.php");
    } else {
        header("Location: views/clientDashboard.php");
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE user = :username LIMIT 1");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && md5($password) == $user['passwd']) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['user'];
        $_SESSION['is_admin'] = $user['admin'];

        $stmt = $pdo->prepare("INSERT INTO logins (user_id) VALUES (:user_id)");
        $stmt->execute(['user_id' => $user['user_id']]);

        if ($_SESSION['is_admin'] === 'ADM') {
            header("Location: views/adminDashboard.php");
        } else {
            header("Location: views/clientDashboard.php");
        }
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RamFar Fotografía</title>
    <link rel="stylesheet" href="./assets/css/style_index.css">
</head>
<body>
<!--
    <div align=center class="video-background">
        <img src="images/RAMFAR_CAM_G-01.jpeg" alt="Imagen de fondo" id="bg-image"></img>
    </div>
-->
    <header>
        <img src="images/Firma.png" alt="Logo" class="logo">
        RamFar Fotografía
    </header>
    <div class="container-login" width="10%">
        <div class="login-form">
            <h2>Ingreso al Sistema</h2>
            <?php if (isset($error)): ?>
                <p class="error-message"><?php echo $error; ?></p>
            <?php endif; ?>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Usuario" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <input type="submit" value="Ingresar">
            </form>
        </div>
    </div>
    <footer class="footer">
        <p>&copy; 2024 RamFar Fotografía. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
