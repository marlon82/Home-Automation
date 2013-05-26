
<!DOCTYPE html> 
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Multi-page template</title> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>
	<!-- <script src="slider.js"></script> -->

<div data-role="page2" id="dashboard">

<div data-role="header" data-position="fixed" data-theme="b">
	<a href="#dashboard" data-icon="home">Home</a>
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
 #content {
    width:60px;
    margin:30px auto;
}
//.thermometer {
//    float: right;
// margin:0 150px;
//}

.thermometer  {
float:right;
position:relative ;
top:-250px;
right:50px;
    width:70px;
    height:200px;
   // position: relative;
    background: #ddd;
    border:1px solid #aaa;
    border-radius: 12px;
    box-shadow: 1px 1px 4px #999, 5px 0 20px #999;
}


.thermometer .track {
    z-index:2;
    height:150px;
    top:10px;
    width:20px;
    border: 1px solid #aaa;
    position: relative;
    margin:0 auto;
    background: rgb(255,255,255);


    background:   linear-gradient(to bottom, rgb(0,0,0) 1px,rgb(255,255,255) 10%);
    background-position: 0 -1px;
    background-size: 100% 5%;
}

.track:before{
   
    left:-9px;
     bottom: -35px;
    content: "";
     background: rgb(255,0,0);
     
   // background: rgba(255,0,0,0.6);
    width: 35px;
    height: 35px;
    border-radius: 50%;
    border: 1px solid #aaa;
 position: absolute;
}
.thermometer .progress1 {
       z-index:2;
    height:250px;
    top:10px;
    width:20px;
    border: 1px solid #aaa;
    position: relative;
    margin:0 auto;
    background: rgb(255,255,255);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgb(0,0,0)), color-stop(100%,rgb(255,255,255)));

    background:   linear-gradient(to bottom, rgb(0,0,0) 10%,rgb(255,255,255) 10%);
    background-position: 0 -1px;
    background-size: 100% 5%; 
}

.thermometer .progress {
    z-index:-1;
    width:100%;
     background: rgb(255,0,0);
 //background: rgb(255,255,255);
    //background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgb(0,0,0)), color-stop(1%,rgb(255,255,255)))
        background:   linear-gradient(to bottom, rgb(0,0,0) 0%,rgb(255,255,255) 10%);
    
    //border: 1px solid #aaa;
    //background-size: 100% 5%;
    //background: rgba(255,0,0,0.6);
    position: absolute;
        background-position: 0 -1px;
    background-size: 100% 5%;
    bottom:0;
    left:0;
}

.thermometer .goal {
    position:absolute;
    top:0;
}

.thermometer .amount {
    display: inline-block;
    padding:0 5px 0 60px;
    border-top:1px solid black;
    font-family: Trebuchet MS;
    font-weight: bold;
    color:black;
}

.thermometer .progress .amount1 {
    padding:0 50px 0 5px;
    position: absolute;
    border-top:1px solid black;
    color:black;
    right:0;
    font-weight: bold;
}



 
</style>




<?php
include('functions.php');
include('config.php');
if($_GET['room']){
	$roomid =  $_GET['room'];
}else{
	$roomid = 1;
}



echo "<script>\n";



echo "$(document).ready( function () {\n";
$typ = "schalter"; 
$sql = query( "SELECT name,iName,iid FROM aktor WHERE room = '" . $roomid . "' AND type = '" . $typ . "'" );
for ($i=1; $holen =  fetch($sql); $i++) {
	$link = '?id=' . $holen['iid'] . '&value=';
	echo "$(\"#flip-" . $holen['iid'] . "\").on(\"slidestop\", function( event, ui ) { \n";
	echo "var singleValues = $(\"#flip-" . $holen['iid'] . "\").val();\n";
	echo "var url = \"$link\";\n";
	echo "var url_komplett = \"aktor.php\" +  url + singleValues;\n";
	
	echo "alert(url_komplett);\n";
	
	echo "var jqxhr = $.get(url_komplett, function() {";

echo "})";

	//echo "$(\"#slider-" . $holen['iid'] . "\").on(\"slidestop\", function( event, ui ) { \n";
	//echo "var singleValues = $(\"#slider-" . $holen['iid'] . "\").val();\n";
	//echo "var link = \"$link\";\n";
	//echo "var test = \"index.php?page=room&room=1\" + link + singleValues;\n";
	//echo "window.location= \"index.php?page=room&room=1\" + link + singleValues;\n";
	echo "});\n";

}
	

$typ = "dimmer"; 
$sql = query( "SELECT name,iName,iid FROM aktor WHERE room = '" . $roomid . "' AND type = '" . $typ . "'" );

for ($i=1; $holen =  fetch($sql); $i++) {
	//$link = '&action=setAktor&id=' . $holen['iid'] . '&value=';
	
	//echo "$(\"#flip-" . $holen['iid'] . "\").on(\"slidestop\", function( event, ui ) { \n";
	//echo "var singleValues = $(\"#flip-" . $holen['iid'] . "\").val();\n";
	//echo "var link = \"$link\";\n";
	//echo "var test = \"index.php?page=room&room=1\" + link + singleValues;\n";
	//echo "window.location= \"index.php?page=room&room=1\" + link + singleValues;\n";
	//echo "});\n";

}


echo "});\n"; 					
echo "</script>\n";




switch( $_GET['action'] ){
		
		case 'setAktor':

			extract(ReadXS1(actuator,30));
			
			$sql = query( "SELECT type FROM aktor WHERE iid = '" . $_GET['id'] . "'" );
			$row = fetch( $sql );
			
			if( $row['type'] == 'taster' )
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
$sql = query( "SELECT id,name FROM rooms");					
while( $row = fetch( $sql ) )
{
?>
	<li <?php if($row['id'] == $active) { ?> class="ui-btn-active ui-state-persist" <?php } ?> ><a href="?page=room&room=<?php echo $row['id'] ?>" rel="external"> <img src="./icons/house.png"  class="ui-li-icon ui-corner-none"><?php echo $row['name'] ?></a></li>
<?php
}
?>

</ul>
	
</div>
<div id="cont">
<?php


//#####################Aktoren auslesen und ausgeben
$typ = "dimmer";  //Nur Dimmer auslesen und anzeigen
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
    <input name="slider-<?php echo $row['iid'] ?>" id="slider-<?php echo $row['iid'] ?>" data-highlight="true" min="0" max="100" value="<?php echo $value ?>" type="range">
    </li>
<?php


}
if(!$initial){
	echo "</ul>\n";
	echo "</div>\n";
}



//#########################Aktoren auslesen und ausgeben
$typ = "schalter";  //Nur schalter auslesen und anzeigen
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
	echo "</ul>";
	echo "</div>";
}


//#########################Sensoren auslesen und ausgeben
$typ = "schalter";  //Nur schalter auslesen und anzeigen
$sql = query( "SELECT iname,name,value,iid FROM sensoren WHERE room = '" . $roomid . "'" );	


$initial = true;
			
while( $row = fetch( $sql ) )
{
	//Nur Dimmer
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
    	<?php echo $row['name'] . ": " . $row['value'] . " °C</br></br>"  ; 
    	//GenGraph($vars,$vars);
    	//$filename = "sensor_graph/" . $row['iname'] . ".png";
    	$filename = "sensor_graph/" . "temp_sensor" . ".png";
    	?>
    	<p><img src="<?php echo $filename; ?>" alt="Graph konnte nicht angezeigt werden"></p>
    	<div class="thermometer">

       <div class="track">
           <div class="goal">
                <div class="amount">40°C</div>
            </div>
            <div class="progress" style="height:40%;">
                <div class="amount1">30.5°C</div>
            </div>
        </div> 

    </span>
    
    </li>
<?php


}
if(!$initial){
	echo "</ul>";
	echo "</div>";
}




?>



			

    		









