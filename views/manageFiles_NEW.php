<?php
session_start();
include '../config/db.php'; 

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] !== 'ADM') {
    header("Location: ../index.php");
    exit;
}

// Obtener archivos subidos
$stmt = $pdo->query("SELECT * FROM files");
$files = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RamFar | Archivos</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <img src="../images/Firma.png" alt="Logo" class="logo">
        Gestion de Archivos
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
                    <td align="left">
                        <!-- Formulario de carga de archivos -->
                        <form id="uploadForm" method="POST" enctype="multipart/form-data">
                            <input type="file" name="file" id="fileInput" required>
                    </td>
                    <td align="center">
                            <input type="text" name="coment" id="comentInput" placeholder="Comentario" required>
                    </td>
                    <td align="right">
                            <button type="button" id="uploadButton" class="btn">Subir Archivo</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <!-- Barra de progreso -->
                        <div class="progress-container">
                            <div class="progress-bar" id="progressBar"></div>
                        </div>
                        <div class="progress-label" id="progressLabel"></div>
                    </td>
                </tr>
            </table>
        </div>    
        <div class="card-List">
            <h1>Lista de archivos</h1>
            <table width=100% class="table" border=1 cellpadding=4>
                <thead>
                    <tr>
                        <th align="left">Archivo</th>
                        <th align="left">Comentario</th>
                        <th align='center'>User_ID</th>
                        <th align='center'>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($files as $file): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($file['name']); ?></td>
                            <td><?php echo htmlspecialchars($file['coment']); ?></td>
                            <td align="center"><?php echo htmlspecialchars($file['cliente']); ?></td>
                            <td align='center'>
                                <a href="deleteFile.php?file_id=<?php echo htmlspecialchars($file['file_id']); ?>" style="color: #d95e00"  class="btn">X</a>
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



Claro, te puedo mostrar un ejemplo básico de cómo podrías implementar esto en PHP. En este ejemplo, vamos a utilizar un formulario para que el administrador seleccione el usuario y el archivo, y luego envíe la información para crear la relación.

*index.php*
```
<?php
// Conexión a la base de datos
$conn = mysqli_connect("localhost", "tu_usuario", "tu_contraseña", "tu_base_de_datos");

// Verificar conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener lista de usuarios
$usuarios = mysqli_query($conn, "SELECT * FROM users");

// Obtener lista de archivos
$archivos = mysqli_query($conn, "SELECT * FROM files");

// Formulario para crear relación
?>
<form action="crear_relacion.php" method="post">
    <label for="usuario">Seleccione un usuario:</label>
    <select id="usuario" name="usuario">
        <?php while ($row = mysqli_fetch_assoc($usuarios)) { ?>
            <option value="<?php echo $row['user_id']; ?>"><?php echo $row['fname'] . ' ' . $row['lname']; ?></option>
        <?php } ?>
    </select>
    <br>
    <label for="archivo">Seleccione un archivo:</label>
    <select id="archivo" name="archivo">
        <?php while ($row = mysqli_fetch_assoc($archivos)) { ?>
            <option value="<?php echo $row['file_id']; ?>"><?php echo $row['name']; ?></option>
        <?php } ?>
    </select>
    <br>
    <input type="submit" value="Crear relación">
</form>

// Formulario para eliminar relación
<form action="eliminar_relacion.php" method="post">
    <label for="usuario_eliminar">Seleccione un usuario:</label>
    <select id="usuario_eliminar" name="usuario_eliminar">
        <?php while ($row = mysqli_fetch_assoc($usuarios)) { ?>
            <option value="<?php echo $row['user_id']; ?>"><?php echo $row['fname'] . ' ' . $row['lname']; ?></option>
        <?php } ?>
    </select>
    <br>
    <label for="archivo_eliminar">Seleccione un archivo:</label>
    <select id="archivo_eliminar" name="archivo_eliminar">
        <?php while ($row = mysqli_fetch_assoc($archivos)) { ?>
            <option value="<?php echo $row['file_id']; ?>"><?php echo $row['name']; ?></option>
        <?php } ?>
    </select>
    <br>
    <input type="submit" value="Eliminar relación">
</form>



\*
```
CREATE TABLE user_files (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT NOT NULL,
  file_id INT NOT NULL,
  fecha_asignacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users (user_id),
  FOREIGN KEY (file_id) REFERENCES files (file_id)
);

En esta tabla, cada registro representa la relación entre un usuario y un archivo. La columna "id" es la clave primaria, "user_id" y "file_id" son claves foráneas que se refieren a las tablas "users" y "files", respectivamente.

Con esta estructura, puedes asignar varios archivos a un usuario y varios usuarios a un archivo. También puedes registrar la fecha en que se asignó el archivo al usuario.

Para asignar un archivo a un usuario, puedes insertar un registro en la tabla "user_files" con el "user_id" y el "file_id" correspondientes.

Por ejemplo:

INSERT INTO user_files (user_id, file_id) VALUES (1, 1);

Para desasignar un archivo a un usuario, puedes eliminar el registro correspondiente de la tabla "user_files".

Por ejemplo:
DELETE FROM user_files WHERE user_id = 1 AND file_id = 1;

En PHP, puedes crear un script que realice estas operaciones utilizando sentencias SQL preparadas para evitar inyección de código.

Espero que esto te ayude a resolver tu problema. ¡Si tienes alguna pregunta o necesitas más ayuda, no dudes en preguntar!

            <?php
            // Conexión a la base de datos
            $conn = mysqli_connect("localhost", "tu_usuario", "tu_contraseña", "tu_base_de_datos");

            // Verificar conexión
            if (!$conn) {
                die("Conexión fallida: " . mysqli_connect_error());
            }

            // Obtener valores del formulario
            $usuario = $_POST['usuario'];
            $archivo = $_POST['archivo'];

            // Crear relación
            $query = "INSERT INTO user_files (user_id, file_id) VALUES ('$usuario', '$archivo')";
            mysqli_query($conn, $query);

            // Redireccionar a la página principal
            header("Location: index.php");
            exit;
            ?>
            ```
            *eliminar_relacion.php*
            ```
            <?php
            // Conexión a la base de datos
            $conn = mysqli_connect("localhost", "tu_usuario", "tu_contraseña", "tu_base_de_datos");

            // Verificar conexión
            if (!$conn) {
                die("Conexión fallida: " . mysqli_connect_error());
            }

            // Obtener valores del formulario
            $usuario = $_POST['usuario_eliminar'];
            $archivo = $_POST['archivo_eliminar'];

            // Eliminar relación
            $query = "DELETE FROM user_files WHERE user_id = '$usuario' AND file_id = '$archivo'";
            mysqli_query($conn, $query);

            // Redireccionar a la página principal
            header("Location: index.php");
            exit;
            ?>
*\