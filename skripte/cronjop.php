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

function timer(){

	$sql = query( "SELECT id,name,aktor,value,hour,minute,enabled,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday,isGroup,SensorID,SensorValue FROM timer ORDER BY  `timer`.`id` ASC ");
																			
	while( $timer = fetch( $sql ) )
	{	//nur wenn timer aktiv
		if ($timer['enabled'] == 'Yes') {
			$today = getdate();
			switch ($today['weekday']) {
				case 'Monday':
					if ($timer['Monday'] == 'Yes') { $start = True; }
					break;
				case 'Tuesday':
					if ($timer['Tuesday'] == 'Yes') { $start = True; }
					break;
				case 'Wednesday':
					if ($timer['Wednesday'] == 'Yes') { $start = True; }
					break;
				case 'Thursday':
					if ($timer['Thursday'] == 'Yes') { $start = True; }
					break;
				case 'Friday':
					if ($timer['Friday'] == 'Yes') { $start = True; }
					break;
				case 'Saturday':
					if ($timer['Saturday'] == 'Yes') { $start = True; }
					break;
				case 'Sunday':
					if ($timer['Sunday'] == 'Yes') { $start = True; }
					break;
			}
			if ($timer['isGroup'] == 'Yes') {
			//Gruppen
				$sqlg = query( "SELECT id,aktorID,deviceID,groupID,aktorValue FROM groupaktor WHERE groupID = '" . $timer['aktor'] . "'");
				while( $group = fetch( $sqlg ) )
					{
					if ($timer['SensorID'] != '')
					{
						echo "Timer:" . $timer['name'];
						extract(ReadXS1(sensor, $timer['SensorID']));
						if($utime && $number && $value){
							$SensVal = $value;
							echo "   Sensor Aktuell: " . $SensVal . "\n";
							if (strpos($timer['SensorValue'], '>') !== FALSE)
							{	//Sensor Wert großer
								list($SensorSign, $SensorValue) = explode('>', $timer['SensorValue']);
								echo "   nur schalten wenn Sensor groesser gleich " . $SensorValue . "\n";
								if ( $SensVal >= $SensorValue ){ 
									echo "   --> schalten\n";
									$SensorStart = True;
								}else{
									echo "   --> NICHT schalten\n";
									$SensorStart = False;
								}
							}else{
								//Sensor Wert Kleiner
								list($SensorSign, $SensorValue) = explode('<', $timer['SensorValue']);
								echo "   nur schalten wenn Sensor kleiner gleich " . $SensorValue . "\n";
								if ( $SensVal <= $SensorValue ){ 
									echo "   --> schalten\n";
									$SensorStart = True;
								}else{ 
									echo "   --> NICHT schalten\n";
									$SensorStart = False;
								}
							}
						}
					}else{
						$SensorStart = True;
					}
					$sqlAktFunc = query( "SELECT * FROM aktor WHERE id = '" . $timer['aktor'] . "'");
					$AktorFunction = fetch( $sqlAktFunc );
					
					$Function == '';
					if ($AktorFunction['func1'] == $group['aktorValue']) {
						$Function = 1;
					}elseif ($AktorFunction['func2'] == $group['aktorValue']) {
						$Function = 2;
					}elseif ($AktorFunction['func3'] == $group['aktorValue']) {
						$Function = 3;
					}elseif ($AktorFunction['func4'] == $group['aktorValue']) {
						$Function = 4;
					}
					
					//echo $start . $today['weekday'];
					if ((($today['hours'] == $timer['hour']) && ($today['minutes'] == $timer['minute']) && ($start)) && ($SensorStart)) {
						$sqla = query( "SELECT iid,id,name,room FROM aktor WHERE id = '" . $group['aktorID'] . "'" );
						$aktor = fetch( $sqla );
						$sqlroom = query( "SELECT * FROM rooms WHERE id = '" . $aktor['room'] . "'" );
						$room = fetch( $sqlroom );
						//echo "start   iid:" . $aktor['iid'];
						$sqllog = query( "INSERT INTO log VALUES('','" . date("Y-m-d") . "','" . date("H:i:s") . "','cronjob.php','timer','call','aufruf setAktor mit " . $aktor['name'] . " " . $room['name'] . " (ID:" .  $aktor['id'] . ", IID:" .  $aktor['iid'] . ") value: " . $group['aktorValue'] . " function:" .  $Function . "')");
						setAktor($aktor['iid'], $group['aktorValue'], $Function);
					}else {
						//echo 'stop';
					}
				}
			}else{
			//Aktoren
				if ($timer['SensorID'] != '')
				{
					echo "Timer:" . $timer['name'];
					extract(ReadXS1(sensor, $timer['SensorID']));
					if($utime && $number && $value){
						$SensVal = $value;
						echo "   Sensor Aktuell: " . $SensVal . "\n";
						if (strpos($timer['SensorValue'], '>') !== FALSE)
						{	//Sensor Wert großer
							list($SensorSign, $SensorValue) = explode('>', $timer['SensorValue']);
							echo "   nur schalten wenn Sensor groesser gleich " . $SensorValue . "\n";
							if ( $SensVal >= $SensorValue ){ 
								echo "   --> schalten\n";
								$SensorStart = True;
							}else{
								echo "   --> NICHT schalten\n";
								$SensorStart = False;
							}
						}else{
							//Sensor Wert Kleiner
							list($SensorSign, $SensorValue) = explode('<', $timer['SensorValue']);
							echo "   nur schalten wenn Sensor kleiner gleich " . $SensorValue . "\n";
							if ( $SensVal <= $SensorValue ){ 
								echo "   --> schalten\n";
								$SensorStart = True;
							}else{ 
								echo "   --> NICHT schalten\n";
								$SensorStart = False;
							}
						}
					}
				}else{
					$SensorStart = True;
				}
				$Function == '';
				if ($AktorFunction['func1'] == $timer['value']) {
					$Function = 1;
				}elseif ($AktorFunction['func2'] == $timer['value']) {
					$Function = 2;
				}elseif ($AktorFunction['func3'] == $timer['value']) {
					$Function = 3;
				}elseif ($AktorFunction['func4'] == $timer['value']) {
					$Function = 4;
				}
				if ((($today['hours'] == $timer['hour']) && ($today['minutes'] == $timer['minute']) && ($start)) && ($SensorStart)) {
					$sqla = query( "SELECT iid,id,name,room FROM aktor WHERE id = '" . $timer['aktor'] . "'" );
					$aktor = fetch( $sqla );
					$sqlroom = query( "SELECT * FROM rooms WHERE id = '" . $aktor['room'] . "'" );
					$room = fetch( $sqlroom );
					//echo "start   iid:" . $aktor['iid'];
					$sqllog = query( "INSERT INTO log VALUES('','" . date("Y-m-d") . "','" . date("H:i:s") . "','cronjob.php','timer','call','aufruf setAktor mit " . $aktor['name'] . " " . $room['name'] . " (ID:" .  $aktor['id'] . ") value: " . $time['value'] . " function:" .  $Function . "')");
					setAktor($aktor['iid'], $timer['value'], $Function);
				}else {
					//echo 'stop';
				}
			}
		}	
	}
}

function calculate_sun_rise_set(){
	$tzone = date_default_timezone_get();
	if ($tzone == '') { $tzone = 'Europe/Berlin'; }
	$tz = new DateTimeZone($tzone); 
    $loc = $tz->getLocation(); 
	$sun_info = date_sun_info(time(), $loc['latitude'], $loc['longitude']);
	//returns sunrise, sunset, ... 
	//echo "Sunrise: " . date("H:i:s", $sun_info['sunrise']) . "\n";
	//echo "Sunset: " . date("H:i:s", $sun_info['sunset']) . "\n";
	
	//update sunrise
	$sql = query( "SELECT id,suninfo,name FROM timer WHERE suninfo='sunset' OR suninfo='sunrise'");
	while( $row = fetch( $sql ) )
	{
		//echo $row['suninfo'] . $row['name'] ;
		if ( $row['suninfo'] == 'sunrise') { $sqlset = query( "UPDATE timer SET time = '" . date("H:i", $sun_info['sunrise']) . "', hour ='" . date("H", $sun_info['sunrise']) . "', minute ='" . date("i", $sun_info['sunrise']) . "' WHERE id = '" . $row['id'] . "'" ); }
		if ( $row['suninfo'] == 'sunset') { $sqlset = query( "UPDATE timer SET time = '" . date("H:i", $sun_info['sunset']) . "', hour ='" . date("H", $sun_info['sunset']) . "', minute ='" . date("i", $sun_info['sunset']) . "' WHERE id = '" . $row['id'] . "'" ); }
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

	$sql = query( "SELECT id, iid, hcType FROM sensoren");
																			
	while( $row = fetch( $sql ) )
	{
		extract(ReadXS1(sensor, $row['iid']));	
		if($utime && $number && $value){																						
			$sql1 = query( "UPDATE sensoren SET value = '" . $value . "' WHERE id = '" . $row['iid'] . "'" );		
		}									
	}
}

function update_energie_sensoren_5min(){

	$sql = query( "SELECT id, iid, hcType FROM sensoren");
																			
	while( $row = fetch( $sql ) )
	{
		if (($row['hcType'] == 'energiezaehler') || ($row['hcType'] == 'zaehler')) {
			extract(ReadXS1(sensor, $row['iid']));	
			if($utime && $number && $value){																						
				$sql1 = query( "INSERT INTO logsensoren VALUES( '', '" . $number . "', '" . $value . "' , '" . $utime . "')" );	
			}
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
		if($min_wert > str_replace(",",".",$holen[value])){
			$min_wert = str_replace(",",".",$holen[value]);
		}
		
		if($max_wert < str_replace(",",".",$holen[value])){
			$max_wert = str_replace(",",".",$holen[value]);
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
		$filename = "../sensor_graph/" . $row['iname'] . "_day.png";
	}
	
	//Bild Generieren
	//var_dump($yAchse);
	//var_dump("$xAchse\n");
	//var_dump("$min_wert\n");
	//var_dump("$max_wert\n");
	GenGraph($yAchse,$xAchse,$filename,$min_wert,$max_wert);
	}
}

function update_sensoren_graph_week(){

$sqlRooms = query( "SELECT id, iid FROM sensoren");

//Für jeden Sensor den Graph anlegen
while( $row = fetch( $sqlRooms )){
	$roomid = $row['iid'];
	$yAchse_reverse = array();
	$xAchse_reverse = array();
	$min_wert = 100;
	$max_wert = 0;
	$z = 0;
	//Die letzten 168 Einträge aus der DB holen
	$sqlbefehl = "SELECT * FROM `logsensoren` WHERE iid = '" . $roomid . "' order by `zeit` DESC LIMIT 0,168";
	$sql = query($sqlbefehl);

	for ($i=0; $holen = fetch($sql); $i++) {
		$yAchse_reverse[$z] = str_replace(",",".",$holen[value]);
		$xAchse_reverse[$z] = date("d.m", $holen[zeit]);
		
		//Min und Max Wert für die Skala festlegen
		if($min_wert > str_replace(",",".",$holen[value])){
			$min_wert = str_replace(",",".",$holen[value]);
		}
		
		if($max_wert < str_replace(",",".",$holen[value])){
			$max_wert = str_replace(",",".",$holen[value]);
		}
		$z++;


	}

		
	//var_dump($xAchse_reverse);
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
		$filename = "../sensor_graph/" . $row['iname'] . "_week.png";
	}
	//Bild Generieren
	GenGraph($yAchse,$xAchse,$filename,$min_wert,$max_wert);
	}
}

function update_sensoren_graph_month(){

$sqlRooms = query( "SELECT id, iid FROM sensoren");

//Für jeden Sensor den Graph anlegen
while( $row = fetch( $sqlRooms )){
	$roomid = $row['iid'];
	$yAchse_reverse = array();
	$xAchse_reverse = array();
	$min_wert = 100;
	$max_wert = 0;
	$z = 0;
	//Die letzten 168 Einträge aus der DB holen
	$sqlbefehl = "SELECT * FROM `logsensoren` WHERE iid = '" . $roomid . "' order by `zeit` DESC LIMIT 0,744";
	$sql = query($sqlbefehl);

	for ($i=0; $holen = fetch($sql); $i++) {
		//Nur ins Array schreiben wenn Datum mit Heute übereinstimmt
		//if(date('Ymd') == date('Ymd', $holen['zeit'])){
		$yAchse_reverse[$z] = str_replace(",",".",$holen[value]);
		$xAchse_reverse[$z] = date("d.m", $holen[zeit]);
		
		//Min und Max Wert für die Skala festlegen
		if($min_wert > str_replace(",",".",$holen[value])){
			$min_wert = str_replace(",",".",$holen[value]);
		}
		
		if($max_wert < str_replace(",",".",$holen[value])){
			$max_wert = str_replace(",",".",$holen[value]);
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
		$filename = "../sensor_graph/" . $row['iname'] . "_month.png";
	}
	//Bild Generieren
	GenGraph($yAchse,$xAchse,$filename,$min_wert,$max_wert);
	}
}

function calculate_strom(){
global $verbrauch;

		$tag = date("d");
		$monat = date("m");
		$jahr = date("Y");
					
		$timestamp_gestern = mktime(0, 0, 0, $monat, $tag -1, $jahr);
    
		$sql = query( "SELECT iid, zeitEin, zeitHeute FROM aktor" );
		while( $row = fetch( $sql ) )
		{
			$deltaZeit = 0;
			$zeitHeute = 0;

			// Wenn der Aktor ein ist 
			// zeitEin auf jetzt (Mitternacht) setzen damit die Stromverbrauchberechnug (für den nächsten Tag) stimmt			
			if( $row['zeitEin'] > 0 )
			{
				// $deltaZeit = Zeit die der Aktor bis jetz (Mitternacht) ein war
				$deltaZeit = time() - $row['zeitEin'];
				
				$sql2 = query("UPDATE aktor SET zeitEIN = '" . time() . "' WHERE iid = '" . $row['iid'] . "'");
			}

			// zeitHeute brechnen
			$zeitHeute = $deltaZeit + $row['zeitHeute'];
				
			rechneVerbrauchHeute($row['iid'],"aktor", $zeitHeute);
			$verbrauchAktoren = $verbrauchAktoren + $verbrauch['kwh'];
		
			$sql3 = query("INSERT INTO logVerbrauch VALUES( '', '" . $row['iid'] . "', '" . $verbrauch['kwh'] . "', '" . "aktor" . "', '" . $row['zeitEin'] . "', '" . $timestamp_gestern . "')");
		}
		
		//$verbrauchAktoren = $verbrauchGesamt;
		
		
		$sql = query( "SELECT id, zeitEin, zeitHeute FROM devices" );
		while( $row = fetch( $sql ) )
		{
			$deltaZeit = 0;
			$zeitHeute = 0;

			// Wenn der Aktor ein ist 
			// zeitEin auf jetzt (Mitternacht) setzen damit die Stromverbrauchberechnug (für den nächsten Tag) stimmt			
			if( $row['zeitEin'] > 0 )
			{
				// $deltaZeit = Zeit die der Aktor bis jetz (Mitternacht) ein war
				$deltaZeit = time() - $row['zeitEin'];
				
				$sql2 = query("UPDATE devices SET zeitEIN = '" . time() . "' WHERE id = '" . $row['id'] . "'");
			}

			// zeitHeute brechnen
			$zeitHeute = $deltaZeit + $row['zeitHeute'];
				
			rechneVerbrauchHeute($row['id'],"devices", $zeitHeute);
			$verbrauchDevices = $verbrauchDevices + $verbrauch['kwh'];
		
			$sql3 = query("INSERT INTO logVerbrauch VALUES( '', '" . $row['id'] . "', '" . $verbrauch['kwh'] . "', '" . "device" . "', '" . $row['zeitEin'] . "', '" . $timestamp_gestern . "')");
		}
		
		$verbrauchAktoren = $verbrauchGesamt;		
		

		
		// Bei allen Aktoren die heutige Zeit auf 0 setzen
		$sql = query("UPDATE aktor SET zeitHeute = '0'");
		$sql = query("UPDATE devices SET zeitHeute = '0'");



}

switch( $_GET['func'] ){
	
	case '1min':
		update_sensoren_min();
		timer();
		break;
	
	case '5min':
		update_geraete();
		update_energie_sensoren_5min;
		break;

	case 'timer':
		timer();
		break;

	case '1h':
		update_sensoren();
		update_sensoren_graph_today();
		update_sensoren_graph_week();
		update_sensoren_graph_month();
		break;

	case 'genGraphDay':
		update_sensoren_graph_today();
		break;

	case 'genGraphWeek':
		update_sensoren_graph_week();
		break;

	case 'genGraphMonth':
		update_sensoren_graph_month();
		break;
	
	case 'midnight':
		calculate_sun_rise_set();
		calculate_strom();
		break;
	
	case 'test':
		update_geraete();
		break;
	
	case 'backup':
		backup_tables($_GET['table']);
		break;
		
		default:
		break;
}	
		

?>