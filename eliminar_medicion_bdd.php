<?php
    include('bdd.php');
    $query = "DELETE FROM medida WHERE id=" . $_POST["id"];
    $result = mysqli_query($conn, $query);

    header('Location: ver_mediciones.php?id_pozo=' . $_GET['id_pozo'] . "&pozo=" . $_GET['pozo']);
?>