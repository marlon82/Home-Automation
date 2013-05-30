<?php
/*
 * Created on 19.02.2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
function temp(){
 
$sqlc = query( "SELECT value,options FROM config" );

while( $timer = fetch( $sql ) )
{
	switch($config['options']) {
		case 'DreamBoxIP':
			$dreamIP = $config['value'];
			break;
		case 'XS1IP':	
			$XS1['ip'] = 'http://' . $config['value'] . '/';
			break;
		case 'XS1User':
			$XS1['user'] = $config['value'];
			break;
		case 'XS1Pass':
			$XS1['pw'] = $config['value'];
			break;
	}
}
}
$dreamIP = '192.168.1.22';
$XS1 = array();
$XS1['ip'] = 'http://192.168.1.242/';
$XS1['user'] = '';
$XS1['pw'] = '';

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

function rechneVerbrauch($id,$zeitEin, $zeitAus)
{
	global $zeitAus, $zeitDelta, $verbrauch, $_CONFIG;
	
	if( !$zeitAus)
	{
		$zeitAus = time();
	}
	
	$zeitDelta = $zeitAus - $zeitEin;
	
	if( $id )
	{
	
		$sql = query( "SELECT verbrauchWatt FROM aktor WHERE iid = '" . $id . "' ");
		$row = fetch( $sql );
			
		$watt = $row['verbrauchWatt'];
	}
	else
	{
		
		$sql = query( "SELECT watt FROM verbrauchGeraete" );
		
		while( $row = fetch( $sql ) )
		{

			$watt = $watt + $row['watt'];
			
		}
	}
	
	$verbrauch['kwh'] = $watt * $zeitDelta / 60 / 60 / 1000;
		
	$kwhPreis = $_CONFIG['kwhPreis'];
	$verbrauch['euro'] = $kwhPreis * $verbrauch['kwh'];
	
	return $verbrauch;
}

function rechneVerbrauchHeute( $id, $zeitHeute )
{
	global $verbrauch, $_CONFIG;
	
	if( $id )
	{
		$sql01 = query( "SELECT verbrauchWatt FROM aktor WHERE iid = '" . $id . "' ");
		$row01 = fetch( $sql01 );
		
		$watt = $row01['verbrauchWatt'];
	}
	else
	{	
		$zeitAus = time();
		
		// zeitHeute ist in dem Fall der timestamp von Gestern Mitternacht
		$zeitHeute = $zeitAus - $zeitHeute;
		
		$sql = query( "SELECT watt FROM verbrauchGeraete" );
		
		while( $row = fetch( $sql ) )
		{
			$watt = $watt + $row['watt'];	
		}
	}
	
	$verbrauch['kwh'] = $watt * $zeitHeute / 60 / 60 / 1000;
	
	$kwhPreis = $_CONFIG['kwhPreis'];
	$verbrauch['euro'] = $kwhPreis * $verbrauch['kwh'];
	
	return $verbrauch;
	
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
	// URL zum Aktor setzen zusammenbauen 
	if( $funktion == false )
		$url = $XS1['ip'] . 'preset?switch='.$id.'&value='.$value;
		//echo $XS1['ip'] . 'preset?switch='.$id.'&value='.$value;
	else 
		$url = $XS1['ip'] . 'control?callback=cname&cmd=set_state_actuator&number='.$id.'&function='.$funktion;
		//echo $XS1['ip'] . 'control?callback=cname&cmd=set_state_actuator&number='.$id.'&function='.$funktion;
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
			rechneVerbrauch($id, $zeitEin, $zeitAus);
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

 
?>
