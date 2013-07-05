<?php
ini_set('error_reporting', E_ALL);
include('functions.php');

$updateRecordsArray = $POST['recordsArray'];
echo $POST;

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
		
	case 'updateRecordsListings':
		echo 'fired updateRecordsListings';
		$listingCounter = 1;
		foreach ($updateRecordsArray as $recordIDValue) {
			
			//$query = "UPDATE records SET recordListingID = " . $listingCounter . " WHERE recordID = " . $recordIDValue;
			$sql = query("UPDATE groupaktor SET sortOrder = '" . $listingCounter . "' WHERE id = '" . $recordIDValue . "'");
			//mysql_query($query) or die('Error, insert query failed');
			$listingCounter = $listingCounter + 1;	
		}
		
		echo '<pre>';
		print_r($updateRecordsArray);
		echo '</pre>';
		echo 'If you refresh the page, you will see that records will stay just as you modified.';
		break;
		
	case 'test':
		echo "Dies war ein Test!";
		break;
}
?>