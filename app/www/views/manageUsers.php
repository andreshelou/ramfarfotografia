<?php
session_start();
include '../config/db.php'; 

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] !== 'ADM') {
    header("Location: ../index.php");
    exit;
}
// Obtener archivos subidos
//$stmt = $pdo->query("SELECT * FROM users");
//$users = $stmt->fetchAll();

// Obtener todos los usuarios junto con su último login
$stmt = $pdo->prepare("
    SELECT 
        users.user_id, 
        users.user, 
        users.fname, 
        users.lname, 
        users.email, 
        MAX(logins.login_time) AS last_login
    FROM users
    LEFT JOIN logins ON users.user_id = logins.user_id
    GROUP BY users.user_id
");
$stmt->execute();
$users = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RamFar | Usuarios</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <img src="../images/Firma.png" alt="Logo" class="logo">
        Gestion de Usuarios
    </header>
    <nav>
        <a href="adminDashboard.php">Dashboard</a>
        <a href="./manageFiles.php">Gestionar Archivos</a>
        <a href="./manageUsers.php">Usuarios</a>
	<a href="../logout.php">Cerrar sesión</a>
    </nav>

    <div class="container">
        <div class="card-addUser">
            <table border="0" width="100%">
                <tr>
                    <td align="center" colspan="5">
                        <!-- Formulario HTML para agregar un nuevo usuario -->
                        <form id="uploadForm" method="POST" enctype="multipart/form-data" action="addUser.php">
                            <table border=0>
                                <tr>
                                    <td>
                                        <input type="text" name="username" id="usernameInput" placeholder="Usuario" required>
                                    </td>
                                    <td>
                                        <input type="text" name="fname" id="fnameInput" placeholder="Nombre" required>
                                    </td>
                                    <td>
                                        <input type="text" name="lname" id="lnameInput" placeholder="Apellido" required>
                                    </td>
                                    <td>
                                        <input type="email" name="email" id="emailInput" placeholder="Correo electrónico" required>
                                    </td>
                                    <td>
                                        <input type="password" name="password" id="passwordInput" placeholder="Contraseña" required>
                                    </td>
                                    <td align="center">
                                        <button type="submit" id="uploadButton" class="btn">Crear usuario</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>
            </table>

        </div>    
        <div class="card-List">
            <h1>Lista de usuarios</h1>
            <table width=100% class="table" border=1 cellpadding=4>
                <thead>
                    <tr>
                        <th align="left">Usuario</th>
                        <th align="left">Nombre</th>
                        <th align="left">Apellido</th>
                        <th align="left">Correo</th>
                        <th align="left">Ultimo ingreso</th>
                        <th align="center">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['user']); ?></td>
                            <td><?php echo htmlspecialchars($user['fname']); ?></td>
                            <td><?php echo htmlspecialchars($user['lname']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo $user['last_login'] ? $user['last_login'] : 'Nunca'; ?></td>
                            <td align="center">
                                <a href="deleteUser.php?user_id=<?php echo htmlspecialchars($user['user_id']);?>" style="color: #d95e00" class="btn" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">X</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.getElementById('uploadButton').addEventListener('click', function () {
            const fileInput = document.getElementById('fileInput');
            const comentInput = document.getElementById('comentInput');
            const progressBar = document.getElementById('progressBar');
            const progressLabel = document.getElementById('progressLabel');

            if (!fileInput.files.length) {
                alert('Por favor, selecciona un archivo.');
                return;
            }

            const formData = new FormData();
            formData.append('file', fileInput.files[0]);
            formData.append('coment', comentInput.value);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../views/uploadHandler.php', true);

            xhr.upload.addEventListener('progress', function (e) {
                if (e.lengthComputable) {
                    const percentComplete = (e.loaded / e.total) * 100;
                    progressBar.style.width = percentComplete + '%';
                    progressBar.textContent = Math.round(percentComplete) + '%';
                    progressLabel.textContent = 'Subiendo: ' + Math.round(percentComplete) + '%';
                }
            });

            xhr.onload = function () {
                if (xhr.status === 200) {
                    progressLabel.textContent = '¡Archivo subido con éxito!';
                    fileInput.value = '';
                    comentInput.value = '';
                } else {
                    progressLabel.textContent = 'Error al subir el archivo.';
                }
            };

            xhr.onerror = function () {
                progressLabel.textContent = 'Error de conexión.';
            };

            xhr.send(formData);
        });
    </script>

    <footer>
        <p>&copy; 2024 Estudio Fotográfico. Todos los derechos reservados.</p>
    </footer>

</body>
</html>

