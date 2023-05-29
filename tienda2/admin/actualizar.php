<?php
require_once "../config/conexion.php";

if (isset($_POST)) {
    if (!empty($_POST)) {
        $id_producto = $_POST['id_producto'];
        $descripcion = $_POST['descripcion'];
        $p_normal = $_POST['p_normal'];
        $p_rebajado = $_POST['p_rebajado'];

        $query = mysqli_query($conexion, "UPDATE productos SET descripcion = '$descripcion', precio_normal = '$p_normal', precio_rebajado = '$p_rebajado' WHERE id = $id_producto");
        
        if ($query) {
            header('Location: productos.php');
        }
    }
}
