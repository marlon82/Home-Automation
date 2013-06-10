<?php
ini_set('error_reporting', E_ALL);
include('functions.php');

switch( $_GET['function'] ){

	case 'SamsungSendKey':
		//echo "DeviceIP:" . $_GET['Device'] . "      Key:" . $_GET['Key'];
		Samsung_Send_Key($_GET['Device'], $_GET['Key']);
		break;
			
	case 'OnkyoSendKey':
		Onkyo_Send_Key($_GET['Device'], $_GET['Key']);
		break;
		}
?>