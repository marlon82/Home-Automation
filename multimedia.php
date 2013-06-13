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



<?php

include('functions.php');

$sqlDevices = query( "SELECT id,name,type,ip,room FROM devices WHERE type = 'samsungtv' OR type = 'samsungbluray' OR type = 'onkyoavrec' OR type = 'enigma2'" );

while( $multimedia = fetch($sqlDevices)) {
	$sqlRoom = query( "SELECT name FROM rooms WHERE id = '" . $multimedia['room'] . "'" );
	$Room = fetch($sqlRoom);
	
	if ($multimedia['type'] == 'samsungtv') { 
		$Show = True;
		$IconSource = "./icons/samsung_tv.png";
	
		$Buttons[] = "<a href=\"#\" data-role=\"button\" id=\"button-" . $groups['id'] . "\" data-inline=\"true\" data-mini=\"true\">Lauter</a>\n";
		$Buttons[] = "<a href=\"#\" data-role=\"button\" id=\"button-" . $groups['id'] . "\" data-inline=\"true\" data-mini=\"true\">Leiser</a>\n";
		$Buttons[] = "<a href=\"#\" data-role=\"button\" id=\"button-" . $groups['id'] . "\" data-inline=\"true\" data-mini=\"true\">Channel Up</a>\n";
		$Buttons[] = "<a href=\"#\" data-role=\"button\" id=\"button-" . $groups['id'] . "\" data-inline=\"true\" data-mini=\"true\">Cannel Down</a>\n";		
	}
	
	if ($multimedia['type'] == 'samsungbluray') {  
		$Show = True;
		$IconSource = "./icons/samsung_receiver.jpg";
	
		$Buttons[] = "<a href=\"#\" data-role=\"button\" id=\"button-" . $groups['id'] . "\" data-inline=\"true\" data-mini=\"true\">Lauter</a>\n";
		$Buttons[] = "<a href=\"#\" data-role=\"button\" id=\"button-" . $groups['id'] . "\" data-inline=\"true\" data-mini=\"true\">Leiser</a>\n";
		$Buttons[] = "<a href=\"#\" data-role=\"button\" id=\"button-" . $groups['id'] . "\" data-inline=\"true\" data-mini=\"true\">Channel Up</a>\n";
		$Buttons[] = "<a href=\"#\" data-role=\"button\" id=\"button-" . $groups['id'] . "\" data-inline=\"true\" data-mini=\"true\">Cannel Down</a>\n";	
	}
	
	if ($multimedia['type'] == 'onkyoavrec'){  
		$Show = True;
		$IconSource = "./icons/onkyo_av_receiver.png";
	
		$Buttons[] = "<a href=\"#\" data-role=\"button\" id=\"button-" . $groups['id'] . "\" data-inline=\"true\" data-mini=\"true\">Lauter</a>\n";
		$Buttons[] = "<a href=\"#\" data-role=\"button\" id=\"button-" . $groups['id'] . "\" data-inline=\"true\" data-mini=\"true\">Leiser</a>\n";
		$Buttons[] = "<a href=\"#\" data-role=\"button\" id=\"button-" . $groups['id'] . "\" data-inline=\"true\" data-mini=\"true\">Channel Up</a>\n";
		$Buttons[] = "<a href=\"#\" data-role=\"button\" id=\"button-" . $groups['id'] . "\" data-inline=\"true\" data-mini=\"true\">Cannel Down</a>\n";
	}
	
	if ($multimedia['type'] == 'enigma2') { 
		$Show = True;
		$IconSource = "./icons/dreambox.png";
	
		$Buttons[] = "<a href=\"#\" data-role=\"button\" id=\"button-" . $groups['id'] . "\" data-inline=\"true\" data-mini=\"true\">Lauter</a>\n";
		$Buttons[] = "<a href=\"#\" data-role=\"button\" id=\"button-" . $groups['id'] . "\" data-inline=\"true\" data-mini=\"true\">Leiser</a>\n";
		$Buttons[] = "<a href=\"#\" data-role=\"button\" id=\"button-" . $groups['id'] . "\" data-inline=\"true\" data-mini=\"true\">Channel Up</a>\n";
		$Buttons[] = "<a href=\"#\" data-role=\"button\" id=\"button-" . $groups['id'] . "\" data-inline=\"true\" data-mini=\"true\">Cannel Down</a>\n";		
	}
	
	$sql_devMacro = query("SELECT MacroID FROM devicemacro WHERE deviceID ='" . $multimedia['id'] . "'");
		
	while ($DevMacros = fetch($sql_devMacro)){
		$sql_Macros = query("SELECT id,name,value FROM tvmacros WHERE id ='" . $DevMacros['MacroID'] . "'");
		$Macro = fetch($sql_Macros);
		$Buttons[] = "<a href=\"#\" data-role=\"button\" id=\"button-" . $Macro['id'] . "\" data-inline=\"true\" data-mini=\"true\">". $Macro['name'] . "</a>\n";
	}		
	
	if ($Show){
		?>
		<div class="Multimedia">
		<img width="200" height="120" src="<? echo $IconSource; ?>" alt="Multimedia">

		<table border="0">
			<tr>
				<td>Status:</td>
				<td>
				<?
				$DeviceOnline = ping($multimedia['ip']);
				$isOnline = False;
				if ($DeviceOnline){
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
		for ($i=0;$i<count($Buttons);$i++){
			echo $Buttons[$i];
		}
		$Buttons="";
		?>
		</div>
		<?
	}	
}
?>



