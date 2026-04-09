<?php
include("conexion.php");

$cliente = $_POST['cliente'];
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$total = $_POST['total'];

$sql = "INSERT INTO ventas (cliente, producto, cantidad, precio_unitario, total)
        VALUES ('$cliente', '$producto', '$cantidad', '$precio', '$total')";

if ($conn->query($sql) === TRUE) {
    echo "Venta registrada correctamente";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>