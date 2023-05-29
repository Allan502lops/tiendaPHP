<?php
// Establecer la conexión a la base de datos
require_once("./config/conexion.php");

// Obtener el ID del producto de la URL
if (isset($_GET['id'])) {
  $product_id = $_GET['id'];

  // Aquí debes realizar la consulta a tu base de datos para obtener la información completa del producto según el ID
  // Puedes usar el valor de $product_id en tu consulta

  // Ejemplo de consulta
  $query = mysqli_query($conexion, "SELECT * FROM productos WHERE id = $product_id");
  $product_data = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalles del Producto</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/productos.css">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }

    h1, h2, h3, h4, h5, h6 {
      font-family: 'Roboto', sans-serif;
    }

    .product-description {
      font-family: 'Roboto', sans-serif;
    }

    /* Agrega aquí más estilos de fuente según tus necesidades */
  </style>
</head>
<body>
  <header class="header">
    <div class="container">
      <div class="header-logo">
        <img src="./assets/img/onClickLogo.jpg" alt="Logo de tu negocio">
      </div>
      <nav class="header-nav">
    
    </div>
  </header>

  <div class="container">
  <h1><?php echo $product_data['nombre']; ?></h1>
  <div class="product-details">
    <div class="product-image">
      <img src="assets/img/<?php echo $product_data['imagen']; ?>" alt="<?php echo $product_data['nombre']; ?>">
    </div>
    <div class="product-specs">
      <p class="product-description"><?php echo $product_data['descripcion']; ?></p>
      <p class="product-price">Precio: <?php echo $product_data['precio_rebajado']; ?></p>
      <!-- Agrega aquí cualquier otra información que desees mostrar -->
    </div>
  </div>
  <div class="actions">
    <a href="./index.php" class="back-btn">Volver a la lista de productos</a>
  </div>
</div>


<footer class="footer">
<div class="container">
  <p>© 2023 OnClick. Todos los derechos reservados.</p>
</div>
</footer>
<script>
  const productImage = document.querySelector('.product-image img');

  productImage.addEventListener('mousemove', (event) => {
    // Obtén las coordenadas del mouse dentro de la imagen
    const { offsetX, offsetY } = event;

    const moveX = (offsetX / productImage.offsetWidth) * 120;
    const moveY = (offsetY / productImage.offsetHeight) * 120;

    productImage.style.transformOrigin = `${moveX}% ${moveY}%`;
  });

  productImage.addEventListener('mouseleave', () => {
    productImage.style.transformOrigin = 'center center';
  });
</script>

</body>
</html>

