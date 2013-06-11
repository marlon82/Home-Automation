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

<div data-role="content" >

<?php

include('functions.php');
$sqlr = query( "SELECT id, name, icon FROM rooms ORDER BY name ASC" );

$i=0;
$rooms = array();
$sensors = array();

while( $room = fetch( $sqlr ) )
{
	$sqls = query("SELECT id,iname,name,value,iid,hcType FROM sensoren WHERE room = '" . $room['id'] . "'" );
	while($sensor = fetch($sqls))
	{	
		$found == False;
		for( $x = 0; $x <= count($rooms); $x++ ){
			if($room['id'] == $rooms[$x]) { 
			$found = True; 
			break;
			}
		}
		
		if ($found == False) { 
			$rooms[$i] = $room['id'];
		}
		
		$sensors[$i] = $sensor['id'];
		?>
		<div style="float: left; border-radius:10px; height:400px; width:32%; margin-left:10px; margin-bottom:12px">
			<ul data-role="listview" data-inset="true">
				<li data-role="list-divider"><? echo $room['name'];?></li>
		<?
		
		if($sensor['hcType'] == "temperatur"){
			$filename = "sensor_graph/" . $sensor['iname'] . "_day.png";
			?><p><img src="<?php echo $filename; ?>" alt="Graph konnte nicht angezeigt werden"></p>
			<?php
		}elseif($sensor['hcType'] == "luftfeuchtigkeit"){
			$filename = "sensor_graph/" . $sensor['iname'] . "_day.png";
			?>
			<p><img src="<?php echo $filename; ?>" alt="Graph konnte nicht angezeigt werden"></p>
			<?php
		}
		?>
		</ul>		
		</div>
	<?
	$i = $i + 1;
	}
}
?>


</div>