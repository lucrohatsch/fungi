<?php

	/*
	$request = '[{"data": {"HUME": "69.97", "TEMP": "17.79"}, "SALA": "S00", "LOTE": "girgola01"}, {"data": {"HUME": "68.52", "TEMP": "18.27"}, "SALA": "S00", "LOTE": "girgola01"}]';
	*/
	$request = json_decode(file_get_contents('php://input', true));

	$primero = json_decode($request, true);
	$UA = date("Y-m-d H:i:s");
	echo "la fecha de los registros es $UA \n";
	$enlace = new mysqli ("localhost", "cultivoiot", "235689ciotDESA","mundo_fungi");
	$cantidad_lotes = count($primero);

	for ($i=0; $i<$cantidad_lotes; $i++){
		$cantidad_medidas = count($primero[$i]['data']);
		$LOTE = $primero[$i]['LOTE'];
		$SALA = $primero[$i]['SALA'];
		for($e=0; $e<$cantidad_medidas; $e++){
			$medidas = array_keys($primero[$i]['data']);
			$medida = $medidas[$e];
			echo "En esta bucle la etiqueta es $medida \n";
			if ($medida =='TEMP'){
				echo "SQL para guardar la  variable TEMP = $medidas[$e]---\n ";
				$TEMP = $primero[$i]['data']['TEMP'];
				$SQLt = "INSERT INTO `temperatura` (`ID`,`SALA`,`LOTE`,`FECHA`,`TEMP`) VALUES (NULL,'$SALA', '$LOTE', '$UA','$TEMP')";
				insertar($SQLt);
			}
			elseif ($medida=='HUME') {
				echo "SQL para guardar la  variablo HUME $medidas[$e]------\n";
				$HUME = $primero[$i]['data']['HUME'];
				$SQLh = "INSERT INTO `humedad` (`ID`,`SALA`,`LOTE`,`FECHA`,`HUME`) VALUES (NULL,'$SALA', '$LOTE', '$UA','$HUME')";
				insertar($SQLh);
			}
			elseif ($medida=='CO2') {
				echo "SQL para guardar la  variablo CO2 $medidas[$e]------\n";
				$CO2 = $primero[$i]['data']['CO2'];
				$SQLc = "INSERT INTO `co2` (`ID`,`SALA`,`LOTE`,`FECHA`,`CO2`) VALUES (NULL,'$SALA', '$LOTE', '$UA','$CO2')";
				insertar($SQLc);
			}
			else {echo "No se ejecuta ningun registro\n";}

		}
	}

function insertar($SQL){

	$escribe = $enlace->query($SQL);
	if (!$escribe) {
		printf("Se enviò el query: $SQL");
		printf("Errormessage: %s\n", $enlace->error);}
	else {echo "Registro insertado correctamente\n";}	

$enlace->close();
/*
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
*/

 ?>