
	


<!-- Start of first page: #two -->
<div data-role="page" id="dreambox">
        <style>
           /**** Trying to style h1 and paragraph *******/
			.epgprogress {float:right; position:relative ;top:10px}
			.epglinks{float:right; position:relative ; right:-50px; top:25px}
			.kanalpic{float:left; max-width:100px; min-width:100px; max-height:60px; min-height:60px}
			.epgnow{float:left; margin-left:15px; position:relative; max-width:300px; min-width:300px; top:10px}
			.epgnext{float:none; margin-left:-300px; position:relative;  max-width:300px; min-width:300px; top:35px; width:10px}

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
        </style>
        
<script>

function myFunction(kanal)
{
//var jqxhr = $.get('http://192.168.1.22/web/zap?sRef=1:0:1:2EE3:441:1:C00000:0:0:0:', function() {
//http://192.168.1.130/homecontrol/kanal.php?kanal=1:0:1:2EE3:441:1:C00000:0:0:0:
var jqxhr = $.get("kanal.php?kanal=" + kanal, function() {

})
}
</script>

<?php
include('functions.php');
?>

<div data-role="header"  data-position="fixed" data-tap-toggle="false" data-theme="b">
<a href="#defaultpanel" data-icon="home">Bouquet's</a>
	<h1>Dreambox</h1>
	<a href="#dream_fernbedienung" data-icon="home">Funktonen</a>
</div><!-- /header -->
	
<div data-role="panel" id="defaultpanel" data-theme="b">
	<div class="panel-content">
		<h3>Bouquet's</h3>
	<div style="border-radius:10px; height:300px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true" data-theme="d">
			<?php
			$bouquets = get_bouquets();
						//foreach($test as $key => $value){ 
			for($i = 0; $i < 15 ; ++$i) {
			$startbouquet = $bouquets[0]['ref'];
			//var_dump($startbouquet);
			?>

							<!-- <li><a href="dream.php?action=kanal1&ref= <?php echo $value['ref'] ?> "> <?php echo  $value['name'] ?> </a></li>  --!>
			<li><a href="?page=dreambox&id=<?php echo $i ?>&site=bouquet&ref= <?php echo $bouquets[$i]['ref'] ?> "><?php echo $bouquets[$i]['name']; ?></a></li>
			<?php
			}	
			?>    	
    		</ul>
    </div>
	<!--	<a href="#demo-links" data-rel="close" data-role="button" data-theme="c" data-icon="delete" data-inline="true">Close panel</a> -->
	</div><!-- /content wrapper for padding -->
</div><!-- /defaultpanel -->


<div data-role="panel" id="dream_fernbedienung" data-display="overlay" data-position="right" data-theme="b">
	<div class="panel-content">
		<h3>Bedienung</h3>
	<div style="border-radius:10px; height:300px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true" data-theme="d">
			<?php
			$bouquets = get_bouquets();
						//foreach($test as $key => $value){ 
			for($i = 0; $i < 15 ; ++$i) {
			$startbouquet = $bouquets[0]['ref'];
			//var_dump($startbouquet);
			?>

							<!-- <li><a href="dream.php?action=kanal1&ref= <?php echo $value['ref'] ?> "> <?php echo  $value['name'] ?> </a></li>  --!>
			<li><a href="?page=dreambox&id=<?php echo $i ?>&site=bouquet&ref= <?php echo $bouquets[$i]['ref'] ?> "><?php echo $bouquets[$i]['name']; ?></a></li>
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

$bouquet_epg = get_epg_nownext($_GET['ref']);
}
if ($_GET['id'] == "start" ){
//var_dump("$startbouquet");
//$startbouquet = str_replace("\"","&quot;",$startbouquet);
$bouquet_epg = get_epg_nownext('1:7:1:0:0:0:0:0:0:0:FROM BOUQUET "userbouquet.free_tv.tv" ORDER BY bouquet');
}
   	$i=0;
   	$channel_alt = 0;
   	$timenow = time();
   	?>
   	
<div data-role="content" id="dreambox">
<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
	<li data-role="list-divider">Dreambox</li>
<?php
if ($_GET['channel'] ){
    set_channel($_GET['channel']);
}
	for($i=0; $i < count($bouquet_epg); $i=$i+2){ 
		$string = $bouquet_epg[$i]['kanalref'];
		$currenttime = $bouquet_epg[$i]['currenttime']; 
		$channel_png=substr($string, 0, -1);
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
							
							<a href="#" onclick="myFunction('<?php echo $string; ?>')""> 
							<?php //var_dump($string); ?>
							<span class="kanalpic"><img src="./picon/<?php echo $channel_png ?> "></span>
							<span class="epgnow"><?php echo $startnow ." - " . $stopnow . "  " . $bouquet_epg[$i]['titel'] ?> </span>
							<div class="fancyProgressBar">
								<span>
    								<div class="progressDone" style="width: <?php echo $test ?>%;"><?php echo $test ?>%</div>
								</span>
							</div>	
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

	



