<?php
    include('bdd.php');
    $query = "SELECT fecha,psi FROM medida WHERE fecha >= '" . $_GET['fecha_min'] . "' AND fecha <= '" . $_GET['fecha_max'] . "' AND pozo = " . $_GET['id'] . " ORDER BY fecha ;";
    $result = mysqli_query($conn, $query);

    $acc = [];

    while($row = mysqli_fetch_array($result)){
        $acc[$row['fecha']] = $row['psi'];
    }

    echo json_encode($acc);
?>