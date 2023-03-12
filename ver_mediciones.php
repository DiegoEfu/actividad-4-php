<!--
    Consulta de Mediciones
-->

<?php
    include('bdd.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Mediciones</title>
    <script
  src="https://code.jquery.com/jquery-3.6.4.js"
  integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<h3>Medidas del Pozo "<?php echo $_GET['pozo']; ?>"</h3>
    <a href="index.php">Devolverse</a>
    <canvas id="grafica" width="100%" style="max-height: 30vh;"></canvas>
    <table border="2">
        <thead>
            <th>No.Medida</th>
            <th>Fecha</th>
            <th>PSI</th>
            <th>Registrada Por</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </thead>
        <tbody>
        <?php
                    
            $query = "SELECT * FROM medida WHERE pozo = " . $_GET['id_pozo'] . " ORDER BY -fecha;";
            $result = mysqli_query($conn, $query);
    
            while($row = mysqli_fetch_array($result)){?>
                <tr>
                    <td>
                        <?php                                
                            echo $row['id'];                                
                        ?>
                    </td>
                    <td>
                        <?php                                
                            echo $row['fecha'];                             
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $row['psi'];
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $row['creado_por'];
                        ?>
                    </td>
                    <td>
                        <a href="" class="btn btn-outline-primary">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a href="" class="btn btn-outline-primary">
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <script>
        $(document).ready(() => {
            let canvas = document.getElementById('grafica').getContext('2d');
            let datosGrafica = undefined;

            $.ajax({
                url: 'datos_grafica.php',
                method: "GET",
                async: false,
                success: function(data){
                    datosGrafica = JSON.parse(data);
                },
                error: function(error){
                    console.log(error);
                }
            });

            console.log(Object.keys(datosGrafica));

            let myChart = new Chart(canvas, {
                type: 'bar',
                data: {
                    datasets: [
                        {
                            data: Object.values(datosGrafica),
                            backgroundColor: ['#00F',]
                        }
                    ],
                    labels: Object.keys(datosGrafica)
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Medidas del Pozo',
                            position: 'top'
                        },
                        legend: {
                            display: false
                        }
                    }        
                }
            })
        });
    </script>
</body>
</html>