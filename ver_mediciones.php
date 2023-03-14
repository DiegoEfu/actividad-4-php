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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <style>
        body{
            background-image: url('img/bg.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center bg-dark text-white flex-column">
        <img src="img/pdvsa-logo.png" width="100px" alt="logo de PDVSA">
        <h3>Mediciones del Pozo "<?php echo $_GET['pozo']; ?>"</h3>
    </div>
    <canvas hidden id="grafica" width="100%" style="max-height: 30vh; min-height: 30vh;" class="bg-white m-3"></canvas>
    
    <div class="m-3 d-flex flex-end flex-column">
        <div class="w-100 d-flex justify-content-between">
            <div>
                <a href="index.php" class="btn btn-secondary">Regresar</a>
                <a class="btn btn-danger" href="registrar_medicion.php?id=<?php echo $_GET['id_pozo']; ?>&pozo=<?php echo $_GET['pozo']; ?>">Añadir Medición</a>
            </div>
            <form id="grafica_form" class="d-flex" style="max-height: 50px;">
                <div class="d-flex flex-column text-white">
                    <small>Desde:</small>
                    <input type="datetime-local" class="form-control" required id="fecha_min"> 
                </div>
                
                <div class="d-flex flex-column text-white">                
                    <small>Hasta:</small>
                    <input type="datetime-local" class="form-control" required id="fecha_max"> 
                </div>

                <button type="submit" class="btn btn-primary" style="height: 50px;">Generar Gráfica</button>
            </form>
        </div>        
        <table class="table table-hover">
            <thead class="table-dark">
                <th>No.Medida</th>
                <th>Fecha</th>
                <th>PSI</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </thead>
            <tbody class="table-light">
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
                            <a href="editar_medicion.php?id=<?php echo $row['id']; ?>&pozo=<?php echo $_GET['pozo']; ?>&id_pozo=<?php echo $_GET['id_pozo']; ?>" class="btn btn-outline-danger">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a href="eliminar_medicion.php?id=<?php echo $row['id']; ?>&pozo=<?php echo $_GET['pozo']; ?>&id_pozo=<?php echo $_GET['id_pozo']; ?>" class="btn btn-outline-danger">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
        let chart = null;
        $('#grafica_form').submit((e) => {
            e.preventDefault();
            let canvas = document.getElementById('grafica').getContext('2d');
            let datosGrafica = undefined;

            $.ajax({
                url: `datos_grafica.php?id=<?php echo $_GET['id_pozo']; ?>&fecha_max=${$('#fecha_max').val()}&fecha_min=${$('#fecha_min').val()}`,
                method: "GET",
                async: false,
                success: function(data){
                    console.log(data);
                    datosGrafica = JSON.parse(data);
                },
                error: function(error){
                    console.log(error);
                }
            });

            $('#grafica').removeAttr('hidden');
            if(chart)
                chart.destroy();

            chart = new Chart(canvas, {
                type: 'bar',
                data: {
                    datasets: [
                        {
                            data: Object.values(datosGrafica),
                            backgroundColor: ['#F00',]
                        }
                    ],
                    labels: Object.keys(datosGrafica)
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Medidas del Pozo "<?php echo $_GET['pozo']; ?>"',
                            position: 'top'
                        },
                        legend: {
                            display: false
                        }
                    }        
                }
            });
        });
    </script>
</body>
</html>