<?php

    include('bdd.php');
    $query = "INSERT INTO pozo(nombre,ubicacion,estado) VALUES(
        '" . $_POST["nombre"] ."',
        '" . $_POST["ubicacion"] . "',
        " . $_POST["estado"] . "         
    )";
    $result = mysqli_query($conn, $query);

    header('Location: index.php');
?>