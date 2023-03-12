<?php
    include('bdd.php');
    $query = "SELECT fecha,psi FROM medida WHERE pozo = " . 2 . " ORDER BY fecha;";
    $result = mysqli_query($conn, $query);

    $acc = [];

    while($row = mysqli_fetch_array($result)){
        $acc[$row['fecha']] = $row['psi'];
    }

    echo json_encode($acc);
?>