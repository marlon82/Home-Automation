<?php
//ini_set('error_reporting', E_ALL);
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
		
	case 'test':
		echo "Dies war ein Test!";
		break;
}
?>