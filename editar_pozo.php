<?php
    include('bdd.php');
    $query = "SELECT * FROM pozo WHERE id = " . $_GET['id'];
    $result = mysqli_query($conn, $query)->fetch_row();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Medición</title>

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
        <h3>Editar Pozo</h3>
    </div>

    <div class="m-3">
        <form class="card p-3 bg-dark text-white" action="editar_pozo_bdd.php?id=<?php echo $_GET['id']; ?>" method="post">
            <label for="nombre">Nombre:</label>
            <input class="form-control" type="text" name="nombre" maxlength="45" value="<?php echo $result[1] ?>" required>

            <label for="estado">Estado:</label>
            <select class="form-select" name="estado" value="<?php echo $result[4] ?>" id="estado" required>
                <option value="">------------</option>
                <?php
                    $query = "SELECT * FROM estado";
                    $resultestados = mysqli_query($conn, $query);
                
                    while($row = mysqli_fetch_array($resultestados)){
                        echo "<option value='".$row['id']."'";
                        if($row['id'] == $result[4])
                            echo "selected";                    
                        echo ">".$row['nombre']."</option>";
                    }
                ?>
            </select>

            <label for="nombre"value="<?php echo $result[2] ?>">Ubicación Exacta:</label>
            <textarea class="form-control" name="ubicacion" id="ubicacion" cols="30" rows="10" minlength="10"><?php echo $result[2] ?>
            </textarea>

            <div class="d-flex justify-content-center mt-2">
                <a href="index.php" class="btn btn-secondary">Regresar</a>
                <button class="btn btn-danger" type="submit">Editar</button>
            </div>   
        </form>
    </div>
</body>
</html>