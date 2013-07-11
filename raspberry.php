<div data-role="page" id="dashboard">
<?php
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	header("Pragma: no-cache");

	function NumberWithCommas($in)
	{
		return number_format($in);
	}
	function  WriteToStdOut($text)
	{
		$stdout = fopen('php://stdout','w') or die($php_errormsg);
		fputs($stdout, "\n" . $text);
	}
	
	$current_time = exec("date +'%d %b %Y<br />%T %Z'");
	$frequency = NumberWithCommas(exec("cat /sys/devices/system/cpu/cpu0/cpufreq/scaling_cur_freq") / 1000);
	$processor = str_replace("-compatible processor", "", explode(": ", exec("cat /proc/cpuinfo | grep Processor"))[1]);
	$cpu_temperature = round(exec("cat /sys/class/thermal/thermal_zone0/temp ") / 1000, 1);
	
	//Network
	$network_ip = exec("/sbin/ifconfig eth0 | grep 'inet addr:'| cut -d: -f2 | cut -d' ' -f1");
	$network_mask = exec("/sbin/ifconfig eth0 | grep 'Mask:'| cut -d: -f2 | cut -d' ' -f1");
	$network_rx = exec("/sbin/ifconfig eth0 | grep 'RX bytes'| cut -d: -f2 | cut -d' ' -f1");
	$network_tx = exec("/sbin/ifconfig eth0 | grep 'TX bytes'| cut -d: -f3 | cut -d' ' -f1");
	if($network_rx > 1000){
		$network_rx = round($network_rx /1000,2);
		$network_rx_einheit = "KByte";
		if($network_rx > 1000){
			$network_rx = round($network_rx /1000,2);
			$network_rx_einheit = "MByte";
		}
	}
	if($network_tx > 1000){
		$network_tx = round($network_tx /1000,2);
		$network_tx_einheit = "KByte";
		if($network_tx > 1000){
			$network_tx = round($network_tx /1000,2);
			$network_tx_einheit = "MByte";
		}
	}
	
	
	
	list($system, $host, $kernel) = split(" ", exec("uname -a"), 4);
	
	//Uptime
	$uptime_array = explode(" ", exec("cat /proc/uptime"));
	$seconds = round($uptime_array[0], 0);
	$minutes = $seconds / 60;
	$hours = $minutes / 60;
	$days = floor($hours / 24);
	$hours = sprintf('%02d', floor($hours - ($days * 24)));
	$minutes = sprintf('%02d', floor($minutes - ($days * 24 * 60) - ($hours * 60)));
	if ($days == 0):
		$uptime = $hours . ":" .  $minutes . " (hh:mm)";
	elseif($days == 1):
		$uptime = $days . " day, " .  $hours . ":" .  $minutes . " (hh:mm)";
	else:
		$uptime = $days . " days, " .  $hours . ":" .  $minutes . " (hh:mm)";
	endif;
	
	//CPU Usage
	$output1 = null;
	$output2 = null;
	//First sample
	exec("cat /proc/stat", $output1);
	//Sleep before second sample
	sleep(1);
	//Second sample
	exec("cat /proc/stat", $output2);
	$cpuload = 0;
	for ($i=0; $i < 1; $i++)
	{
		//First row
		$cpu_stat_1 = explode(" ", $output1[$i+1]);
		$cpu_stat_2 = explode(" ", $output2[$i+1]);
		//Init arrays
		$info1 = array("user"=>$cpu_stat_1[1], "nice"=>$cpu_stat_1[2], "system"=>$cpu_stat_1[3], "idle"=>$cpu_stat_1[4]);
		$info2 = array("user"=>$cpu_stat_2[1], "nice"=>$cpu_stat_2[2], "system"=>$cpu_stat_2[3], "idle"=>$cpu_stat_2[4]);
		$idlesum = $info2["idle"] - $info1["idle"] + $info2["system"] - $info1["system"];
		$sum1 = array_sum($info1);
		$sum2 = array_sum($info2);
		//Calculate the cpu usage as a percent
		$load = (1 - ($idlesum / ($sum2 - $sum1))) * 100;
		$cpuload += $load;
	}
	$cpuload = round($cpuload, 1); //One decimal place
	
	//Memory Utilisation
	$meminfo = file("/proc/meminfo");
	for ($i = 0; $i < count($meminfo); $i++)
	{
		list($item, $data) = split(":", $meminfo[$i], 2);
		$item = trim(chop($item));
		$data = intval(preg_replace("/[^0-9]/", "", trim(chop($data)))); //Remove non numeric characters
		switch($item)
		{
			case "MemTotal": $total_mem = $data; break;
			case "MemFree": $free_mem = $data; break;
			case "SwapTotal": $total_swap = $data; break;
			case "SwapFree": $free_swap = $data; break;
			case "Buffers": $buffer_mem = $data; break;
			case "Cached": $cache_mem = $data; break;
			default: break;
		}
	}
	$used_mem = $total_mem - $free_mem;
	$used_swap = $total_swap - $free_swap;
	$percent_free = round(($free_mem / $total_mem) * 100);
	$percent_used = round(($used_mem / $total_mem) * 100);
	$percent_swap = round((($total_swap - $free_swap ) / $total_swap) * 100);
	$percent_swap_free = round(($free_swap / $total_swap) * 100);
	$percent_buff = round(($buffer_mem / $total_mem) * 100);
	$percent_cach = round(($cache_mem / $total_mem) * 100);
	$used_mem = NumberWithCommas($used_mem);
	$used_swap = NumberWithCommas($used_swap);
	$total_mem = NumberWithCommas($total_mem);
	$free_mem = NumberWithCommas($free_mem);
	$total_swap = NumberWithCommas($total_swap);
	$free_swap = NumberWithCommas($free_swap);
	$buffer_mem = NumberWithCommas($buffer_mem);
	$cache_mem = NumberWithCommas($cache_mem);

	//Disk space check
	exec("df -T -l -BM -x tmpfs -x devtmpfs -x rootfs", $diskfree);
	$count = 1;
	while ($count < sizeof($diskfree))
	{
		list($drive[$count], $typex[$count], $size[$count], $used[$count], $avail[$count], $percent[$count], $mount[$count]) = split(" +", $diskfree[$count]);
		$percent_part[$count] = str_replace( "%", "", $percent[$count]);
		$count++;
	}
?>

<?
include("header.php");
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




<?php

include('functions.php');
?>
<div data-role="content" >	
    <div style="float: left; border-radius:10px; height:300px; width:32%; margin-left:10px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true">
			<li data-role="list-divider">Generelle Informationen</li>
			<li>Hostname<span style="float:right"><? echo $host; ?></span></li>
			<li>System Time<span style="float:right"><? echo $current_time; ?></span></li>
			<li>Kernel<span style="float:right"><?echo $system . " " . $kernel; ?></span></li>
			<li>Uptime<span style="float:right"><? echo $uptime; ?></span></li>
		</ul>		
    </div>	
    <div style="float: left; border-radius:10px; height:300px; width:32%; margin-left:10px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true">
			<li data-role="list-divider">Netzwerk Informationen</li>
			<li>IP Adresse<span style="float:right"><? echo $network_ip; ?></span></li>
			<li>Received<span style="float:right"><? echo $network_rx . " " . $network_rx_einheit; ?></span></li>
			<li>Transmit<span style="float:right"><?echo $network_tx . " " . $network_tx_einheit; ?></span></li>
		</ul>		
    </div>
    <div style="float: left; border-radius:10px; height:300px; width:32%; margin-left:10px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true">
			<li data-role="list-divider">CPU Informationen</li>
			<li>CPU Type<span style="float:right"><? echo $processor; ?></span></li>
			<li>CPU Frequency<span style="float:right"><? echo $frequency . " Mhz"; ?></span></li>
			<li>CPU Load<span style="float:right"><? echo $cpuload . "%"; ?></span></li>
			<li>CPU Temperatur<span style="float:right"><? echo $cpu_temperature . " °C"; ?></span></li>
		</ul>		
    </div>
    <div style="float: left; border-radius:10px; height:300px; width:32%; margin-left:10px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true">
			<li data-role="list-divider">Memory</li>
			<li>Total<span style="float:right"><? echo $total_mem; ?> kB</span></li>
			<li>Used (<? echo $percent_used; ?>%)<span style="float:right"><? echo $used_mem; ?> kB</span></li>
			<li>Free (<? echo $percent_free; ?>%)<span style="float:right"><? echo $free_mem; ?> kB</span></li>
			<li>Buffered (<? echo $percent_buff; ?>%)<span style="float:right"><? echo $buffer_mem; ?> kB</span></li>
			<li>Cached (<? echo $percent_cach; ?>%)<span style="float:right"><? echo $cache_mem; ?> kB</span></li>
		</ul>		
    </div>	
    <div style="float: left; border-radius:10px; height:300px; width:32%; margin-left:10px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true">
			<li data-role="list-divider">Swap</li>
			<li>Total<span style="float:right"><? echo $total_swap; ?> kB</span></li>
			<li>Used (<? echo $percent_swap; ?>%)<span style="float:right"><? echo $used_swap; ?> kB</span></li>
			<li>Free (<? echo $percent_swap_free; ?>%)<span style="float:right"><? echo $free_swap; ?> kB</span></li>
		</ul>		
    </div>	
	<?
	for ($i = 1; $i < $count; $i++)
	{
		$total = NumberWithCommas(intval(preg_replace("/[^0-9]/", "", trim($size[$i])))) . " MB";
		$usedspace = NumberWithCommas(intval(preg_replace("/[^0-9]/", "", trim($used[$i])))) . " MB";
		$freespace = NumberWithCommas(intval(preg_replace("/[^0-9]/", "", trim($avail[$i])))) . " MB";

	?>
		<div style="float: left; border-radius:10px; height:300px; width:32%; margin-left:10px; margin-bottom:12px">
			<ul data-role="listview" data-inset="true">
				<li data-role="list-divider">Disk Usage <? echo $mount[$i] . " (" . $typex[$i] . ")"; ?> </li>
				<li>Total Size<span style="float:right"><? echo $total; ?></span></li>
				<li>Used (<? echo $percent[$i]; ?>)<span style="float:right"><? echo $usedspace; ?></span></li>
				<li>Available (<? echo (100-(floatval($percent_part[$i]))); ?>%)<span style="float:right"><? echo $freespace; ?></span></li>
			</ul>		
		</div>
	<?
	}
	?>
</div>


