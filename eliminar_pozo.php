<!--
    ELIMINAR POZO
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Pozo</title>

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
    <?php
        include('bdd.php');
        $query = "SELECT pozo.id AS id,pozo.nombre AS nombre,st.nombre AS estado_nombre,ubicacion FROM pozo INNER JOIN estado AS st ON pozo.estado = st.id ORDER BY -pozo.id";
        $result = mysqli_query($conn, $query)->fetch_row();
    ?>
    <div class="d-flex justify-content-center align-items-center bg-dark text-white flex-column">
        <img src="img/pdvsa-logo.png" width="100px" alt="logo de PDVSA">
        <h3>Eliminar Pozo</h3>
    </div>

    <div class="card p-3 bg-dark text-white m-3">
        <p>¿Está seguro que desea eliminar el pozo "<?php echo $result[1]; ?>"?</p>
        <ul>
            <li><b>NOMBRE:</b> <?php echo $result[1] ?></li>
            <li><b>ESTADO:</b> <?php echo $result[2] ?></li>
            <li><b>UBICACIÓN:</b> <?php echo $result[3] ?></li>
        </ul>
        <form action="eliminar_pozo_bdd.php?id=<?php echo $_GET['id']; ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">    
            <div class="d-flex justify-content-center mt-2">
                <a href="index.php" class="btn btn-secondary">Regresar</a>
                <button class="btn btn-danger" type="submit">Eliminar</button>
            </div>  
        </form>
    </div>
</body>
</html>