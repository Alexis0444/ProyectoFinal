<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $familia = $_POST['familia'];
    $tipo = $_POST['tipo'];
    $precio = $_POST['precio'];
    $organico = $_POST['organico'];
    $importado = $_POST['importado'];
    $nacional = $_POST['nacional'];

    try {
        $stmt = $conn->prepare("INSERT INTO verduleria (nombre, familia, tipo, precio, organico, importado, nacional) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nombre, $familia, $tipo, $precio, $organico, $importado, $nacional]);
        
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}
?>
