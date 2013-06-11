<div data-role="page2" id="dashboard">


<div data-role="header" data-position="fixed" data-theme="b">
	<a href="index.php?page=dashboard" data-icon="home" rel="external">Home</a>
			<div id="container">
		<li class="hours"></li>
		<li class="point">:</li>
		<li class="min"></li>
		<li class="point">:</li>
		<li class="sec"></li>
	</div>
	<h1>Räume</h1>
</div><!-- /header -->

<div data-role="panel" id="defaultpanel" data-theme="b">
	<div class="panel-content" data-theme="b">
		<h3>Default panel options</h3>
		<p>This panel has all the default options: positioned on the left with the reveal display mode. The panel markup is <em>before</em> the header, content and footer in the source order.</p>
		<p>To close, click off the panel, swipe left or right, hit the Esc key, or use the button below:</p>
		<a href="#demo-links" data-rel="close" data-role="button" data-theme="c" data-icon="delete" data-inline="true">Close panel</a>
	</div><!-- /content wrapper for padding -->
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
right:10px;
top:15px;
height:20px;
}

 div#left-sidebar{
  float: left;
  margin-left:10px; 
  margin-top:10px;
  width:20%;
  height:80%;
  //background-color:red;
	position:absolute;

 }
 
 div#cont{
   margin-top:10px;
   // background-color:blue;
	margin-left:20%; 
 }
 
 div#cont-inner{
    margin-top:10px;
   // background-color:blue;
	margin-left:20px;
	margin-right:20px;
	margin-bottom:20px;  
	max-width:800px;
 }
 
</style>




<?php
include('functions.php');

if($_GET['room']){
	$roomid =  $_GET['room'];
}else{
	$roomid = 1;
}

?>

<script>
function aktor(url)
{
//var jqxhr = $.get('http://192.168.1.22/web/zap?sRef=1:0:1:2EE3:441:1:C00000:0:0:0:', function() {
//http://192.168.1.130/homecontrol/kanal.php?kanal=1:0:1:2EE3:441:1:C00000:0:0:0:
var jqxhr = $.get("aktor.php?link=" + url, function() {})
}

function changeElement(id) {
  var el = document.getElementById(id);
  el.style.color = "red";

}


<?php

echo "$(document).ready( function () {\n";



$sqld = query( "SELECT id,devtypename FROM deviceTypes WHERE devtype = 'dimmer'" );
$devtype = fetch( $sqld );
$typ = $devtype['id']; 
$sql = query( "SELECT name,iName,iid FROM aktor WHERE room = '" . $roomid . "' AND type = '" . $typ . "'" );

for ($i=1; $holen =  fetch($sql); $i++) {
	$link = '?id=' . $holen['iid'] . '&value=';
	echo "$(\"#slider-" . $holen['iid'] . "\").on(\"slidestop\", function( event, ui ) { \n";
	echo "var singleValues = $(\"#slider-" . $holen['iid'] . "\").val();\n";
	echo "var url = \"$link\";\n";
	echo "var url_komplett = \"aktor.php\" +  url + singleValues;\n";
	
	//echo "alert(url_komplett);\n";
	
	echo "var jqxhr = $.get(url_komplett, function() {\n";

echo "})\n";
echo "});\n";
}
	

$sqld = query( "SELECT id,devtypename FROM deviceTypes WHERE devtype = 'schalter'" );
$devtype = fetch( $sqld );
$typ = $devtype['id']; 
$sql = query( "SELECT name,iName,iid FROM aktor WHERE room = '" . $roomid . "' AND type = '" . $typ . "'" );

for ($i=1; $holen =  fetch($sql); $i++) {
	$link = '?id=' . $holen['iid'] . '&value=';
	echo "$(\"#flip-" . $holen['iid'] . "\").on(\"slidestop\", function( event, ui ) { \n";
	echo "var singleValues = $(\"#flip-" . $holen['iid'] . "\").val();\n";
	echo "var url = \"$link\";\n";
	echo "var url_komplett = \"aktor.php\" +  url + singleValues;\n";
//echo "alert(url_komplett);\n";
	echo "var jqxhr = $.get(url_komplett, function() {\n";
	echo "})\n";
	echo "changeElement(\"flip-" . $holen['iid'] . "-schalten-css\")\n";
	echo "});\n";	
	
	/*   Ausführen mit PHP
	$link = '&action=setAktor&id=' . $holen['iid'] . '&value=';
	
	echo "$(\"#flip-" . $holen['iid'] . "\").on(\"slidestop\", function( event, ui ) { \n";
	echo "var singleValues = $(\"#flip-" . $holen['iid'] . "\").val();\n";
	echo "var link = \"$link\";\n";
	echo "var test = \"index.php?page=room&room=1\" + link + singleValues;\n";
	echo "window.location= \"index.php?page=room&room=1\" + link + singleValues;\n";
	echo "});\n";
	*/
	
}	

$sqld = query( "SELECT id,devtypename FROM deviceTypes WHERE devtype = 'rolladen'" );
$devtype = fetch( $sqld );
$typ = $devtype['id']; 
$sql = query( "SELECT name,iName,iid FROM aktor WHERE room = '" . $roomid . "' AND type = '" . $typ . "'" );

for ($i=1; $holen =  fetch($sql); $i++) {
	$link = '?id=' . $holen['iid'] . '&function=';
	echo "$(\"#Hoch-" . $holen['iid'] . "\").bind(\"click\", function( event, ui ) { \n";
	echo "var singleValues = 1;\n";
	echo "var url = \"$link\";\n";
	echo "var url_komplett = \"aktor.php\" +  url + singleValues;\n";
	//echo "alert(url_komplett);\n";
	echo "var jqxhr = $.get(url_komplett, function() {\n";
	echo "})\n";
	echo "changeElement(\"Hoch-" . $holen['iid'] . "-schalten-css\")\n";
	echo "});\n";	
	
	$link = '?id=' . $holen['iid'] . '&function=';
	echo "$(\"#Runter-" . $holen['iid'] . "\").bind(\"click\", function( event, ui ) { \n";
	echo "var singleValues = 2;\n";
	echo "var url = \"$link\";\n";
	echo "var url_komplett = \"aktor.php\" +  url + singleValues;\n";
	//echo "alert(url_komplett);\n";
	echo "var jqxhr = $.get(url_komplett, function() {\n";
	echo "})\n";
	echo "changeElement(\"Runter-" . $holen['iid'] . "-schalten-css\")\n";
	echo "});\n";	
}


echo "});\n"; 					
echo "</script>\n";




switch( $_GET['action'] ){
		
		case 'setAktor':

			extract(ReadXS1(actuator,30));
			
			$sql = query( "SELECT type FROM aktor WHERE iid = '" . $_GET['id'] . "'" );
			$row = fetch( $sql );
			$sqld = query( "SELECT id,devtypename FROM deviceTypes WHERE devtype = '" . $row['type'] ."'" );
			$devtype = fetch( $sqld );
			
			if( $devtype == 'taster' )
				$funktion = true;
			else
				$funktion = false;
				
			
			setAktor($_GET['id'], $_GET['value'], $funktion);
			
			usleep(150000);
			
		break;	
		

	}
?>

<div id="left-sidebar"> 
<ul data-role="listview" data-inset="true">
<?php
$active = $_GET['room'] ;
$sql = query( "SELECT id,name,icon FROM rooms ORDER BY name ASC");					
while( $row = fetch( $sql ) )
{
	if ($row['icon'] == '') {
		$imagesource = "./icons/house.png";
	}else{
		$imagesource = $row['icon'];
	}
?>
	<li <?php if($row['id'] == $active) { ?> class="ui-btn-active ui-state-persist" <?php } ?> ><a href="?page=room&room=<?php echo $row['id'] ?>" rel="external"> <img src="<?php echo $imagesource ?>" class="ui-li-icon ui-corner-none"><?php echo $row['name'] ?></a></li>
<?php
}
?>

</ul>
	
</div>
<div id="cont">
<?php


//#####################Aktoren auslesen und ausgeben 
$sqld = query( "SELECT id,devtypename FROM deviceTypes WHERE devtype = 'dimmer'" );
$devtype = fetch( $sqld );
$typ = $devtype['id']; //Nur Dimmer auslesen und anzeigen
$sql = query( "SELECT name,iName,iid FROM aktor WHERE room = '" . $roomid . "' AND type = '" . $typ . "'" );	


$initial = true;
			
while( $row = fetch( $sql ) )
{
	//Nur Dimmer
	if($initial){
		$initial = false;	
		?>

		<div id="cont-inner">
  		<ul data-role="listview" data-inset="true" data-theme="d">
    		<li data-role="list-divider">Dimmer</li>
    <?php
    }
    extract(ReadXS1(actuator,$row['iid']));
    ?>
	<li>
    <label for="slider-<?php echo $row['iid'] ?>"><?php echo $row['name'] ?></label>
    <input name="slider-<?php echo $row['iid'] ?>" id="slider-<?php echo $row['iid'] ?>" data-highlight="true" min="0" max="100" step="5" value="<?php echo $value ?>" type="range">
    </li>
<?php


}
if(!$initial){
	echo "</ul>\n";
	echo "</div>\n";
}



//#########################Aktoren auslesen und ausgeben
$sqld = query( "SELECT id,devtypename FROM deviceTypes WHERE devtype = 'schalter'" );
$devtype = fetch( $sqld );
$typ = $devtype['id']; //Nur schalter auslesen und anzeigen
$sql = query( "SELECT name,iName,iid FROM aktor WHERE room = '" . $roomid . "' AND type = '" . $typ . "'" );	


$initial = true;
			
while( $row = fetch( $sql ) )
{
	//Nur Schalter
	if($initial){
		$initial = false;	
		?>

		<div id="cont-inner">
  		<ul data-role="listview" data-inset="true" data-theme="d">
    		<li data-role="list-divider">Schalter</li>
    <?php
    }
    extract(ReadXS1(actuator,$row['iid']));
    ?>
	<li>
    	<label for="flip-<?php echo $row['iid'] ?>"><?php echo $row['name'] ?></label>
    	<select name="flip-<?php echo $row['iid'] ?>" id="flip-<?php echo $row['iid'] ?>" data-role="slider">
        	<option value="off" <? if($value == 0){ echo "selected=\"selected\"";}; ?>>Aus</option>
        	<option value="on" <? if($value > 1){ echo "selected=\"selected\"";}; ?>>An</option>
    	</select>
    </li>
<?php


}

if(!$initial){
	echo "</ul>\n";
	echo "</div>\n";
}



//#########################Aktoren auslesen und ausgeben
$sqld = query( "SELECT id,devtypename FROM deviceTypes WHERE devtype = 'rolladen'" );
$devtype = fetch( $sqld );
$typ = $devtype['id']; //Nur rolladen auslesen und anzeigen
$sql = query( "SELECT name,iName,iid FROM aktor WHERE room = '" . $roomid . "' AND type = '" . $typ . "'" );	


$initial = true;
			
while( $row = fetch( $sql ) )
{
	//Nur rolladen
	if($initial){
		$initial = false;	
		?>

		<div id="cont-inner">
  		<ul data-role="listview" data-inset="true" data-theme="d">
    		<li data-role="list-divider">Motoren</li>
    <?php
    }
    extract(ReadXS1(actuator,$row['iid']));
    ?>
	<li>
	<?php echo $row['name'] ?>
		<div data-role="controlgroup" data-type="horizontal">
			<a href="#" data-role="button" data-icon="arrow-u" id="Hoch-<?php echo $row['iid'] ?>">Hoch</a>
			<a href="#" data-role="button" data-icon="arrow-d" id="Runter-<?php echo $row['iid'] ?>">Runter</a>
		</div>
    </li>
	<?php


}

if(!$initial){
	echo "</ul>";
	echo "</div>";
}


//#########################Sensoren auslesen und ausgeben
$sql = query( "SELECT iname,name,value,iid,hcType FROM sensoren WHERE room = '" . $roomid . "'" );	


$initial = true;
			
while( $row = fetch( $sql ) )
{
	if($initial){
		$initial = false;	
		?>

		<div id="cont-inner">
  		<ul data-role="listview" data-inset="true" data-theme="d">
    		<li data-role="list-divider">Sensoren</li>
    <?php
    }
    ?>
	<li>
    	<?php 
		if($row['hcType'] == "temperatur"){
		echo $row['name'] . " aktuell: " . $row['value'] . " °C</br></br>"  ; 
    	$filename = "sensor_graph/" . $row['iname'] . "_day.png";
    	?>
    	<p><img src="<?php echo $filename; ?>" alt="Graph konnte nicht angezeigt werden"></p>

		<?php
		}elseif($row['hcType'] == "luftfeuchtigkeit"){
		
			echo $row['name'] . " aktuell: " . $row['value'] . "%</br></br>"  ; 
			$filename = "sensor_graph/" . $row['iname'] . "_day.png";
			?>
			<p><img src="<?php echo $filename; ?>" alt="Graph konnte nicht angezeigt werden"></p>
				
		
		<?php
		}
		?>
    </span>
    
    </li>
<?php


}
if(!$initial){
	echo "</ul>";
	echo "</div>";
}




?>



			

    		





