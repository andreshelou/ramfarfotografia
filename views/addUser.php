<?php
// Incluir la conexión a la base de datos
include '../config/db.php';

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);  // Encriptación de la contraseña con md5()

    // Verificar si el usuario ya existe
    $stmt = $pdo->prepare("SELECT * FROM users WHERE user = :username LIMIT 1");
    $stmt->execute(['username' => $username]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        // Si el usuario ya existe, muestra un mensaje de error
        $error = "El usuario ya existe.";
    } else {
        // Insertar el nuevo usuario en la base de datos
        $stmt = $pdo->prepare("INSERT INTO users (user, fname, lname, email, passwd, date) VALUES (:username, :fname, :lname, :email, :password, NOW())");
        $stmt->execute([
            'username' => $username,
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'password' => $password
        ]);

        // Redirigir al panel de administración o mostrar un mensaje de éxito
        header("Location: manageUsers.php");
        exit;
    }
}
?>