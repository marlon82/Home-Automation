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
		//alert("Device:"+Device+"     Key:"+Key);
		var jqxhr = $.get("setFunctions.php?function=SamsungSendKey&Device=" + Device +"&Key=" + Key, function() {})
	}
		
	function OnkyoSendKey(Device,Key) {
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
		
		//Ex: FM 100.55 MHz(50kHz Step) Direct Tuning is [!1SLI24][!1TUNDIRECT][!1TUN1][!1TUN0][!1TUN0][!1TUN5][!1TUN5]
		echo "	$(\"#slider-Onkyo-Z2-Frequency-" . $multimedia['id'] . "\").on(\"slidestop\", function( event, ui ) {\n";
		echo "		var Value = $(\"#slider-Onkyo-Z2-Frequency-" . $multimedia['id'] . "\").val();\n";
		echo "		var Device = \"" . $multimedia['ip'] . "\";\n";
		echo "		alert(\"Device: \" + Device + \"     Value: \" + Value);\n";
		echo "		//var jqxhr = $.get(\"setFunctions.php?function=OnkyoSendKey&Device=\" + Device +\"&Key=!1SLI24#\", function() {})\n";
		echo "		//var jqxhr = $.get(\"setFunctions.php?function=OnkyoSendKey&Device=\" + Device +\"&Key=!1TUNDIRECT#\", function() {})\n";
		echo "		//var jqxhr = $.get(\"setFunctions.php?function=OnkyoSendKey&Device=\" + Device +\"&Key=!1ZTN\" + HexValue + \"#\", function() {})\n";
		echo "	});\n\n\n";
}

?>
});	

</script>
<?
$sqlDevices = query( "SELECT * FROM devices WHERE type = 'samsungbluray'" );
$multimedia = fetch($sqlDevices);
$IP = $multimedia['ip'];
?>

<div data-role="content" >
	<div style="float: left; border-radius:10px; height:600px; width:40%; margin-left:10px; margin-bottom:12px">
		<div data-role="collapsible-set" data-theme="c" >
			<div data-role="collapsible">
				<h2>Radio Aussen</h2>
				<div class="padme">
					<ul data-role="listview" data-inset="true">
					
					<?//Power ?>
						<?
						$Zon2Power = Onkyo_get_status($multimedia['ip'],'!1ZPWQSTN#');
						if ($Zon2Power == 'NA') { $Zon2Power = 'No'; }
						echo $Zon2Power;
						?>
						<li>
							<label for="flip-Zone2-Power-<?php echo $multimedia['id'] ?>"><STRONG>Power</STRONG></label>
							<div style="position: absolute ;right:10px;top:0">
								<select name="flip-Zone2-Power-<?php echo $multimedia['id'] ?>" id="flip-Zone2-Power-<?php echo $multimedia['id'] ?>" data-role="slider" data-mini="true">
									<option value="off" <? if($Zon2Power != 'Yes'){ echo "selected=\"selected\"";}; ?>>Aus</option>
									<option value="on" <? if($Zon2Power == 'Yes'){ echo "selected=\"selected\"";}; ?>>An</option>
								</select>	
							</div>
						</li>	
					<?//Volume ?>
						<li>
						<?
						$sqlDevices = query( "SELECT * FROM devices WHERE type = 'onkyoavrec'" );
						$multimedia = fetch($sqlDevices);
						
						if ($multimedia['zeitEin'] != '0'){
							$SliderValueHex = Onkyo_get_status($multimedia['ip'],'!1ZVLQSTN#');
							$SliderValueHex = substr($SliderValueHex, 5, 2);
						}else{
							$SliderValueHex = '00';
						}		
						$SliderValue = hexdec($SliderValueHex);
						
						?>
						<label for="slider-Onkyo-Z2-Vol-<? echo $multimedia['id']; ?>">Volume</label>
						<input name="slider-Onkyo-Z2-Vol-<? $multimedia['id']; ?>" id="slider-Onkyo-Z2-Vol-<? echo $multimedia['id'];?>" data-highlight="true" min="0" max="100" step="1" value="<? echo $SliderValue; ?>" type="range">
						</li>	
						
					<?//Treble and Bass ?>	
						<?
						$sqlDevices = query( "SELECT * FROM devices WHERE type = 'onkyoavrec'" );
						$multimedia = fetch($sqlDevices);
						
						if ($multimedia['zeitEin'] != '0'){
							$SliderValueHex = Onkyo_get_status($multimedia['ip'],'!1ZTNQSTN#');
							//echo $SliderValueHex;
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
						<label for="slider-Onkyo-Z2-Bass-<? echo $multimedia['id']; ?>">Bass</label>
						<input name="slider-Onkyo-Z2-Bass-<? $multimedia['id']; ?>" id="slider-Onkyo-Z2-Bass-<? echo $multimedia['id'];?>" data-highlight="true" min="-10" max="10" step="1" value="<? echo $SliderValueHexBass; ?>" type="range">
						</li>
						<li>
						<label for="slider-Onkyo-Z2-Treble-<? echo $multimedia['id']; ?>">Treble</label>
						<input name="slider-Onkyo-Z2-Treble-<? $multimedia['id']; ?>" id="slider-Onkyo-Z2-Treble-<? echo $multimedia['id'];?>" data-highlight="true" min="-10" max="10" step="1" value="<? echo $SliderValueHexTreble; ?>" type="range">
						</li>	

					<?//Frequency ?>	
						<li>
						<?
						$sqlDevices = query( "SELECT * FROM devices WHERE type = 'onkyoavrec'" );
						$multimedia = fetch($sqlDevices);
						
						if ($multimedia['zeitEin'] != '0'){
							$SliderValue = Onkyo_get_status($multimedia['ip'],'!1TUZQSTN#');
							$SliderValue = substr($SliderValue, 5);
						}else{
							$SliderValue = '00000';
						}
						$SliderValueMain = substr($SliderValue, 0, 3);
						$SliderValueSub = substr($SliderValue, 3);
						
						if ($SliderValueMain[0] == '0'){
							$SliderValueMain = substr($SliderValueMain, 1);
						}
						$Frequency = $SliderValueMain . "," . $SliderValueSub;
						echo $Frequency;
						?>
						<label for="slider-Onkyo-Z2-Frequency-<? echo $multimedia['id']; ?>">Frequency</label>
						<input name="slider-Onkyo-Z2-Frequency-<? $multimedia['id']; ?>" id="slider-Onkyo-Z2-Frequency-<? echo $multimedia['id'];?>" data-highlight="true" min="86" max="110" step="0.05" value="<? echo $Frequency; ?>" type="range">
						</li>	
					</ul>
				</div>
			</div>	
			<div data-role="collapsible">
				<h2>Sound Settings</h2>
				<div class="padme">
					<ul data-role="listview" data-inset="true">					
					<?//Volume ?>
						<li>
						<?
						$sqlDevices = query( "SELECT * FROM devices WHERE type = 'onkyoavrec'" );
						$multimedia = fetch($sqlDevices);
						
						if ($multimedia['zeitEin'] != '0'){
							$SliderValueHex = Onkyo_get_status($multimedia['ip'],'!1MVLQSTN#');
							$SliderValueHex = substr($SliderValueHex, 5, 2);
						}else{
							$SliderValueHex = '00';
						}		
						$SliderValue = hexdec($SliderValueHex);
						
						?>
						<label for="slider-Onkyo-Vol-<? echo $multimedia['id']; ?>">Volume</label>
						<input name="slider-Onkyo-Vol-<? $multimedia['id']; ?>" id="slider-Onkyo-Vol-<? echo $multimedia['id'];?>" data-highlight="true" min="0" max="100" step="1" value="<? echo $SliderValue; ?>" type="range">
						</li>	
						
					<?//Treble and Bass ?>	
						<?
						$sqlDevices = query( "SELECT * FROM devices WHERE type = 'onkyoavrec'" );
						$multimedia = fetch($sqlDevices);
						
						if ($multimedia['zeitEin'] != '0'){
							$SliderValueHex = Onkyo_get_status($multimedia['ip'],'!1TFRQSTN#');
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
						<label for="slider-Onkyo-Bass-<? echo $multimedia['id']; ?>">Bass</label>
						<input name="slider-Onkyo-Bass-<? $multimedia['id']; ?>" id="slider-Onkyo-Bass-<? echo $multimedia['id'];?>" data-highlight="true" min="-10" max="10" step="1" value="<? echo $SliderValueHexBass; ?>" type="range">
						</li>
						<li>
						<label for="slider-Onkyo-Treble-<? echo $multimedia['id']; ?>">Treble</label>
						<input name="slider-Onkyo-Treble-<? $multimedia['id']; ?>" id="slider-Onkyo-Treble-<? echo $multimedia['id'];?>" data-highlight="true" min="-10" max="10" step="1" value="<? echo $SliderValueHexTreble; ?>" type="range">
						</li>			
						
					<?//Subwoofer ?>
						<li>
						<?
						$sqlDevices = query( "SELECT * FROM devices WHERE type = 'onkyoavrec'" );
						$multimedia = fetch($sqlDevices);
						
						if ($multimedia['zeitEin'] != '0'){
							$SliderValueHex = Onkyo_get_status($multimedia['ip'],'!1SWLQSTN#');
							$SliderValueHex = substr($SliderValueHex, 5, 2);
						}else{
							$SliderValueHex = '00';
						}		
						$SliderValue = hexdec($SliderValueHex);
						
						?>
						<label for="slider-Onkyo-Sub-<? echo $multimedia['id']; ?>">Subwoofer</label>
						<input name="slider-Onkyo-Sub-<? $multimedia['id']; ?>" id="slider-Onkyo-Sub-<? echo $multimedia['id'];?>" data-highlight="true" min="-15" max="+12" step="1" value="<? echo $SliderValue; ?>" type="range">
						</li>
						
					<?//Center ?>
						<li>
						<?
						$sqlDevices = query( "SELECT * FROM devices WHERE type = 'onkyoavrec'" );
						$multimedia = fetch($sqlDevices);
						
						if ($multimedia['zeitEin'] != '0'){
							$SliderValueHex = Onkyo_get_status($multimedia['ip'],'!1CTLQSTN#');
							$SliderValueHex = substr($SliderValueHex, 5, 2);
						}else{
							$SliderValueHex = '00';
						}		
						$SliderValue = hexdec($SliderValueHex);
						
						?>
						<label for="slider-Onkyo-Center-<? echo $multimedia['id']; ?>">Center</label>
						<input name="slider-Onkyo-Center-<? $multimedia['id']; ?>" id="slider-Onkyo-Center-<? echo $multimedia['id'];?>" data-highlight="true" min="-12" max="+12" step="1" value="<? echo $SliderValue; ?>" type="range">
						</li>
						
					</ul>
				</div>
			</div>
		</div><!-- set -->
		<div data-role="collapsible">
			<h2>TV Channels</h2>
			<div class="padme">
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
		</div>
		<div data-role="collapsible">
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

				?>
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
				</div><?
			}
			?>
		</div>
		<div data-role="collapsible">
			<h2>Channels</h2>
			<div class="padme">
			<?php

				$sqlDevices = query( "SELECT * FROM devices WHERE type = 'samsungbluray'" );
				$multimedia = fetch($sqlDevices);
				$IP = $multimedia['ip'];
				$sqlDevMacros = query( "SELECT * FROM devicemacro WHERE DeviceID = '" .$multimedia['id'] . "'" );
				//$DevMacros = fetch($sqlDevMacros);
				?>
				<div data-role="navbar">
					<ul><?
						while ($DevMacros = fetch($sqlDevMacros)){		
							$sql_Macros = query("SELECT * FROM tvmacros WHERE id ='" . $DevMacros['MacroID'] . " ORDER BY name ASC'");
							$Macro = fetch($sql_Macros);
							?><li><a href="#" data-role="button" onClick="SamsungKey('<? echo $IP; ?>','<? echo $Macro['value']; ?>')"><? echo $Macro['name']; ?></a></li>
						<?}?>
					</ul>
				</div>
			</div>
		</div>
	</div>


	<div style="float: left; border-radius:10px; height:600px; width:40%; margin-left:10px; margin-bottom:12px">
		<ul data-role="listview" data-inset="true">
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
		</ul>
	</div>
</div>