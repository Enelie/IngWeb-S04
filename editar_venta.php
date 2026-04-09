<?php
include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM ventas WHERE id=$id";
$resultado = $conn->query($sql);
$fila = $resultado->fetch_assoc();

if (!$fila) {
    echo "Venta no encontrada.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Venta</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <h2>Editar Venta</h2>
        <a href="lista_ventas.php" class="btn-registrar" style="display: inline-block; margin-bottom: 20px; text-decoration: none;">Volver a Lista</a>

        <form action="actualizar_venta.php" method="POST" onsubmit="return validarFormulario();">
            <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

            <label>Cliente:</label>
            <input type="text" name="cliente" id="cliente" value="<?php echo htmlspecialchars($fila['cliente']); ?>" required>
            <span id="error-cliente" class="error"></span>

            <label>Producto:</label>
            <input type="text" name="producto" id="producto" value="<?php echo htmlspecialchars($fila['producto']); ?>" required>
            <span id="error-producto" class="error"></span>

            <label>Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" value="<?php echo $fila['cantidad']; ?>" min="1" required>
            <span id="error-cantidad" class="error"></span>

            <label>Precio Unitario:</label>
            <input type="number" step="0.01" name="precio" id="precio" value="<?php echo number_format($fila['precio_unitario'], 2); ?>" min="0.01" required>
            <span id="error-precio" class="error"></span>

            <label>Total:</label>
            <input type="number" name="total" id="total" value="<?php echo number_format($fila['total'], 2); ?>" readonly>
            <span id="error-total" class="error"></span>

            <div class="button-group">
                <button type="button" onclick="calcularTotal()" class="btn-calcular">Calcular Total</button>
                <button type="submit" class="btn-registrar">Actualizar Venta</button>
            </div>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>