<?php
require_once '../controllers/ProductController.php';

$controller = new ProductController();


$productos = $controller->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
</head>
<body>
    <h1>Listado de Productos</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?php echo $producto['id']; ?></td>
            <td><?php echo $producto['nombre']; ?></td>
            <td><?php echo $producto['descripcion']; ?></td>
            <td><?php echo $producto['precio']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $producto['id']; ?>">Editar</a> | 
                <a href="delete.php?id=<?php echo $producto['id']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
