<div data-role="page" id="dashboard">
<?
include("header.php");
include('functions.php');

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

<script>	
	function SamsungKey(Device,Key) {
		var jqxhr = $.get("setFunctions.php?function=SamsungSendKey&Device=" + Device +"&Key=" + Key, function() {})
	}
		
	function OnkyoSendKey(Device,Key) {
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
	//$(".ui-btn-active").removeClass('ui-btn-active');

<?

$sqlDevicesMultimedia = query( "SELECT id,name,type,ip,room FROM devices WHERE type = 'onkyoavrec'" );
while( $multimedia = fetch($sqlDevicesMultimedia)) {
		echo "	$(\"#slider-Onkyo-Vol-" . $multimedia['id'] . "\").on(\"slidestop\", function( event, ui ) {\n";
		echo "		var Value = $(\"#slider-Onkyo-Vol-" . $multimedia['id'] . "\").val();\n";
		echo "		var Device = \"" . $multimedia['ip'] . "\";\n";
		echo "		var HexValue = decimalToHex(Value);\n";
		//echo "	alert(\"Device: \" + Device + \"     Value: \" + Value + \"     HexValue: \" + HexValue);\n";
		echo "		var jqxhr = $.get(\"setFunctions.php?function=OnkyoSendKey&Device=\" + Device +\"&Key=!1MVL\" + HexValue + \"#\", function() {})\n";
		echo "	});\n\n\n";		
		
		echo "	$(\"#slider-Onkyo-Bass-" . $multimedia['id'] . "\").on(\"slidestop\", function( event, ui ) {\n";
		echo "		var Value = $(\"#slider-Onkyo-Bass-" . $multimedia['id'] . "\").val();\n";
		echo "		var Device = \"" . $multimedia['ip'] . "\";\n";
		echo "		var HexValue = Value;\n";
		echo "		alert(\"Device: \" + Device + \"     Value: \" + Value + \"     HexValue: \" + HexValue);\n";
		echo "		var jqxhr = $.get(\"setFunctions.php?function=OnkyoSendKey&Device=\" + Device +\"&Key=!1TFR\" + HexValue + \"#\", function() {})\n";
		echo "	});\n\n\n";		
		
		echo "	$(\"#slider-Onkyo-Treble-" . $multimedia['id'] . "\").on(\"slidestop\", function( event, ui ) {\n";
		echo "		var Value = $(\"#slider-Onkyo-Treble-" . $multimedia['id'] . "\").val();\n";
		echo "		var Device = \"" . $multimedia['ip'] . "\";\n";
		echo "		var HexValue = Value;\n";
		echo "		alert(\"Device: \" + Device + \"     Value: \" + Value + \"     HexValue: \" + HexValue);\n";
		echo "		var jqxhr = $.get(\"setFunctions.php?function=OnkyoSendKey&Device=\" + Device +\"&Key=!1TFR\" + HexValue + \"#\", function() {})\n";
		echo "	});\n\n\n";		
		
		echo "	$(\"#slider-Onkyo-Subwoofer-" . $multimedia['id'] . "\").on(\"slidestop\", function( event, ui ) {\n";
		echo "		var Value = $(\"#slider-Onkyo-Subwoofer-" . $multimedia['id'] . "\").val();\n";
		echo "		var Device = \"" . $multimedia['ip'] . "\";\n";
		echo "		var HexValue = decimalToHex(Value);\n";
		echo "		alert(\"Device: \" + Device + \"     Value: \" + Value + \"     HexValue: \" + HexValue);\n";
		echo "		var jqxhr = $.get(\"setFunctions.php?function=OnkyoSendKey&Device=\" + Device +\"&Key=!1SWL\" + HexValue + \"#\", function() {})\n";
		echo "	});\n\n\n";
		
		echo "	$(\"#slider-Onkyo-Center-" . $multimedia['id'] . "\").on(\"slidestop\", function( event, ui ) {\n";
		echo "		var Value = $(\"#slider-Onkyo-Center-" . $multimedia['id'] . "\").val();\n";
		echo "		var Device = \"" . $multimedia['ip'] . "\";\n";
		echo "		var HexValue = decimalToHex(Value);\n";
		echo "		alert(\"Device: \" + Device + \"     Value: \" + Value + \"     HexValue: \" + HexValue);\n";
		echo "		var jqxhr = $.get(\"setFunctions.php?function=OnkyoSendKey&Device=\" + Device +\"&Key=!1CTL\" + ValPM + HexValue + \"#\", function() {})\n";
		echo "	});\n\n\n";
	
		echo "	$(\"#slider-Onkyo-Z2-Vol-" . $multimedia['id'] . "\").on(\"slidestop\", function( event, ui ) {\n";
		echo "		var Value = $(\"#slider-Onkyo-Z2-Vol-" . $multimedia['id'] . "\").val();\n";
		echo "		var Device = \"" . $multimedia['ip'] . "\";\n";
		echo "		var HexValue = decimalToHex(Value);\n";
		//echo "		alert(\"Device: \" + Device + \"     Value: \" + Value + \"     HexValue: \" + HexValue);\n";
		echo "		var jqxhr = $.get(\"setFunctions.php?function=OnkyoSendKey&Device=\" + Device +\"&Key=!1ZVL\" + HexValue + \"#\", function() {})\n";
		echo "	});\n\n\n";
				
		echo "	$(\"#slider-Onkyo-Z2-Bass-" . $multimedia['id'] . "\").on(\"slidestop\", function( event, ui ) {\n";
		echo "		var Value = $(\"#slider-Onkyo-Z2-Bass-" . $multimedia['id'] . "\").val();\n";
		echo "		var Device = \"" . $multimedia['ip'] . "\";\n";
		echo "		var HexValue = Value;\n";
		echo "		alert(\"Device: \" + Device + \"     Value: \" + Value + \"     HexValue: \" + HexValue);\n";
		echo "		var jqxhr = $.get(\"setFunctions.php?function=OnkyoSendKey&Device=\" + Device +\"&Key=!1ZTN\" + HexValue + \"#\", function() {})\n";
		echo "	});\n\n\n";
		
		echo "	$(\"#slider-Onkyo-Z2-Treble-" . $multimedia['id'] . "\").on(\"slidestop\", function( event, ui ) {\n";
		echo "		var Value = $(\"#slider-Onkyo-Z2-Treble-" . $multimedia['id'] . "\").val();\n";
		echo "		var Device = \"" . $multimedia['ip'] . "\";\n";
		echo "		var HexValue = Value;\n";
		echo "		alert(\"Device: \" + Device + \"     Value: \" + Value + \"     HexValue: \" + HexValue);\n";
		echo "		var jqxhr = $.get(\"setFunctions.php?function=OnkyoSendKey&Device=\" + Device +\"&Key=!1ZTN\" + HexValue + \"#\", function() {})\n";
		echo "	});\n\n\n";
		
		//Onkyo
		echo "	$(\"#flip-Onkyo-" . $multimedia['id'] . "\").on(\"slidestop\", function( event, ui ) { \n";
		echo "		var Value = $(\"#flip-Onkyo-" . $multimedia['id'] . "\").val();\n";
		echo "		var Device = \"" . $multimedia['ip'] . "\";\n";
		//echo "		alert(\"Device: \" + Device + \"     Value: \" + Value);\n";
		echo "		var jqxhr = $.get(\"setFunctions.php?function=OnkyoSendKey&Device=\" + Device +\"&Key=!1\" + Value + \"#\", function() {})\n";
		echo "		changeElement(\"flip-Onkyo-" . $multimedia['id'] . "-schalten-css\")\n";
		echo "	});\n\n";
		
		
		//Ex: FM 100.55 MHz(50kHz Step) Direct Tuning is [!1SLI24][!1TUNDIRECT][!1TUN1][!1TUN0][!1TUN0][!1TUN5][!1TUN5]
		echo "	$(\"#slider-Onkyo-Z2-Frequency-" . $multimedia['id'] . "\").on(\"slidestop\", function( event, ui ) {\n";
		echo "		var Value = $(\"#slider-Onkyo-Z2-Frequency-" . $multimedia['id'] . "\").val();\n";
		echo "		var ValueS = Value.toString()\n";
		echo "		var Device = \"" . $multimedia['ip'] . "\";\n";
		echo "		var Test = ValueS.replace(/\./g, \"\");\n";
		//echo "		var ValueS = Test.toString()\n";
		//echo "		alert(\"Device: \" + Device + \"     Test: \" + Test);\n";,
		//echo "		alert(\"Value: \" + Test.charAt(2));\n";
		//echo "		var jqxhr = $.get(\"setFunctions.php?function=OnkyoSendKey&Device=\" + Device +\"&Key=!1SLI24#\", function() {})\n";
		//echo "		var jqxhr = $.get(\"setFunctions.php?function=OnkyoSendKey&Device=\" + Device +\"&Key=!1TUNDIRECT#\", function() {})\n";
		echo "		var i = 10;\n";
		echo "		for (i = 0; i < ValueS.length(); i++)\n";
		echo "		{\n";
		echo "			alert(\"Value: \" + ValueS.charAt(i));\n";
		//echo "			var jqxhr = $.get(\"setFunctions.php?function=OnkyoSendKey&Device=\" + Device +\"&Key=!1ZTN\" + ValueS.charAt(i) + \"#\", function() {})\n";
		echo "		}\n";
		echo "	});\n\n\n";	
}

?>
});	

</script>
<?
$sqlDevices = query( "SELECT * FROM devices WHERE type = 'samsungbluray'" );
$multimedia = fetch($sqlDevices);
$IP = $multimedia['ip'];

$sqlDevices = query( "SELECT * FROM devices WHERE type = 'onkyoavrec'" );
$Onkyo = fetch($sqlDevices);
?>
<div  data-role="sidebar" id="left-sidebar"> 
	<div style="float: left; border-radius:10px; height:200%; width:90%; margin-left:10px; margin-top:10px; margin-right:10px">
    	<div data-role="collapsible" data-theme="d" data-content-theme="d">
			<h2>Lautsprecher</h2>
			<ul data-role="listview">
				<li <?php if($_GET['aktion'] == 'LautsprecherAussen') { ?> class="ui-btn-active" <?php } ?>><a href="?page=multimedia&aktion=LautsprecherAussen">Lautsprecher Aussen</a></li>
				<li <?php if($_GET['aktion'] == 'LautsprecherInnen') { ?> class="ui-btn-active" <?php } ?>><a href="?page=multimedia&aktion=LautsprecherInnen">Lautsprecher Innen</a></li>
			</ul>
		</div>	
    	<div data-role="collapsible" data-theme="d" data-content-theme="d">
			<h2>Television</h2>
			<ul data-role="listview">
				<li <?php if($_GET['aktion'] == 'KeyPad') { ?> class="ui-btn-active" <?php } ?>><a href="?page=multimedia&aktion=KeyPad">KeyPad</a></li>
				<li <?php if($_GET['aktion'] == 'Channels') { ?> class="ui-btn-active" <?php } ?>><a href="?page=multimedia&aktion=Channels">Channels</a></li>
				<li <?php if($_GET['aktion'] == 'TVChannels') { ?> class="ui-btn-active" <?php } ?>><a href="?page=multimedia&aktion=TVChannels">TVChannels</a></li>
				<li <?php if($_GET['aktion'] == 'Macros') { ?> class="ui-btn-active" <?php } ?>><a href="?page=multimedia&aktion=Macros">Macros</a></li>
			</ul>
		</div>		
	</div>
</div>

<?
switch( $_GET['aktion'] ){
	case 'LautsprecherAussen':
		?>        
		<div id="cont">
			<ul data-role="listview" data-inset="true">
				<?//Power ?>
					<?
					$Zone2Power = Onkyo_get_status($Onkyo['ip'],'!1ZPWQSTN#');
					//echo $Zone2Power;
					if ($Zone2Power == 'NA') { $Zone2Power = 'No'; }
					$Zone2Power = explode('!1ZPW',$Zone2Power);
					//echo $Zone2Power;
					?>
					<li>
						<label for="flip-Onkyo-<?php echo $Onkyo['id'] ?>">Power</label>
						<div style="position: absolute ;right:10px;top:0">
							<select name="flip-Onkyo-<?php echo $Onkyo['id'] ?>" id="flip-Onkyo-<?php echo $Onkyo['id'] ?>" data-role="slider" data-mini="true">
								<option value="ZPW00" <? if($Zone2Power[1] != '01'){ echo "selected=\"selected\"";}; ?>>Aus</option>
								<option value="ZPW01" <? if($Zone2Power[1] == '01'){ echo "selected=\"selected\"";}; ?>>An</option>
							</select>	
						</div>
					</li>	
				<?//Volume ?>
					<?	
					//echo $Onkyo['zeitEin'];
					$SliderValueHex = Onkyo_get_status($Onkyo['ip'],'!1ZVLQSTN#');
					//echo $SliderValueHex;
					$temp = explode('!1ZVL',$SliderValueHex);
					$SliderValueHex = $temp[1];
					if ($SliderValueHex == 'N/A') {
						$SliderValueHex = '00';
					}	
					$SliderValue = hexdec($SliderValueHex);
					
					?>
					<li>
					<label for="slider-Onkyo-Z2-Vol-<? echo $Onkyo['id']; ?>">Volume</label>
					<input name="slider-Onkyo-Z2-Vol-<? $Onkyo['id']; ?>" id="slider-Onkyo-Z2-Vol-<? echo $Onkyo['id'];?>" data-highlight="true" min="0" max="100" step="1" value="<? echo $SliderValue; ?>" type="range">
					</li>	
				<?//Input?>	
					
						
							<li><a href="#" data-role="button" onClick="OnkyoSendKey('<? echo $Onkyo['ip']; ?>','!1SLZ23#')">CD</a></li>
							<li><a href="#" data-role="button" onClick="OnkyoSendKey('<? echo $Onkyo['ip']; ?>','!1SLZ24#')">FM</a></li>
							<li><a href="#" data-role="button" onClick="OnkyoSendKey('<? echo $Onkyo['ip']; ?>','!1SLZ2B#')">Net</a></li>
							<li><a href="#" data-role="button" onClick="OnkyoSendKey('<? echo $Onkyo['ip']; ?>','!1SLZ2C#')">USB</a></li>
						
					
					
					
				<?//Frequency ?>	
					<li>
					<?
					
					if ($Zone2Power != 'No'){
						$SliderValue = Onkyo_get_status($Onkyo['ip'],'!1TUZQSTN#');
						$SliderValue = substr($SliderValue, 5);
					}else{
						$SliderValue = '100';
					}
					$SliderValueMain = substr($SliderValue, 0, 3);
					$SliderValueSub = substr($SliderValue, 3);
					
					if ($SliderValueMain[0] == '0'){
						$SliderValueMain = substr($SliderValueMain, 1);
					}
					$Frequency = $SliderValueMain . "." . $SliderValueSub;
					//echo $Frequency;
					?>
					<label for="slider-Onkyo-Z2-Frequency-<? echo $Onkyo['id']; ?>">Frequency</label>
					<input name="slider-Onkyo-Z2-Frequency-<? $Onkyo['id']; ?>" id="slider-Onkyo-Z2-Frequency-<? echo $Onkyo['id'];?>" data-highlight="true" min="86" max="110" step="0.05" value="<? echo $Frequency; ?>" type="range">
					</li>	
					
				</ul>			
			</div>		
		<?php
		break;
			
	case 'LautsprecherInnen':
		?>
		<div id="cont">
			<ul data-role="listview" data-inset="true">	
					<?//Power ?>
						<?
						$Power = Onkyo_get_status($Onkyo['ip'],'!1PWRQSTN#');
						if ($Power == 'NA') { $Power = 'No'; }
						$Power = explode('!1PWR',$Power);
						//echo $Power[1];
						//echo $Power;
						?>
						<li>
							<label for="flip-Onkyo-<?php echo $Onkyo['id'] ?>">Power</label>
							<div style="position: absolute ;right:10px;top:0">
								<select name="flip-Onkyo-<?php echo $Onkyo['id'] ?>" id="flip-Onkyo-<?php echo $Onkyo['id'] ?>" data-role="slider" data-mini="true">
									<option value="PWR00" <? if($Power[1] != '01'){ echo "selected=\"selected\"";}; ?>>Aus</option>
									<option value="PWR01" <? if($Power[1] == '01'){ echo "selected=\"selected\"";}; ?>>An</option>
								</select>	
							</div>
						</li>						
					<?//Volume ?>
						<li>
						<?
						if ($Onkyo['zeitEin'] != '0'){
							$SliderValueHex = Onkyo_get_status($Onkyo['ip'],'!1MVLQSTN#');
							$SliderValueHex = substr($SliderValueHex, 5, 2);
						}else{
							$SliderValueHex = '00';
						}		
						$SliderValue = hexdec($SliderValueHex);
						
						?>
						<label for="slider-Onkyo-Vol-<? echo $Onkyo['id']; ?>">Volume</label>
						<input name="slider-Onkyo-Vol-<? $Onkyo['id']; ?>" id="slider-Onkyo-Vol-<? echo $Onkyo['id'];?>" data-highlight="true" min="0" max="100" step="1" value="<? echo $SliderValue; ?>" type="range">
						</li>	
						
					<?//Treble and Bass ?>	
						<?
						
						if ($Onkyo['zeitEin'] != '0'){
							$SliderValueHex = Onkyo_get_status($Onkyo['ip'],'!1TFRQSTN#');
							$SliderValueHexBass = substr($SliderValueHex, strpos($SliderValueHex, 'B') + 1, strpos($SliderValueHex, 'T'));
							$SliderValueHexTreble = substr($SliderValueHex, strrpos($SliderValueHex, 'T') + 1, strlen($SliderValueHex) - (strrpos($SliderValueHex, 'T') + 1));
							
							$SliderValueHexBass = str_replace('+', '', $SliderValueHexBass);
							$SliderValueHexTreble = str_replace('+', '', $SliderValueHexTreble);
							$SliderValueHexBass = str_replace('-', '', $SliderValueHexBass);
							$SliderValueHexTreble = str_replace('-', '', $SliderValueHexTreble);
						}else{
							$SliderValueHexBass = '0';
							$SliderValueHexTreble = '0';
						}		
						//echo $SliderValueHexBass;
						//echo $SliderValueHexTreble;
						?>
						<li>
						<label for="slider-Onkyo-Bass-<? echo $Onkyo['id']; ?>">Bass</label>
						<input name="slider-Onkyo-Bass-<? $Onkyo['id']; ?>" id="slider-Onkyo-Bass-<? echo $Onkyo['id'];?>" data-highlight="true" min="-10" max="10" step="1" value="<? echo $SliderValueHexBass; ?>" type="range">
						</li>
						<li>
						<label for="slider-Onkyo-Treble-<? echo $Onkyo['id']; ?>">Treble</label>
						<input name="slider-Onkyo-Treble-<? $Onkyo['id']; ?>" id="slider-Onkyo-Treble-<? echo $Onkyo['id'];?>" data-highlight="true" min="-10" max="10" step="1" value="<? echo $SliderValueHexTreble; ?>" type="range">
						</li>			
						
					<?//Subwoofer ?>
						<li>
						<?
						
						if ($Onkyo['zeitEin'] != '0'){
							$SliderValueHex = Onkyo_get_status($Onkyo['ip'],'!1SWLQSTN#');
							$SliderValueHex = substr($SliderValueHex, 5, 2);
						}else{
							$SliderValueHex = '00';
						}		
						$SliderValue = hexdec($SliderValueHex);
						
						?>
						<label for="slider-Onkyo-Sub-<? echo $Onkyo['id']; ?>">Subwoofer</label>
						<input name="slider-Onkyo-Sub-<? $Onkyo['id']; ?>" id="slider-Onkyo-Sub-<? echo $Onkyo['id'];?>" data-highlight="true" min="-15" max="+12" step="1" value="<? echo $SliderValue; ?>" type="range">
						</li>
						
					<?//Center ?>
						<li>
						<?
						
						if ($Onkyo['zeitEin'] != '0'){
							$SliderValueHex = Onkyo_get_status($Onkyo['ip'],'!1CTLQSTN#');
							$SliderValueHex = substr($SliderValueHex, 5, 2);
						}else{
							$SliderValueHex = '00';
						}		
						$SliderValue = hexdec($SliderValueHex);
						
						?>
						<label for="slider-Onkyo-Center-<? echo $Onkyo['id']; ?>">Center</label>
						<input name="slider-Onkyo-Center-<? $Onkyo['id']; ?>" id="slider-Onkyo-Center-<? echo $Onkyo['id'];?>" data-highlight="true" min="-12" max="+12" step="1" value="<? echo $SliderValue; ?>" type="range">
						</li>
						
					</ul>
				</div>
					<?
					break;
	
	case 'KeyPad':
				?>
			<div id="cont">
				<li data-role="list-divider">Television</li>	
				<div data-role="navbar">
					<ul>
						<li><a href="#" data-role="button" onClick="SamsungKey('<? echo $IP; ?>','1')">1</a></li>
						<li><a href="#" data-role="button" onClick="SamsungKey('<? echo $IP; ?>','2')">2</a></li>
						<li><a href="#" data-role="button" onClick="SamsungKey('<? echo $IP; ?>','3')">3</a></li>
					</ul>
				</div>
				<div data-role="navbar">
					<ul>
						<li><a href="#" data-role="button" onClick="SamsungKey('<? echo $IP; ?>','4')">4</a></li>
						<li><a href="#" data-role="button" onClick="SamsungKey('<? echo $IP; ?>','5')">5</a></li>
						<li><a href="#" data-role="button" onClick="SamsungKey('<? echo $IP; ?>','6')">6</a></li>
					</ul>
				</div>
				<div data-role="navbar">
					<ul>
						<li><a href="#" data-role="button" onClick="SamsungKey('<? echo $IP; ?>','7')">7</a></li>
						<li><a href="#" data-role="button" onClick="SamsungKey('<? echo $IP; ?>','8')">8</a></li>
						<li><a href="#" data-role="button" onClick="SamsungKey('<? echo $IP; ?>','9')">9</a></li>
					</ul>
				</div>
				<div data-role="navbar">
					<ul>
						<li><a href="#" data-role="button" onClick="SamsungKey('<? echo $IP; ?>','0')">0</a></li>
					</ul>
				</div>
				<div data-role="navbar">
					<ul>
						<li><a href="#" data-role="button" onClick="SamsungKey('<? echo $IP; ?>','INFO')">INFO</a></li>
						<li><a href="#" data-role="button" onClick="SamsungKey('<? echo $IP; ?>','ENTER')">ENTER</a></li>
						<li><a href="#" data-role="button" onClick="SamsungKey('<? echo $IP; ?>','GUIDE')">GUIDE</a></li>
						<li><a href="#" data-role="button" onClick="SamsungKey('<? echo $IP; ?>','EXIT')">EXIT</a></li>
						<li><a href="#" data-role="button" onClick="SamsungKey('<? echo $IP; ?>','2,4,7,5,ENTER')">PIN</a></li>
					</ul>
				</div>
				<div data-role="navbar">
					<ul>
						<li><a href="#" id="Sasmung-Left" data-role="button" data-icon="arrow-l" data-iconpos="notext" rel="external" onClick="SamsungKey('<? echo $IP; ?>','LEFT')">Left</a></li>
						<li><a href="#" id="Sasmung-Right"data-role="button"  data-icon="arrow-r" data-iconpos="notext" rel="external" onClick="SamsungKey('<? echo $IP; ?>','RIGTH')">Rigth</a></li>
						<li><a href="#" id="Sasmung-Up" data-role="button" data-icon="arrow-u" data-iconpos="notext" rel="external" onClick="SamsungKey('<? echo $IP; ?>','UP')">Up</a></li>
						<li><a href="#" id="Sasmung-Down" data-role="button" data-icon="arrow-d" data-iconpos="notext" rel="external" onClick="SamsungKey('<? echo $IP; ?>','DOWN')">Down</a></li>
					</ul>
				</div>
			</div>
				<?
		break;
		
	case 'TVChannels':
		?>
		
		<div id="cont">
			<ul data-role="listview" data-autodividers="true" data-filter="true" data-inset="true">
						<?
						$sql = query( "SELECT id,DeviceID FROM devicemacro");
						while( $device = fetch($sql))
						{
							$DevicesWithMacro[] = $device['DeviceID'];
						}
						$DevicesWithMacro = array_unique($DevicesWithMacro);
						$DevicesWithMacro = array_values($DevicesWithMacro);
						for($i=0;$i<=count($DevicesWithMacro)-1;$i++)
						{
							$sql_device = query( "SELECT id,name,type,ip,room,zeitEin FROM devices WHERE id ='" . $DevicesWithMacro[$i] . "'");
							$device = fetch($sql_device);
							$sql_devMacro = query("SELECT MacroID FROM devicemacro WHERE deviceID ='" . $device['id'] . "'");
						
							while ($DevMacros = fetch($sql_devMacro)){		
								$sql_Macros = query("SELECT * FROM tvmacros WHERE id ='" . $DevMacros['MacroID'] . " ORDER BY name ASC'");
								$Macro = fetch($sql_Macros);
								
								if ($Macro['isChannel'] == 'Yes') {
									if ($device['type'] == 'samsungtv') {
										$devLink = 'SamsungKey';
									}elseif ($device['type'] == 'samsungbluray') {
										$devLink = 'SamsungKey';
									}elseif ($device['type'] == 'onkyoavrec'){ 
										$devLink = 'OnkyoKey';
									}elseif ($device['type'] == 'enigma2') {
										$devLink = 'unknown';
									}
									if ($Macro['ChannelIcon'] != '') {
										$Text = $Macro['name'];
									}else{
										$Text = $Macro['name'];
									}
									?><li><a href="#" data-role="button" id="button-<? echo $Macro['id']; ?>" data-inline="true" data-mini="true" onClick="<? echo $devLink . "('" . $device['ip'] . "','". $Macro['value'] . "')";?>"><img src="<?php echo $Macro['ChannelIcon'] ?>"><? echo $Text;?></a></li><?
								}
							}
						}?>
					</ul>
				</div>
					<?
		break;
		
	case 'Macros':
			?><div id="cont"><?
			$sql = query( "SELECT id,DeviceID FROM devicemacro");
			while( $device = fetch($sql))
			{
				$DevicesWithMacro[] = $device['DeviceID'];
			}
			$DevicesWithMacro = array_unique($DevicesWithMacro);
			$DevicesWithMacro = array_values($DevicesWithMacro);
			for($i=0;$i<=count($DevicesWithMacro)-1;$i++)
			{
				$sql_device = query( "SELECT id,name,type,ip,room,zeitEin FROM devices WHERE id ='" . $DevicesWithMacro[$i] . "'");
				$device = fetch($sql_device);

				?>
				<div data-role="collapsible">
					<h2>Macros <? echo $device['name'] ;?></h2>
					<div class="padme">
						<ul data-role="listview" data-autodividers="true" data-filter="true" data-inset="true">
						<?
						$sql_devMacro = query("SELECT MacroID FROM devicemacro WHERE deviceID ='" . $device['id'] . "'");
						while ($DevMacros = fetch($sql_devMacro)){		
							$sql_Macros = query("SELECT * FROM tvmacros WHERE id ='" . $DevMacros['MacroID'] . " ORDER BY name ASC'");
							$Macro = fetch($sql_Macros);
							if ($Macro['isChannel'] != 'Yes') {
								if ($device['type'] == 'samsungtv') {
									$devLink = 'SamsungKey';
								}elseif ($device['type'] == 'samsungbluray') {
									$devLink = 'SamsungKey';
								}elseif ($device['type'] == 'onkyoavrec'){ 
									$devLink = 'OnkyoKey';
								}elseif ($device['type'] == 'enigma2') {
									$devLink = 'unknown';
								}
								?>
									<li><a href="#" data-role="button" id="button-<? echo $Macro['id']; ?>" data-inline="true" data-mini="true" onClick="<? echo $devLink . "('" . $device['ip'] . "','". $Macro['value'] . "')";?>"><? echo $Macro['name'];?></a></li>
								<?
							}
						}	
						?>
						</ul>
					</div>
				</div><?
			}
			?></div><?
		break;
		
	case 'Channels':
		
		$sqlDevices = query( "SELECT * FROM devices WHERE type = 'samsungbluray'" );
		$multimedia = fetch($sqlDevices);
		$IP = $multimedia['ip'];
		$sqlDevMacros = query( "SELECT * FROM devicemacro WHERE DeviceID = '" .$multimedia['id'] . "'" );
		?>
		<div id="cont">
			<div data-role="navbar">
				<ul>
				<?
				while ($DevMacros = fetch($sqlDevMacros)){		
					$sql_Macros = query("SELECT * FROM tvmacros WHERE id ='" . $DevMacros['MacroID'] . " ORDER BY name ASC'");
					$Macro = fetch($sql_Macros);
					?><li><a href="#" data-role="button" onClick="SamsungKey('<? echo $IP; ?>','<? echo $Macro['value']; ?>')"><? echo $Macro['name']; ?></a></li>
				<?}?>
				</ul>
			</div>
		</div>
		<?
		break;
	
	default:
		//include('dashboard.php');
		break;	
	}

?>