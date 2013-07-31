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
	//var_dump($_POST);
	$action = $_POST['action'];
	//echo $action;
	
	switch ($action){
		case 'updateRecordsListings':
			$table = $_POST['table'];
			$updateRecordsArray	= $_POST['recordsArray'];
			$listingCounter = 1;
			foreach ($updateRecordsArray as $recordIDValue) {
				$sql = query("UPDATE " . $table . " SET sortOrder = '" . $listingCounter . "' WHERE id = '" . $recordIDValue . "'");
				$listingCounter = $listingCounter + 1;	
			}
			echo '<h4>die neue Sortierung wurde gespeichert</h4>';
			break;

		case 'createBackup':
			//echo $_POST['table'];
			backup_tables($DBhost,$DBuser,$DBpass,$DBName,$_POST['table']);
			break;

		case 'restoreBackup':
			//echo "diese funktion ist noch im aufbau!";
			restore_tables($_POST['filename']);
			break;
	
	}
}


?>