<?php

include('functions.php');
include('config.php');

if( $_GET['id']){
//$aktor = set_channel( $_GET['kanal']);
echo "aktor";
$aktor = setAktor($_GET['id'], $_GET['value'],  $_GET['function']);
}

if( $_GET['group']){

	$sql_groupaktor = query( "SELECT aktorID,aktorValue FROM groupaktor WHERE groupID='" . $_GET['group'] ."'" );
	//$aktor = fetch( $sql1 );
	

	while( $groupaktor = fetch( $sql_groupaktor ) ){
		$sql_aktor = query( "SELECT iid,name,room FROM aktor where id='" . $groupaktor['aktorID'] ."'" );
		$aktor = fetch( $sql_aktor );
		

		//var_dump($raum1);
		if($groupaktor['aktorValue'] > 0){
			$font = "#01DF01";
		}else{
			$font = "#FF0000";
		}
	
//echo "Aktor iid: " . $aktor['iid'] . "<br/>" ;
//echo "value iid: " . $groupaktor['aktorValue'] . "<br/>" ;
//echo "<br/>" ;	
$aktor = setAktor($aktor['iid'], $groupaktor['aktorValue'],  $_GET['function']);
sleep(1);	
 } 



}
//var jqxhr = $.get('http://192.168.1.22/web/zap?sRef=1:0:1:2EE3:441:1:C00000:0:0:0:', function() {
?>