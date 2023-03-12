<?php
    include('bdd.php');
    $query = "UPDATE medida SET psi=".$_POST['psi'].", fecha='".$_POST['fecha']."' WHERE id=" . $_GET["id"];
    $result = mysqli_query($conn, $query);

    header('Location: ver_mediciones.php?id_pozo=' . $_GET['id_pozo'] . "&pozo=" . $_GET['pozo']);
?>