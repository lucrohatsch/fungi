<?php 
	$data = json_decode(file_get_contents('php://input'));
//	$USR = $data->USR;
	$LOT = "001TEST";
	$TEMP = $data->T;
	$HUME = $data->H;
	$CO2 = $data->C;
	$UA = date("Y-m-d H:i:s");

$SQLt = "INSERT INTO `temperatura` (`ID`,`LOTE`,`FECHA`,`TEMP`) VALUES (NULL,'$LOT', '$UA','$TEMP')";
$SQLh = "INSERT INTO `humedad` (`ID`,`LOTE`,`FECHA`,`HUME`) VALUES (NULL,'$LOT', '$UA','$HUME')";
$SQLc = "INSERT INTO `co2` (`ID`,`LOTE`,`FECHA`,`CO2`) VALUES (NULL,'$LOT', '$UA','$CO2')";
//Conexión a BBDD

$enlace = new mysqli ("localhost", "cultivoiot", "235689ciotDESA","mundo_fungi");

$escribet = $enlace->query($SQLt);
sleep(0.1);
$escribeh = $enlace->query($SQLh);
sleep(0.1);
$escribec = $enlace->query($SQLc);


//Verificacion de escritura

if (!$escribet) {
    printf("Errormessage: %s\n", $enlace->error);
}
if (!$escribeh) {
    printf("Errormessage: %s\n", $enlace->error);
}
if (!$escribec) {
    printf("Errormessage: %s\n", $enlace->error);
}

// Cierre BBDD

$enlace->close();


 ?>