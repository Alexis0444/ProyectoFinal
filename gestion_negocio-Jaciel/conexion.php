<?php
$host = "localhost";
$usuario = "root";
$clave = "";
$base_de_datos = "negocios_db";

try {
    $conn = new PDO("mysql:host=$host;dbname=$base_de_datos", $usuario, $clave);
    // Establecer el modo de error de PDO a Excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Muestra el error si no se puede conectar
    echo "Error al conectar: " . $e->getMessage();
    exit;
}
?>
