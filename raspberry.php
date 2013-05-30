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
	//$RX = exec("ifconfig eth0 | grep 'RX bytes'| cut -d: -f2 | cut -d' ' -f1");
	//$TX = exec("ifconfig eth0 | grep 'TX bytes'| cut -d: -f3 | cut -d' ' -f1");
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
<div data-role="header" data-position="fixed" data-theme="b">
	<a href="index.php?page=dashboard" data-icon="home" rel="external">Home</a>
	<div id="container">
		<li class="hours"></li>
		<li class="point">:</li>
		<li class="min"></li>
		<li class="point">:</li>
		<li class="sec"></li>
	</div>
	<h1>RaspberryPi</h1>
</div><!-- /header -->



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
right:10px;
top:15px;
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

<script type="text/javascript">

$(document).ready(function() {


setInterval( function() {
	// Create a newDate() object and extract the seconds of the current time on the visitor's
	var seconds = new Date().getSeconds();
	// Add a leading zero to seconds value
	$(".sec").html(( seconds < 10 ? "0" : "" ) + seconds);
	},1000);
	
setInterval( function() {
	// Create a newDate() object and extract the minutes of the current time on the visitor's
	var minutes = new Date().getMinutes();
	// Add a leading zero to the minutes value
	$(".min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);
	
setInterval( function() {
	// Create a newDate() object and extract the hours of the current time on the visitor's
	var hours = new Date().getHours();
	// Add a leading zero to the hours value
	$(".hours").html(( hours < 10 ? "0" : "" ) + hours);
    }, 1000);	
});

</script>


<?php

include('functions.php');
?>

<ul data-role="listview" data-inset="true">
    <li data-role="list-divider">Generelle Informationen</li>
    <li>
        <h2>Hostname</h2>
        <p class="ui-li-aside"><strong><?php echo $host; ?></strong></p>
    </a></li>
    <li>
        <h2>System Time</h2>
        <p class="ui-li-aside"><strong><?php echo $time; ?></strong></p>
    </a></li>
    <li>
        <h2>Kernel</h2>
        <p class="ui-li-aside"><strong><?php echo $system . ' ' . $kernel; ?></strong></p>
    </a></li>
    <li>
        <h2>CPU Type</h2>
        <p class="ui-li-aside"><strong><?php echo $processor; ?></strong></p>
    </a></li>
    <li>
        <h2>CPU Frequency</h2>
        <p class="ui-li-aside"><strong><?php echo $freq. " MHz"; ?></strong></p>
    </a></li>
    <li>
        <h2>CPU Load</h2>
        <p class="ui-li-aside"><strong><?php echo $cpuload . "%"; ?></strong></p>
    </a></li>
    <li>
        <h2>CPU Temperatur</h2>
        <p class="ui-li-aside"><strong><?php echo $cputemp2 . " °C."; ?></strong></p>
    </a></li>
    <li>
        <h2>Uptime</h2>
        <p class="ui-li-aside"><strong><?php echo $uptime; ?></strong></p>
    </a></li>
</ul>

