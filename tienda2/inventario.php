<?php
require_once "./config/conexion.php";

// Obtener el inventario de productos
$inventario = mysqli_query($conexion, "SELECT p.id, p.nombre, p.descripcion, p.cantidad, p.precio_normal, c.categoria
FROM productos p
INNER JOIN categorias c ON c.id = p.id_categoria");

$inventarioData = array();
$totalDinero = 0;

while ($data = mysqli_fetch_assoc($inventario)) {
    $inventarioData[] = $data;
    $totalDinero += $data['cantidad'] * $data['precio_normal'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Inventario -Onclick</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="./assets/img/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="./registro.php">Regresar</a>
        </div>
    </nav>

    <!-- Page Content-->
    <div class="container mt-5">
        <h1 class="mb-4">Inventario</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cantidad Disponible</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inventarioData as $producto) : ?>
                    <tr>
                        <td><?php echo $producto['id']; ?></td>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['descripcion']; ?></td>
                        <td><?php echo $producto['cantidad']; ?></td>
                        <td><?php echo $producto['precio_normal']; ?></td>
                        <td><?php echo $producto['categoria']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5"></td>
                    <td><strong>Total: $<?php echo number_format($totalDinero, 2); ?></strong></td>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- Footer-->
    <footer class="py-4 bg-light">
        <div class="container text-center">
            <p class="text-muted mb-0">&copy; 2023 Mi Tienda. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
   
</body>

</html>