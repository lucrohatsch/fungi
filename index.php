<?php
session_start();

	if(!isset($_SESSION["usr_fungi"])){
		header("location:login.html");
	}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fungi 0.2</title>
    <link rel="icon" type="image/png" href="static/img/favicon.png">
    <script src="static/js/fuente.js"></script>
    <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
    <link rel="stylesheet" href="static/css/estilo.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
</head>

<body>
    <div class="contenedor">
        <header>
            <h1>Fungi</h1>
            <p>Sistema de control basado en cultivoIOT</p>
            <p id="usuario"> <?php $_SESSION["usr_fungi"] ?></p>
            <a id="cerrar_sesion" href="static/functions/logout.php">Cerrar Sesión </a>
        </header>
        <article class="flex-container" id="monitor">
            <h2>Monitor</h2>
            <div class="sala" id="S00">
                <h3>Sala 0</h3>
                <p>Inoculación etapa granos</p>
                <div class="caja">
                    <p>Temperatura 1</p>
                    <p class="valor TEMP">0</p>
                    <p>ºC</p>
                </div>
                <div class="caja">
                    <p>Humedad 1</p>
                    <p class="valor HUME">0</p>
                    <p>%</p>
                </div>
                <div class="caja">
                    <p>Temperatura 2</p>
                    <p class="valor TEMP">0</p>
                    <p>ºC</p>
                </div>
                <div class="caja">
                    <p>Humedad 2</p>
                    <p class="valor HUME">0</p>
                    <p>%</p>
                </div>
            </div>

            <div class="sala" id="S01">
                <h3>Sala 1</h3>
                <p>Inoculación etapa sustrato</p>
                <div class="caja">
                    <p>Temperatura 1</p>
                    <p class="valor TEMP">0</p>
                    <p>ºC</p>
                </div>
                <div class="caja">
                    <p>Humedad 1</p>
                    <p class="valor HUME">0</p>
                    <p>%</p>
                </div>
                <div class="caja">
                    <p>Temperatura 2</p>
                    <p class="valor TEMP">0</p>
                    <p>ºC</p>
                </div>
                <div class="caja">
                    <p>Humedad 2</p>
                    <p class="valor HUME">0</p>
                    <p>%</p>
                </div>
                <div class="caja">
                    <p>CO2</p>
                    <p class="valor CO2">0</p>
                    <p>ppm</p>
                </div>
            </div>
        </article>

        <article class="flex-container">
            <h2>Control</h2>
            <div class="sala">
                <h3>Sala 1</h3>
                <div class="caja">
                    <p>Ventilción</p>
                    <input id="cV" type="checkbox">
                </div>
                <div class="caja">
                    <p>Niebla</p>
                    <input id="cN" type="checkbox">
                </div>
                <div class="caja">
                    <p>Refrigeración</p>
                    <input id="cRe" type="checkbox">
                </div>
                <div class="caja">
                    <p>Calefacción</p>
                    <input id="cCa" type="checkbox">
                </div>
                <div class="caja">
                    <p>Bomba</p>
                    <input id="cB" type="checkbox">
                </div>
            </div>
            <div class="sala">
                <h3>Sala 2</h3>
                <div class="caja">
                    <p>Ventilción</p>
                    <input id="cV" type="checkbox">
                </div>
            </div>
        </article>

        <article class="flex-container contenedor-grafico">
            <h2>Gráficos</h2>
            <canvas id="graficos"></canvas><br>

        </article>

        <script src="static/js/graficos.js"></script>
    </div>
</body>

</html>