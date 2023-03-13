<?php
    include('bdd.php');
    $query = "UPDATE pozo SET nombre='".$_POST['nombre']."', estado='".$_POST['estado']
        ."', ubicacion='".$_POST['ubicacion']."' WHERE id=" . $_GET["id"];
    $result = mysqli_query($conn, $query);

    header('Location: index.php');
?>