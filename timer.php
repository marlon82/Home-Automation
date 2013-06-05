<div data-role="page" id="dashboard">

<div data-role="header" data-position="fixed" data-theme="b">
	<a href="index.php?page=dashboard" data-icon="home" rel="external">Home</a>
	<div id="container">
		<li class="hours"></li>
		<li class="point">:</li>
		<li class="min"></li>
		<li class="point">:</li>
		<li class="sec"></li>
	</div>
	<h1>Timer</h1>
</div><!-- /header -->



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
right:10px;
top:15px;
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

<script type="text/javascript">

$(document).ready(function() {


setInterval( function() {
	// Create a newDate() object and extract the seconds of the current time on the visitor's
	var seconds = new Date().getSeconds();
	// Add a leading zero to seconds value
	$(".sec").html(( seconds < 10 ? "0" : "" ) + seconds);
	},1000);
	
setInterval( function() {
	// Create a newDate() object and extract the minutes of the current time on the visitor's
	var minutes = new Date().getMinutes();
	// Add a leading zero to the minutes value
	$(".min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);
	
setInterval( function() {
	// Create a newDate() object and extract the hours of the current time on the visitor's
	var hours = new Date().getHours();
	// Add a leading zero to the hours value
	$(".hours").html(( hours < 10 ? "0" : "" ) + hours);
    }, 1000);	
});

</script>
<div data-role="content" >

<?php

include('functions.php');
$sql = query( "SELECT id, name, aktor, time, hour, minute, enabled, value, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday, isGroup FROM timer ORDER BY name ASC" );

while( $timer = fetch( $sql ) )
{
	
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
				<li>Gruppe<span style="float:right"><? echo $group['name']; ?></span></li> 
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
			<?
			if ( $timer['enabled'] == 'Yes') {
			?>
				<li>Aktiv<span style="float:right"><FONT COLOR="#01DF01"><? echo $timer['enabled']; ?></FONT></span></li> 
			<?
			}else {
			?>
				<li>Aktiv<span style="float:right"><FONT COLOR="#FF0000"><? echo $timer['enabled']; ?></FONT></span></li> 
			<?
			}
			?>
			
		</ul>		
    </div>
	<?
	$Wochentage = "";
}
?>
</div>