<?
include("functions.php");
include("config.php");
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
right:10px;
top:15px;
height:20px;


}

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

<div data-role="page" id="dashboard">

<div data-role="header" data-position="fixed" data-theme="b">
	<a href="#dashboard" data-icon="home">Home</a>
	<div id="container">
		<li class="hours"></li>
		<li class="point">:</li>
		<li class="min"></li>
		<li class="point">:</li>
		<li class="sec"></li>
	</div>
	<h1>Dashboard</h1>
	

</div><!-- /header -->

<div data-role="panel" id="aktorpanel" data-theme="b">
	<div class="panel-content" data-theme="b">
		<h3>Aktor Panel</h3>
		<p></p>
		<a href="#demo-links" data-rel="close" data-role="button" data-theme="c" data-icon="delete" data-inline="true">Close panel</a>
	</div><!-- /content wrapper for padding -->
</div>


<div data-role="panel" id="dreampanel" data-theme="b">
	<div class="panel-content" data-theme="b">
		<h3>Dreambox Remote</h3>
		<img src="dreambox.png"></img>
		<p></p>
		<a href="#demo-links" data-rel="close" data-role="button" data-theme="c" data-icon="delete" data-inline="true">Close panel</a>
	</div><!-- /content wrapper for padding -->
</div>


<div data-role="content" >	


	<div style="float: left; border-radius:10px; height:300px; width:32%; margin-left:10px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true" data-theme="d">
    		<li data-role="list-divider">Aktive Aktoren (5 max)</li>
	
				<?php
				for( $i = 0; $i <= 64; $i++ ){
					extract(ReadXS1(actuator, $i));
											//compact('number', 'value', 'name', 'type', 'unit', 'utime', 'newvalue')
					$sql = query( "SELECT id,name,room,type FROM aktor WHERE iName = '" . $name . "' ORDER BY name ASC" );
					$row = fetch( $sql );
					
					$sql1 = query( "SELECT id,name FROM rooms WHERE id = '" . $row['room']. "' ORDER BY name ASC" );
					$room = fetch( $sql1 );
					
					$sql2 = query( "SELECT devtypename FROM deviceTypes WHERE devtype = '" . $row['type']. "' ORDER BY devtypename ASC" );
					$devtype = fetch( $sql2 );
					
					if( $row['id']  && $name && $type != 'disabled' )
					{
						if( $value > 1 ){
							?>
							<li><a href="#aktorpanel"><?php echo $room['name'] . " - " . $row['name'] . " (" . $devtype['devtypename'] . ")"; ?></a></li>
							<?php
							$count = $count + 1;
						}
					}
					if ($count == 5){
						break;
					}
				}
				//echo "Es sind " . $count . " Online";
				?>	
				
		</ul>
    </div>
	

    
    <div style="float: left; border-radius:10px; height:300px; width:32%; margin-left:10px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true">
			<li data-role="list-divider">Virtuelle Befehle</li>
			<li><a href="index.html">TV</a></li> 
			<li><a href="index.html">DVD</a></li>
			<li><a href="index.html">HTPC</a></li>
			<li><a href="index.html">TV/USB</a></li>
			<li><a href="index.html">TV/Dreambox</a></li>
		</ul>		
    </div>


	<div style="float: left; border-radius:10px; height:300px; width:32%; margin-left:10px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true">
    		<li data-role="list-divider">Stromverbrauch</li>
    		<li>Aktuell  <span style="float:right">250 W - 0.01€</span></li>
    		<li>Heute   <span style="float:right">45.82 kWh - 12.83€</span></li>
    		<li>Gestern <span style="float:right">50.14 kWh - 15.45€</span></li>
    		<li>Monat   <span style="float:right">245.82 kWh - 12.83€</span></li>
    		<li>Jahr    <span style="float:right">81.72 kWh - 22.88€</span></li>
		</ul>
    </div>
	




    
    <div style="float: left; border-radius:10px; height:300px; width:32%; margin-left:10px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true">
			<li data-role="list-divider">Multimedia</li>
			<li><a href="#dreampanel">TV</a></li> 
			<li><a href="#dreampanel">Dreambox Wohnzimmer</a></li>
			<li><a href="#dreampanel">Dreambox Schlafzimmer</a></li>
			<li><a href="#dreampanel">HTPC</a></li>
			<li><a href="#dreampanel">Alles Aus</a></li>
		</ul>		
    </div>


	<div style="float: left; border-radius:10px; height:300px; width:32%; margin-left:10px; margin-bottom:12px">
  		<?php
		$sqlWWidget = query( "SELECT options,value FROM config WHERE options = 'WetterWidget'" );
		$Widget = fetch( $sqlWWidget );
		
		if($Widget['value'] <> ""){
		?>
		
			<ul data-role="listview" data-inset="true">
			<li data-role="list-divider">Wetter Vorhersage</li>
			<?php
			echo $Widget['value'];
			?>
			</ul>
		
		<?php
		}
		?>
		
    </div>

<?php
//#########################Sensoren auslesen und ausgeben

$sql = query( "SELECT name,hcType,room,value FROM sensoren" );	

$initial = true;
			
while( $row = fetch( $sql ) )
{
	if($initial)
	{
		$initial = false;	
		?>

	<div style="float: left; border-radius:10px; height:300px; width:32%; margin-left:10px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true">
    		<li data-role="list-divider">Aktuelle Sensor Werte</li>
    <?php
    }
	$sqlRoomName = query( "SELECT name FROM rooms WHERE id = '" . $row['room'] . "'" );
	$RoomName = fetch( $sqlRoomName );
		
	if($row['hcType'] == "temperatur"){
	?>
		<li><? echo $RoomName['name']; ?> <? echo $row['name']; ?>  <span style="float:right"><? echo $row['value']; ?> °C</span></li>
		<?php
	}elseif($row['hcType'] == "luftfeuchtigkeit"){
	?>
		<li><? echo $RoomName['name']; ?> <? echo $row['name']; ?>  <span style="float:right"><? echo $row['value']; ?>%</span></li>
		<?php
	}

}
if(!$initial){
	echo "</ul>";
	echo "</div>";
}

?>

	
</div><!-- /content -->




