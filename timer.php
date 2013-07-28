<div data-role="page" id="dashboard">


<?
include("header.php");
?>




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
</style>

<div data-role="content" >

<?php

include('functions.php');

echo "<script>\n";
echo "$(document).ready( function () {\n";

$sql_timer = query( "SELECT id FROM timer ORDER BY name ASC" );

while ($timers = fetch($sql_timer))
{
	echo "$(\"#flip-timer-" . $timers['id'] . "\").on(\"slidestop\", function( event, ui ) { \n";
	//echo "alert(\"testID:" . $timers['id'] . "\")\n";
	echo "	var jqxhr = $.get(\"setFunctions.php?function=ChangeTimerState&ID=" . $timers['id'] . "\", function() {})\n";
	echo "	changeElement(\"flip-timer-" . $timers['id'] . "-schalten-css\")\n";
	echo "});\n\n";	
}

echo "});\n"; 			
echo "</script>\n";

$sql = query( "SELECT id, name, aktor, time, hour, minute, enabled, value, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday, isGroup FROM timer ORDER BY name ASC" );

while( $timer = fetch( $sql ) )
{	
	if ( $timer['isGroup'] == 'Yes') {
		$sqlg = query( "SELECT id, name FROM groups WHERE id='" . $timer['aktor'] ."'" );
		$group = fetch( $sqlg );
		?>
		<div data-role="popup" id="popup-group-<? echo $group['id'] ?>" class="ui-content" data-theme="d">
			<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
				<table>
				  <tr>
					<td><b>Aktor</b></td>
					<td><b>Raum</b></td>
					<td><b>Value</b></td>
				  </tr>
					<?
					$sql_groupaktor = query( "SELECT aktorID,aktorValue,deviceID FROM groupaktor WHERE groupID='" . $group['id'] ."'" );
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
				
				<table>
				  <tr>
					<td><b>Device</b></td>
					<td><b>Raum</b></td>
					<td><b>Macro</b></td>
				  </tr>
					<?
					$sql_groupaktor2 = query( "SELECT deviceID,macroID FROM groupaktor WHERE groupID='" . $group['id'] ."'" );
					
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
	<?
	}
	if ($timer['Monday'] == 'Yes') { $Wochentage =  $Wochentage . ' Mo /';}
	if ($timer['Tuesday'] == 'Yes') { $Wochentage = $Wochentage . ' Di /';}
	if ($timer['Wednesday'] == 'Yes') { $Wochentage = $Wochentage . ' Mi /';}
	if ($timer['Thursday'] == 'Yes') { $Wochentage = $Wochentage . ' Do /';}
	if ($timer['Friday'] == 'Yes') { $Wochentage = $Wochentage . ' Fr /';}
	if ($timer['Saturday'] == 'Yes') { $Wochentage = $Wochentage . ' Sa /';}
	if ($timer['Sunday'] == 'Yes') { $Wochentage = $Wochentage . ' So /';}
	$Wochentage = substr($Wochentage, 0, strlen($Wochentage) - strlen('/'));
	
	if ($Wochentage == '') { $Wochentage = '-';}
	
	?>
	<div style="float: left; border-radius:10px; height:250px; width:32%; margin-left:10px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true">
			<li data-role="list-divider"><? echo $timer['name']?></li>
			<?
			if ( $timer['isGroup'] == 'Yes') {
				$sqlg = query( "SELECT id, name FROM groups WHERE id='" . $timer['aktor'] ."'" );
				$group = fetch( $sqlg );
			?>
				<li><a href="#popup-group-<? echo $group['id'] ?>"  data-inline="true" data-rel="popup" data-position-to="window">Gruppe<span style="float:right"><? echo $group['name']; ?></span></a></li>
			<?
			}else {
				$sqla = query( "SELECT id, name, room, type FROM aktor WHERE id='" . $timer['aktor'] ."'" );
				$aktor = fetch( $sqla );
				$sqlr = query( "SELECT id, name, icon FROM rooms WHERE id='" . $aktor['room'] ."'" );
				$room = fetch( $sqlr );
				$sqldt = query( "SELECT id,devtypename FROM deviceTypes WHERE id = '" . $aktor['type']. "'" );
				$devtype = fetch( $sqldt );
			?>
				<li>Aktor<span style="float:right"><? echo $aktor['name'] . " (" . $room['name'] ."/" . $devtype['devtypename'] . ")"; ?></span></li> 
			<?
			}
			if ( $timer['isGroup'] != 'Yes') { ?> <li>Value<span style="float:right"><? echo $timer['value']; ?></span></li> <? }
			?>
			<li>Zeit<span style="float:right"><? echo $timer['time']; ?></span></li> 
			<li>Tage<span style="float:right"><? echo $Wochentage; ?></span></li>
			<li>
			
			<label for="flip-timer-<?php echo $timer['id'] ?>"><STRONG>Aktiv</STRONG></label>
			<div style="position: absolute ;right:10px;top:0">
			<select name="flip-timer-<?php echo $timer['id'] ?>" id="flip-timer-<?php echo $timer['id'] ?>" data-role="slider" data-mini="true">
				<option value="off" <? if($timer['enabled'] != 'Yes'){ echo "selected=\"selected\"";}; ?>>Aus</option>
				<option value="on" <? if($timer['enabled'] == 'Yes'){ echo "selected=\"selected\"";}; ?>>An</option>
			</select>		
			</div>
			</li>
		</ul>		
    </div>
	<?
	$Wochentage = "";
}
?>
</div>