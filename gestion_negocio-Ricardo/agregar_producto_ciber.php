<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $computadora = $_POST['computadora'];
    $ip = $_POST['ip'];
    $usuario = $_POST['usuario'];
    $tiempo = $_POST['tiempo'];
    $precio = $_POST['precio'];

    try {
        $stmt = $conn->prepare("INSERT INTO ciber (computadora, ip, usuario, tiempo, precio) 
                                VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$computadora, $ip, $usuario, $tiempo, $precio]);
        
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}
?>
