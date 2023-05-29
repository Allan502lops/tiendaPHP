<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi formulario</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/NewUser.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <div id="login-form">
                <form id="myForm" class="form-group" action="LogUser.php" method="post">
                    <h2>Registro de Usuario</h2>
                    <div class="input-container">
                        <label for="usuario"><i class="fas fa-user"></i></label>
                        <input class="form-control" type="text" id="usuario" name="usuario" placeholder="Nombre de usuario" required>
                    </div>
                    <div class="input-container">
                        <label for="apellido"><i class="fas fa-user"></i></label>
                        <input class="form-control" type="text" id="apellido" name="apellido" placeholder="Apellido" required>
                    </div>
                    <div class="input-container">
                        <label for="correo"><i class="fas fa-envelope"></i></label>
                        <input class="form-control" type="email" id="correo" name="correo" placeholder="Correo electrónico" required>
                    </div>
                    <div class="input-container">
                        <label for="clave"><i class="fas fa-lock"></i></label>
                        <input class="form-control" type="password" id="clave" name="clave" placeholder="Contraseña" required>
                    </div>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Agregar usuario</button>
                    <div id="messages"></div>
                    <a href="./registro.php" class="back-link"><i class="fas fa-arrow-left"></i> Volver</a>
                </form>
            </div>
        </div>
        <div class="image-container"></div>
    </div>

    <script>
        const form = document.getElementById('myForm');
        form.addEventListener('submit', (event) => {
            const usuario = document.querySelector('input[name="usuario"]');
            const apellido = document.querySelector('input[name="apellido"]');
            const correo = document.querySelector('input[name="correo"]');
            const password = document.querySelector('input[name="clave"]');
            if (usuario.value === '' || apellido.value === '' || correo.value === '' || clave.value === '') {
                alert('Todos los campos son obligatorios');
                event.preventDefault();
            }
        });
    </script>

    <!-- Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>

</body>

</html>
