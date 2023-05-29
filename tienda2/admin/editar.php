<?php
require_once "../config/conexion.php";

if (isset($_GET['accion']) && $_GET['accion'] == 'pro' && isset($_GET['id'])) {
    $id_producto = $_GET['id'];
    $query = mysqli_query($conexion, "SELECT * FROM productos WHERE id = $id_producto");
    $producto = mysqli_fetch_assoc($query);

}
?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .form-container {
        max-width: 800px;
        margin: 0 auto;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 40px;
        margin-top: 50px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    
    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #333;
        font-size:20px;
    }
    
    input[type="text"],
    textarea {
        width: 100%;
        padding: 30px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 20px;
        color: #555;
    }
    
    button[type="submit"] {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
    }
    
    /* Estilos adicionales para una apariencia más atractiva */
    body {
        background-color: #f4f4f4;
        font-family: Arial, sans-serif;
    }
    
    .form-container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 40px;
    }
    
    button[type="submit"] {
        background-color: #007bff;
        transition: background-color 0.3s ease;
    }
    
    button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>

<div class="form-container">
    <form action="actualizar.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" name="id_producto" value="<?php echo $producto['id']; ?>">
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" class="form-control" name="descripcion" rows="3" required><?php echo $producto['descripcion']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="p_normal">Precio Normal</label>
            <input id="p_normal" class="form-control" type="text" name="p_normal" value="<?php echo $producto['precio_normal']; ?>" required>
        </div>
        <div class="form-group">
            <label for="p_rebajado">Precio Rebajado</label>
            <input id="p_rebajado" class="form-control" type="text" name="p_rebajado" value="<?php echo $producto['precio_rebajado']; ?>" required>
        </div>
        <button class="btn btn-primary" type="submit">Actualizar</button>
        <button class="btn btn-primary" type="submit" href="./productos.php">Regresar</button>

    </form>
</div>
