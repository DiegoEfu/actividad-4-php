<?php
    include('bdd.php');
    $query = "SELECT * FROM medida WHERE id = " . $_GET['id'];
    $result = mysqli_query($conn, $query)->fetch_row();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Medición</title>
</head>
<body>
    <form action="editar_medicion_bdd.php?id=<?php echo $_GET['id']; ?>&pozo=<?php echo $_GET['pozo']; ?>&id_pozo=<?php echo $_GET['id_pozo']; ?>" method="post">
        <label for="nombre">Fecha:</label>
        <input type="datetime-local" value="<?php echo $result[2] ?>" name="fecha" required>

        <label for="psi">Medición en PSI:</label>
        <input type="number" name="psi" id="psi" step="0.01" value="<?php echo $result[1] ?>" required>

        <button type="submit">Editar</button>
    </form>
</body>
</html>