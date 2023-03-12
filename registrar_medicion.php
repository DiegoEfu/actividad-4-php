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
</head>
<body>
    <form action="crear_medicion_bdd.php" method="post">
        <input type="hidden" name="id_pozo" value="<?php echo $_GET['id']; ?>">
        <input type="hidden" name="pozo" value="<?php echo $_GET['pozo']; ?>">
        <label for="nombre">Fecha:</label>
        <input type="datetime-local" name="fecha" required>

        <label for="psi">Medición en PSI:</label>
        <input type="number" name="psi" id="psi" step="0.01" required>

        <button type="submit">Crear</button>
    </form>
</body>
</html>