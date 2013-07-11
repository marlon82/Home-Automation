<div data-role="page" id="dashboard">
<?
include('functions.php');
?>

<?
include("header.php");
?>


<div data-role="popup" id="positionWindow" class="ui-content" data-theme="d">
	<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
    <p>I am positioned to the window.</p>

</div>

<style type="text/css">

li{
list-style-type:none;
}
 .hours{
float:left;
}
.sec{
float:left;
}

.min{
float:left;
}

.point{
float:left;
}

#container{
position:absolute;
float:right;
right:110px;
top:12px;
height:20px;

 }
 div#left-sidebar{
  float: left;
  
  width:20%;

 }
 
 div#cont{
 float: left;
margin-top:15px;
   width:70%;
   
table{
  border: 0px solid black;
  border-spacing: 0px;
}

table thead tr{
  font-family: Arial, monospace;
  font-size: 14px;
}

table thead tr th{
  border-bottom: 2px solid black;
  border-top: 1px solid black;
  margin: 0px;
  padding: 2px;
  background-color: #cccccc;
}

table tr {
  font-family: arial, monospace;
  color: black;
  font-size:12px;
  background-color: white;
}

table tr.odd {
  background-color: #AAAAAA;
}

table tr td, th{
  border-bottom: 1px solid black;
  padding: 2px;
}
</style>

<script type="text/javascript">
function aktor(url)
{
//var jqxhr = $.get('http://192.168.1.22/web/zap?sRef=1:0:1:2EE3:441:1:C00000:0:0:0:', function() {
//http://192.168.1.130/homecontrol/kanal.php?kanal=1:0:1:2EE3:441:1:C00000:0:0:0:
var jqxhr = $.get("aktor.php?link=" + url, function() {})
}
$(document).ready(function() {

<?php

$sql = query( "SELECT id FROM groups");

for ($i=1; $holen =  fetch($sql); $i++) {
	$link = '?group=' . $holen['id'] . '&value=';
	echo "$(\"#button-" . $holen['id'] . "\").bind(\"click\", function( event, ui ) { \n";
	echo "var singleValues = $(\"#button-" . $holen['id'] . "\").val();\n";
	echo "var url = \"$link\";\n";
	echo "var url_komplett = \"aktor.php\" +  url + singleValues;\n";
	//echo "alert(url_komplett);\n";
	echo "var jqxhr = $.get(url_komplett, function() {\n";
	echo "})\n";
	echo "});\n";	

	
}
?>	
});

</script>
<div data-role="content" >

<?php


$sql_groups = query( "SELECT id, name, status FROM groups" );

while( $groups = fetch( $sql_groups ) )
{
	$sql_groupaktor = query( "SELECT aktorID,aktorValue,deviceID FROM groupaktor WHERE groupID='" . $groups['id'] ."'" );
	//$aktor = fetch( $sql1 );
	
	
	?>
	
<div data-role="popup" id="popup-aktor-<? echo $groups['id'] ?>" class="ui-content" data-theme="d">
	<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
		<table>
  <tr>
    <td><b>Aktor</b></td>
    <td><b>Raum</b></td>
    <td><b>Value</b></td>
  </tr>
	<?
	while( $groupaktor = fetch( $sql_groupaktor ) ){
	if ($groupaktor['aktorID'] != 0) {
		$sql_aktor = query( "SELECT name,room FROM aktor where id='" . $groupaktor['aktorID'] ."'" );
		$aktor = fetch( $sql_aktor );
		
		$sql_raum = query( "SELECT id,name FROM rooms where id='" . $aktor['room'] ."'" );
		$raum = fetch( $sql_raum );
		//var_dump($raum1);
		if($groupaktor['aktorValue'] > 0){
			$font = "#01DF01";
		}else{
			$font = "#FF0000";
		}
	
		
	?>
    <!-- <p><? echo $aktor1['name']; ?></p> -->
      <tr>
    <td style="padding: 5px"><FONT COLOR="<? echo $font ?>"><? echo $aktor['name']; ?></FONT></td>
    <td style="padding: 5px"><FONT COLOR="<? echo $font ?>"><? echo $raum['name']; ?></FONT></td>
    <td style="padding: 5px"><FONT COLOR="<? echo $font ?>"><? echo $groupaktor['aktorValue']; ?></FONT></td>
  </tr>
	<? 
	}
	}	?>



</table>
</div>


<div data-role="popup" id="popup-device-<? echo $groups['id'] ?>" class="ui-content" data-theme="d">
	<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
		<table>
  <tr>
    <td><b>Device</b></td>
    <td><b>Raum</b></td>
    <td><b>Macro</b></td>
  </tr>
	<?
	$sql_groupaktor2 = query( "SELECT deviceID,macroID FROM groupaktor WHERE groupID='" . $groups['id'] ."'" );
	
	while( $groupaktor2 = fetch( $sql_groupaktor2 ) ){
		if ($groupaktor2['deviceID'] != 0) {
		$sql_device = query( "SELECT name,room FROM devices where id='" . $groupaktor2['deviceID'] ."'" );
		$device = fetch( $sql_device );
		
		$sql_raum = query( "SELECT id,name FROM rooms where id='" . $device['room'] ."'" );
		$raum = fetch( $sql_raum );
		
		$sql_macro = query( "SELECT id,name,value FROM tvmacros where id='" . $groupaktor2['macroID'] ."'" );
		$macro = fetch( $sql_macro );
		?>
		<tr>
		<td style="padding: 5px"><? echo $device['name']; ?></td>
		<td style="padding: 5px"><? echo $raum['name']; ?></td>
		<td style="padding: 5px"><? echo $macro['name']; ?></td>
		</tr>
<?  	}
	} ?>

</table>
</div>


	
	<div style="float: left; border-radius:10px; height:175px; width:32%; margin-left:10px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true">
			<li data-role="list-divider"><? echo $groups['name']?></li>			
			
			<li><a href="#popup-aktor-<? echo $groups['id'] ?>"  data-inline="true" data-rel="popup" data-position-to="window">Aktoren: </a></li> 
			<li><a href="#popup-device-<? echo $groups['id'] ?>"  data-inline="true" data-rel="popup" data-position-to="window">Geräte: </a></li> 
			<li>
			<label for="flip-<? echo $groups['id']?>"><b>Schalten:</b></label>
			<div style="position: absolute ;right:10px;top:0px">
    			<a href="#" data-role="button" id="button-<? echo $groups['id']?>" data-inline="true" data-mini="true">schalten</a>
    		</div>
			</li>
			
		</ul>		
    </div>
	<?
	$Wochentage = "";
}
?>
</div>