<?php 
include('functions.php');

$action 				= mysql_real_escape_string($_POST['action']); 
$updateRecordsArray 	= $_POST['recordsArray'];

if ($action == "updateRecordsListings"){
	
		$listingCounter = 1;
		foreach ($updateRecordsArray as $recordIDValue) {
			
			//$query = "UPDATE records SET recordListingID = " . $listingCounter . " WHERE recordID = " . $recordIDValue;
			$sql = query("UPDATE groupaktor SET sortOrder = '" . $listingCounter . "' WHERE id = '" . $recordIDValue . "'");
			//mysql_query($query) or die('Error, insert query failed');
			$listingCounter = $listingCounter + 1;	
		}
		
		echo '<pre>neue Sortierung wurde gespeichert</pre>';
		//echo '<pre>';
		//print_r($updateRecordsArray);
		//echo '</pre>';
}
?>