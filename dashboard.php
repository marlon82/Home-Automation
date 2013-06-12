<?php
//ini_set('error_reporting', E_ALL);
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
right:110px;
top:12px;
height:20px;


}

</style>



	
<script>	
function SamsungKey(Device,Key)
{
	//alert("Device:"+Device+"     Key:"+Key);
	var jqxhr = $.get("setFunctions.php?function=SamsungSendKey&Device=" + Device +"&Key=" + Key, function() {})
}	
	
function OnkyoKey(Device,Key)
{
	var jqxhr = $.get("setFunctions.php?function=OnkyoSendKey&Device=" + Device +"&Key=" + Key, function() {})
}	
	

</script>

<div data-role="page" id="dashboard">

<div data-role="header" data-position="fixed" data-theme="b">
	<a href="#dashboard" data-icon="home">Home</a>
	<a href="javascript:history.go(0)" data-icon="refresh">refresh</a>
	<div id="container">
		<li class="hours"></li>
		<li class="point">:</li>
		<li class="min"></li>
		<li class="point">:</li>
		<li class="sec"></li>
	</div>
	<h1>Dashboard</h1>
	

</div><!-- /header -->
<?
//Multimedia Panels
$sql_Devices = query( "SELECT name,type,ip FROM devices WHERE type = 'samsungtv' OR type = 'samsungbluray' OR type = 'onkyoavrec' OR type = 'enigma2'" );

while( $multimedia = fetch( $sql_Devices ) )
{
	//SamsungTV
	if ($multimedia['type'] == 'samsungtv') { 
	?>
	<div data-role="panel" id="SamsungTVPanel" data-theme="b">
		<div class="panel-content" data-theme="b">
<img src="icons/samsung_tv_remote.png" width="181" height="831" border="0" usemap="#Samsung TV Remote" />

<map name="Samsung TV Remote">
<!-- #$-:Image map file created by GIMP Image Map plug-in -->
<!-- #$-:GIMP Image Map plug-in by Maurits Rijk -->
<!-- #$-:Please do not edit lines starting with "#$" -->
<!-- #$VERSION:2.3 -->
<!-- #$AUTHOR:marlon.scheid -->
<area shape="circle" coords="43,74,15" alt="Power" href="http://" />
<area shape="rect" coords="72,63,108,85" alt="TV"  nohref="nohref" />
<area shape="rect" coords="26,106,62,132" alt="1"  href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','1')" />
<area shape="rect" coords="73,106,108,131" alt="2"  href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','2')" />
<area shape="rect" coords="119,106,155,131" alt="3"  href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','3')" />
<area shape="rect" coords="26,146,61,170" alt="4"  href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','4')" />
<area shape="rect" coords="73,146,108,170" alt="5"  href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','5')" />
<area shape="rect" coords="120,146,155,171" alt="6"  href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','6')" />
<area shape="rect" coords="25,184,62,210" alt="7"  href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','7')" />
<area shape="rect" coords="73,185,108,210" alt="8"  href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','8')" />
<area shape="rect" coords="119,185,154,210" alt="9"  href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','9')" />
<area shape="rect" coords="27,224,61,249" alt="Source" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','SOURCE')" />
<area shape="rect" coords="73,224,109,248" alt="0"  href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','0')" />
<area shape="rect" coords="119,223,154,249" alt="Pre-Ch" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','PRECH')" />
<area shape="rect" coords="26,265,63,284" alt="CH List" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','CH_LIST')" />
<area shape="rect" coords="72,264,109,298" alt="Menu" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','MENU')" />
<area shape="rect" coords="119,264,155,284" alt="FAV Ch" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','FAV_CH')" />
<area shape="rect" coords="26,444,51,462" alt="red" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','RED')" />
<area shape="rect" coords="61,444,86,462" alt="green" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','GRREN')" />
<area shape="rect" coords="96,444,121,461" alt="yellow" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','YELLOW')" />
<area shape="rect" coords="131,445,156,461" alt="blue" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','BLUE')" />
<area shape="rect" coords="26,477,66,514" alt="Volume Up" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','VOLUP')" />
<area shape="rect" coords="26,514,66,546" alt="Volume Down" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','VOLDOWN')" />
<area shape="rect" coords="76,488,107,506" alt="Source" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','SOURCE')" />
<area shape="rect" coords="75,523,106,542" alt="Mute" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','MUTE')" />
<area shape="rect" coords="116,477,156,513" alt="Channel Up" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','CHUP')" />
<area shape="rect" coords="116,513,156,546" alt="Channel Down" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','CHDOWN')" />
<area shape="rect" coords="27,562,62,581" alt="Teletext" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','W_LINK')" />
<area shape="rect" coords="72,563,109,582" alt="Media P" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','W_LINK')" />
<area shape="rect" coords="119,563,156,581" alt="Content" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','CONTENTS')" />
<area shape="rect" coords="26,593,62,612" alt="Info" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','INFO')" />
<area shape="rect" coords="73,593,109,612" alt="Guide" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','GUIDE')" />
<area shape="rect" coords="119,594,155,613" alt="Subtitle" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','CAPTION')" />
<area shape="rect" coords="27,624,63,642" alt="Backward" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','REWIND')" />
<area shape="rect" coords="73,624,109,642" alt="Pause" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','PAUSE')" />
<area shape="rect" coords="119,624,155,643" alt="Forward" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','FF')" />
<area shape="rect" coords="27,654,63,673" alt="Rec" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','REC')" />
<area shape="rect" coords="73,654,108,673" alt="Play" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','PLAY')" />
<area shape="rect" coords="119,655,155,673" alt="Stop" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','STOP')" />
<area shape="circle" coords="91,364,23" alt="Enter" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','ENTER')" />
<area shape="poly" coords="26,296,62,296,63,308,47,315,41,329,25,330,26,314,27,306" alt="Tools" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','TOOLS')" />
<area shape="poly" coords="120,296,139,295,155,295,156,330,146,332,140,324,134,316,125,312,121,309" alt="Return" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','RETURN')" />
<area shape="poly" coords="155,399,145,398,140,406,132,414,120,418,119,432,155,432,156,417" alt="Exit" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','EXIT')" />
<area shape="poly" coords="25,398,38,396,42,405,46,409,51,412,56,416,61,419,63,421,63,429,54,432,45,432,38,432,32,433,27,430" alt="WWW" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','RSS')" />
<area shape="poly" coords="61,322,72,318,82,315,90,314,98,314,106,316,112,320,119,323,119,328,112,335,105,333,97,333,87,332,82,334,75,336,72,337" alt="Up" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','UP')" />
<area shape="poly" coords="49,333,62,345,57,356,56,365,59,373,62,378,64,381,54,392,50,392,43,384,40,371,39,356" alt="Left" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','LEFT')" />
<area shape="poly" coords="120,343,130,334,137,340,139,350,141,358,142,369,139,377,132,393,129,394,119,385,122,374,124,364" alt="Rigth" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','RIGTH')" />
<area shape="poly" coords="72,388,62,399,68,407,78,412,91,415,108,411,121,404,112,392,102,396,85,397" alt="Down" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','DOWN')" />
</map>
			<a href="#demo-links" data-rel="close" data-role="button" data-theme="c" data-icon="delete" data-inline="true">Close panel</a>
		</div><!-- /content wrapper for padding -->
	</div>
	<?
	}
	//Samsung BluRay
	if ($multimedia['type'] == 'samsungbluray') { 
	?>
	<div data-role="panel" id="SamsungBluRayPanel" data-theme="b">
		<div class="panel-content" data-theme="b">
			<img src="icons\samsung_receiver_remote.png" width="146" height="689" border="0" usemap="#SamsungBluRayRemote" />
			<map name="SamsungBluRayRemote">
			<!-- #$-:Image map file created by GIMP Image Map plug-in -->
			<!-- #$-:GIMP Image Map plug-in by Maurits Rijk -->
			<!-- #$-:Please do not edit lines starting with "#$" -->
			<!-- #$VERSION:2.3 -->
			<!-- #$AUTHOR:marlon.scheid -->
			<area shape="rect" coords="18,113,50,134" alt="1" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','1')" />
			<area shape="rect" coords="55,112,87,134" alt="2" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','2')" />
			<area shape="rect" coords="94,113,126,133" alt="3" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','3')" />
			<area shape="rect" coords="18,141,50,161" alt="4" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','4')" />
			<area shape="rect" coords="56,141,88,160" alt="5" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','5')" />
			<area shape="rect" coords="94,140,126,161" alt="6" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','6')" />
			<area shape="rect" coords="18,169,51,189" alt="7" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','7')" />
			<area shape="rect" coords="57,169,88,189" alt="8" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','8')" />
			<area shape="rect" coords="94,169,126,189" alt="9" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','9')" />
			<area shape="rect" coords="56,197,88,217" alt="0" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','0')" />
			<area shape="rect" coords="92,289,126,319" alt="ChannelUp" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','CHUP')" />
			<area shape="rect" coords="91,321,126,350" alt="ChannelDown" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','CHDOWN')" />
			<area shape="rect" coords="64,404,83,431" alt="up" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','UP')" />
			<area shape="rect" coords="92,439,126,461" alt="rigth" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','RIGTH')" />
			<area shape="rect" coords="62,468,83,500" alt="down" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','DOWN')" />
			<area shape="rect" coords="17,441,53,461" alt="left" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','LEFT')" />
			<area shape="rect" coords="59,440,86,463" alt="enter" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','ENTER')" />
			<area shape="rect" coords="18,474,52,499" alt="return" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','RETURN')" />
			<area shape="rect" coords="93,474,127,499" alt="exit" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','EXIT')" />
			<area shape="rect" coords="18,402,52,428" alt="tools" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','TOOLS')" />
			<area shape="rect" coords="93,401,126,427" alt="info" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','INFO')" />
			<area shape="rect" coords="47,362,98,387" alt="home" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','CONTENTS')" />
			<area shape="rect" coords="104,361,127,389" alt="guide" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','GUIDE')" />
			<area shape="rect" coords="18,362,42,388" alt="channellist" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','CH_LIST')" />
			<area shape="rect" coords="95,197,126,217" alt="titleMenu" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','1')" />
			<area shape="rect" coords="19,197,50,217" alt="discMenu" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','1')" />
			<area shape="rect" coords="19,227,40,245" alt="ChapterBack" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','1')" />
			<area shape="rect" coords="47,227,68,245" alt="ChapterForward" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','1')" />
			<area shape="rect" coords="77,227,97,245" alt="FastBack" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','REWIND')" />
			<area shape="rect" coords="105,226,126,244" alt="FastForward" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','FF')" />
			<area shape="rect" coords="19,253,41,277" alt="stop" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','STOP')" />
			<area shape="rect" coords="48,253,97,277" alt="Play" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','PLAY')" />
			<area shape="rect" coords="105,253,127,277" alt="Pause" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','PAUSE')" />
			<area shape="rect" coords="75,85,98,102" alt="Eject" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','EJECT')" />
			<area shape="rect" coords="103,85,127,103" alt="TeleText" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','1')" />
			<area shape="rect" coords="19,86,40,102" alt="BD" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','1')" />
			<area shape="rect" coords="48,87,69,102" alt="TV" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','1')" />
			<area shape="circle" coords="34,61,16" alt="Power" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','POWEROFF')" />
			<area shape="circle" coords="110,60,16" alt="TVPower" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','1')" />
			<area shape="rect" coords="60,290,85,316" alt="Mute" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','MUTE')" />
			<area shape="rect" coords="60,325,85,350" alt="TVSource" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','1')" />
			<area shape="rect" coords="18,289,54,320" alt="VolumeUp" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','VOLUP')" />
			<area shape="rect" coords="18,320,54,350" alt="VolumeDown" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','VOLDOWN')" />
			<area shape="rect" coords="17,513,40,530" alt="A" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','A')" />
			<area shape="rect" coords="46,513,69,530" alt="B" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','B')" />
			<area shape="rect" coords="75,514,99,530" alt="C" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','C')" />
			<area shape="rect" coords="104,512,129,529" alt="D" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','D')" />
			<area shape="rect" coords="17,540,41,556" alt="SmartHUB" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','1')" />
			<area shape="rect" coords="46,539,70,556" alt="Search" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','1')" />
			<area shape="rect" coords="75,539,98,556" alt="PIP" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','PIP')" />
			<area shape="rect" coords="104,539,128,556" alt="2D-3D" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','1')" />
			<area shape="rect" coords="17,565,41,582" alt="www" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','RSS')" />
			<area shape="rect" coords="46,565,69,582" alt="TV" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','1')" />
			<area shape="rect" coords="76,565,99,582" alt="Rec" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','REC')" />
			<area shape="rect" coords="105,566,127,582" alt="RecPause" href="#" onClick="SamsungKey('<?php echo $multimedia['ip']; ?>','RECPAUSE')" />
			</map>
			<a href="#demo-links" data-rel="close" data-role="button" data-theme="c" data-icon="delete" data-inline="true">Close panel</a>
		</div><!-- /content wrapper for padding -->
	</div>
	<?
	}
	//Samsung Onky AV Receiver
	if ($multimedia['type'] == 'onkyoavrec') { 
	?>
	<div data-role="panel" id="OnkyoPanel" data-theme="b">
		<div class="panel-content" data-theme="b">
<img src="icons\onkyo_remote.png" width="207" height="700" border="0" usemap="#Onkyo Remote" />

<map name="Onkyo Remote">
<!-- #$-:Image map file created by GIMP Image Map plug-in -->
<!-- #$-:GIMP Image Map plug-in by Maurits Rijk -->
<!-- #$-:Please do not edit lines starting with "#$" -->
<!-- #$VERSION:2.3 -->
<!-- #$AUTHOR:marlon.scheid -->
<area shape="circle" coords="41,40,12" alt="Power" href="#" onClick="OnkyoKey('<?php echo $multimedia['ip']; ?>','KEY_1')" />
<area shape="circle" coords="168,40,12" alt="Source"  nohref="nohref" />
<area shape="circle" coords="43,258,10" alt="Top Menu"  nohref="nohref" />
<area shape="circle" coords="44,322,11" alt="Setup"  nohref="nohref" />
<area shape="circle" coords="104,358,11" alt="Home"  nohref="nohref" />
<area shape="circle" coords="164,322,11" alt="Return"  nohref="nohref" />
<area shape="circle" coords="164,259,10" alt="Menu"  nohref="nohref" />
<area shape="circle" coords="103,291,19" alt="Enter"  nohref="nohref" />
<area shape="circle" coords="83,40,11" alt="Zone 2"  nohref="nohref" />
<area shape="circle" coords="37,383,12" alt="Fast Backward"  nohref="nohref" />
<area shape="circle" coords="75,386,10" alt="Backward"  nohref="nohref" />
<area shape="circle" coords="132,385,10" alt="FastForward"  nohref="nohref" />
<area shape="circle" coords="171,383,13" alt="Chapter forward"  nohref="nohref" />
<area shape="circle" coords="55,470,12" alt="1"  nohref="nohref" />
<area shape="circle" coords="104,472,11" alt="2"  nohref="nohref" />
<area shape="circle" coords="154,470,11" alt="3"  nohref="nohref" />
<area shape="circle" coords="55,501,12" alt="4"  nohref="nohref" />
<area shape="circle" coords="104,502,11" alt="5"  nohref="nohref" />
<area shape="circle" coords="154,501,12" alt="6"  nohref="nohref" />
<area shape="circle" coords="55,531,12" alt="7"  nohref="nohref" />
<area shape="circle" coords="104,532,12" alt="8"  nohref="nohref" />
<area shape="circle" coords="154,531,11" alt="9"  nohref="nohref" />
<area shape="circle" coords="55,562,12" alt="Dimmer"  nohref="nohref" />
<area shape="circle" coords="105,562,12" alt="0"  nohref="nohref" />
<area shape="circle" coords="154,561,12" alt="Sleep"  nohref="nohref" />
<area shape="rect" coords="155,172,182,202" alt="Volume Up"  nohref="nohref" />
<area shape="rect" coords="154,202,182,232" alt="Volume Down"  nohref="nohref" />
</map>
			<a href="#demo-links" data-rel="close" data-role="button" data-theme="c" data-icon="delete" data-inline="true">Close panel</a>
		</div><!-- /content wrapper for padding -->
	</div>
	<?
	}
	//Enigma2 (DreamBox)
	if ($multimedia['type'] == 'enigma2') { 
	?>
	<div data-role="panel" id="DreamPanel" data-theme="b">
		<div class="panel-content" data-theme="b">
<img src="icons\dreambox.png" width="191" height="578" border="0" usemap="#Dreambox Remote" />

<map name="Dreambox Remote">
<!-- #$-:Image map file created by GIMP Image Map plug-in -->
<!-- #$-:GIMP Image Map plug-in by Maurits Rijk -->
<!-- #$-:Please do not edit lines starting with "#$" -->
<!-- #$VERSION:2.3 -->
<!-- #$AUTHOR:marlon.scheid -->
<area shape="circle" coords="32,286,13" alt="Info" href="#" onClick="DreamKey('<?php echo $multimedia['ip']; ?>','KEY_1')" />
<area shape="circle" coords="149,287,13" alt="Dream" href="#" onClick="DreamKey('<?php echo $multimedia['ip']; ?>','KEY_1')" />
<area shape="circle" coords="37,362,13" alt="Audio" href="#" onClick="DreamKey('<?php echo $multimedia['ip']; ?>','KEY_1')" />
<area shape="circle" coords="146,361,12" alt="Video" href="#" onClick="DreamKey('<?php echo $multimedia['ip']; ?>','KEY_1')" />
<area shape="circle" coords="41,401,12" alt="Red" href="#" onClick="DreamKey('<?php echo $multimedia['ip']; ?>','KEY_1')" />
<area shape="circle" coords="75,402,11" alt="Green" href="#" onClick="DreamKey('<?php echo $multimedia['ip']; ?>','KEY_1')" />
<area shape="circle" coords="108,403,10" alt="Yellow" href="#" onClick="DreamKey('<?php echo $multimedia['ip']; ?>','KEY_1')" />
<area shape="circle" coords="141,402,11" alt="Blue" href="#" onClick="DreamKey('<?php echo $multimedia['ip']; ?>','KEY_1')" />
<area shape="circle" coords="45,440,11" alt="TV" href="#" onClick="DreamKey('<?php echo $multimedia['ip']; ?>','KEY_1')" />
<area shape="circle" coords="75,443,11" alt="Radio" href="#" onClick="DreamKey('<?php echo $multimedia['ip']; ?>','KEY_1')" />
<area shape="circle" coords="107,442,11" alt="Text" href="#" onClick="DreamKey('<?php echo $multimedia['ip']; ?>','KEY_1')" />
<area shape="circle" coords="137,440,11" alt="Help" href="#" onClick="DreamKey('<?php echo $multimedia['ip']; ?>','KEY_1')" />
</map>
			<a href="#demo-links" data-rel="close" data-role="button" data-theme="c" data-icon="delete" data-inline="true">Close panel</a>
		</div><!-- /content wrapper for padding -->
	</div>
	<?
	}
}
?>

<?
//SensorPanels
$sql_sensors = query( "SELECT id,name,iname,hcType,value,room FROM sensoren" );

while( $sensors = fetch( $sql_sensors ) )
{
?>
<div data-role="popup" id="popup-sensor-<? echo $sensors['id'] ?>" class="ui-content" data-theme="d">
	<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
	<?
	$sql_rooms = query( "SELECT name FROM rooms WHERE id='" . $sensors['room'] . "'" );
	$room = fetch( $sql_rooms );
	$filenameDay = "sensor_graph/" . $sensors['iname'] . "_day.png";
	$filenameWeek = "sensor_graph/" . $sensors['iname'] . "_Week.png";
	$filenameMonth = "sensor_graph/" . $sensors['iname'] . "_Month.png";
	if($sensors['hcType'] == "temperatur"){
		$wert = $room['name'] . " " . $sensors['name'] . " aktuell: " . $sensors['value'] . " °C"; 
	}elseif($sensors['hcType'] == "luftfeuchtigkeit"){
		$wert = $room['name'] . " " . $sensors['name'] . " aktuell: " . $sensors['value'] . "%"; 
	}
	?>
	<p><? echo $wert; ?></p>
	<?
	$sql_config = query( "SELECT value FROM config WHERE options='ShowDayGraph'" );
	$config = fetch( $sql_config );
	if ($config['value']=='Yes'){ echo "<img src=\"" . $filenameDay . "\" border=\"2\" style=\"border:0px solid black;max-width:100%;\" alt=\"Graph\" />\n<br>";}
	
	$sql_config = query( "SELECT value FROM config WHERE options='ShowWeekGraph'" );
	$config = fetch( $sql_config );
	if ($config['value']=='Yes'){ echo "<img src=\"" . $filenameWeek . "\" border=\"2\" style=\"border:0px solid black;max-width:100%;\" alt=\"Graph\" />\n<br>";}
	
	$sql_config = query( "SELECT value FROM config WHERE options='ShowMonthGraph'" );
	$config = fetch( $sql_config );
	if ($config['value']=='Yes'){ echo "<img src=\"" . $filenameMonth . "\" border=\"2\" style=\"border:0px solid black;max-width:100%;\" alt=\"Graph\" />\n";}
	?>
</div>
<?
}
?>

<div data-role="content" >	
	<div style="float: left; border-radius:10px; height:300px; width:32%; margin-left:10px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true" data-theme="d">
    		<li data-role="list-divider">Aktive Aktoren (5 max)</li>
	
				<?php
				//$sqlc = query( "SELECT value,options FROM config WHERE options='XS1IP'" );
				//$IP = fetch($sqlc);
				global $XS1;
				$XS1Online = ping($XS1['rawip']);
				//echo $XS1['rawip'];
				if ($XS1Online){
					for( $i = 0; $i <= 64; $i++ ){
						extract(ReadXS1(actuator, $i));
						//compact('number', 'value', 'name', 'type', 'unit', 'utime', 'newvalue')
						$sql = query( "SELECT id,name,room,type FROM aktor WHERE iName = '" . $name . "' ORDER BY name ASC" );
						$row = fetch( $sql );
					
						$sql1 = query( "SELECT id,name FROM rooms WHERE id = '" . $row['room']. "' ORDER BY name ASC" );
						$room = fetch( $sql1 );
					
						$sql2 = query( "SELECT id,devtypename FROM deviceTypes WHERE id = '" . $row['type']. "' ORDER BY devtypename ASC" );
						$devtype = fetch( $sql2 );
					
						if( $row['id']  && $name && $type != 'disabled' )
						{
							if( $value > 1 ){
								?>
								<li><a href="index.php?page=room&room=<?php echo $room['id']; ?>" rel="external"><?php echo $room['name'] . " - " . $row['name'] . " (" . $devtype['devtypename'] . ")"; ?></a></li>
								<?php
								$count = $count + 1;
							}
						}
						if ($count == 5){
							break;
						}
					}
				}else{
					echo "XS1 (" . $XS1['rawip'] . ") ist offline";
				}
				?>	
				
		</ul>
    </div>
	

    
    <div style="float: left; border-radius:10px; height:300px; width:32%; margin-left:10px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true">
			<li data-role="list-divider">Virtuelle Befehle DEMO</li>
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
    		<li>Aktuell  <span style="float:right"><? $verbrauch = verbrauchAktuell(); echo $verbrauch['kwh'] . " W - " . $verbrauch['euro'] . " €"; ?></span></li>
    		<li>Heute   <span style="float:right"><? $verbrauch = verbrauchHeute(); echo $verbrauch['kwh'] . " KW - " . $verbrauch['euro'] . " €"; ?></span></li>
    		<li>Gestern <span style="float:right"><? $verbrauch = verbrauchGestern(); echo $verbrauch['kwh'] . " KW - " . $verbrauch['euro'] . " €"; ?></span></li>
    		<li>Monat   <span style="float:right"><? $verbrauch = verbrauchMonat(); echo $verbrauch['kwh'] . " KW - " . $verbrauch['euro'] . " €"; ?></span></li>
    		<li>Jahr    <span style="float:right"><? $verbrauch = verbrauchJahr(); echo $verbrauch['kwh'] . " KW - " . $verbrauch['euro'] . " €"; ?></span></li>
		</ul>
    </div>
	




    
    <div style="float: left; border-radius:10px; height:300px; width:32%; margin-left:10px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true">
			<li data-role="list-divider">Multimedia</li>
			<?
			$sqlDevices = query( "SELECT name,type FROM devices WHERE type = 'samsungtv' OR type = 'samsungbluray' OR type = 'onkyoavrec' OR type = 'enigma2'" );
			while( $multimedia = fetch($sqlDevices)) {
				if ($multimedia['type'] == 'samsungtv') { echo "<li><a href=\"#SamsungTVPanel\">" . $multimedia['name'] . "</a></li>";}
				if ($multimedia['type'] == 'samsungbluray') { echo "<li><a href=\"#SamsungBluRayPanel\">" . $multimedia['name'] . "</a></li>";}
				if ($multimedia['type'] == 'onkyoavrec') { echo "<li><a href=\"#OnkyoPanel\">" . $multimedia['name'] . "</a></li>";}
				if ($multimedia['type'] == 'enigma2') { echo "<li><a href=\"#DreamPanel\">" . $multimedia['name'] . "</a></li>";}
			}
			?>
		</ul>		
    </div>


	<div style="float: left; border-radius:10px; height:300px; width:32%; margin-left:10px; margin-bottom:12px">
  		<?php
		$sqlWWidget = query( "SELECT options,value FROM config WHERE options = 'WetterWidgetAktiv'" );
		$Widget = fetch( $sqlWWidget );
		$sqlWWidgetURL = query( "SELECT options,value FROM config WHERE options = 'WetterWidget'" );
		$WidgetURL = fetch( $sqlWWidgetURL );
		
		if($Widget['value'] == "Yes"){
		?>
		
			<ul data-role="listview" data-inset="true">
			<li data-role="list-divider">Wetter Vorhersage</li>
			<?php
			echo $WidgetURL['value'];
			?>
			</ul>
		
		<?php
		}
		?>
		
    </div>

<?php
//#########################Sensoren auslesen und ausgeben

$sql = query( "SELECT id,name,hcType,room,value FROM sensoren" );	

$initial = true;
			
while( $sensor = fetch( $sql ) )
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
	$sqlRoomName = query( "SELECT name FROM rooms WHERE id = '" . $sensor['room'] . "'" );
	$RoomName = fetch( $sqlRoomName );
		
	if($sensor['hcType'] == "temperatur"){
	?>
		<li><a href="#popup-sensor-<? echo $sensor['id'] ?>"  data-inline="true" data-rel="popup" data-position-to="window"><? echo $RoomName['name'] ." " . $sensor['name']; ?><span style="float:right"><? echo $sensor['value']; ?> °C</span></a></li>
		<?php
	}elseif($sensor['hcType'] == "luftfeuchtigkeit"){
	?>
		<li><a href="#popup-sensor-<? echo $sensor['id'] ?>"  data-inline="true" data-rel="popup" data-position-to="window"><? echo $RoomName['name'] ." " . $sensor['name']; ?><span style="float:right"><? echo $sensor['value']; ?>%</span></a></li>
	<?php
	}

}
if(!$initial){
	echo "</ul>";
	echo "</div>";
}

?>

	
</div><!-- /content -->




