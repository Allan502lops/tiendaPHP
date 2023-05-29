<?php
// Iniciamos sesión
session_start();

// Conectamos a la base de datos
include("./config/conexion.php");
// Verificamos que la conexión sea exitosa
if (!$conexion) {
    die("Error de conexión:".mysqli_connect_error());
}

// Verificamos que se hayan enviado los datos del formulario
if (!empty($_POST['usuario']) && !empty($_POST['apellido']) && !empty($_POST['correo']) && !empty($_POST['clave'])) {

    // Recibimos los datos del formulario y los validamos
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $password = mysqli_real_escape_string($conexion, $_POST['clave']);
    
    // Creamos la consulta SQL para insertar los datos en la tabla "usuarios"
    $consulta = "INSERT INTO newuser (usuario, Apellido, Correo, clave) VALUES ('$usuario', '$apellido', '$correo', '$password')";
    
    // Ejecutamos la consulta
    if (mysqli_query($conexion, $consulta)) {
        echo "<script>document.getElementById('messages').innerHTML = 'Registro creado correctamente';</script>";
    } else {
        echo "<script>document.getElementById('messages').innerHTML = 'Error al crear el registro: ". mysqli_error($conexion) ."';</script>";
    }
    

} else {
    $_SESSION['mensaje'] = "Error: complete todos los campos del formulario.";
    exit();
}

// Cerramos la conexión a la base de datos
mysqli_close($conexion);
?>

<!-- Mostramos el mensaje en un script JavaScript -->
<script>
    alert("<?php echo isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : ''; ?>");
</script>

<?php
// Borramos la variable de sesión para evitar que se muestre el mensaje más de una vez
unset($_SESSION['mensaje']);
?>
 