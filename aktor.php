<?php

include('functions.php');
include('config.php');

if( $_GET['id']){
	//$aktor = set_channel( $_GET['kanal']);
	echo "aktor";
	
	$Function = $_GET['function'];
	$sql_aktor = query( "SELECT name,iid,id,room,type FROM aktor where iid='" . $_GET['id'] ."'" );
	$aktor = fetch( $sql_aktor );
	$sql_Type = query( "SELECT devtypename FROM deviceTypes where id='" . $aktor['type'] ."'" );
	$type = fetch( $sql_Type );
	$sqlroom = query( "SELECT * FROM rooms WHERE id = '" . $aktor['room'] . "'" );
	$room = fetch( $sqlroom );
	$sqllog = query( "INSERT INTO log VALUES('','" . date("Y-m-d") . "','" . date("H:i:s") . "','aktor.php','','call','aufruf setAktor mit " . $aktor['name'] . " " . $room['name'] . " (ID:" .  $aktor['id'] . ", IID:" .  $aktor['iid'] . ", Type:" .  $type['devtypename'] . ") value: " . $_GET['value'] . " function:" .  $Function . "')");
	
	$aktor = setAktor($aktor['iid'], $_GET['value'],  $_GET['function']);
}

if( $_GET['group']){
	$sql_groupaktor = query( "SELECT id,aktorID,aktorValue,deviceID,macroID FROM groupaktor WHERE groupID='" . $_GET['group'] ."'" );
		
	while( $groupaktor = fetch( $sql_groupaktor ) ){
			
		//aktoren
		if ($groupaktor['aktorID'] != '0'){
			$sql_aktor = query( "SELECT iid,id,name,room,type FROM aktor where id='" . $groupaktor['aktorID'] ."'" );
			$aktor = fetch( $sql_aktor );
			$sql_Type = query( "SELECT devtypename FROM deviceTypes where id='" . $groupaktor['type'] ."'" );
			$type = fetch( $sql_Type );
			$sqlroom = query( "SELECT * FROM rooms WHERE id = '" . $aktor['room'] . "'" );
			$room = fetch( $sqlroom );
			$Function = $_GET['function'];
			//echo "		schalte aktor";
			$sqllog = query( "INSERT INTO log VALUES('','" . date("Y-m-d") . "','" . date("H:i:s") . "','aktor.php','','call','aufruf setAktor " . $aktor['name'] . " " . $room['name'] . " (ID:" .  $aktor['id'] . ", IID:" .  $aktor['iid'] . ", Type:" .  $type['devtypename'] . ") value: " . $groupaktor['aktorValue'] . " function:" .  $_GET['function'] . "')");
			$aktor = setAktor($aktor['iid'], $groupaktor['aktorValue'],  $Function);
			usleep(800000);		
		}
		
		//geraete
		if ($groupaktor['deviceID'] != '0'){
			$sql_device = query( "SELECT id,ip,type,name,room FROM devices where id='" . $groupaktor['deviceID'] ."'" );
			$device = fetch( $sql_device );
			$sql_macro = query( "SELECT value FROM tvmacros where id='" . $groupaktor['macroID'] ."'" );
			$macro = fetch( $sql_macro );
			$sqlroom = query( "SELECT * FROM rooms WHERE id = '" . $device['room'] . "'" );
			$room = fetch( $sqlroom );
			
			//echo "		schalte geraet";
			switch($device['type']){
				case 'samsungtv':
					//echo "		schalte aktor";
					$sqllog = query( "INSERT INTO log VALUES('','" . date("Y-m-d") . "','" . date("H:i:s") . "','aktor.php','','call','aufruf samsung_send_key " . $device['name'] . " " . $room['name'] . " (ID:" .  $device['id'] . ", Type:" .  $device['type'] . ") value: " . $macro['value'] . "')");
					samsung_send_key($device['ip'], $macro['value']);
					break;		
				case 'samsungbluray':
					$sqllog = query( "INSERT INTO log VALUES('','" . date("Y-m-d") . "','" . date("H:i:s") . "','aktor.php','','call','aufruf samsung_send_key " . $device['name'] . " " . $room['name'] . " (ID:" .  $device['id'] . ", Type:" .  $device['type'] . ") value: " . $macro['value'] . "')");
					samsung_send_key($device['ip'], $macro['value']);
					break;						
				case 'onkyoavrec':
					$sqllog = query( "INSERT INTO log VALUES('','" . date("Y-m-d") . "','" . date("H:i:s") . "','aktor.php','','call','aufruf Onkyo_send_key " . $device['name'] . " " . $room['name'] . " (ID:" .  $device['id'] . ", Type:" .  $device['type'] . ") value: " . $macro['value'] . "')");
					Onkyo_send_key($device['ip'], $macro['value']);
					break;				
				case 'enigma2':
					$sqllog = query( "INSERT INTO log VALUES('','" . date("Y-m-d") . "','" . date("H:i:s") . "','aktor.php','','call','aufruf enigma2_send_key " . $device['name'] . " " . $room['name'] . " (ID:" .  $device['id'] . ", Type:" .  $device['type'] . ") value: " . $macro['value'] . "')");
					enigma2_send_key($device['ip'], $macro['value']);
					break;
			}
			usleep(700000);	
		}
	}
}
?>