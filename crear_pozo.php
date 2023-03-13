<!--
    CREACIÓN DE POZO (FORMULARIO)
-->

<?php
    include('bdd.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación de Pozo</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <style>
        body{
            background-image: url('img/bg.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center bg-dark text-white flex-column">
        <img src="img/pdvsa-logo.png" width="100px" alt="logo de PDVSA">
        <h3>Crear Pozo</h3>
    </div>
    <div class="m-3">
        <form action="crear_pozo_bdd.php" method="post" class="card p-3 bg-dark text-white">
            
            <label for="nombre">Nombre:</label>
            <input class="form-control" type="text" name="nombre" maxlength="45" required>

            <label for="estado">Estado:</label>
            <select class="form-select" name="estado" id="estado" required>
                <option value="">------------</option>
                <?php
                    $query = "SELECT * FROM estado";
                    $result = mysqli_query($conn, $query);
                
                    while($row = mysqli_fetch_array($result)){
                        echo "<option value='".$row['id']."'>".$row['nombre']."</option>";
                    }
                ?>
            </select>

            <label for="nombre">Ubicación Exacta:</label>
            <textarea class="form-control" name="ubicacion" id="ubicacion" cols="30" rows="10" minlength="10"></textarea>
            
            <div class="d-flex justify-content-center mt-2">
                <a href="index.php" class="btn btn-secondary">Regresar</a>
                <button class="btn btn-danger" type="submit">Crear</button>
            </div>            
        </form>
    </div>
</body>
</html>