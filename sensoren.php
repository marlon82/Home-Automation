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
	<h1>Sensoren</h1>
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
$sqlr = query( "SELECT id, name, icon FROM rooms ORDER BY name ASC" );

while( $room = fetch( $sqlr ) )
{
	$sqls = query("SELECT iname,name,value,iid,hcType FROM sensoren WHERE room = '" . $room['id'] . "'" );
	while($sensor = fetch($sqls))
	{	
		?>
		<div style="float: left; border-radius:10px; height:280px; width:32%; margin-left:10px; margin-bottom:12px">
			<ul data-role="listview" data-inset="true">
				<li data-role="list-divider"><? echo $room['name'] . " " . $sensor['name'] . " aktuell: " . $sensor['value'] . " °C"?></li>
				<?
				if($sensor['hcType'] == "temperatur"){
					//echo $sensor['name'] . " atkuell: " . $sensor['value'] . " °C</br></br>"  ; 
					//GenGraph($vars,$vars);
					$filename = "sensor_graph/" . $sensor['iname'] . ".png";
					//$filename = "sensor_graph/" . "temp_sensor" . ".png";
				?>
					<p><img src="<?php echo $filename; ?>" alt="Graph konnte nicht angezeigt werden"></p>

				<?php
				}elseif($sensor['hcType'] == "luftfeuchtigkeit"){
					//echo $sensor['name'] . " aktuell: " . $sensor['value'] . "%</br></br>"  ; 
					//GenGraph($vars,$vars);
					$filename = "sensor_graph/" . $sensor['iname'] . ".png";
					//$filename = "sensor_graph/" . "temp_sensor" . ".png";
				?>
					<p><img src="<?php echo $filename; ?>" alt="Graph konnte nicht angezeigt werden"></p>
				<?php
				}
				?>
			</ul>		
		</div>
		<?
	}
}
?>
</div>