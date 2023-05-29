<?php require_once "config/conexion.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Carrito de Compras</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="./assets/img/onClickLogo.jpg" />
    <!-- Bootstrap icons-->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" /> -->
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="assets/css/estilos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link rel="stylesheet" href="./assets/css/index.css"/>
</head>

<body>
    <!-- Navigation-->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img style="width: 120px; height: auto;" src="./assets/img/onClickLogo.jpg" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-info" category="all">Todo</a>
                        </li>
                        <?php
                        $query = mysqli_query($conexion, "SELECT * FROM categorias");
                        while ($data = mysqli_fetch_assoc($query)) { ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link" category="<?php echo $data['categoria']; ?>"><?php echo $data['categoria']; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="ms-auto">
                <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown border-end pe-2">
                                <a class="nav-link" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img style="width: 16px; height: auto;" src="./assets/img/usuario.png"
                                        alt="Logo de registro" />
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="./registro.php">Iniciar sesión</a></li>
                                    <li><a class="dropdown-item" href="./userForm.php">Registrarse</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" id="btnCarrito">
                                    <img style="width: 16px; height: auto;" src="./assets/img/carrito-de-compras.png"
                                        alt="Carrito de compras" />
                                    <span class="badge bg-success" id="carrito">0</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
                </div>
            </div>
        </nav>
    </div>
 </body>
    <!-- Header-->
    <header class="bg-dark py-5" style="background-image: url('./assets/img/namesnack-computer-business-names-5998x4001-20200730.jpeg'); background-size: cover; background-position: center;">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder" id="header-title">OnClick</h1>
            <p id ="header-text"> De todo un poco </p>
            <style>
           #header-title {
           user-select: none; /* Evita que el texto sea seleccionable */
           cursor: default; /* Mantiene el cursor predeterminado al pasar sobre el texto */
           
           }
           #header-text {
           user-select: none; /* Evita que el texto sea seleccionable */
           cursor: default; /* Mantiene el cursor predeterminado al pasar sobre el texto */
           
           }
</style>
        </div>
    </div>
</header>



<section class="py-5">
  <div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
      <?php
      $query = mysqli_query($conexion, "SELECT p.*, c.id AS id_cat, c.categoria FROM productos p INNER JOIN categorias c ON c.id = p.id_categoria");
      $result = mysqli_num_rows($query);
      if ($result > 0) {
        while ($data = mysqli_fetch_assoc($query)) { ?>
          <div class="col mb-5 productos" category="<?php echo $data['categoria']; ?>">
            <div class="card h-100">
              <!-- Sale badge-->
              <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?php echo ($data['precio_normal'] > $data['precio_rebajado']) ? 'Oferta' : ''; ?></div>
              <!-- Product image (linked to product details) -->
              <a href="product-details.php?id=<?php echo $data['id']; ?>">
                <img class="card-img-top" src="assets/img/<?php echo $data['imagen']; ?>" alt="..." />
              </a>
              <!-- Product details-->
              <div class="card-body p-4">
                <div class="text-center">
                  <!-- Product name (linked to product details) -->
                  <h5 class="fw-bolder"><a href="product-details.php?id=<?php echo $data['id']; ?>"><?php echo $data['nombre']; ?></a></h5>
                  <p><?php echo substr($data['descripcion'], 0, 100) . '...'; ?></p>
                  <!-- Product reviews-->
                  <div class="d-flex justify-content-center small text-warning mb-2">
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                  </div>
                  <!-- Product price-->
                  <span class="text-muted text-decoration-line-through"><?php echo $data['precio_normal']; ?></span>
                  <?php echo $data['precio_rebajado']; ?>
                </div>
              </div>
              <!-- Product actions-->
              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto agregar" data-id="<?php echo $data['id']; ?>" href="#">Agregar</a></div>
              </div>
            </div>
          </div>
      <?php
        }
      } ?>
    </div>
  </div>
</section>

    <!-- Footer con redes sociales -->
  
<footer class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-white">
                <h4>Contáctanos</h4>
                <p>Dirección: 123 Calle Principal, Guatemala</p>
                <p>Teléfono: +502 33430250</p>
                <p>Email: alanlopez2p030@gmail.com</p>
            </div>
            
            <div class="col-md-4 text-white">
             <div div class="follow">
             <h4>Síguenos</h4>
             <div>
                 <a href="https://www.facebook.com/profile.php?id=100079266097146" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                 <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                 <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
              </div>
  </div>
</div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12 text-white text-center">
                <p>&copy; 2023 OnClick. Todos los derechos reservados.</p>
                <p><a href="#">Política de privacidad</a> | <a href="#">Términos de servicio</a></p>
            </div>
        </div>
    </div>
 </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/js/bootstrap.bundle.min.js"></script>

   
</body>

</html>