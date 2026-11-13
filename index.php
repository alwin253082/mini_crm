<?php
session_start();
$rolActual = $_SESSION['rol'] ?? 'app';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Tienda - Proyecto Final</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1 Inventario de Productos</h1>
    
    <div class="panel-rol">
        <p>Usuario activo: <strong><?= $rolActual === 'root' ? 'root (todos los privilegios)' : 'app_user (privilegios mínimos)' ?></strong></p>
        <form action="cambiar_rol.php" method="POST">
            <label for="rol">Cambiar usuario de conexión:</label>
            <select name="rol" id="rol">
                <option value="app" <?= $rolActual === 'app' ? 'selected' : '' ?>>app_user (mínimos privilegios)</option>
                <option value="root" <?= $rolActual === 'root' ? 'selected' : '' ?>>root (todos los privilegios)</option>
            </select>
            <button type="submit">Cambiar</button>
        </form>
    </div>

    <?php
    include 'conexion.php';

    $sql = "SELECT id_producto, nombre, categoria, precio, stock FROM productos";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Categoría</th><th>Precio</th><th>Stock</th></tr>";
        
        while($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($fila["id_producto"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["nombre"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["categoria"]) . "</td>";
            echo "<td>$" . htmlspecialchars($fila["precio"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["stock"]) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='error'>No hay productos registrados en la base de datos.</p>";
    }

    $conexion->close();
    ?>

</body>
</html>