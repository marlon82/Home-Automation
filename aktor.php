<?php

include('functions.php');
include('config.php');

if( $_GET['id']){
	//$aktor = set_channel( $_GET['kanal']);
	echo "aktor";
	$aktor = setAktor($_GET['id'], $_GET['value'],  $_GET['function']);
}

if( $_GET['group']){
	$sql_groupaktor = query( "SELECT id,aktorID,aktorValue,deviceID,macroID FROM groupaktor WHERE groupID='" . $_GET['group'] ."'" );
		
	while( $groupaktor = fetch( $sql_groupaktor ) ){
		
		//echo "				groupaktor ID:" .  $groupaktor['id'];
		
		//aktoren
		if ($groupaktor['aktorID'] != '0'){
			$sql_aktor = query( "SELECT iid,name,room FROM aktor where id='" . $groupaktor['aktorID'] ."'" );
			$aktor = fetch( $sql_aktor );
			//echo "		schalte aktor";
			$aktor = setAktor($aktor['iid'], $groupaktor['aktorValue'],  $_GET['function']);
			usleep(800000);		
		}
		
		//geraete
		if ($groupaktor['deviceID'] != '0'){
			$sql_device = query( "SELECT ip,type FROM devices where id='" . $groupaktor['deviceID'] ."'" );
			$device = fetch( $sql_device );
			$sql_macro = query( "SELECT value FROM tvmacros where id='" . $groupaktor['macroID'] ."'" );
			$macro = fetch( $sql_macro );
			
			//echo "		schalte geraet";
			switch($device['type']){
				case 'samsungtv':
					samsung_send_key($device['ip'], $macro['value']);
					break;		
				case 'samsungbluray':
					samsung_send_key($device['ip'], $macro['value']);
					break;						
				case 'onkyoavrec':
					Onkyo_Send_Key($device['ip'], $macro['value']);
					break;
			}
			usleep(700000);	
		}
	}
}
?>