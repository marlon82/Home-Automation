<?php
include('../config.php');
include('../functions.php');

function update_geraete(){
//UPDATE geraete SET zeitEin = $timestamp WHERE id = 1"



$defaultIP = "0.0.0.0";
//$sqlbefehl = "SELECT id,ip,zeitEin FROM `devices` WHERE ip NOT like '" . $defaultIP . "'";

$sqlbefehl = "SELECT id,ip,zeitEin,zeitHeute FROM `devices` WHERE ip NOT like '" . $defaultIP . "' AND ip NOT like ''";
//SELECT id,ip,zeitEin FROM `devices` WHERE ip NOT like '0.0.0.0' AND ip NOT like ''
$sql = query($sqlbefehl);
//var_dump($sql);

while($row = fetch( $sql )){
	//var_dump($row);
	$result = ping($row['ip']);
	//var_dump($result);
	if($result){ 
		if($row['zeitEin'] == "0"){
			$sql1 = query("UPDATE devices SET zeitEin = '" . time() . "' WHERE id = '" . $row['id'] . "'");
			// update Zeit Ein heute
			
			}
	}else{ 
		if($row['zeitEin'] != "0"){
			$zeitHeute = time() - $row['zeitEin'];
			var_dump($zeitHeute);
			$sql2 = query("UPDATE devices SET zeitHeute = '". $zeitHeute . "' WHERE id = '" . $row['id'] . "'");
			$sql1 = query("UPDATE devices SET zeitEin = '0' WHERE id = '" . $row['id'] . "'");
			//update Zeit Ein heute
			
			}
	} 

}
    
}

function update_sensoren(){

	$sql = query( "SELECT id, iid FROM sensoren");
																			
	while( $row = fetch( $sql ) )
	{
		extract(ReadXS1(sensor, $row['iid']));	
		if($utime && $number && $value){																															
			$sql1 = query( "INSERT INTO logsensoren VALUES( '', '" . $number . "', '" . $value . "' , '" . $utime . "')" );	
		}									
	}
}


function update_sensoren_min(){

	$sql = query( "SELECT id, iid FROM sensoren");
																			
	while( $row = fetch( $sql ) )
	{
		extract(ReadXS1(sensor, $row['iid']));	
		if($utime && $number && $value){																															
			//$sql1 = query( "INSERT INTO logsensoren VALUES( '', '" . $number . "', '" . $value . "' , '" . $utime . "')" );
			$sql = query( "UPDATE sensoren SET value = '" . $value . "' WHERE id = '" . $row['iid'] . "'" );		
		}									
	}
}


function update_sensoren_graph_today(){

$sqlRooms = query( "SELECT id, iid FROM sensoren");

//Für jeden Sensor den Graph anlegen
while( $row = fetch( $sqlRooms )){
	$roomid = $row['iid'];
	$yAchse_reverse = array();
	$xAchse_reverse = array();
	$min_wert = 100;
	$max_wert = 0;
	$z = 0;
	//Die letzten 24 Einträge aus der DB holen
	$sqlbefehl = "SELECT * FROM `logsensoren` WHERE iid = '" . $roomid . "' order by `zeit` DESC LIMIT 0,24";
	$sql = query($sqlbefehl);

	for ($i=0; $holen = fetch($sql); $i++) {
		//Nur ins Array schreiben wenn Datum mit Heute übereinstimmt
		//if(date('Ymd') == date('Ymd', $holen['zeit'])){
		$yAchse_reverse[$z] = str_replace(",",".",$holen[value]);
		$xAchse_reverse[$z] = date("H:i", $holen[zeit]);
		
		//Min und Max Wert für die Skala festlegen
		if($min_wert > $holen[value]){
			$min_wert = $holen[value];
		}
		
		if($max_wert < $holen[value]){
			$max_wert = $holen[value];
		}
		$z++;


	}

	// Array Werte herumdrehen, neuste Werte am Anfang stehen
	$yAchse = array_reverse($yAchse_reverse);
	$xAchse = array_reverse($xAchse_reverse);

	//Anzeigebereich auf der Y-Achse erhöhen
	$min_wert = round($min_wert) - 5;
	$max_wert = round($max_wert) + 5;

	$sqlbefehl = "SELECT iname FROM `sensoren` WHERE iid = '" . $roomid . "'";
	$sql = query($sqlbefehl);
	
	while( $row = fetch( $sql ) ){
		//Filename inkl. Ordnerstruktur
		$filename = "sensor_graph/" . $row['iname'] . ".png";
	}
	
	//Bild Generieren
	//var_dump($yAchse);
	//var_dump("$xAchse\n");
	//var_dump("$min_wert\n");
	//var_dump("$max_wert\n");
	GenGraph($yAchse,$xAchse,$filename,$min_wert,$max_wert);
	}
}


switch( $_GET['func'] ){
	
	case '1min':
	update_sensoren_min();
	break;

	case '1h':
	update_sensoren();
	update_sensoren_graph_today();
	break;

	case 'genGraph':
	update_sensoren_graph_today();
	break;	
	
	case 'test':
	update_geraete();
	break;		
		
		default:
		break;
}	
		

?>