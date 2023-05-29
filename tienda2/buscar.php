<?php
require_once "config/conexion.php";

if (isset($_GET['query'])) {
    $query = $_GET['query'];

    $sql = "SELECT p.*, c.id AS id_cat, c.categoria 
            FROM productos p 
            INNER JOIN categorias c ON c.id = p.id_categoria 
            WHERE p.nombre LIKE '%$query%'";
    $result = mysqli_query($conexion, $sql);

    ob_start(); // Iniciar el almacenamiento en búfer de salida

    if ($result && mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            // Aquí puedes mostrar los resultados de búsqueda
            // Por ejemplo, puedes reutilizar el código HTML que muestra los productos
            ?>
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
    } else {
        ?>
        <div class="alert alert-info mt-4" role="alert">
            No se encontraron resultados para la búsqueda.
        </div>
        <?php
    }

    $html = ob_get_clean(); // Obtener el contenido almacenado en el búfer de salida
    echo $html;
    exit(); // Terminar la ejecución del script PHP
}

// Si no se proporciona una consulta de búsqueda, mostrar un mensaje de error
echo "Error: No se proporcionó una consulta de búsqueda.";
exit();
?>
