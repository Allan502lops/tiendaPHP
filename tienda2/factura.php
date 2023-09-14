<?php
require_once "./config/conexion.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Factura</title>
    <link rel="stylesheet" href="./assets/css/factura.css">
</head>

<body>
    <div class="factura">
        <div class="encabezado">
            <h1>Farmacia XYZ</h1>
            <p>Dirección: Dirección de la farmacia</p>
            <p>Teléfono: 123456789</p>
        </div>
        
        <?php
        if (isset($_GET['total']) && isset($_GET['productos'])) {
            $total = $_GET['total'];
            $productos = json_decode($_GET['productos'], true);
        ?>
            <div class="detalle-compra">
                <h2>Detalle de Compra</h2>
                <table>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                    </tr>
                    <?php
                    foreach ($productos as $producto) {
                        $id = $producto['id'];
                        $query = mysqli_query($conexion, "SELECT * FROM productos WHERE id = $id");
                        $result = mysqli_fetch_assoc($query);

                        if ($result) {
                            echo "<tr>
                                    <td>{$result['nombre']}</td>
                                    <td>{$result['precio_normal']}</td>
                                  </tr>";
                        }
                    }
                    ?>
                </table>
                <p class="total">Total a Pagar: <?php echo $total; ?></p>
            </div>
        <?php
        } else {
            echo "<p>No se encontraron datos para generar la factura.</p>";
        }
        ?>
    </div>
</body>

</html>
