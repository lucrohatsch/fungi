<?php

	/*
	$request = '[{"data": {"HUME": "69.97", "TEMP": "17.79"}, "SALA": "S00", "LOTE": "girgola01"}, {"data": {"HUME": "68.52", "TEMP": "18.27"}, "SALA": "S00", "LOTE": "girgola01"}]';
	*/
	$request = json_decode(file_get_contents('php://input', true));

	$primero = json_decode($request, true);


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
			}
			elseif ($medidas=='HUME') {
				echo "SQL para guardar la  variablo HUME $medidas[$e]------\n";
			}
			elseif ($medidas=='CO2') {
				echo "SQL para guardar la  variablo CO2 $medidas[$e]------\n";
			}
			else {echo "No se ejecuta ninun registro\n";}
		}
	}
/*
	$TEMP = $data->TEMP;
	$HUME = $data->HUME;
	$CO2 = $data->CO2;
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
*/

 ?>