<?php
session_start();
include '../config/db.php'; 

// Verificar si el usuario está logueado y es admin
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] !== 'ADM') {
    header("Location: ../index.php");
    exit;
}


// Conversion de Bites
function _format_bytes($a_bytes)
{
    if ($a_bytes < 1024)
    {
        return $a_bytes .'  B';
    }
    elseif ($a_bytes < 1048576)
    {
        return round($a_bytes / 1024, 1) .'  KB';
    }
    elseif ($a_bytes < 1073741824) 
    {
        return round($a_bytes / 1048576, 1) . ' MB';
    }
}


// Obtener archivos con el conteo de asignaciones
$sql = "
    SELECT 
        files.file_id, 
        files.name, 
        files.coment,
        files.size,
        COUNT(user_files.user_id) AS assigned_users_count 
    FROM 
        files 
    LEFT JOIN 
        user_files ON files.file_id = user_files.file_id 
    GROUP BY 
        files.file_id, files.name, files.coment, files.size
";

$stmt = $pdo->query($sql);
$files = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                            <input type="file" name="file" id="fileInput" required style="color: #d95e00; font-family: arial; font-size: 12px; border-color: #5F614B; padding: 2px 7px 1px 7px; border-width: 1px; background-color: #2a2a2a; border-style: solid; width: 400px; height: 25px ">
                    </td>
                    <td align="center">
                            <input type="text" name="coment" id="comentInput" placeholder="Comentario" required style="color: #d95e00; font-family: arial; font-size: 12px; border-color: #5F614B; padding: 2px 7px 1px 7px; border-width: 1px; background-color: #2a2a2a; border-style: solid; width: 400px; height: 25px ">
                    </td>
                    <td align="right">
                            <button type="button" id="uploadButton" class="btn" style="color: #d95e00; font-family: arial; font-size: 12px; border-color: #5F614B; padding: 2px 7px 1px 7px; border-width: 1px; background-color: #2a2a2a; border-style: solid; width: 200px; height: 29px ">Subir Archivo </button>
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
                    <tr bgcolor='#2a2a2a'>
                        <td align='center' style='height: 35px; vertical-align: middle;'>Tamanio</td>
                        <td align='center' style='height: 35px; vertical-align: middle;'></td>
                        <td align="center" style='height: 35px; vertical-align: middle;'>Nombre del archivo</td>
                        <td align="center" style='height: 35px; vertical-align: middle;'>Comentario</td>
                        <td align='center' style='height: 35px; vertical-align: middle;'>Cantidad de asignados</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($files as $file): ?> 
                        <td align='right' style='height: 25px; vertical-align: middle;'><?php echo _format_bytes($file['size']); ?></td>
                            <form name="deletes" action="deleteFile.php" method="post">
                                <input name="file_id" type="hidden" value="<?php echo htmlspecialchars($file['file_id']); ?>">
                                <td align="center" style='height: 25px; vertical-align: middle;'>
                                    <!-- Botón de eliminación -->
                                    <input name="delete" type="submit" value="X" style="color: #d95e00; font-family: arial; font-size: 12px; border-color: #5F614B; padding: 2px 7px 1px 7px; border-width: 1px; background-color: #2a2a2a; border-style: solid;">
                                </td>
                            </form>
                            <td style='height: 25px; vertical-align: middle;'><?php echo htmlspecialchars($file['name']); ?></td>
                            <td style='height: 25px; vertical-align: middle;'><?php echo htmlspecialchars($file['coment']); ?></td>
                            <form name="deletes" action="manageAssignments.php" method="post">
                                <input name="file_id" type="hidden" value="<?php echo htmlspecialchars($file['file_id']); ?>">
                                <td align="center" style='height: 25px; vertical-align: middle;'>
                                    <!-- Botón de eliminación -->
                                    <input name="delete" type="submit" value="<?php echo htmlspecialchars($file['assigned_users_count']); ?>" style="color: #00FF00; font-family: arial; font-size: 12px; border-color: #5F614B; padding: 2px 7px 1px 7px; border-width: 1px; background-color: #2a2a2a; border-style: solid; width: 50px ">
                                </td>
                            </form>
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
