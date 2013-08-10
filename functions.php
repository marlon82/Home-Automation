<?php
error_reporting(E_ALL);
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
			case 'EnergyPrice':
				$StromPreis = $config['value'];
				break;
		}
	}

setlocale(LC_ALL,'de_DE@euro', 'de_DE',  'de', 'ge');
date_default_timezone_set('Europe/Berlin');

function backup_tables($tables){
    $return = "";

    if($tables == '*') {
		$Komplett = 'True';
		$FileName = 'complete';
        $tables = array();
        $result = mysql_query("SHOW TABLES");
        while($row = mysql_fetch_row($result)) {
            $tables[] = $row[0];
        }
    } else {
		$Komplett = 'False';
		$FileName = $tables;
        //if (is_array($tables)) {
		$temptables = $tables;
        $tables = array();
        $tables = explode(',', $temptables);
        //}
    }
	//echo "Tables:";
	//var_dump($tables);
    // Cycle through each provided table
    foreach($tables as $table) {		
		$result = mysql_query("SELECT * FROM " . $table);
     
		$num_fields = mysql_num_fields($result);
		
        // First part of the output – remove the table
        $return .= 'DROP TABLE ' . $table . ';<|||||||>';
 
        // Second part of the output – create table
        $row2 = mysql_fetch_row(mysql_query("SHOW CREATE TABLE " . $table));
        $return .= "\n\n" . $row2[1] . ";<|||||||>\n\n";
 
        // Third part of the output – insert values into new table
        for ($i = 0; $i < $num_fields; $i++) {
            while($row = mysql_fetch_row($result)) {
                $return.= 'INSERT INTO '.$table.' VALUES(';
                for($j=0; $j<$num_fields; $j++) {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = ereg_replace("\n","\\n",$row[$j]);
                    if (isset($row[$j])) {
                        $return .= '"' . $row[$j] . '"';
                    } else {
                        $return .= '""';
                    }
                    if ($j<($num_fields-1)) {
                        $return.= ',';
                    }
                }
                $return.= ");<|||||||>\n";
            }
        }
        $return.="\n\n\n";
    }
    // Generate the filename for the sql file
    $filess = 'backup/dbbck_'.$FileName.'_'. date("ymd_His") . '.sql';
 
    // Save the sql file
    $handle = fopen($filess,'w+');
    fwrite($handle,$return);
    fclose($handle);
	
	
    // Print the message
    echo "<h4>	The backup has been created successfully (" . $filess . ").</h4><br>\n";
	//echo $return;
 
    // Close MySQL Connection
    mysql_close();
}

function restore_tables($filename){
    // Restore the backup
 
	// Load and explode the sql file
	mysql_select_db("$DBName");
	$f = fopen("backup/".$filename,"r+");
	$sqlFile = fread($f,filesize($filename));
	$sqlArray = explode(';<|||||||>',$sqlFile);

	// Process the sql file by statements
	foreach ($sqlArray as $stmt) {
		if (strlen($stmt)>3){
			$result = mysql_query($stmt);
		}
	}
 
    // Print message (error or success)
    if ($sqlErrorCode == 0){
        print("Database restored successfully!<br>\n");
        print("Backup used: " . $filename);
    } else {
        print("An error occurred while restoring backup!<br><br>\n");
        print("Error code: $sqlErrorCode<br>\n");
        print("Error text: $sqlErrorText<br>\n");
        print("Statement:<br/> $sqlStmt<br>");
    }
}

function delete_tables($filename){
	unlink("backup/".$filename);
	print("Database deleted successfully!<br>\n");
	print("deleted file: " . $filename);
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

function current_channel_info()
{
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

function set_channel($sref)
{
	global $dreamIP;
	$xml = simplexml_load_file("http://".$dreamIP."/web/zap?sRef=".$sref);
	var_dump($xml);
}

function enigma2_send_key($deviceIP, $key)
{

}

function get_epgdetails($sref)
{
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

function get_epg_now($cref)
{
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

function get_channels($ref)
{
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

function get_epg_nownext($ref)
{
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

function get_bouquets()
{
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

function GenGraph ($datay1,$datax1,$filename,$min,$max)
{
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

function getProgress($start_date, $current_time, $duration)
{
	//(current_time - begin_time) / duration * 100
	$diff = ($current_time - $start_date) / $duration * 100;
	$diff_int = round($diff);
    return ($diff_int);
}

function ReadXS1($aktion, $id) 
{
	global $XS1;
	  	  
	if (strcmp($aktion,'sensor')==0){
	    $actionCmd = 'get_state_sensor'; 
		$Url = $XS1['ip']."control?callback=cname&cmd=".$actionCmd."&number=".$id;
	}
	elseif (strcmp($aktion,'allActuators')==0){
	    $actionCmd = 'get_list_actuators'; 
		$Url = $XS1['ip']."control?callback=cname&cmd=".$actionCmd;
	}	
	else{
	    $actionCmd = 'get_state_actuator'; 
		$Url = $XS1['ip']."control?callback=cname&cmd=".$actionCmd."&number=".$id;
	}
	  $jsonData = file_get_contents($Url);

	  // Remove "cname(" and ")"
	  $json = substr($jsonData, strpos($jsonData,'{'));
	  $json = substr($json, 0, strrpos($json,'}')+1); 
		
	  //echo $json; echo "<br><br>";  //json string
	  
	  $json = json_decode($json);
				
	  $number = $json->{$aktion}->{'number'};		
	  $value = $json->{$aktion}->{'value'};
	  $name = $json->{$aktion}->{'name'};
	  //echo $name;
	  $type = $json->{$aktion}->{'type'};
	  $unit = $json->{$aktion}->{'unit'};
	  $utime = $json->{$aktion}->{'utime'};
	  $id = $json->{$aktion}->{'id'};
	  $function = $json->{$aktion}->{'function'};
	  
	  if( $actionCmd == 'get_state_sensor'){
	  	$state = $json->{$aktion}->{'state'};
	  	return compact('number', 'value', 'name', 'type', 'unit', 'utime', 'state');
	  }elseif( $actionCmd == 'get_list_actuators'){
		//echo $function;
	  	return compact('id,name,function'); 
	  }else{
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

function ping($host, $timeout = 1)
{
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
	
	$sql = query( "SELECT * FROM aktor WHERE iid = '" . $id . "'" );
	$row = fetch( $sql );
	$sqlroom = query( "SELECT * FROM rooms WHERE id = '" . $row['room'] . "'" );
	$room = fetch( $sqlroom );
	
	if( $funktion == false ){
		$url = $XS1['ip'] . 'preset?switch='.$id.'&value='.$value;
		//echo $XS1['ip'] . "preset?switch=" . $id . "&value=" . $value;
		$sqllog = query( "INSERT INTO log VALUES('','" . date("Y-m-d") . "','" . date("H:i:s") . "','function.php','setAktor','set','schalte " . $row['name'] . " " . $room['name'] . " mit value " . $value . " ')");
	}else {
		$url = $XS1['ip'] . 'control?callback=cname&cmd=set_state_actuator&number=' . $id . '&function=' . $funktion;
		//echo $XS1['ip'] . "control?callback=cname&cmd=set_state_actuator&number=" . $id . "&function=" . $funktion;
		$sqllog = query( "INSERT INTO log VALUES('','" . date("Y-m-d") . "','" . date("H:i:s") . "','function.php','setAktor','set','schalte " . $row['name'] . " " . $room['name'] . " mit function " . $funktion . " ')");
	}
	$filesize= 10000;
	setUrl($url);
	//$handle = fopen($url, "r");

	
	
		
	$zeitEin = $row['zeitEin'];

	if( $value == 'on' || $value > 0)
	{
		// Doppeltes Einschalten verhindern
		if( $zeitEin == 0 )
			$sql = query( "UPDATE aktor SET zeitEin = '" . time() . "' WHERE iid = '" . $id . "'" );
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

function samsung_send_key($tvip, $SendKey)
{    
	//echo $SendKey;
	
    $myip = getLocalIp();
    $mymac = "00-0c-29-3e-b1-4f"; //Used for the access control/validation, but not after that AFAIK
    $appstring = "iphone..iapp.samsung"; //What the iPhone app reports
    $tvappstring = "iphone.UD40D6310.iapp.samsung"; //Might need changing to match your TV type
    $remotename = "Home Automation"; //What gets reported when it asks for permission/also shows in General->Wireless Remote Control menu
    //echo "Content-type: text/html\n\n";
    flush();
    $sock = socket_create(AF_INET, SOCK_STREAM, getprotobyname('tcp'));
	$result = socket_connect($sock, $tvip, '55000');
    if( $result === false){
	   echo "Could not create socket\n";
	}else{
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

		$SendKeys = explode(",",$SendKey);
		foreach($SendKeys as $Send_Key){
			if (isset($Send_Key)) {
				//Send remote key
				$key = "KEY_" . $Send_Key;
				$sqllog = query( "INSERT INTO log VALUES('','" . date("Y-m-d") . "','" . date("H:i:s") . "','function.php','samsung_send_key','set','sende befehl " . $key . " an " . $tvip . " ')");
				$messagepart3 = chr(0x00) . chr(0x00) . chr(0x00) . chr(strlen(base64_encode($key))) . chr(0x00) . base64_encode($key);
				$part3 = chr(0x00) . chr(strlen($tvappstring)) . chr(0x00) . $tvappstring . chr(strlen($messagepart3)) . chr(0x00) . $messagepart3;
				socket_write($sock,$part3,strlen($part3));
				//echo $part3;
				//echo "\n";
				usleep(500000);
			} else if (isset($_REQUEST["text"])) {
				//Send text, e.g. in YouTube app's search, N.B. NOT BBC iPlayer app.
				$text = $_REQUEST["text"];
				$messagepart3 = chr(0x01) . chr(0x00) . chr(strlen(base64_encode($text))) . chr(0x00) . base64_encode($text);
				$part3 = chr(0x01) . chr(strlen($appstring)) . chr(0x00) . $appstring . chr(strlen($messagepart3)) . chr(0x00) . $messagepart3;
				socket_write($sock,$part3,strlen($part3));
				//echo $part3;
				//echo "\n";   
			}
		}

		
		
		

		socket_close($sock);
		
	}
    //echo "\n\n";
}

function Onkyo_send_key($device,$key)
{
	$port = "60128";
	$fp = stream_socket_client("tcp://".$device.":".$port, $errno, $errstr, 5);
	if (!$fp) {
		if($errno == "110" OR $errno == "113") {
		
		}
		else{ 
			
		}
	}
	else
	{
		$SendKeys = explode(",",$key);
		foreach($SendKeys as $Send_Key){
			$length=strlen($Send_Key); 
			$length=$length+1;
			$total=$length+16;
			$code=chr($length);
			// total eiscp packet to send 
			$line="ISCP\x00\x00\x00\x10\x00\x00\x00$code\x01\x00\x00\x00".$Send_Key."\x0D";
			fwrite($fp, $line); 
			$sqllog = query( "INSERT INTO log VALUES('','" . date("Y-m-d") . "','" . date("H:i:s") . "','function.php','Onkyo_send_key','set','sende befehl " . $Send_Key . " an " . $device . " ')");
			usleep(500000);
			return $line;
		}
	}
}

function Onkyo_get_status($device,$key)
{

	$port = "60128";
	$fp = stream_socket_client("tcp://".$device.":".$port, $errno, $errstr, 5);

    if (strpos($key,'#') != FALSE){ // strips "#" from the end of a command (indicating that a response is wanted) 
        $key = substr($key,0,strpos($key,'#'));}
      
	// this is a "fake"-implementation of the command "!1NPRQSTN" (question Network-Preset)
	// that was somehow "forgotten" in the ISCP-protocol - so we record the switches in $_SESSION["NPR"] (see send_key)
	// and "fake" this command.
	if($key=="!1NPRQSTN"){if(isset($_SESSION["NPR"])) return $_SESSION["NPR"]; else {$_SESSION["NPR"]="na"; return "na";}}  //fake-question (was not implemented in protocol)
	//adjust if "na" ist shown often
	$timeout=1.2;  //default 1.2 seconds - according to protocol even 0.05 should be enough, but wasn't ;-)
	// stream_set_timeout($fp, 5);  
	$start = microtime(1); 
	$oft=0;
	Onkyo_send_key($device,$key);
	do {
		//   if ($oft==0 OR ($oft==1 AND $nu>timeout/2)) {send_key($key, $fp, $debug);$oft++;} //experimental: try twice as sometimes message won't be received
		$status = "";
		$status = fread($fp, 80);
		$info = stream_get_meta_data($fp);
		$status = substr($status, strpos($status, "!"));
		$status = substr($status, 0, strlen($status)-3);
		$nu=microtime(1)-$start;
	} while (($nu<$timeout) AND (substr($status,2,3)!=substr($key,2,3))); //loop until timeout OR matching message (receiver sends a lot of unsolicited messages - so we watch for messages of the same type as our sent message)
	if ($nu>=$timeout OR $info['timed_out']) { //if stopped by timeout put "na" into the session-string (of same type as sent message) and return 
		$_SESSION[substr($status,2,3)] = "na";
		return "na"; 
	}
	else{ //if matching messages found, put received message into the session-string (of same type as sent message) and return 
		$_SESSION[substr($status,2,3)] = $status;
		
		$sqllog = query( "INSERT INTO log VALUES('','" . date("Y-m-d") . "','" . date("H:i:s") . "','function.php','Onkyo_get_status','get','frage wert von " . $key . " an " . $device . " ab ')");
		return $status;
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
