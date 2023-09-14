<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar sesión </title>
  <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/ss.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body>
  <div class="container">
    <div class="form-container">
      <div id="login-form">

        <h2>Iniciar sesión</h2>
        <form action="./validar.php" method="post">
        <div class="input-container">
  <label for="usuario"><i class="fas fa-user"></i> Usuario</label>
  <input id="usuario" type="text" name="usuario" placeholder="Usuario" required>
</div>

<div class="input-container">
  <label for="password"><i class="fas fa-lock"></i> Contraseña</label>
  <input id="password" type="password" placeholder="Contraseña" name="password" required>
</div>

<button type="submit" title="Ingresar" name="Ingresar"><i class="fas fa-sign-in-alt"></i> Ingresar</button>
</form>

<div class="pie-form">
  <a href="userForm.php"><i class="fas fa-user-plus"></i> ¿No tienes una cuenta? Regístrate</a>
  <hr>
 

  <a href="index.php"><i class="fas fa-home"></i> Volver a la página principal</a>
</div>

      </div>
    </div>
    <div class="image-container"></div>
  </div>
</body>

</html>
