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
</head>
<body>
    <form action="crear_pozo_bdd.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" maxlength="45" required>

        <label for="estado">Estado:</label>
        <select name="estado" id="estado" required>
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
        <textarea name="ubicacion" id="ubicacion" cols="30" rows="10" minlength="10"></textarea>

        <button type="submit">Crear</button>
    </form>
</body>
</html>