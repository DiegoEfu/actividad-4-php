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
</head>
<body>
    <h3>Lista de Pozos</h3>
    <a href="crear_pozo.php">Añadir Pozo</a>
    <table border="2">
        <thead>
            <th>No.Pozo</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Ubicación</th>
            <th>Mediciones</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </thead>
        <tbody>
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
                            <button name="pozo" value="<?php echo $row['nombre']; ?>" class="btn btn-outline-primary">
                                Ver Mediciones
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="editar_pozo.php?id=<?php echo $row['id'] ?>">Editar</a>
                    </td>
                    <td>
                        <a href="eliminar_pozo.php?id=<?php echo $row['id'] ?>">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>