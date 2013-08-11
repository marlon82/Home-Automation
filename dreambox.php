


<!-- Start of first page: #two -->
<div data-role="page" id="dreambox">
<?
include('functions.php');
include("header.php");
$dreamIP = $_GET['ip'];
?>	


<style>
.split-button-custom {
    float: right;
    margin-right: 15px;
    margin-top: -32px;
    border-bottom-left-radius: 1em 1em;
    border-bottom-right-radius: 1em 1em;
    border-top-left-radius: 1em 1em;
    border-top-right-radius: 1em 1em;   
}

.split-button-custom span.ui-btn-inner {
    border-bottom-left-radius: 1em 1em;
    border-bottom-right-radius: 1em 1em;
    border-top-left-radius: 1em 1em;
    border-top-right-radius: 1em 1em;
    padding-right: 0px;
}

.split-button-custom span.ui-icon {
    margin-top: 0px;
    right: 0px;
    top: 0px;
    position: relative;
}

           /**** Trying to style h1 and paragraph *******/
			.epgprogress {float:right; position:relative ; right:-100px;top:10px}
			.epglinks{float:right; position:relative ; right:-50px; top:25px}
			.kanalpic{float:left; max-width:100px; min-width:100px; max-height:60px; min-height:60px}
			.epgnow{float:left; margin-left:15px; position:relative; max-width:300px; min-width:300px; top:10px}
			.epgnext{float:none; margin-left:130px; position:relative;  max-width:300px; min-width:300px; top:-30px; width:10px}
			.stream{float:right; position:relative; top:35px; right:-180px}


.fancyProgressBar {
    padding: 6px 0px;
    width: 20%;
    background-image:-moz-linear-gradient(0deg,transparent 40px, #666 1px);
    background-image:-webkit-gradient(linear, 0 0, 0 0, color-stop(0, #666), color-stop(0.07, rgba(255, 255, 255, 0)), color-stop(1, rgba(255, 255, 255, 0)));
    background-size: 40px 10px;
    background-position: -1px 0px;
    position: relative;
    float:right;
}
.fancyProgressBar:after{

    position: absolute;
    top: 110%;
    width: 100%;
    text-align: center;
    font-size: 11px;
    color: #999;
}
.fancyProgressBar span {
    display: block;
    background-color: #EEEEEE;
    border: 1px solid #666;   
    border-radius: 300px;
    overflow: hidden;
    box-shadow: inset 0 0 4px rgba(0,0,0,.3);
    background-image:-moz-linear-gradient(0deg,transparent 40px, #666 1px);
    background-image:-webkit-gradient(linear, 0 0, 10% 0, color-stop(0, #666), color-stop(0.07, rgba(255, 255, 255, 0)), color-stop(1, rgba(255, 255, 255, 0)));
    background-size: 40px 10px;
    background-position: -2px 0px;
}
.progressDone {
/*	background-color:#368DFF; */
	background-image: -moz-linear-gradient(90deg,rgba(0,120,0,.9), rgba(0,200,0,.6));
    background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0,120,0,.9)), to(rgba(0,200,0,.6)));

    height: 100%;
    text-align: right;
    text-indent: 20px;
    color: #000000;
    box-shadow: 1px 0px 0px #888;
}
.progressDone:after {
    content: "\0000a0";
}
/* change both to set the height of the progress bar and keep the text aligned in the middle */
.fancyProgressBar span,
.progressDone {
    height:      15px;
    line-height: 15px;
}

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

        </style>
        
<script>

function myFunction(kanal,ip)
{
//alert (ip);
//var jqxhr = $.get('http://192.168.1.22/web/zap?sRef=1:0:1:2EE3:441:1:C00000:0:0:0:', function() {
//http://192.168.1.130/homecontrol/kanal.php?kanal=1:0:1:2EE3:441:1:C00000:0:0:0:
var jqxhr = $.get("kanal.php?kanal=" + kanal + "&ip=" + ip, function() {

})
}
</script>



	
<div data-role="panel" id="defaultpanel" data-theme="b">
	<div class="panel-content">
		<h3>Bouquet's</h3>
	<div style="border-radius:10px; height:300px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true" data-theme="d">
			<?php
			$bouquets = get_bouquets($dreamIP);
			$startbouquet = $bouquets[0]['ref'];
						//foreach($test as $key => $value){ 
			for($i = 0; $i < 15 ; ++$i) {
			
			//var_dump($startbouquet);
			?>

							<!-- <li><a href="dream.php?action=kanal1&ref= <?php echo $value['ref'] ?> "> <?php echo  $value['name'] ?> </a></li>  --!>
			<li><a href="?page=dreambox&id=<?php echo $i ?>&ip=<?php echo $dreamIP ?>&site=bouquet&ref=<?php echo $bouquets[$i]['ref'] ?> "><?php echo $bouquets[$i]['name']; ?></a></li>
			<?php
			}	
			?>    	
    		</ul>
    </div>
	<!--	<a href="#demo-links" data-rel="close" data-role="button" data-theme="c" data-icon="delete" data-inline="true">Close panel</a> -->
	</div><!-- /content wrapper for padding -->
</div><!-- /defaultpanel -->




					
<?php

if ($_GET['ref'] ){

$bouquet_epg = get_epg_nownext($dreamIP, $_GET['ref']);
}





if ($_GET['id'] == "start" ){
//var_dump($startbouquet);
//$startbouquet = str_replace("\"","&quot;",$startbouquet);
//$startbouquet = str_replace("\"","\\",$startbouquet);
//$startbouquet = '1:7:1:0:0:0:0:0:0:0:FROM BOUQUET "userbouquet.free_tv.tv" ORDER BY bouquet';
//$startbouquet = str_replace("\"","\"",$startbouquet);
//$bouquet_epg = get_epg_nownext($dreamIP,'1:7:1:0:0:0:0:0:0:0:FROM BOUQUET "userbouquet.free_tv.tv" ORDER BY bouquet');
//echo $bouquets[0]['ref'];
$bouquet_epg = get_epg_nownext($dreamIP,$startbouquet);
//var_dump($startbouquet);
}
   	$i=0;
   	$channel_alt = 0;
   	$timenow = time();
   	?>
   	
<div data-role="content" id="dreambox">

<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
	<li data-role="list-divider">Dreambox</li>
					<li data-role="fieldcontain">
					<label for="EnergySensor" class="select">Dreambox:</label>
							<select name="EnergySensor" id="EnergySensor" data-native-menu="false">
    							<option>Dreambox</option>
    							<?php
								$sql = query( "SELECT name,ip FROM devices WHERE type='enigma2'");
								
    												
								while( $row = fetch( $sql ) )
									{
										
										
											?>
												
												<option value="<?php echo $row['ip'] ?>" <? if($dreamIP == $row['ip']){ echo "selected=\"selected\"";} ?> ><?php echo $row['ip'] ?></option>
											<?php										
										
										
    								}
    							?>

							</select>	
					</li>
</ul>
	
	
<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
	<li data-role="list-divider">Dreambox</li>
<?php
if ($_GET['channel'] ){
    set_channel($dreamIP, $_GET['channel']);
}
	for($i=0; $i < count($bouquet_epg); $i=$i+2){ 
		$channel = $bouquet_epg[$i]['kanalref'];
		$currenttime = $bouquet_epg[$i]['currenttime']; 
		$channel_png=substr($channel, 0, -1);
		$channel_png = $channel_png.".png";
		$channel_png = str_replace(":","_",$channel_png);
		$startnow = $bouquet_epg[$i]['start'];
		$start = $bouquet_epg[$i]['start'];
		$stopnow = $bouquet_epg[$i]['stop'];

		//$noEPG = True;
		if($startnow == "None") $startnow = "1363547700";
		if($stopnow == "None") $stopnow = "1363547710";
		//fortschritt berechnen
		$dauer = $stopnow - $startnow; 				
		if($startnow == "1363547700"){
			$noEPG = TRUE;	
		}else{
			$noEPG = FALSE;	
		}
		$startnow1 = date("Y-m-d H:i:s", "$startnow");
		$stopnow1 = date("Y-m-d H:i:s", "$stopnow");
		$startnow = date("H:i", "$startnow");
		$stopnow = date("H:i", "$stopnow");
		$startnext = $bouquet_epg[$i+1]['start'];
		$stopnext = $bouquet_epg[$i+1]['stop'];
		if($startnext == "None") $startnext = "1363547700";
		if($stopnext == "None") $stopnext = "1363547700";
		$startnext = date("H:i", "$startnext");
		$stopnext = date("H:i", "$stopnext");
		if(!($noEPG)){
			//$test = getDateDiff_Progress1($startnow1,$stopnow1);
			$test = getProgress($start,$currenttime,$dauer);
		}else{
			$test = 0;
		}
		//echo $start." ".$currenttime." ".$dauer;
		//var_dump($test);
		//if($bouquet_epg[$i]['titel'] != "None" &&  $bouquet_epg[$i+1]['titel'] != "None"){
		?>

						<li data-icon="false">
							
							<a href="#" onclick="myFunction('<?php echo "$channel"; ?>', '<?php echo "$dreamIP"; ?>')""> 
							<?php //var_dump($string); ?>
							<span class="kanalpic"><img src="./picon/<?php echo $channel_png ?> "></span>
							<span class="epgnow"><?php echo $startnow ." - " . $stopnow . "  " . $bouquet_epg[$i]['titel'] ?> </span>
							<div class="fancyProgressBar">
								<span>
    								<div class="progressDone" style="width: <?php echo $test ?>%;"><?php echo $test ?>%</div>
								</span>
							</div>	
							<span class="stream">
							<a href="http://192.168.1.22/web/stream.m3u?ref=<?php echo $channel ?>" class="split-button-custom" data-role="button" data-icon="gear" data-iconpos="notext">Streame <? echo $bouquet_epg[$i]['titel'] ?></a>
    						<a href="http://192.168.1.22/#!/tv/bouquets/1%3A7%3A1%3A0%3A0%3A0%3A0%3A0%3A0%3A0%3AFROM%20BOUQUET%20%22userbouquet.free_tv.tv%22%20ORDER%20BY%20bouquet" rel="external" class="split-button-custom" data-role="button" data-icon="arrow-r" data-iconpos="notext">Show EPG</a>
    						<a href="#" style="display: none;">Dummy</a>
							
							
							</span>
							<span class="epgnext"> <?php echo  $startnext ." - " . $stopnext . "  " . $bouquet_epg[$i+1]['titel'] ?> </span>
							<span class="epglinks"></span>
							</a>
							
						</li> 

		<?php
		//}
	}
	?>
</ul>
</div>

	



