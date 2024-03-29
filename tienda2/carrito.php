<?php
require_once "./config/conexion.php";
require_once "./config/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Carrito de Compras</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" /> -->
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="assets/css/estilos.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="./">Regresar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </div>
    <!-- Header-->
    <style>
        .bg-dark {
            background-image: url('./assets/img/namesnack-computer-business-names-5998x4001-20200730.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .text-white {
            text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
        }
    </style>
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Carrito</h1>
                <h1 class="lead fw-normal text-white-50 mb-0">Tus Productos Agregados.</h1>
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody id="tblCarrito">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-5 ms-auto">
                    <h4>Total a Pagar: <span id="total_pagar">0.00</span></h4>
                    <div class="d-grid gap-2">
                        <div id="paypal-button-container"></div>
                        <button class="btn btn-warning" type="button" id="btnVaciar">Vaciar Carrito</button>
                        <button class="btn btn-success" type="button" id="btnPagar">Pagar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; My Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&locale=<?php echo LOCALE; ?>"></script>
    <script src="assets/js/scripts.js"></script>
    <script>
       mostrarCarrito();

function mostrarCarrito() {
    if (localStorage.getItem("productos") != null) {
        let array = JSON.parse(localStorage.getItem('productos'));
        if (array.length > 0) {
            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                async: true,
                data: {
                    action: 'buscar',
                    data: array
                },
                success: function(response) {
                    console.log(response);
                    const res = JSON.parse(response);
                    let html = '';
                    res.datos.forEach(element => {
                        html += `
                    <tr>
                        <td>${element.id}</td>
                        <td>${element.nombre}</td>
                        <td>${element.precio}</td>
                        <td>1</td>
                        <td>${element.precio}</td>
                    </tr>
                    `;
                    });
                    $('#tblCarrito').html(html);
                    $('#total_pagar').text(res.total);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    }
}

$('#btnPagar').on('click', function() {
    if (localStorage.getItem("productos") != null) {
        let array = JSON.parse(localStorage.getItem('productos'));
        if (array.length > 0) {
            $.ajax({
                url: 'ajax.php',
                type: 'POST',
                async: true,
                data: {
                    action: 'generar_factura',
                    data: array
                },
                success: function(response) {
                    console.log(response);
                    const res = JSON.parse(response);
                    // Mostrar los productos en una nueva página
                    localStorage.setItem("productos", JSON.stringify([])); 
                    localStorage.setItem("total", "0.00"); 
                    window.location.href = `factura.php?total=${res.total}&productos=${JSON.stringify(array)}`;
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    }
});
console.log('Datos recibidos en factura.php:', <?php echo json_encode($_GET); ?>);


    </script>
</body>

</html>