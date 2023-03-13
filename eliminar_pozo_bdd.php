<?php
    include('bdd.php');
    $query = "DELETE FROM pozo WHERE id=" . $_POST["id"];
    $result = mysqli_query($conn, $query);

    header('Location: index.php');
?>