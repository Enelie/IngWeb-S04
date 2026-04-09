<?php
include("conexion.php");

$sql = "SELECT * FROM ventas ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Ventas</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <h2>Lista de Ventas</h2>
        <a href="index.html" class="btn-registrar" style="display: inline-block; margin-bottom: 20px; text-decoration: none;">Registrar Nueva Venta</a>
        <?php if ($result->num_rows > 0): ?>
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th style="border: 1px solid #ddd; padding: 8px;">Cliente</th>
                        <th style="border: 1px solid #ddd; padding: 8px;">Producto</th>
                        <th style="border: 1px solid #ddd; padding: 8px;">Cantidad</th>
                        <th style="border: 1px solid #ddd; padding: 8px;">Precio Unitario</th>
                        <th style="border: 1px solid #ddd; padding: 8px;">Total</th>
                        <th style="border: 1px solid #ddd; padding: 8px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?php echo htmlspecialchars($row['cliente']); ?></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?php echo htmlspecialchars($row['producto']); ?></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $row['cantidad']; ?></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?php echo number_format($row['precio_unitario'], 2); ?></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?php echo number_format($row['total'], 2); ?></td>
                            <td style="border: 1px solid #ddd; padding: 8px;">
                                <a href="editar_venta.php?id=<?php echo $row['id']; ?>" class="btn-editar-link">Editar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No hay ventas registradas aún.</p>
        <?php endif; ?>
        <?php $conn->close(); ?>
    </div>
</body>
</html>