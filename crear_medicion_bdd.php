<?php
    include('bdd.php');
    $query = "INSERT INTO medida(fecha,psi,pozo) VALUES(
        '" . $_POST["fecha"] ."',
        '" . $_POST["psi"] . "',
        " .  $_POST['id_pozo'] . "
    )";
    $result = mysqli_query($conn, $query);

    header('Location: ver_mediciones.php?id_pozo=' . $_POST['id_pozo'] . "&pozo=" . $_POST['pozo']);
?>