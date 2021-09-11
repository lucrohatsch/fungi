<?php
$enlace = new mysqli ("localhost", "cultivoiot", "235689ciotDESA","mundo_fungi");
$hoy = date("Y-m-d H:m:s");
$ayer = date("Y-m-d H:m:s", strtotime('-1 day'));


$SQLG="SELECT temperatura.FECHA, temperatura.TEMP, humedad.HUME, co2.CO2 FROM temperatura INNER JOIN humedad ON temperatura.FECHA = humedad.FECHA INNER JOIN co2 ON temperatura.FECHA = co2.FECHA WHERE temperatura.FECHA BETWEEN '$ayer' AND CURRENT_TIMESTAMP";

$resultado = $enlace->query($SQLG);
$THvD = array();


while ($row = $resultado->fetch_object()){
		$THvD[]=$row;
	}

$enlace->close();

echo json_encode($THvD);

?>
