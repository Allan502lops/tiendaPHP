<?php
require_once "config/conexion.php";

if (isset($_POST)) {
    if ($_POST['action'] == 'buscar') {
        $array['datos'] = array();
        $total = 0;
        for ($i = 0; $i < count($_POST['data']); $i++) {
            $id = $_POST['data'][$i]['id'];
            $query = mysqli_query($conexion, "SELECT * FROM productos WHERE id = $id");
            $result = mysqli_fetch_assoc($query);
            $data['id'] = $result['id'];
            $data['precio'] = $result['precio_rebajado'];
            $data['nombre'] = $result['nombre'];
            $total = $total + $result['precio_rebajado'];
            array_push($array['datos'], $data);
        }
        $array['total'] = $total;
        echo json_encode($array);
        die();
    } elseif ($_POST['action'] == 'generar_factura') {
        $productos = $_POST['data'];
        $total = 0;

        foreach ($productos as $producto) {
            $id = $producto['id'];
            $query = mysqli_query($conexion, "SELECT * FROM productos WHERE id = $id");
            $result = mysqli_fetch_assoc($query);

            if ($result) {
                $nuevoStock = $result['cantidad'] - 1;
                mysqli_query($conexion, "UPDATE productos SET cantidad = $nuevoStock WHERE id = $id");
                $total += $result['precio_rebajado'];
            }
        }

        $respuesta = array(
            'mensaje' => 'Factura generada exitosamente',
            'total' => $total,
        );

        echo json_encode($respuesta);
        die();
    }
}
?>
