<?php

    include('bdd.php');
    $query = "INSERT INTO pozo(nombre,ubicacion,estado,creado_por) VALUES(
        '" . $_POST["nombre"] ."',
        '" . $_POST["ubicacion"] . "',
        " . $_POST["estado"] . ",
        " . "1" . "
    )";
    $result = mysqli_query($conn, $query);

    header('Location: index.php');
?>