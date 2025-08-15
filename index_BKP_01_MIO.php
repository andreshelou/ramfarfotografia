<?php
session_start();
 
// Incluir la conexión a la base de datos
include 'config/db.php';

// Verificar si el usuario ya está logueado
if (isset($_SESSION['user_id'])) {
    // Redirigir al panel correspondiente según el tipo de usuario
    if ($_SESSION['is_admin'] === 'yes') {
        header("Location: views/adminDashboard.php");
    } else {
        header("Location: views/clientDashboard.php");
    }
    exit; 
}

// Comprobar si se envió el formulario de login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consultar la base de datos para obtener el usuario
    $stmt = $pdo->prepare("SELECT * FROM users WHERE user = :username LIMIT 1");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    // Verificar si el usuario existe y la contraseña es correcta
    if ($user && md5($password) == $user['passwd']) {
        // Autenticación exitosa, guardar los datos en la sesión
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['user'];
        $_SESSION['is_admin'] = $user['admin']; // 'admin' será 'yes' o 'no'

        // Insertar un registro en la tabla logins con el user_id y el timestamp del login
        $stmt = $pdo->prepare("INSERT INTO logins (user_id) VALUES (:user_id)");
        $stmt->execute(['user_id' => $user['user_id']]);

        // Redirigir al panel correspondiente
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
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <header>
        <img src="../images/Firma.png" alt="Logo" class="logo">
        RamFar Fotográfia
    </header>


    <div class="container-login">
        <div class="login-form">
            <h2>Ingreso al Sistema</h2>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Usuario" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <input type="submit" value="Ingresar">
            </form>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Estudio Fotográfico. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

