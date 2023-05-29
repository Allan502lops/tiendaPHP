<?php
require_once "./config/conexion.php";

$USER = $_POST['usuario'];
$PASSWORD = $_POST['password'];

$consulta = "SELECT 'operador' as tipo_usuario, usuario, clave FROM operador
             UNION
             SELECT 'newuser' as tipo_usuario, usuario, clave FROM newuser";
             
$resultado = mysqli_query($conexion, $consulta);

while ($row = mysqli_fetch_assoc($resultado)) {
  if ($USER == $row['usuario'] && $PASSWORD == $row['clave']) {
    $tipo_usuario = $row['tipo_usuario'];
    switch ($tipo_usuario) {
      case 'operador':
        header("location: inventario.php");
        exit();
      case 'newuser':
        header("location: index.php");
        exit();
     
    }
  }
}

// Si los datos ingresados son incorrectos, se muestra un mensaje de error
include("validar.php");
?>
<h1>Authentication Error</h1>

<?php
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
