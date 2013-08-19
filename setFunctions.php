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
			backup_tables($_POST['table'],'backup/');
			break;

		case 'restoreBackup':
			restore_tables($_POST['filename']);
			break;
			
		case 'deleteBackup':
			delete_tables($_POST['filename']);
			break;
			
		case 'clearTable':
			$Table = $_POST['table'];
			switch ($Table){
				case 'config': 			$ClearTable = 0;break;
				case 'configFooter': 	$ClearTable = 0;break;
				case 'deviceTypes':	 	$ClearTable = 0;break;
				default:				$ClearTable = 1;break;
			}
			if ($ClearTable == 1) {
				$sql = query('TRUNCATE TABLE `' . $_POST['table'] . '`');
				echo('Die Tabelle `' . $Table . '` wurde geleert!');
			}else{
				echo('Die Tabelle `' . $Table . '` kann nicht geleert werden, diese ist eine System Tabelle!');
			}
			break;
	
	}
}


?>