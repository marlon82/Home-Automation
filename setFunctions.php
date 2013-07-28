<?php
ini_set('error_reporting', E_ALL);
include('functions.php');

switch( $_GET['function'] ){

	case 'SamsungSendKey':
		//echo "DeviceIP:" . $_GET['Device'] . "      Key:" . $_GET['Key'];
		samsung_send_key($_GET['Device'], $_GET['Key']);
		break;
			
	case 'OnkyoSendKey':
		Onkyo_Send_Key($_GET['Device'], $_GET['Key']);
		break;
			
	case 'ChangeTimerState':
		//echo "GroupdID:" . $_GET['ID'];
		change_timer_state($_GET['ID']);
		break;
			
	case 'ChangeGroupState':
		//echo "GroupdID:" . $_GET['ID'];
		change_group_state($_GET['ID']);
		break;
				
	case 'test':
		echo "Dies war ein Test!";
		break;
}

if ($_POST) {
	
	//$action 				= mysql_real_escape_string($_POST['action']); 
	$test 					= explode("?table=", $_POST['action']);
	$table 					= $test[1]; 
	$action 				= $test[0]; 
	$updateRecordsArray 	= $_POST['recordsArray'];
	if ($action == "updateRecordsListings"){
		
			$listingCounter = 1;
			foreach ($updateRecordsArray as $recordIDValue) {
				$sql = query("UPDATE " . $table . " SET sortOrder = '" . $listingCounter . "' WHERE id = '" . $recordIDValue . "'");
				$listingCounter = $listingCounter + 1;	
			}
			
			echo '<h4>die neue Sortierung wurde gespeichert</h4>';
			//echo '<pre>';
			//print_r($updateRecordsArray);
			//echo '</pre>';
	}
}


?>