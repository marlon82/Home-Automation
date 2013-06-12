<?php
//error_reporting(E_ALL);
include("config.php");
/*
 * Created on 19.02.2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

$dreamIP = '192.168.1.22';

$XS1 = array();
$XS1['ip'] = 'http://192.168.1.242/';
$XS1['user'] = '';
$XS1['pw'] = '';

$sql_config = query( "SELECT value,options FROM config" );
while( $config = fetch( $sql_config ) )
	{
		switch($config['options']) {
			case 'XS1IP':	
				$XS1['ip'] = 'http://' . $config['value'] . '/';
				$XS1['rawip'] = $config['value'];
				break;
			case 'XS1User':
				$XS1['user'] = $config['value'];
				break;
			case 'XS1Pass':
				$XS1['pw'] = $config['value'];
				break;
		}
	}

setlocale(LC_ALL,'de_DE@euro', 'de_DE',  'de', 'ge');
date_default_timezone_set('Europe/Berlin');

function current_channel_info(){
	global $dreamIP;
	$xml = simplexml_load_file("http://".$dreamIP."/web/subservices");
	//var_dump($xml);
	$ref= $xml->e2service[0]->e2servicereference;
	$channel= $xml->e2service[0]->e2servicename;
	// show title
	//echo $ref;
	//echo $channel;
	echo "<p>";
	echo "<strong>Ref:</strong> ".$ref."<br/>";
	echo "<strong>Kanal:</strong> ".$channel."<br/>";
	echo "</p>";
	get_epgdetails("$ref");
}


function set_channel($sref){
	global $dreamIP;
	$xml = simplexml_load_file("http://".$dreamIP."/web/zap?sRef=".$sref);
	var_dump($xml);
}


function get_epgdetails($sref){
	global $dreamIP;
	setlocale(LC_ALL,'de_DE@euro', 'de_DE',  'de', 'ge');
	date_default_timezone_set('Europe/Berlin');
	//echo ($dreamIP."/web/epgservice?sRef=".$sref);
	$xml = simplexml_load_file("http://".$dreamIP."/web/epgservice?sRef=".$sref);
	//var_dump($xml);
	$epgnow = $xml->e2event[0]->e2eventtitle;
	$epgnext = $xml->e2event[1]->e2eventtitle;
	$start = $xml->e2event[0]->e2eventstart;
	$dauer = $xml->e2event[0]->e2eventduration + $start;
	echo "<p>";
	echo "<strong>Jetzt:</strong> ".$epgnow."<br/>";
	echo "start: ".date("H:i","$start")."<br/>";
	echo "ende: ".date("H:i","$dauer")."<br/>";
	//echo date("H:i",time());
	//$datum = date("d.m.Y","$start");
	//$uhrzeit = date("H:i","$start");
	//echo $datum," - ",$uhrzeit," Uhr<br/>";
	echo "<strong>Next:</strong> ".$epgnext."<br/>";
	echo "</p>";

}


function get_epg_now($cref){
	global $dreamIP;
	$xml = simplexml_load_file("http://".$dreamIP."/web/epgservicenow?sRef=".$cref);
	//var_dump($xml);
	//$xml = simplexml_load_file($channel_list_url);
	//$i = 0;
	//foreach($xml->e2event as $e2event){
		$data_array[0]["title"] = $xml->e2event[0]->e2eventtitle;
		$data_array[0]["start"] = $xml->e2event[0]->e2eventstart;
		$data_array[0]["duration"] = $xml->e2event[0]->e2eventduration;
		//$data_array[1]["title"] = $xml->e2event[1]->e2eventtitle;
		//$data_array[1]["start"] = $xml->e2event[1]->e2eventstart;
		//$data_array[1]["duration"] = $xml->e2event[1]->e2eventduration;
		//echo $xml->e2event[0]->e2eventtitle;
		//$i++;
	//}
	return($data_array);
}

function get_channels($ref){
	global $dreamIP;
	//echo $ref;
	$channel_list_url = "http://".$dreamIP."/web/getservices?sRef=".$ref;
	$xml = simplexml_load_file($channel_list_url);
	$i = 0;
	foreach($xml->e2service as $e2service){
		$data_array[$i]["name"] = $e2service->e2servicename;
		$data_array[$i]["ref"] = $e2service->e2servicereference;
		$i++;
	}
	return($data_array);
}

function get_epg_nownext($ref){
	global $dreamIP;
	setlocale(LC_ALL,'de_DE@euro', 'de_DE',  'de', 'ge');
	date_default_timezone_set('Europe/Berlin');
	//var_dump($ref);
	$channel_list_url = "http://".$dreamIP."/web/epgnownext?bRef=".$ref;
	$xml = simplexml_load_file($channel_list_url);
	$i = 0;
	foreach($xml->e2event as $e2event){
		$data_array[$i]["titel"] = $e2event->e2eventtitle;
		$data_array[$i]["start"] = $e2event->e2eventstart;
		$data_array[$i]["currenttime"] = $e2event->e2eventcurrenttime;
		$data_array[$i]["stop"] = $e2event->e2eventstart + $e2event->e2eventduration;
		$data_array[$i]["kanalref"] = $e2event->e2eventservicereference;
		$data_array[$i]["kanalname"] = $e2event->e2eventservicename;
		$i++;
	}
	return($data_array);
}



function get_bouquets(){
	global $dreamIP;
	
	//echo ($dreamIP."/web/epgservice?sRef=".$sref);
	//$channel_list_url = "http://".$dreamIP."/web/getservices?sRef=";
	$xml = simplexml_load_file("http://".$dreamIP."/web/getservices");
	
	//$blocks = $xml->xpath('//e2servicereference/e2service'); //gets all <block/> tags
	//var_dump($blocks);
	//echo "<p>";
	$i =0;
	foreach($xml->e2service as $e2service){
		//echo $e2service->e2servicereference."<br/>";
		$url = $e2service->e2servicereference;
		$url = str_replace("\"","&quot;",$url);
		
		$data_array[$i]["name"] = $e2service->e2servicename;
		$data_array[$i]["ref"] = $url;
		$i++;
		?>
	<!--	<a href=" <?php echo $url; ?> "> <?php echo $e2service->e2servicename; ?> </a><br/> --!>
		<?php
		//echo $e2service->e2servicename."<br/>";
	}
	return($data_array);
}

function GenGraph ($datay1,$datax1,$filename,$min,$max) {
//GenGraph(Werte y-Achse,Werte x-Achse, filename, min y-Achse, max y-Achse);

require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');
require_once ('jpgraph/jpgraph_date.php');

//$datay1 = array(20,15,23,15);


// Setup the graph
$graph = new Graph(600,250);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
//$graph->title->Set('Filled Y-grid');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();
$graph->SetScale('datlin',$min,$max);
$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
$graph->xaxis->SetLabelAngle(90);
//$graph->xaxis->scale->SetTimeAlign(MINADJ_10);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("dotted");
$graph->xaxis->SetTickLabels($datax1);
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
//$p1->SetLegend('Line 1');

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke($filename);       
   // $graph->Stroke("./foler/file.jpg");
}

function getProgress($start_date, $current_time, $duration) {
	//(current_time - begin_time) / duration * 100
	$diff = ($current_time - $start_date) / $duration * 100;
	$diff_int = round($diff);
    return ($diff_int);
}

function query( $qry )
{
  $sql = mysql_query( $qry )or die(mysql_error());
  /*if( mysql_error() )
  {
    $debug = debug_backtrace();
    //mysql_error_handler(mysql_error(), $debug[0]['function'], $debug[0]['line'], $debug[0]['file']);
  }*/
  return $sql;
}

function fetch( $query )
{
  $fetch = mysql_fetch_array( $query );
  return $fetch;
}
function ReadXS1($aktion, $id) 
{

    global $XS1;
	  	  
	if (strcmp($aktion,'sensor')==0){
	    $actionCmd = 'get_state_sensor'; }
	else{
	    $actionCmd = 'get_state_actuator'; }
	
	  $Url = $XS1['ip']."control?callback=cname&cmd=".$actionCmd."&number=".$id;
	  $jsonData = file_get_contents($Url);

	  // Remove "cname(" and ")"
	  $json = substr($jsonData, strpos($jsonData,'{'));
	  $json = substr($json, 0, strrpos($json,'}')+1); 
	 
	  //echo $json; echo "<br><br>";  //json string
	  
	  $json = json_decode($json);
				
	  $number = $json->{$aktion}->{'number'};		
	  $value = $json->{$aktion}->{'value'};
	  $name = $json->{$aktion}->{'name'};
	  $type = $json->{$aktion}->{'type'};
	  $unit = $json->{$aktion}->{'unit'};
	  $utime = $json->{$aktion}->{'utime'};
	  
	  if( $actionCmd == 'get_state_sensor')
	  {
	  	$state = $json->{$aktion}->{'state'};
	  	return compact('number', 'value', 'name', 'type', 'unit', 'utime', 'state');
	  }
	  else
	  {
	  	$newvalue = $json->{$aktion}->{'newvalue'};
	  	return compact('number', 'value', 'name', 'type', 'unit', 'utime', 'newvalue'); 
	  }
}

function setUrl($url)
{
	$filesize= 10000;
	$handle = fopen($url, "r");
	fread($handle,$filesize);
}





function ping($host, $timeout = 1) {


  if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    //echo 'This is a server using Windows!';
    $online=exec("ping -n 1 $host", $output, $error); 
  } else {
    //echo 'This is a server not using Windows!';
    $online=exec("ping -c 1 $host", $output, $error); 
  }
  //echo $online;
 if(stristr($online, 'Mittelwert') === FALSE) {   
     if(stristr($online, 'min/avg/max') === FALSE) {
        if(stristr($online, 'Average') === FALSE) { 
          //echo $online;
		  return 0;
		  }else{
      return 1;
   } 
        }else{
      return 1;
   } 
   }else{
      return 1;
   } 
        
}

function setAktor($id, $value, $funktion )
{	
	global $XS1, $zeitAus, $verbrauch, $zeitDelta;

	$zeitDelta = intval( $zeitDelta );
	//echo "xs1:" . $XS1['ip'] . "  id:" . $id . "  val:" . $value;
	//echo $funktion;
	// URL zum Aktor setzen zusammenbauen 
	if( $funktion == false ){
		$url = $XS1['ip'] . 'preset?switch='.$id.'&value='.$value;
		//echo $XS1['ip'] . "preset?switch=" . $id . "&value=" . $value;
	}else {
		$url = $XS1['ip'] . 'control?callback=cname&cmd=set_state_actuator&number=' . $id . '&function=' . $funktion;
		//echo $XS1['ip'] . "control?callback=cname&cmd=set_state_actuator&number=" . $id . "&function=" . $funktion;
	}
	$filesize= 10000;
	setUrl($url);
	//$handle = fopen($url, "r");

	
	$sql = query( "SELECT zeitEin, zeitHeute FROM aktor WHERE iid = '" . $id . "'" );
	$row = fetch( $sql );
		
	$zeitEin = $row['zeitEin'];

	if( $value == 'on' || $value > 0)
	{
		// Doppeltes Einschalten verhindern
		if( $zeitEin == 0 )
			$sql = query( "UPDATE aktor SET zeitEin = '" . time() . "' WHERE iid = '" . $id . "'" );
		
		// Logging
		//$sql = query( "INSERT INTO logAktor VALUES( '', '" . $id . "', '" . time() . "', '', '', '', '')" );
		
	}
	
	elseif( $value == 'off' || $value == 0 )
	{			
		// Doppeltes ausschalten verhindern
		if( $zeitEin > 0 )
		{
			rechneVerbrauch($id,"aktor", $zeitEin, $zeitAus);
			$zeitHeute = $row['zeitHeute'] + $zeitDelta;
			
			//$sql = query( "INSERT INTO logAktor VALUES( '', '" . $id . "', '" . $zeitEin . "', '" . $zeitAus . "', '" . $zeitDelta . "', '" . $verbrauch['kwh'] . "', '" . $verbrauch['euro'] . "')" );
			
			//$sql = query( "UPDATE logAktor SET zeitAus = '" . $zeitAus . "', zeitDelta = '" . $zeitDelta . "', kwh = '" . $verbrauch['kwh'] . "', verbrauchEuro = '" . $verbrauch['euro'] . "' WHERE iid = '" . $id . "' AND zeitEin = '" . $zeitEin . "'" );
			
			$sql = query( "UPDATE aktor SET zeitEin = '0', zeitHeute = '" . $zeitHeute . "' WHERE iid = '" . $id . "'" );
		}
	}
	
    return $verbrauch;
}

function secToTime($sekunden) 
{
	
	$tTag = 'Tage';
	$tStunden = 'Std.';
	$tMinuten = 'Min.';
	$tSekunden = 'Sek.';
	
	if( defined('iphone') )
	{
		$tTag = 'd';
		$tStunden = 'h';
		$tMinuten = 'min';
		$tSekunden = 'sek';
	}
	
    if (!($sekunden >= 60)) 
    {
        //return $sekunden . ' ' . $tSekunden;
        return '0 Min.';
    }

    $minuten    = bcdiv($sekunden, '60', 0);
    $sekunden   = bcmod($sekunden, '60');

    if (!($minuten >= 60)) 
    {
//         return $minuten . ' ' . $tMinuten . ' ' . $sekunden . ' ' . $tSekunden . '';
    	return $minuten . ' ' . $tMinuten . ' ';
    }

    $stunden    = bcdiv($minuten, '60', 0);
    $minuten    = bcmod($minuten, '60');

    if (!($stunden >= 24)) 
    {
    	if( $stunden == 1 )
    	{
//     		return $stunden . ' Stunde ' . $minuten . ' ' . $tMinuten . ' ' . $sekunden . ' ' . $tSekunden . '';
    		return $stunden . ' Std. ' . $minuten . ' ' . $tMinuten . ' ';
    	}
    	else
//           return $stunden . ' ' . $tStunden . ' ' . $minuten . ' ' . $tMinuten . ' ' . $sekunden . ' ' . $tSekunden . '';
    		return $stunden . ' ' . $tStunden . ' ' . $minuten . ' ' . $tMinuten . ' ';
    }

    $tage       = bcdiv($stunden, '24', 0);
    $stunden    = bcmod($stunden, '24');
    
    if( $stunden == 1 )
    {
//     		return $tage . ' Tage ' . $stunden . ' Stunde ' . $minuten . ' ' . $tMinuten . ' ' . $sekunden . ' ' . $tSekunden . '';
    	return $tage . ' T. ' . $stunden . ' Std. ' . $minuten . ' ' . $tMinuten . ' ';
    }
	else
//     	return $tage . ' Tage ' . $stunden . ' Stunden ' . $minuten . ' ' . $tMinuten . ' ' . $sekunden . ' ' . $tSekunden . '';
		return $tage . ' T. ' . $stunden . ' Std. ' . $minuten . ' ' . $tMinuten . '';
}

function push( $event, $description, $priority )
{
	$xml = simplexml_load_file('https://api.prowlapp.com/publicapi/add?apikey=DEIN-API-KEY&application=HomeControl&event=' . $event . '&description=' . $description . '&priority='. $priority . '');
	return $xml;	
}

function change_timer_state($ID)
{
	$sql = query( "SELECT id,enabled FROM timer WHERE id = '" . $ID . "'" );
	$timer = fetch( $sql );
	if($timer['enabled'] != 'Yes')
	{
	$sql = query( "UPDATE timer SET enabled = 'Yes' WHERE id = '" . $ID . "'" );
	}elseif($timer['enabled'] == 'Yes')
	{
	$sql = query( "UPDATE timer SET enabled = '' WHERE id = '" . $ID . "'" );
	}
}

function change_group_state($ID)
{
	$sql = query( "SELECT id,status FROM groups WHERE id = '" . $ID . "'" );
	$group = fetch( $sql );
	if($group['status'] != 'Yes')
	{
	$sql = query( "UPDATE groups SET status = 'Yes' WHERE id = '" . $ID . "'" );
	}elseif($group['status'] == 'Yes')
	{
	$sql = query( "UPDATE groups SET status = '' WHERE id = '" . $ID . "'" );
	}
}

function getLocalIp()
{ return gethostbyname(trim(`hostname`)); }

function samsung_send_key($tvip, $SendKey)
{    
	//echo $SendKey;
	
    //$tvip = "192.168.1.100"; //IP Address of TV
    $myip = getLocalIp();
    $mymac = "00-0c-29-3e-b1-4f"; //Used for the access control/validation, but not after that AFAIK
    $appstring = "iphone..iapp.samsung"; //What the iPhone app reports
    $tvappstring = "iphone.UD40D6310.iapp.samsung"; //Might need changing to match your TV type
    $remotename = "Home Automation"; //What gets reported when it asks for permission/also shows in General->Wireless Remote Control menu
    //echo "Content-type: text/html\n\n";
    flush();
    $sock = socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));
	$result = socket_connect($sock, $tvip, '55000');
    if( $result === false)
	   die ("Could not create socket: \n");

    //Normal remote keys
    //KEY_0
    //KEY_1
    //KEY_2
    //KEY_3
    //KEY_4
    //KEY_5
    //KEY_6
    //KEY_7
    //KEY_8
    //KEY_9
    //KEY_UP
    //KEY_DOWN
    //KEY_LEFT
    //KEY_RIGHT
    //KEY_MENU
    //KEY_PRECH
    //KEY_GUIDE
    //KEY_INFO
    //KEY_RETURN
    //KEY_CH_LIST
    //KEY_EXIT
    //KEY_ENTER
    //KEY_SOURCE
    //KEY_AD
    //KEY_PLAY
    //KEY_PAUSE
    //KEY_MUTE
    //KEY_PICTURE_SIZE
    //KEY_VOLUP
    //KEY_VOLDOWN
    //KEY_TOOLS
    //KEY_POWEROFF
    //KEY_CHUP
    //KEY_CHDOWN
    //KEY_CONTENTS	// Home
    //KEY_W_LINK //Media P
    //KEY_RSS //Internet
    //KEY_MTS //Dual
    //KEY_CAPTION //Subt
    //KEY_REWIND
    //KEY_FF
    //KEY_REC
    //KEY_STOP

    //Bonus buttons not on the normal remote:
    //KEY_TV

    //Don't work/wrong codes:
    //KEY_CONTENT
    //KEY_INTERNET
    //KEY_PC
    //KEY_HDMI1
    //KEY_OFF
    //KEY_POWER
    //KEY_STANDBY
    //KEY_DUAL
    //KEY_SUBT
    //KEY_CHANUP
    //KEY_CHAN_UP
    //KEY_PROGUP
    //KEY_PROG_UP

	if(!isset($SendKey)){
		$SendKey = 'CHAN_UP';
	}
	
	
	$ipencoded = base64_encode($myip);
	$macencoded = base64_encode($mymac);
    $messagepart1 = chr(0x64) . chr(0x00) . chr(strlen($ipencoded)) . chr(0x00) . $ipencoded . chr(strlen($macencoded)) . chr(0x00) . $macencoded .
                     	chr(strlen(base64_encode($remotename))) . chr(0x00) . base64_encode($remotename);
						
    $part1 = chr(0x00) . chr(strlen($appstring)) . chr(0x00) . $appstring . chr(strlen($messagepart1)) . chr(0x00) . $messagepart1;

    socket_write($sock, $part1, strlen($part1));
    //echo $part1;
    //echo "\n";

    $messagepart2 = chr(0xc8) . chr(0x00);
    $part2 = chr(0x00) . chr(strlen($appstring)) . chr(0x00) . $appstring . chr(strlen($messagepart2)) . chr(0x00) . $messagepart2;
    socket_write($sock, $part2, strlen($part2));
    //echo $part2;
    //echo "\n";

    //Preceding sections all first time only

    if (isset($SendKey)) {
       //Send remote key
       $key = "KEY_" . $SendKey;
       $messagepart3 = chr(0x00) . chr(0x00) . chr(0x00) . chr(strlen(base64_encode($key))) . chr(0x00) . base64_encode($key);
       $part3 = chr(0x00) . chr(strlen($tvappstring)) . chr(0x00) . $tvappstring . chr(strlen($messagepart3)) . chr(0x00) . $messagepart3;
       socket_write($sock,$part3,strlen($part3));
       //echo $part3;
       //echo "\n";
    } else if (isset($_REQUEST["text"])) {
       //Send text, e.g. in YouTube app's search, N.B. NOT BBC iPlayer app.
       $text = $_REQUEST["text"];
       $messagepart3 = chr(0x01) . chr(0x00) . chr(strlen(base64_encode($text))) . chr(0x00) . base64_encode($text);
       $part3 = chr(0x01) . chr(strlen($appstring)) . chr(0x00) . $appstring . chr(strlen($messagepart3)) . chr(0x00) . $messagepart3;
       socket_write($sock,$part3,strlen($part3));
	   //echo $part3;
       //echo "\n";   
    }

    socket_close($sock);

    //echo "\n\n";
}

function Onkyo_send_key($device,$key){
	$port = "60128";
	$fp = stream_socket_client("tcp://".$device.":".$port, $errno, $errstr, 5);
	if (!$fp) {
		if($errno == "110" OR $errno == "113") {
			echo "<html><center><div style='color:red; font-size:15px; font-family:Verdana,sans-serif;'>
			No receiver found at $ip:$port<br>
           Please check if IP and Port settings are correct and the device is switched on!<p style='color:#888;font-size:12px;'>
           To switch on the device via Ethernet, you have to set 'Setup/Network Setup/NetworkControl' to ON<br>
           (Remember that this setting uses &sim;20 W Power at Standby instead of &sim;2 W with NetworkControl OFF)</p></div></center></html>\n";} 
		else{ 
			echo "<html><center><div style='color:red; font-size:15px; font-family:Verdana,sans-serif;'>
				Error connecting to $device:$port<br>$errstr ($errno)</div></center></html>\n";}
	}
	else
	{

		$length=strlen($key); 
		$length=$length+1;
		$total=$length+16;
		$code=chr($length);
		// total eiscp packet to send 
		$line="ISCP\x00\x00\x00\x10\x00\x00\x00$code\x01\x00\x00\x00".$key."\x0D";
		fwrite($fp, $line); 
		return $line;
	}
}


function rechneVerbrauch($id,$type,$zeitEin, $zeitAus)
{
	global $zeitAus, $zeitDelta, $verbrauch, $_CONFIG;
	
	if(!$zeitAus){
		$zeitAus = time();
	}
	
	$zeitDelta = $zeitAus - $zeitEin;
	
	if($type == "devices"){
	
		$sql = query( "SELECT verbrauchWatt FROM devices WHERE iid = '" . $id . "' ");
		$row = fetch( $sql );	
		$watt = $row['verbrauchWatt'];
		
	}else{
		
		$sql = query( "SELECT verbrauchWatt FROM aktor WHERE iid = '" . $id . "' ");
		$row = fetch( $sql );		
		$watt = $row['verbrauchWatt'];
	}
	
	$verbrauch['kwh'] = $watt * $zeitDelta / 60 / 60 / 1000;
		
	$kwhPreis = 0.28;
	$verbrauch['euro'] = $kwhPreis * $verbrauch['kwh'];
	
	return $verbrauch;
}



function rechneVerbrauchHeute( $id,$type,$zeitHeute )
{
	global $verbrauch;
	//echo $type;
	if($type == "devices"){
		$sql = query( "SELECT verbrauchWatt FROM devices WHERE id = '" . $id . "' ");
		$row = fetch($sql);
		
		$watt = $row['verbrauchWatt'];
		//echo "test";
	}else{	
		$sql = query( "SELECT verbrauchWatt FROM aktor WHERE iid = '" . $id . "' ");
		$row = fetch($sql);
		
		$watt = $row['verbrauchWatt'];
	}
	
	$verbrauch['kwh'] = $watt * $zeitHeute / 60 / 60 / 1000;
	
	$kwhPreis = 0.28;
	$verbrauch['euro'] = $kwhPreis * $verbrauch['kwh'];
	//var_dump($verbrauch);
	return $verbrauch;
	
}


function verbrauchAktuell()
{
	/*
	 * Aktuellen Verbrauch berechnen
	 * Rückgabewert in WATT !
	*/
	
	global $verbrauch, $_CONFIG;
		
	$verbrauchAktor = 0.00;
		
	$sql = query( "SELECT verbrauchWatt FROM aktor WHERE zeitEIN > 0" );
	while( $row = fetch( $sql ) )
	{
		$verbrauchAktor = $verbrauchAktor + $row['verbrauchWatt'];
	}
		
	
		
	// Verbrauch der Geräte die immer an sind mitberechnen

	$verbrauchGeraete = 0.00;

	$sql = query( "SELECT verbrauchWatt FROM devices WHERE zeitEIN > 0" );
	while( $row = fetch( $sql ) )
	{
		$verbrauchGeraete = $verbrauchGeraete + $row['verbrauchWatt'];
	}

	$verbrauchAktuell = $verbrauchAktor + $verbrauchGeraete;
	$euroAktuell = $verbrauchAktuell * 0.28 / 1000;	
	$verbrauch['euro'] = round($euroAktuell,2);
	$verbrauch['kwh'] = $verbrauchAktuell;
		
	return $verbrauch;
		
}


function verbrauchHeute()
{
	/*
	 *  Heutigen Verbrauch berechnen
	 */
	
	global $verbrauch;
		
	$verbrauchHeuteAktor = 0.0;
	$euroHeuteAktor = 0.0;
	$verbrauchHeuteDevices = 0.0;
	$euroHeuteDevices = 0.0;
		
	$sql = query( "SELECT iid, zeitEin, zeitHeute FROM aktor" );
	while( $row = fetch($sql))
	{
		$deltaZeit = 0;
		$zeitHeute = 0;
		
		// Zeit der Aktiven Aktoren miteinbeziehen
		if( $row['zeitEin'] > 0 )
		{
			// $deltaZeit = Zeit die der Aktor bis jetz ein war
			$deltaZeit = time() - $row['zeitEin'];
		}
	
		// zeitHeute brechnen
		$zeitHeute = $deltaZeit + $row['zeitHeute'];
		//echo $row['iid'] ."<br/>";
		rechneVerbrauchHeute($row['iid'],"aktor", $zeitHeute);
		//echo "aktor " .  $row['iid'] . " :" . $verbrauch['kwh'] . "<br/>";
		//print_r($verbrauch);
		$verbrauchHeuteAktor = $verbrauchHeuteAktor + $verbrauch['kwh'];
		$euroHeuteAktor = $euroHeuteAktor + $verbrauch['euro'];
	}
	
	/* Verbrauch der "Geräte" miteinbeziehen
	$monat = date("m");
	$tagHeute = date("d");
	$jahr = date("Y");
	$timestamp = mktime(0, 0, 0, $monat, $tagHeute, $jahr);
	
	rechneVerbrauchHeute( false, $timestamp );
	$verbrauchHeute = $verbrauchHeute + $verbrauch['kwh'];
	$euroHeute = $euroHeute + $verbrauch['euro'];
	*/
	
	$sql = query( "SELECT id, zeitEin, zeitHeute FROM devices" );
	while( $row = fetch($sql))
	{
		$deltaZeit = 0;
		$zeitHeute = 0;
		
		// Zeit der Aktiven Aktoren miteinbeziehen
		if( $row['zeitEin'] > 0 )
		{
			// $deltaZeit = Zeit die der Aktor bis jetz ein war
			$deltaZeit = time() - $row['zeitEin'];
		}
	
		// zeitHeute brechnen
		$zeitHeute = $deltaZeit + $row['zeitHeute'];
		//echo $zeitHeute . "<br/>";
		rechneVerbrauchHeute($row['id'],"devices", $zeitHeute);
		//echo "device " .  $row['id'] . " :" . $verbrauch['kwh'] . "<br/>";
		$verbrauchHeuteDevices = $verbrauchHeuteDevices + $verbrauch['kwh'];
		$euroHeuteDevices = $euroHeuteDevices + $verbrauch['euro'];
	}	
	
	$verbrauch['kwh'] = round($verbrauchHeuteDevices + $verbrauchHeuteAktor,2) ;
	$verbrauch['euro'] = round($euroHeuteDevices + $euroHeuteAktor,2);
	
	return $verbrauch;
	
}
 
function verbrauchTimestamp( $timestamp )
{
	global $verbrauch;

	$verbrauchTimestamp = 0.0;

	$sql = query( "SELECT kwh FROM logVerbrauch WHERE date >= '" . $timestamp . "' " );
	while( $row = fetch( $sql ) )
	{
		$verbrauchTimestamp = $verbrauchTimestamp + $row['kwh'];
	}

	$euroTimestamp = $verbrauchTimestamp * 0.28;
	
	$verbrauch['kwh'] = round($verbrauchTimestamp,2);
	$verbrauch['euro'] = round($euroTimestamp,2);
	
	return $verbrauch;
	
}


function verbrauchGestern()
{
	global $verbrauch;

		$tag = date("d");
		$monat = date("m");
		$jahr = date("Y");
					
		$timestamp = mktime(0, 0, 0, $monat, $tag -1, $jahr);

					
	return verbrauchTimestamp($timestamp);
	
}

function verbrauchMonat()
{
	global $verbrauch;

		$tag = date("d");
		$monat = date("m");
		$jahr = date("Y");
					
		$timestamp = mktime(0, 0, 0, $monat -1, $tag, $jahr);
					
	return verbrauchTimestamp($timestamp);
	
}

function verbrauchJahr()
{
	global $verbrauch;

		
		$tag = date("d");
		$monat = date("m");
		$jahr = date("Y");
					
		$timestamp = mktime(0, 0, 0, $monat -12, $tag, $jahr);
					
	return verbrauchTimestamp($timestamp);
	
}

?>
