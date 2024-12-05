<?php
ini_set('display_errors', 1);  // Muestra los errores de PHP
error_reporting(E_ALL);  // Muestra todos los niveles de error

include 'conexion.php';  // Asegúrate de que la conexión a la base de datos es correcta

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibiendo los datos enviados desde JavaScript
    $nombre = $_POST['nombre'];
    $familia = $_POST['familia'];
    $tamano = $_POST['tamano'];
    $precio = $_POST['precio'];
    $departamentos = isset($_POST['departamentos']) ? implode(",", $_POST['departamentos']) : ''; // Si hay un array, lo convierte en una cadena separada por comas

    // Depuración: Mostrar los datos recibidos para asegurarse de que son correctos
    error_log("Datos recibidos: " . print_r($_POST, true));  // Esto guardará los datos recibidos en el log de PHP

    try {
        // Realizar la inserción en la base de datos
        $stmt = $conn->prepare("INSERT INTO ferreteria (nombre, familia, tamano, precio, departamento) 
                                VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nombre, $familia, $tamano, $precio, $departamentos]);

        // Si la inserción fue exitosa, devolver un mensaje JSON
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        // Si ocurre un error con la base de datos, devolver el error en formato JSON
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    // Si no se recibe una solicitud POST, devolver un error
    echo json_encode(['success' => false, 'error' => 'Método no permitido']);
}
?>
