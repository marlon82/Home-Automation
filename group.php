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
	<h1>Gruppen</h1>
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
$sql = query( "SELECT id, name, status FROM groups" );

while( $groups = fetch( $sql ) )
{
	$sql1 = query( "SELECT aktorID,aktorValue type FROM groupaktor WHERE groupID='" . $groups['id'] ."'" );
	$aktor = fetch( $sql1 );
	
	
	?>
	<div style="float: left; border-radius:10px; height:250px; width:32%; margin-left:10px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true">
			<li data-role="list-divider"><? echo $groups['name']?></li>
			<li>Aktor<span style="float:right"><? echo $aktor['name'] . " (" . $aktor['type'] . ")"; ?></span></li> 
			<li>Value<span style="float:right"><? echo $timer['value']; ?></span></li> 
			<li>Zeit<span style="float:right"><? echo $timer['time']; ?></span></li> 
			<li>Wochentage<span style="float:right"><? echo $Wochentage; ?></span></li>
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