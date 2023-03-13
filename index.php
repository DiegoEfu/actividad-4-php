<?php
    include('bdd.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDVSA</title>
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
        <h3>Lista de Pozos</h3>
    </div>

    <div class="m-3 d-flex flex-end flex-column">
        <a href="crear_pozo.php" class="btn btn-danger">Añadir Pozo</a>
        <table class="table table-hover">
            <thead class="table-dark">
                <th>No.Pozo</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Ubicación</th>
                <th>Mediciones</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </thead>
            <tbody class="table-light">
            <?php
                        
                $query = "SELECT pozo.id AS id,pozo.nombre AS nombre,st.nombre AS estado_nombre,ubicacion FROM pozo INNER JOIN estado AS st ON pozo.estado = st.id ORDER BY -pozo.id";
                $result = mysqli_query($conn, $query);
        
                while($row = mysqli_fetch_array($result)){?>
                    <tr>
                        <td>
                            <?php                                
                                echo $row['id'];                                
                            ?>
                        </td>
                        <td>
                            <?php                                
                                echo $row['nombre'];                             
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $row['estado_nombre'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $row['ubicacion'];
                            ?>
                        </td>
                        <td>
                            <form action="ver_mediciones.php" method="get">
                                <input type="hidden" name="id_pozo" value="<?php echo $row['id']; ?>">
                                <button name="pozo" value="<?php echo $row['nombre']; ?>" class="btn btn-outline-danger">
                                    Ver Mediciones
                                </button>
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-outline-danger" href="editar_pozo.php?id=<?php echo $row['id'] ?>">Editar</a>
                        </td>
                        <td>
                            <a class="btn btn-outline-danger" href="eliminar_pozo.php?id=<?php echo $row['id'] ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>    
</body>
</html>