<?php
$enlace = new mysqli ("localhost", "cultivoiot", "235689ciotDESA","mundo_fungi");
$hoy = date("Y-m-d H:i:s");
$ayer = date("Y-m-d H:i:s", strtotime('-1 day'));


$SQLG="SELECT temperatura.FECHA, temperatura.TEMP, humedad.HUME FROM temperatura INNER JOIN humedad ON temperatura.FECHA = humedad.FECHA WHERE temperatura.FECHA BETWEEN '$ayer' AND '$hoy' AND temperatura.LOTE = 'girgola02' AND humedad.LOTE = 'girgola02'";

//printf($SQLG);

$resultado = $enlace->query($SQLG);
$THvD = array();


while ($row = $resultado->fetch_object()){
		$THvD[]=$row;
	}

$enlace->close();

echo json_encode($THvD);

?>
