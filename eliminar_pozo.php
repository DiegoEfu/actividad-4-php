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
</head>
<body>
    <?php
        include('bdd.php');
        $query = "SELECT pozo.id AS id,pozo.nombre AS nombre,st.nombre AS estado_nombre,ubicacion FROM pozo INNER JOIN estado AS st ON pozo.estado = st.id ORDER BY -pozo.id";
        $result = mysqli_query($conn, $query)->fetch_row();
    ?>
    <p>¿Está seguro que desea eliminar el pozo "<?php echo $result[1]; ?>"?</p>
    <ul>
        <li><b>NOMBRE:</b> <?php echo $result[1] ?></li>
        <li><b>ESTADO:</b> <?php echo $result[2] ?></li>
        <li><b>UBICACIÓN:</b> <?php echo $result[3] ?></li>
    </ul>
    <form action="eliminar_pozo_bdd.php?id=<?php echo $_GET['id']; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">    
        <button type="submit">Eliminar</button>
    </form>
</body>
</html>