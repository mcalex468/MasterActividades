<?php
$servername = "mysql";
$username   = "root";
$password   = "password";
$database   = "mi_basedatos";

$mysqli = new mysqli($servername, $username, $password, $database);
if ($mysqli->connect_error) {
  die("❌ Error de conexión (mysqli): " . $mysqli->connect_error);
}
echo "✅ Conexión exitosa a MySQL con mysqli.<br>";

try {
  $pdo = new PDO("mysql:host=$servername;dbname=$database;charset=utf8mb4", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "✅ Conexión exitosa a MySQL con PDO.<br>";
} catch (Throwable $e) {
  echo "⚠️ PDO no disponible o falló la conexión: " . $e->getMessage() . "<br>";
}

echo "<hr><pre>";
echo 'PHP version: ' . phpversion() . "\n";
echo 'Loaded extensions: ' . implode(', ', get_loaded_extensions()) . "\n";
echo "</pre>";
