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
</head>
<body>
    <form action="editar_pozo_bdd.php?id=<?php echo $_GET['id']; ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" maxlength="45" value="<?php echo $result[1] ?>" required>

        <label for="estado">Estado:</label>
        <select name="estado" value="<?php echo $result[4] ?>" id="estado" required>
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
        <textarea name="ubicacion" id="ubicacion" cols="30" rows="10" minlength="10"><?php echo $result[2] ?>
        </textarea>

        <button type="submit">Editar</button>
    </form>
</body>
</html>