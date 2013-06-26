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
	<h1>Multimedia</h1>
	<a href="javascript:history.go(0)" data-icon="refresh">refresh</a>
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
}
 div.Multimedia {
  margin-top:15px;
  margin-left:15px;
  border-width:1px;
  border-style:solid;
  border-color:blue;
  
  float:left;
  width:32%;
  height:500px;
}

div.Buttons {
 float:left;
}

div.Multimedia img{
margin-top:10px;
float:left;
}

div.Multimedia table{
margin-top:10px;
margin-right:10px;
margin-bottom:80px;
float:right;
}
</style>

<script>	
function SamsungKey(Device,Key)
{
	//alert("Device:"+Device+"     Key:"+Key);
	var jqxhr = $.get("setFunctions.php?function=SamsungSendKey&Device=" + Device +"&Key=" + Key, function() {})
}	
	
function OnkyoSendKey(Device,Key)
{
	//alert("Device:"+Device+"     Key:"+Key);
	var jqxhr = $.get("setFunctions.php?function=OnkyoSendKey&Device=" + Device +"&Key=" + Key, function() {})
}	

function decimalToHex(d, padding) {
    var hex = Number(d).toString(16);
    padding = typeof (padding) === "undefined" || padding === null ? padding = 2 : padding;

    while (hex.length < padding) {
        hex = "0" + hex;
    }

    return hex;
}


$(document).ready( function () {

<?

include('functions.php');

$sqlDevicesMultimedia = query( "SELECT id,name,type,ip,room FROM devices WHERE type = 'onkyoavrec'" );
while( $multimedia = fetch($sqlDevicesMultimedia)) {
		echo "$(\"#slider-Onkyo-Vol-" . $multimedia['id'] . "\").on(\"slidestop\", function( event, ui ) {\n";
		echo "	var Value = $(\"#slider-Onkyo-Vol-" . $multimedia['id'] . "\").val();\n";
		echo "	var Device = \"" . $multimedia['ip'] . "\";\n";
		echo "	var HexValue = decimalToHex(Value);\n";
		echo "	//alert(\"Device: \" + Device + \"     Value: \" + Value + \"     HexValue: \" + HexValue);\n";
		echo "	var jqxhr = $.get(\"setFunctions.php?function=OnkyoSendKey&Device=\" + Device +\"&Key=!1MVL\" + HexValue + \"#\", function() {})\n";
		echo "});\n";
}

?>

});	

</script>

<?php

$sqlDevices = query( "SELECT id,name,type,ip,room,zeitEin FROM devices WHERE type = 'samsungtv' OR type = 'samsungbluray' OR type = 'onkyoavrec' OR type = 'enigma2'" );

while( $multimedia = fetch($sqlDevices)) {
	$sqlRoom = query( "SELECT name FROM rooms WHERE id = '" . $multimedia['room'] . "'" );
	$Room = fetch($sqlRoom);
	
	if ($multimedia['type'] == 'samsungtv') { 
		$Show = True;
		$IconSource = "./icons/samsung_tv.png";
	}
	
	if ($multimedia['type'] == 'samsungbluray') {  
		$Show = True;
		$IconSource = "./icons/samsung_receiver.png";
	}
	
	if ($multimedia['type'] == 'onkyoavrec'){  
		$Show = True;
		$IconSource = "./icons/onkyo_av_receiver.png";
		
		//Volume Slider
		if ($multimedia['zeitEin'] != '0'){
			$SliderValueHex = Onkyo_get_status($multimedia['ip'],'!1MVLQSTN#');
			$SliderValueHex = substr($SliderValueHex, 5, 2);
		}else{
			$SliderValueHex = '00';
		}		
		$SliderValue = hexdec($SliderValueHex);
		
		$Buttons[] = "<li>\n" . "<label for=\"slider-Onkyo-Vol-" . $multimedia['id'] . "\">Volume</label>" . "<input name=\"slider-Onkyo-Vol-" . $multimedia['id'] . "\" id=\"slider-Onkyo-Vol-" . $multimedia['id'] . "\" data-highlight=\"true\" min=\"0\" max=\"100\" step=\"1\" value=\"" . $SliderValue . "\" type=\"range\">" . "</li>";
	}
	
	if ($multimedia['type'] == 'enigma2') { 
		$Show = True;
		$IconSource = "./icons/dream.png";
	}
	
	$sql_devMacro = query("SELECT MacroID FROM devicemacro WHERE deviceID ='" . $multimedia['id'] . "'");
		
	while ($DevMacros = fetch($sql_devMacro)){
		$sql_Macros = query("SELECT id,name,value FROM tvmacros WHERE id ='" . $DevMacros['MacroID'] . "' ORDER BY name ASC");
		$Macro = fetch($sql_Macros);
		if ($multimedia['type'] == 'samsungtv') {
		$devLink = 'SamsungKey';
		}elseif ($multimedia['type'] == 'samsungbluray') {
		$devLink = 'SamsungKey';
		}elseif ($multimedia['type'] == 'onkyoavrec'){ 
		$devLink = 'OnkyoSendKey';
		}elseif ($multimedia['type'] == 'enigma2') {
		$devLink = 'unknown';
		}
		$Buttons[] = "<a href=\"#\" data-role=\"button\" id=\"button-" . $Macro['id'] . "\" data-inline=\"true\" data-mini=\"true\" onClick=\"" . $devLink . "('" . $multimedia['ip'] . "','". $Macro['value'] . "')\">". $Macro['name'] . "</a>\n";
	}		
	
	if ($Show){
		?>
		<div class="Multimedia">
		<img width="30%" height="120" src="<? echo $IconSource; ?>" alt="Multimedia">

		<table border="0" width="60%">
			<tr>
				<td>Status:</td>
				<td>
				<?
				$isOnline = False;
				if ($multimedia['zeitEin'] != '0'){
					$isOnline = True;
				}
				?>
				<select name="flip-device-<?php echo $multimedia['id'] ?>" id="flip-device-<?php echo $multimedia['id'] ?>" data-role="slider" data-mini="true">
					<option value="off" <? if(!$isOnline){ echo "selected=\"selected\"";}; ?>>Aus</option>
					<option value="on" <? if($isOnline){ echo "selected=\"selected\"";}; ?>>An</option>
				</select>
				</td>
			</tr>
			<tr>
				<td>Name:</td>
				<td><? echo $multimedia['name'] ?></td>
			</tr>
			<tr>
				<td>IP:</td>
				<td><? echo $multimedia['ip'] ?></td>
			</tr>
			<tr>
				<td>Raum:</td>
				<td><? echo $Room['name'] ?></td>
			</tr>
		</table>
		<?
		echo "<div class=\"Buttons\">";
		for ($i=0;$i<count($Buttons);$i++){
			echo $Buttons[$i];
		}
		$Buttons="";
		echo "</div>";
		?>
		</div>
		<?
	}	
}
?>



