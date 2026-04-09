<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $cliente = trim($_POST['cliente']);
    $producto = trim($_POST['producto']);
    $cantidad = floatval($_POST['cantidad']);
    $precio = floatval($_POST['precio']);
    $total = $cantidad * $precio;

    // Validaciones básicas
    if (empty($cliente) || empty($producto) || $cantidad <= 0 || $precio <= 0) {
        echo json_encode(['success' => false, 'message' => 'Datos inválidos']);
        exit;
    }

    // Actualizar usando prepared statements
    $stmt = $conn->prepare("UPDATE ventas SET cliente = ?, producto = ?, cantidad = ?, precio_unitario = ?, total = ? WHERE id = ?");
    $stmt->bind_param("ssiddi", $cliente, $producto, $cantidad, $precio, $total, $id);

    if ($stmt->execute()) {
        header("Location: lista_ventas.php");
        exit;
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar']);
    }

    $stmt->close();
    $conn->close();
}
?>