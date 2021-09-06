<?php


$enlace = new mysqli ("localhost", "cultivoiot", "235689ciotDESA","mundo_fungi");
$hoy = date("Y-m-d H:m:s");
$ayer = date("Y-m-d H:m:s", strtotime('-1 day'));

$SQLT="SELECT `FECHA`,`TEMP`  FROM `temperatura` WHERE `FECHA` BETWEEN '$ayer' AND CURRENT_TIMESTAMP";
#$SQLH="SELECT `FECHA`,`HUME`  FROM `humedad` WHERE `FECHA` BETWEEN '$ayer' AND CURRENT_TIMESTAMP";
#$SQLC="SELECT `FECHA`,`CO2`  FROM `co2` WHERE `FECHA` BETWEEN '$ayer' AND CURRENT_TIMESTAMP";


$resultado = $enlace->query($SQLT);
$TvD = array();


while ($row = $resultado->fetch_object()){
		$TvD[]=$row;
	}

$enlace->close();

echo json_encode($HvD);

?>