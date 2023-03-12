<!--
    ELIMINAR MEDICIÓN
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Medición</title>
</head>
<body>
    <?php
        include('bdd.php');
        $query = "SELECT * FROM medida WHERE id=".$_GET['id'];
        $result = mysqli_query($conn, $query)->fetch_row();
    ?>
    <p>¿Está seguro que desea eliminar la medición <?php echo $_GET['id'] ?> del Pozo "<?php echo $_GET['pozo'] ?>"?</p>
    <ul>
        <li><b>FECHA:</b> <?php echo $result[2] ?></li>
        <li><b>PSI:</b> <?php echo $result[1] ?></li>
    </ul>
    <form action="eliminar_medicion_bdd.php?pozo=<?php echo $_GET['pozo']; ?>&id_pozo=<?php echo $_GET['id_pozo']; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">    
    <button type="submit">Eliminar</button>
    </form>
</body>
</html>