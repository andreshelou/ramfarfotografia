<?php
$host = 'RamFar-DB';
$dbname = 'ramfar';
$user = 'ramfar';
$pass = 'R4mF4rP455';
try {
    $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Conexión fallida: ' . $e->getMessage();
}
?>
