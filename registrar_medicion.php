<!--
    FORMULARIO PARA LAS MEDICIONES
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Medición</title>

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
        <form class="card p-3 bg-dark text-white" action="crear_medicion_bdd.php" method="post">
            <input type="hidden" name="id_pozo" value="<?php echo $_GET['id']; ?>">
            <input type="hidden" name="pozo" value="<?php echo $_GET['pozo']; ?>">
            <label for="nombre">Fecha:</label>
            <input class="form-control" type="datetime-local" name="fecha" required>

            <label for="psi">Medición en PSI:</label>
            <input class="form-control" type="number" name="psi" id="psi" step="0.01" required>

            <div class="d-flex justify-content-center mt-2">
                <a href="ver_mediciones.php?pozo=<?php echo $_GET['pozo']; ?>&id_pozo=<?php echo $_GET['id']; ?>" class="btn btn-secondary">Regresar</a>
                <button class="btn btn-danger" type="submit">Crear</button>
            </div> 
        </form>
    </div>
</body>
</html>