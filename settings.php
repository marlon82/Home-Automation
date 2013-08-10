<div data-role="page" id="dashboard">

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
	margin-bottom:120px;
	width:70%; 
  }

</style>

<script type="text/javascript">

$(document).ready(function() {



//
$('#suninfo').change(function(e) {
    var state = ($(this).val() == 'off') ? 'enable' : 'disable';
    $("#time").textinput(state);
});

$('#aktor').change(function(e) {
	var test = $(this).val();
	var dis = "enable";
	
	if (test.indexOf("group") !=-1) {
		dis = "disable";
	}
	
	if (dis === "disable" ) {
		$("#slider-value").slider(dis);
	}
	else {
		$("#slider-value").slider(dis);
	}
    
});	

$(function() {
		$("#sortable ul").sortable({ opacity: 0.6, cursor: 'move', update: function() {
			var order = $(this).sortable("serialize") + '&action=updateRecordsListings&table=groupaktor'; 
			//alert(order);
			$.post("setFunctions.php", order, function(theResponse){
				$("#sorted").html(theResponse);
			});  															 
		}								  
		});
	
	$( "#sortable ul" ).bind( "sortstop", function(event, ui) {
      $('#sortable ul').listview('refresh');
    });
	});
	

$(function() {
		$("#sortableFooter ul").sortable({ opacity: 0.6, cursor: 'move', update: function() {
			var order = $(this).sortable("serialize") + '&action=updateRecordsListings&table=configFooter'; 
			//alert(order);
			$.post("setFunctions.php", order, function(theResponse){
				$("#sortedFooter").html(theResponse);
			});  															 
		}								  
		});
	
	$( "#sortableFooter ul" ).bind( "sortstop", function(event, ui) {
      $('#sortableFooter ul').listview('refresh');
    });
});

<?php
// List the files
$dir = opendir ("./backup");
$count = 0;
while (false !== ($file = readdir($dir))) {
	// Print the filenames that have .sql extension
	if (strpos($file,'.sql',1)) {
		echo "$(function() {\n";
		echo "	$(\"#button-restore-Backup-" . $count . "\").bind(\"click\", function( event, ui ) {\n";
		echo "		var url = \"&action=restoreBackup&filename=".$file."\";\n";
		echo "		$.post(\"setFunctions.php\", url, function(theResponse){\n";
		echo "				$(\"#Backupresponse\").html(theResponse);\n";
		echo "			}); \n";
		echo "		$(\".table-custom-2\").table( \"refresh\" );\n";
		echo "	});\n";
		echo "});\n";
		echo "$(function() {\n";
		echo "	$(\"#button-delete-Backup-" . $count . "\").bind(\"click\", function( event, ui ) {\n";
		echo "		var url = \"&action=deleteBackup&filename=".$file."\";\n";
		echo "		$.post(\"setFunctions.php\", url, function(theResponse){\n";
		echo "				$(\"#Backupresponse\").html(theResponse);\n";
		echo "			}); \n";
		echo "		$(\".table-custom-2\").table( \"refresh\" );\n";
		echo "	});\n";
		echo "});\n\n";
		$count = $count + 1;
	}
}
?>
	
$(function() {
	$("#button-create-Backup-All").bind("click", function( event, ui ) {
		var url = "&action=createBackup&table=*";
		$.post("setFunctions.php", url, function(theResponse){
				$("#Backupresponse").html(theResponse);
			}); 
	});
});
<?
$result = mysql_query("show tables from " . $DBName); // run the query and assign the result to $result
while($table = mysql_fetch_array($result)) // go through each row that was returned in $result
{
	echo "$(function() {\n";
	echo "	$(\"#button-create-Backup-" . $table[0] ."\").bind(\"click\", function( event, ui ) {\n";
	echo "		var url = \"&action=createBackup&table=" . $table[0] ."\";\n";
	echo "		$.post(\"setFunctions.php\", url, function(theResponse){\n";
	echo "				$(\"#Backupresponse\").html(theResponse);\n";
	echo "			});\n";
	echo "	});\n";
	echo "});\n\n";
}
?>

});


</script>

<?
include("header.php");
?>

<div data-role="panel" id="defaultpanel" data-theme="b">
	<div class="panel-content" data-theme="b">
		<h3>Default panel options</h3>
		<p>This panel has all the default options: positioned on the left with the reveal display mode. The panel markup is <em>before</em> the header, content and footer in the source order.</p>
		<p>To close, click off the panel, swipe left or right, hit the Esc key, or use the button below:</p>
		<a href="#demo-links" data-rel="close" data-role="button" data-theme="c" data-icon="delete" data-inline="true">Close panel</a>
	</div><!-- /content wrapper for padding -->
</div>

<div data-role="popup" id="popup-TVMacroHelp" class="ui-content" data-theme="d">
	<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
	<p>Erklärung:</p>
	<p></p>
	<p>Key (beginnt mit "KEY_"):				"KEY_ENTER"	oder   "key_enter"</p>
	<p>Key (beginnt mit $ anstatt "KEY_"):		"$ENTER"    oder   "$enter"</p>
	<p>Zahlen (z.B. Sender / Ping):			"0123"</p>
	<p></p>
	<p>Keys werden mit komma "," getrennt</p>
	<p></p>
	<p>Beispiel:</p>
	<p></p>
	<p>Sender 101:								"1,0,1,KEY_ENTER" oder "1,0,1,$enter" oder "0101"</p>
</div>

<div data-role="popup" id="popup-TimerSensorHelp" class="ui-content" data-theme="d">
	<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
	<p>Hilfe:</p>
	<p></p>
	<p>Ein Aktor oder eine Gruppe wird nur dann geschaltet wenn der Sensor Wert passt.</p>
	<p></p>
	<p>Sensor Wert: z.B.: >20  --> nur schalten wenn größer 20</p>
	<p>oder</p>
	<p>Sensor Wert: z.B.: <20  --> nur schalten wenn kleiner 20</p>
</div>

<div  data-role="sidebar" id="left-sidebar"> 
	<div style="float: left; border-radius:10px; height:200%; width:90%; margin-left:10px; margin-top:10px; margin-right:10px">
    	<div data-role="collapsible" data-theme="d" data-content-theme="d">
    	<h2>Konfiguration</h2>
    	<ul data-role="listview">
			<li <?php if($_GET['aktion'] == 'editConfig') { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=editConfig">bearbeiten</a></li>
			<li <?php if($_GET['aktion'] == 'editFooterOrder') { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=editFooterOrder">Footer</a></li>
			<li <?php if($_GET['aktion'] == 'BackupRestore') { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=BackupRestore">Backup/Restore</a></li>
    	</ul>
		</div>
		<div data-role="collapsible"  <?php if($_GET['aktion'] == ('readAktor' ) || ($_GET['aktion'] == 'addAktor') || ($_GET['aktion'] == 'editAktor')) { ?> data-collapsed="false" <?php } ?> data-theme="d" data-content-theme="d">
			<h2>Aktoren</h2>
			<ul data-role="listview">
				<li <?php if($_GET['aktion'] == ('readAktor' ) || ($_GET['aktion'] == 'addAktor')) { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=readAktor">hinzufügen</a></li>
				<li <?php if($_GET['aktion'] == 'editAktor') { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=editAktor" selected="selected">bearbeiten</a></li>
			</ul>

		</div>
		<div data-role="collapsible" data-theme="d" data-content-theme="d">
			<h2>Sensoren</h2>
			<ul data-role="listview">
				<li <?php if($_GET['aktion'] == ('readSensor' ) || ($_GET['aktion'] == 'addSensor')) { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=readSensor">hinzufügen</a></li>
				<li <?php if($_GET['aktion'] == 'editSensor') { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=editSensor" selected="selected">bearbeiten</a></li>
			</ul>

		</div>    
		
		<div data-role="collapsible"  <?php if($_GET['aktion'] == ('addRoom')) { ?> data-collapsed="false" <?php } ?> data-theme="d" data-content-theme="d">
			<h2>Räume</h2>
			<ul data-role="listview">
				<li <?php if($_GET['aktion'] == 'addRoom') { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=addRoom">hinzufügen</a></li>
				<li <?php if($_GET['aktion'] == 'editRoom') { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=editRoom" selected="selected">bearbeiten</a></li>
			</ul>

		</div>  
		<div data-role="collapsible"  data-theme="d" data-content-theme="d">
			<h2>Geräte</h2>
			<ul data-role="listview">
				<li <?php if($_GET['aktion'] == 'addDevice') { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=addDevice">hinzufügen</a></li>
				<li <?php if($_GET['aktion'] == 'editDevice') { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=editDevice" selected="selected">bearbeiten</a></li>
			</ul>

		</div> 
		<div data-role="collapsible"  data-theme="d" data-content-theme="d">
			<h2>Timer</h2>
			<ul data-role="listview">
				<li <?php if($_GET['aktion'] == 'addTimer') { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=addTimer">hinzufügen</a></li>
				<li <?php if($_GET['aktion'] == 'editTimer') { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=editTimer" selected="selected">bearbeiten</a></li>
			</ul>

		</div>  

		<div data-role="collapsible"  data-theme="d" data-content-theme="d">
			<h2>Gruppen</h2>
			<ul data-role="listview">
				<li <?php if($_GET['aktion'] == 'addGroup') { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=addGroup">hinzufügen</a></li>
				<li <?php if($_GET['aktion'] == 'editGroup') { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=editGroup" selected="selected">bearbeiten</a></li>
				<li <?php if($_GET['aktion'] == 'sortGroup') { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=sortGroup" selected="selected">reihenfolge</a></li>
			</ul>

		</div> 

		<div data-role="collapsible"  data-theme="d" data-content-theme="d">
			<h2>Macros</h2>
			<ul data-role="listview">
				<li <?php if($_GET['aktion'] == 'addMacro') { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=addMacro">Macro hinzufügen</a></li>
				<li <?php if($_GET['aktion'] == 'editMacro') { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=editMacro" selected="selected">Macro bearbeiten</a></li>
				<li <?php if($_GET['aktion'] == 'mapMacro') { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=mapMacro" selected="selected">Mapping hinzufügen</a></li>
				<li <?php if($_GET['aktion'] == 'editmapMacro') { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=editmapMacro" selected="selected">Mapping editieren</a></li>
			</ul>
		</div>
		
	</div>
</div>

<?php
//$XS1 = "192.168.1.242";
include('functions.php');
//ini_set('error_reporting', E_ALL);
?>
<?
switch( $_GET['aktion'] ){
	case 'BackupRestore':
		?>        
		<div id="cont">
			<div style="float: left; border-radius:10px; height:300px; width:45%; margin-left:10px; margin-top:15px; margin-bottom:300px">
				<ul data-role="listview" data-inset="true" data-theme="d">
					<li>
						<label for="flip-create-Backup">Komplette Datenbank (<?echo $DBName ?>)</label>
						<div style="position: absolute ;right:10px;top:0px">
							<a href="#" data-role="button" id="button-create-Backup-All" data-inline="true" data-mini="true">backup</a>
						</div>							
					</li>
					<?
					$result = mysql_query("show tables from " . $DBName); // run the query and assign the result to $result
					while($table = mysql_fetch_array($result)) // go through each row that was returned in $result
					{ 
						?>
						<li>
							<label for="flip-create-Backup-<?echo $table[0]?>"><?echo $table[0]?></label>
							<div style="position: absolute ;right:10px;top:0px">
								<a href="#" data-role="button" id="button-create-Backup-<?echo $table[0]?>" data-inline="true" data-mini="true">backup</a>
							</div>							
						</li>
						<?
					}
					?>
				</ul>			   
			</div>
			<div style="float: left; border-radius:10px; height:300px; width:50%; margin-left:10px; margin-top:15px; margin-bottom:300px">
				<ul data-role="listview" data-inset="true" data-theme="d">
					<li>
						<label for="flip-create-Backup"></label>
						<div data-role="content" data-theme="c" id="Backupresponse">
							<p>&nbsp;</p>	
						</div>
					</li>
					<li>
						<label for="vorhandene-Backups">Backups</label>
						<table data-role="table" id="table-custom-2" class="ui-body-d ui-shadow table-stripe ui-responsive" data-mode="reflow" data-column-popup-theme="a">
						 <thead>
						   <tr class="ui-bar-d">
							 <th>filename</th>
							 <th data-priority="1">action</th>
						   </tr>
						 </thead>
						 <tbody>
						<?php
							// List the files
							$dir = opendir ("./backup");
							$count = 0;
							while (false !== ($file = readdir($dir))) {
						 
								// Print the filenames that have .sql extension
								if (strpos($file,'.sql',1)) {
						 
									// Print the cells
									?>
									   <tr>
										 <th><? echo $file ?></th>
										 <th><a href="backup/<?echo $file?>" data-role="button" id="button-download-Backup-<?echo $count?>" data-ajax="false" data-inline="true" data-mini="true">download</a><a href="#" data-role="button" id="button-restore-Backup-<?echo $count?>" data-inline="true" data-mini="true">restore</a><a href="#" data-role="button" id="button-delete-Backup-<?echo $count?>" data-inline="true" data-mini="true">delete</a></th>
									   </tr>
									<?
									$count = $count + 1;
								}
							}
						?>
						 </tbody>
					   </table>
				</ul>
			</div>
		 </div>   
		<?php
		break;
		
	case 'readSensor':
		?>        
		<div id="cont">
			<div style="float: left; border-radius:10px; height:300px; width:50%; margin-left:10px; margin-top:15px; margin-bottom:130px">
				<ul data-role="listview" data-inset="true" data-theme="d">
					<li data-role="list-divider">Sensoren</li>
					<?php
					for( $i = 0; $i <= 64; $i++ )
					{
						extract(ReadXS1(sensor, $i));
						$sql = query( "SELECT id FROM sensoren WHERE iName = '" . $name . "'" );
						$row = fetch( $sql );
						if( !$row['id']  && $name && $type != 'disabled' )
						{
						?>	
							<li><a href="?page=settings&aktion=addSensor&iid=<?php echo $number; ?>"><?php echo $name; ?></a></li>				
							<?php
						}
					}
					?>		
				</ul>
			</div>
		 </div>   
		<?php
		break;
		
	case 'readAktor':
		//include('settings.php');
		?>        
		<div id="cont">
			<div style="float: left; border-radius:10px; height:300px; width:50%; margin-left:10px; margin-top:15px; margin-bottom:130px">
				<ul data-role="listview" data-inset="true" data-theme="d">
					<li data-role="list-divider">Aktoren</li>
		<?php
		for( $i = 0; $i <= 64; $i++ )
		{
			extract(ReadXS1(actuator, $i));
			$sql = query( "SELECT id FROM aktor WHERE iName = '" . $name . "'" );
			$row = fetch( $sql );
			if( !$row['id']  && $name && $type != 'disabled' )
			{
			?>	
					<li><a href="?page=settings&aktion=addAktor&iid=<?php echo $number; ?>"><?php echo $name; ?></a></li>
			<?php
			}
		}
		?>		
				</ul>
			</div>
		 </div>   
		<?php
		break;

	case 'addSensor':
		
		extract(ReadXS1(sensor, $_GET['iid']));
		
		if( !$_POST['submit'] ){
			$sql = query( "SELECT id FROM rooms");
			$row = fetch( $sql );
								
			if( !$row['id'] ){
				?>
				<div class="boxWhite"><p>Zuerst einen Raum anlegen!</p></div>			
				<?
			}else{
				?>
				<div id="cont">
					<form action="index.php?page=settings&aktion=addSensor&iid=<?php echo $_GET['iid'] ?>" method="post" class="ui-body ui-body-c ui-corner-all">
						<fieldset>
							<div data-role="fieldcontain">
							
									<label for="sensorname">Sensor Name:</label>
									<input data-clear-btn="true" name="sensorname" id="sensorname" value="" type="text">
									
									<label for="xs1name">XS1 Name:</label>
									<input disabled="disabled" name="xs1name" id="xs1name" value= "<?php echo $name; ?>" type="text"> 
									
									<label for="room" class="select">Räume:</label>
									<select name="room" id="room" data-native-menu="false">
										<option>Räume:</option>
										<?php
										$sql2 = query( "SELECT id,name FROM rooms");					
										while( $row2 = fetch( $sql2 ) )
											{
											?>
												<option value="<?php echo $row2['id'] ?>"><?php echo $row2['name'] ?></option>
											<?php
											}
										?>

									</select>
									
									<label for="typ" class="select">Typ:</label>
									<select name="typ" id="typ" data-native-menu="false">
										<option>Typ:</option>
										<?php
										$sql2 = query( "SELECT device,devtype,devtypename FROM deviceTypes");					
										while( $row2 = fetch( $sql2 ) )
											{
											if( $row2['device'] == 'sensor'){
											?>
													<option value="<?php echo $row2['devtype'] ?>"><?php echo $row2['devtypename'] ?></option>
											<?php
												}
											}
										?>					
									</select>						
							</div>
							<button type="submit" data-theme="c" name="submitSensor" value="submit-value">Submit</button>
						</fieldset>
					</form>
				</div>
				<?php
			}
		}		
		if( $_POST['submitSensor'] ){		
				?>
				<div class="boxWhite">
					<p class="center">Sensor wurde hinzugefügt</p>
				</div>
																				
				<?php	
				$sql = query( "INSERT INTO sensoren VALUES( '', '" . $_GET['iid'] . "',
																'" . $name	. "',
																'" . $_POST['room'] . "',
																'" . $_POST['sensorname'] . "',															
																'0',
																'" . $_POST['typ'] . "',
																'0',
																'0"  . "')" );						
		}
		break;

		
		
		case 'addAktor':
		
		extract(ReadXS1(actuator, $_GET['iid']));
		
		if( !$_POST['submit'] ){
			$sql = query( "SELECT id FROM rooms");
			$row = fetch( $sql );
								
			if( !$row['id'] ){
				?>
				<div class="boxWhite"><p>Zuerst einen Raum anlegen!</p></div>			
				<?
			}else{
				?>
				<div id="cont">
					<form action="index.php?page=settings&aktion=addAktor&iid=<?php echo $_GET['iid'] ?>" method="post" class="ui-body ui-body-c ui-corner-all">
						<fieldset>
							<div data-role="fieldcontain">
								<li data-role="fieldcontain">
									<label for="aktorname">Aktor Name:</label>
									<input data-clear-btn="true" name="aktorname" id="aktorname" value="" type="text">
								</li>
								<li data-role="fieldcontain">
									<label for="xs1name">XS1 Name:</label>
									<input disabled="disabled" name="xs1name" id="xs1name" value= "<?php echo $name; ?>" type="text"> 
								</li>
								<li data-role="fieldcontain">
									<label for="verbrauchWatt">Verbrauch (W):</label>
									<input data-clear-btn="true" name="verbrauchWatt" id="verbrauchWatt" value="" type="text">
								</li>
								<li data-role="fieldcontain">	
									<label for="room" class="select">Räume:</label>
									<select name="room" id="room" data-native-menu="false">
										<option>Räume:</option>
										<?php
										$sql2 = query( "SELECT id,name FROM rooms");					
										while( $row2 = fetch( $sql2 ) )
											{
											?>
												<option value="<?php echo $row2['id'] ?>"><?php echo $row2['name'] ?></option>
											<?php
											}
										?>

									</select>
								</li>
								<li data-role="fieldcontain">	
									<label for="typ" class="select">Typ:</label>
									<select name="typ" id="typ" data-native-menu="false">
										<option>Typ:</option>
										<?php
										$sql2 = query( "SELECT id,device,devtype,devtypename FROM deviceTypes");					
										while( $row2 = fetch( $sql2 ) )
											{
											if( $row2['device'] == 'aktor'){
											?>
													<option value="<?php echo $row2['id'] ?>"><?php echo $row2['devtypename'] ?></option>
											<?php
												}
											}
										?>
									</select>
								</li>
								<li data-role="fieldcontain">	
									<label for="Function1" class="select">Function 1:</label>
									<select name="Function1" id="Function1" data-native-menu="false">
										<option>Function:</option>
											<option value=""></option>
											<option value="100">An</option>
											<option value="0">Aus</option>
											<option value="0">Hoch</option>
											<option value="100">Runter</option>
											<option value="50">50%</option>
											<option value="75">75%</option>
									</select>
								</li>
								<li data-role="fieldcontain">	
									<label for="Function2" class="select">Function 2:</label>
									<select name="Function2" id="Function2" data-native-menu="false">
										<option>Function:</option>
											<option value=""></option>
											<option value="100">An</option>
											<option value="0">Aus</option>
											<option value="0">Hoch</option>
											<option value="100">Runter</option>
											<option value="50">50%</option>
											<option value="75">75%</option>
									</select>
								</li>
								<li data-role="fieldcontain">	
									<label for="Function3" class="select">Function 3:</label>
									<select name="Function3" id="Function3" data-native-menu="false">
										<option>Function:</option>
											<option value=""></option>
											<option value="100">An</option>
											<option value="0">Aus</option>
											<option value="0">Hoch</option>
											<option value="100">Runter</option>
											<option value="50">50%</option>
											<option value="75">75%</option>
									</select>
								</li>
								<li data-role="fieldcontain">	
									<label for="Function4" class="select">Function 4:</label>
									<select name="Function4" id="Function4" data-native-menu="false">
										<option>Function:</option>
											<option value=""></option>
											<option value="100">An</option>
											<option value="0">Aus</option>
											<option value="0">Hoch</option>
											<option value="100">Runter</option>
											<option value="50">50%</option>
											<option value="75">75%</option>
									</select>
								</li>
							</div>
							<button type="submit" data-theme="c" name="submit" value="submit-value">Submit</button>
						</fieldset>
					</form>
				</div>
			<?php
			}
		}		
		if( $_POST['submit'] ){		
			switch( $_POST['Function1'] ){
				case 'An': $func1 = '100';break;
				case 'Aus': $func1 = '0';break;
				case 'Hoch': $func1 = '0';break;
				case 'Runter': $func1 = '100';break;
				case '50%': $func1 = '50';break;
				case '75%': $func1 = '75';break;
				case '': $func1 = '';break;
			}
			switch( $_POST['Function2'] ){
				case 'An': $func2 = '100';break;
				case 'Aus': $func2 = '0';break;
				case 'Hoch': $func2 = '0';break;
				case 'Runter': $func2 = '100';break;
				case '50%': $func2 = '50';break;
				case '75%': $func2 = '75';break;
				case '': $func2 = '';break;
			}
			switch( $_POST['Function3'] ){
				case 'An': $func3 = '100';break;
				case 'Aus': $func3 = '0';break;
				case 'Hoch': $func3 = '0';break;
				case 'Runter': $func3 = '100';break;
				case '50%': $func3 = '50';break;
				case '75%': $func3 = '75';break;
				case '': $func3 = '';break;
			}
			switch( $_POST['Function4'] ){
				case 'An': $func4 = '100';break;
				case 'Aus': $func4 = '0';break;
				case 'Hoch': $func4 = '0';break;
				case 'Runter': $func4 = '100';break;
				case '50%': $func4 = '50';break;
				case '75%': $func4 = '75';break;
				case '': $func4 = '';break;
			}
			$sql = query( "INSERT INTO aktor VALUES( '', '" . $_POST['aktorname'] . "',
														 '" . $name	. "',
														 '" . $_POST['room'] . "',
														 '" . $_POST['typ']  . "',
														 '" . $_POST['logging'] . "',
														 '" . $_POST['verbrauch'] . "',
														 '" . $_GET['iid'] . "',
														 '0',
														 '0',
														 '" . $_POST['verbrauchWatt'] . "',
														 '" . $func1 . "',
														 '" . $_POST['Function1'] . "',
														 '" . $func2 . "',
														 '" . $_POST['Function2'] . "',
														 '" . $func3 . "',
														 '" . $_POST['Function3'] . "',
														 '" . $func4 . "',
														 '" . $_POST['Function4'] . "')" );						
		}
		?>
		<div class="boxWhite">
			<p class="center">Aktor wurde hinzugefügt</p>
		</div>
																		
		<?php
		break;	

		
		
		case 'editAktor':
		if(!$_GET['step']){
			?>
			<div id="cont">
			<div style="float: left; border-radius:10px; height:300px; width:100%; margin-left:10px; margin-top:15px; margin-bottom:130px">
				<ul data-role="listview" data-inset="true" data-theme="d">
					<li data-role="list-divider">Aktoren</li>
					<?php
					$sql = query( "SELECT * FROM aktor");
																						
					while( $row = fetch( $sql ) )
					{
						$sql1 = query( "SELECT  name FROM rooms WHERE id = '" . $row['room'] . "'" );
						$row1 = fetch( $sql1 );
						$sql2 = query( "SELECT id,device,devtype,devtypename FROM deviceTypes WHERE id = '" . $row['type'] . "'" );
						$devType = fetch( $sql2 );
						$Function = '';
						if ($row['func1desc'] != '') {
							$Function = $Function . $row['func1desc'] . "-";
						}
						if ($row['func2desc'] != '') {
							$Function = $Function . $row['func2desc'] . "-";
						}
						if ($row['func3desc'] != '') {
							$Function = $Function . $row['func3desc'] . "-";
						}
						if ($row['func4desc'] != '') {
							$Function = $Function . $row['func4desc'] . "-";
						}
						$Function = substr($Function, 0, -1);
						?>																						
						<li><a href="?page=settings&aktion=editAktor&step=2&id=<?php echo $row['id']; ?>"><?php echo $row['name'] ?> <span style="float:right;position:absolute;right:40px;"> <? echo "(" . $row1['name'] . " / " . $devType['devtypename'] . " / " . $Function .")"; ?></span></a></li>																			
						<?php
					}
					?>
				</ul>
			</div>
			</div>
	   
			<?php
		}
		if($_GET['step'] == 2){
			$sql = query( "SELECT * FROM aktor WHERE id = '" . $_GET['id'] . "'" );
			$row = fetch( $sql );
			?>
			<div id="cont">
				<form action="index.php?page=settings&aktion=editAktor&step=3&id=<?php echo $_GET['id'] ?>" method="post" class="ui-body ui-body-c ui-corner-all">
					<fieldset>
						<div data-role="fieldcontain">
							<li data-role="fieldcontain">
								<label for="aktorname">Aktor Name:</label>
								<input data-clear-btn="true" name="aktorname" id="aktorname" value="<?php echo $row['name']; ?>" type="text">
							</li>
							<li data-role="fieldcontain">	
								<label for="xs1name">XS1 Name:</label>
								<input disabled="disabled" name="xs1name" id="xs1name" value= "<?php echo $row['iName']; ?>" type="text"> 
							</li>
							<li data-role="fieldcontain">	
								<label for="verbrauchWatt">Verbrauch (W):</label>
								<input data-clear-btn="true" name="verbrauchWatt" id="verbrauchWatt" value="<?php echo $row['verbrauchWatt']; ?>" type="text">
							</li>
							<li data-role="fieldcontain">	
								<label for="room" class="select">Räume:</label>
								<select name="room" id="room" data-native-menu="false">
									<option>Räume:</option>
									<?php
									$sql2 = query( "SELECT id,name FROM rooms");	
									$roomID = $row['room'];
									while( $row2 = fetch( $sql2 ) )
										{
											if($roomID == $row2['id']){
											?>
												<option value="<?php echo $row2['id'] ?>" selected="selected"><?php echo $row2['name'] ?></option>
											<?php
											}else{
											?>
												<option value="<?php echo $row2['id'] ?>"><?php echo $row2['name'] ?></option>
											<?php
											}
										}
									?>

								</select>
							</li>
							<li data-role="fieldcontain">	
								<label for="typ" class="select">Typ:</label>
								<select name="typ" id="typ" data-native-menu="false">
									<option>Typ:</option>
									<?php
									$sql2 = query( "SELECT id,device,devtype,devtypename FROM deviceTypes");	
									$devtypeID = $row['type'];
									while( $row2 = fetch( $sql2 ) )
										{
											if($row2['device'] == 'aktor'){
												if($devtypeID == $row2['id']){
												?>
													<option value="<?php echo $row2['id'] ?>" selected="selected"><?php echo $row2['devtypename'] ?></option>
												<?php
												}else{
												?>
													<option value="<?php echo $row2['id'] ?>"><?php echo $row2['devtypename'] ?></option>
												<?php
												}
											}
										}
									?>		
								</select>
							</li>

							<li data-role="fieldcontain">	
							<?
							$selectAn = '';
							$selectAus = '';
							$selectHoch = '';
							$selectRunter = '';
							$select50 = '';
							$select75 = '';
							$select0 = '';
							switch( $row['func1desc'] ){
								case 'An': $selectAn = 'selected=\'selected\''; break;
								case 'Aus': $selectAus = 'selected=\'selected\'';break;
								case 'Hoch': $selectHoch = 'selected=\'selected\'';break;
								case 'Runter': $selectRunter = 'selected=\'selected\'';break;
								case '50%': $select50 = 'selected=\'selected\'';break;
								case '75%': $select75 = 'selected=\'selected\'';break;
								default: $select0 = 'selected=\'selected\'';break;
							}
							?>
								<label for="Function1" class="select">Function 1:</label>
								<select name="Function1" id="Function1" data-native-menu="false">
									<option>Function:</option>
										<option value="" <? echo $select0; ?>></option>
										<option value="An" <? echo $selectAn; ?>>An</option>
										<option value="Aus" <? echo $selectAus; ?>>Aus</option>
										<option value="Hoch" <? echo $selectHoch; ?>>Hoch</option>
										<option value="Runter" <? echo $selectRunter; ?>>Runter</option>
										<option value="50%" <? echo $select50; ?>>50%</option>
										<option value="75%" <? echo $select75; ?>>75%</option>
								</select>
							</li>
							<li data-role="fieldcontain">
							<?
							$selectAn = '';
							$selectAus = '';
							$selectHoch = '';
							$selectRunter = '';
							$select50 = '';
							$select75 = '';
							$select0 = '';
							switch( $row['func2desc'] ){
								case 'An': $selectAn = 'selected=\'selected\'';break;
								case 'Aus': $selectAus = 'selected=\'selected\'';break;
								case 'Hoch': $selectHoch = 'selected=\'selected\'';break;
								case 'Runter': $selectRunter = 'selected=\'selected\'';break;
								case '50%': $select50 = 'selected=\'selected\'';break;
								case '75%': $select75 = 'selected=\'selected\'';break;
								default: $select0 = 'selected=\'selected\'';break;
							}
							?>						
								<label for="Function2" class="select">Function 2:</label>
								<select name="Function2" id="Function2" data-native-menu="false">
									<option>Function:</option>
										<option value="" <? echo $select0; ?>></option>
										<option value="An" <? echo $selectAn; ?>>An</option>
										<option value="Aus" <? echo $selectAus; ?>>Aus</option>
										<option value="Hoch" <? echo $selectHoch; ?>>Hoch</option>
										<option value="Runter" <? echo $selectRunter; ?>>Runter</option>
										<option value="50%" <? echo $select50; ?>>50%</option>
										<option value="75%" <? echo $select75; ?>>75%</option>
								</select>
							</li>
							<li data-role="fieldcontain">	
							<?
							$selectAn = '';
							$selectAus = '';
							$selectHoch = '';
							$selectRunter = '';
							$select50 = '';
							$select75 = '';
							$select0 = '';
							switch( $row['func3desc'] ){
								case 'An': $selectAn = 'selected=\'selected\'';break;
								case 'Aus': $selectAus = 'selected=\'selected\'';break;
								case 'Hoch': $selectHoch = 'selected=\'selected\'';break;
								case 'Runter': $selectRunter = 'selected=\'selected\'';break;
								case '50%': $select50 = 'selected=\'selected\'';break;
								case '75%': $select75 = 'selected=\'selected\'';break;
								default: $select0 = 'selected=\'selected\'';break;
							}
							?>	
								<label for="Function3" class="select">Function 3:</label>
								<select name="Function3" id="Function3" data-native-menu="false">
									<option>Function:</option>
										<option value="" <? echo $select0; ?>></option>
										<option value="An" <? echo $selectAn; ?>>An</option>
										<option value="Aus" <? echo $selectAus; ?>>Aus</option>
										<option value="Hoch" <? echo $selectHoch; ?>>Hoch</option>
										<option value="Runter" <? echo $selectRunter; ?>>Runter</option>
										<option value="50%" <? echo $select50; ?>>50%</option>
										<option value="75%" <? echo $select75; ?>>75%</option>
								</select>
							</li>
							<li data-role="fieldcontain">
							<?
							$selectAn = '';
							$selectAus = '';
							$selectHoch = '';
							$selectRunter = '';
							$select50 = '';
							$select75 = '';
							$select0 = '';
							switch( $row['func4desc'] ){
								case 'An': $selectAn = 'selected=\'selected\'';break;
								case 'Aus': $selectAus = 'selected=\'selected\'';break;
								case 'Hoch': $selectHoch = 'selected=\'selected\'';break;
								case 'Runter': $selectRunter = 'selected=\'selected\'';break;
								case '50%': $select50 = 'selected=\'selected\'';break;
								case '75%': $select75 = 'selected=\'selected\'';break;
								default: $select0 = 'selected=\'selected\'';break;
							}
							?>							
								<label for="Function4" class="select">Function 4:</label>
								<select name="Function4" id="Function4" data-native-menu="false">
									<option>Function:</option>
										<option value="" <? echo $select0; ?>></option>
										<option value="An" <? echo $selectAn; ?>>An</option>
										<option value="Aus" <? echo $selectAus; ?>>Aus</option>
										<option value="Hoch" <? echo $selectHoch; ?>>Hoch</option>
										<option value="Runter" <? echo $selectRunter; ?>>Runter</option>
										<option value="50%" <? echo $select50; ?>>50%</option>
										<option value="75%" <? echo $select75; ?>>75%</option>
								</select>
							</li>
							
						</div>
					<div class="ui-body ui-body-c">
					<fieldset class="ui-grid-a">
						<div class="ui-block-a"><button type="submit" name="delete" value="Submit" data-theme="d">Delete</button></div>
						<div class="ui-block-c"><button type="submit" name="submit" value="Submit" data-theme="b">Submit</button></div>
					</fieldset>
					</div>
				</fieldset>
				</form>
			</div>	
			<?php
		}
		if($_GET['step'] == 3){
			if( $_POST['delete'] ){
				?>
				<div id="cont1">
				<p>Der Aktor wurde gelöscht</p>
				</div>
				<?php
				$sql = query( "DELETE FROM aktor WHERE id = '" . $_GET['id'] . "'" );	
			}
			if( $_POST['submit'] ){
				switch( $_POST['Function1'] ){
					case 'An': $func1 = '100';break;
					case 'Aus': $func1 = '0';break;
					case 'Hoch': $func1 = '0';break;
					case 'Runter': $func1 = '100';break;
					case '50%': $func1 = '50';break;
					case '75%': $func1 = '75';break;
					case '': $func1 = '';break;
				}
				switch( $_POST['Function2'] ){
					case 'An': $func2 = '100';break;
					case 'Aus': $func2 = '0';break;
					case 'Hoch': $func2 = '0';break;
					case 'Runter': $func2 = '100';break;
					case '50%': $func2 = '50';break;
					case '75%': $func2 = '75';break;
					case '': $func2 = '';break;
				}
				switch( $_POST['Function3'] ){
					case 'An': $func3 = '100';break;
					case 'Aus': $func3 = '0';break;
					case 'Hoch': $func3 = '0';break;
					case 'Runter': $func3 = '100';break;
					case '50%': $func3 = '50';break;
					case '75%': $func3 = '75';break;
					case '': $func3 = '';break;
				}
				switch( $_POST['Function4'] ){
					case 'An': $func4 = '100';break;
					case 'Aus': $func4 = '0';break;
					case 'Hoch': $func4 = '0';break;
					case 'Runter': $func4 = '100';break;
					case '50%': $func4 = '50';break;
					case '75%': $func4 = '75';break;
					case '': $func4 = '';break;
				}
				
				$sql = query( "UPDATE aktor SET name = '" . $_POST['aktorname'] . "', room = '" . $_POST['room'] . "', type = '" . $_POST['typ'] . "', verbrauchWatt = '" . $_POST['verbrauchWatt'] . "',
							   func1 = '" . $func1 . "', func1desc = '" . $_POST['Function1'] . "',
							   func2 = '" . $func2 . "', func2desc = '" . $_POST['Function2'] . "',
							   func3 = '" . $func3 . "', func3desc = '" . $_POST['Function3'] . "',
							   func4 = '" . $func4 . "', func4desc = '" . $_POST['Function4'] . "' WHERE id = '" . $_GET['id'] . "'" );
				?>
				<div id="cont1">
				<p>Der Aktor wurde geändert</p>
				</div>
				<?php							   
			}
		}
									
		break;			
	
	
	
		case 'editSensor':
			if(!$_GET['step']){
				?>
				<div id="cont">
				<div style="float: left; border-radius:10px; height:300px; width:100%; margin-left:10px; margin-top:15px; margin-bottom:130px">
					<ul data-role="listview" data-inset="true" data-theme="d">
						<li data-role="list-divider">Sensoren</li>
						<?php
						$sql = query( "SELECT id,name,room,hcType FROM sensoren");
						while( $row = fetch( $sql ) )
						{
							$sql1 = query( "SELECT  name FROM rooms WHERE id = '" . $row['room'] . "'" );
							$row1 = fetch( $sql1 )
							?>																						
							<li><a href="?page=settings&aktion=editSensor&step=2&id=<?php echo $row['id']; ?>"><?php echo $row['name'] ?> <span style="float:right;position:absolute;right:40px;"> <? echo "(" . $row1['name'] . " / " . $row['hcType'] . ")"; ?></span></a></li>																			
							<?php
						}
						?>
					</ul>
				</div>
		   
				<?php
			}
			if($_GET['step'] == 2){
				$sql = query( "SELECT iid, name, iName, room, hcType FROM sensoren WHERE id = '" . $_GET['id'] . "'" );
				$row = fetch( $sql );
				?>
				<div id="cont">
					<form action="index.php?page=settings&aktion=editSensor&step=3&id=<?php echo $_GET['id'] ?>" method="post" class="ui-body ui-body-c ui-corner-all">
						<fieldset>
							<div data-role="fieldcontain">
								<li data-role="fieldcontain">
									<label for="sensorname">Sensor Name:</label>
									<input data-clear-btn="true" name="sensorname" id="sensorname" value="<?php echo $row['name']; ?>" type="text">
								</li>
								<li data-role="fieldcontain">	
									<label for="xs1name">XS1 Name:</label>
									<input disabled="disabled" name="xs1name" id="xs1name" value= "<?php echo $row['iName']; ?>" type="text"> 
								</li>
								<li data-role="fieldcontain">	
									<label for="room" class="select">Räume:</label>
									<select name="room" id="room" data-native-menu="false">
									<option>Räume:</option>
										<?php
										$sql2 = query( "SELECT id,name FROM rooms");
										$roomID = $row['room'];					
										while( $row2 = fetch( $sql2 ) )
											{
												if($roomID == $row2['id']){
												?>
													<option value="<?php echo $row2['id'] ?>" selected="selected"><?php echo $row2['name'] ?></option>
												<?php
												}else{
												?>
													<option value="<?php echo $row2['id'] ?>"><?php echo $row2['name'] ?></option>
												<?php
												}
											}
										?>							
									</select>
								</li>
								<li data-role="fieldcontain">	
									<label for="hcType" class="select">Typ:</label>
									<select name="hcType" id="hcType" data-native-menu="false">
										<option>Typ:</option>
											<?php
											$sql2 = query( "SELECT device,devtype,devtypename FROM deviceTypes");	
											$devtypeID = $row['hcType'];
											while( $row2 = fetch( $sql2 ) )
												{
													if($row2['device'] == 'sensor'){
														if($devtypeID == $row2['devtype']){
														?>
															<option value="<?php echo $row2['devtype'] ?>" selected="selected"><?php echo $row2['devtypename'] ?></option>
														<?php
														}else{
														?>
															<option value="<?php echo $row2['devtype'] ?>"><?php echo $row2['devtypename'] ?></option>
														<?php
														}
													}
												}
										?>								
									</select>
								</li>
							</div>
							<div class="ui-body ui-body-c">
								<fieldset class="ui-grid-a">
									<div class="ui-block-a"><button type="submit" name="delete" value="Submit" data-theme="d">Delete</button></div>
									<div class="ui-block-c"><button type="submit" name="submit" value="Submit" data-theme="b">Submit</button></div>
								</fieldset>
							</div>
						</fieldset>
					</form>
				</div>		
				<?php
			}
			if($_GET['step'] == 3){
				if( $_POST['delete'] ){
				?>
				<div id="cont1">
				<p>Der Sensor wurde gelöscht</p>
				</div>
				<?php
				$sql = query( "DELETE FROM sensoren WHERE id = '" . $_GET['id'] . "'" );	
				}
				if( $_POST['submit'] ){
				?>
				<div id="cont1">
				<p>Der Sensor wurde geändert</p>
				</div>
				<?php
				$sql = query( "UPDATE sensoren SET name = '" . $_POST['sensorname'] . "', room = '" . $_POST['room'] . "', hcType = '" . $_POST['hcType'] . "' WHERE id = '" . $_GET['id'] . "'" );	
				}
			}
			break;			
		
		
		case 'editRoom':
		if(!$_GET['step']){
			?>
			<div id="cont">
			<div style="float: left; border-radius:10px; height:300px; width:100%; margin-left:10px; margin-top:15px; margin-bottom:130px">
				<ul data-role="listview" data-inset="true" data-theme="d">
					<li data-role="list-divider">Räume</li>
					<?php
					$sql = query( "SELECT id,name,icon FROM rooms");
					while( $room = fetch( $sql ) )
						{
							?>																						
							<li><a href="?page=settings&aktion=editRoom&step=2&id=<?php echo $room['id']; ?>"><img src="<?php echo $room['icon'] ?>" class="ui-li-icon"><?php echo $room['name'] ?> <span style="float:right;position:absolute;right:40px;"></span></a></li>																			
							<?php
						}
						?>
				</ul>
			</div>
			<?php
		}
		if($_GET['step'] == 2){
			$sql = query( "SELECT id, name, icon FROM rooms WHERE id = '" . $_GET['id'] . "'" );
			$room = fetch( $sql );
			?>
			<div id="cont">
				<form action="index.php?page=settings&aktion=editRoom&step=3&id=<?php echo $_GET['id'] ?>" method="post" class="ui-body ui-body-c ui-corner-all">
					<fieldset>
						<div data-role="fieldcontain">
						
								<label for="roomname">Raum Name:</label>
								<input data-clear-btn="true" name="roomname" id="roomname" value="<?php echo $room['name']; ?>" type="text">
						</div>		
						
						<div data-role="fieldcontain">
							<?
							
							// open this directory 
							$myDirectory = opendir("glyphish-icons/");

							// get each entry
							while($entryName = readdir($myDirectory)) {
								$dirArray[] = $entryName;
							}

							// close directory
							closedir($myDirectory);

							//	count elements in array
							$indexCount	= count($dirArray);
							// sort 'em
							//sort($dirArray);
							
							list($foldername, $filename) = explode('/', $room['icon']);
							
							?>
							<label for="roomicon" class="select">Icon:</label>
								<select name="roomicon" id="roomicon" data-native-menu="false">
								<option>Icon:</option>
									<?php
												
									for($index=0; $index < $indexCount; $index++) {
										if (substr("$dirArray[$index]", 0, 1) != "."){ // don't list hidden files
											if($dirArray[$index] == $filename){
											?>
												<option value="<?php echo $dirArray[$index] ?>" selected="selected"><?php echo $dirArray[$index] ?></option>
											<?php
											}else{
											?>
												<option value="<?php echo $dirArray[$index] ?>"><?php echo $dirArray[$index] ?></option>
											<?php
											}
										}
										}
									?>							
								</select>
								
						</div>
					<div class="ui-body ui-body-c">
					<fieldset class="ui-grid-a">
						<div class="ui-block-a"><button type="submit" name="delete" value="Submit" data-theme="d">Delete</button></div>
						<div class="ui-block-c"><button type="submit" name="submit" value="Submit" data-theme="b">Submit</button></div>
					</fieldset>
					</div>
				</fieldset>
				</form>
			</div>		
			<?php
		
		}
		if($_GET['step'] == 3){
			if( $_POST['delete'] ){
			?>
			<div id="cont1">
			<p>Der Raum wurde gelöscht</p>
			</div>
			<?php
			$sql = query( "DELETE FROM rooms WHERE id = '" . $_GET['id'] . "'" );	
			}
			if( $_POST['submit'] ){
			?>
			<div id="cont1">
			<p>Der Raum wurde geändert</p>
			</div>
			<?php
			$sql = query( "UPDATE rooms SET name = '" . $_POST['roomname'] . "', icon = 'glyphish-icons/" . $_POST['roomicon'] . "' WHERE id = '" . $_GET['id'] . "'" );	
			}
		}
									
		break;		
			
		
		
		case 'editmapMacro':
			if(!$_GET['step']){
				?>
				<div id="cont">
				<div style="float: left; border-radius:10px; height:300px; width:100%; margin-left:10px; margin-top:15px; margin-bottom:300px">
				<ul data-role="listview" data-inset="true" data-theme="d">
					<li data-role="list-divider">Devices mit Macro Mapping</li>
				<?php
				
				$sql = query( "SELECT id,DeviceID FROM devicemacro");
				while( $device = fetch($sql))
				{
					$DevicesWithMacro[] = $device['DeviceID'];
				}
				$DevicesWithMacro = array_unique($DevicesWithMacro);
				$DevicesWithMacro = array_values($DevicesWithMacro);
				for($i=0;$i<=count($DevicesWithMacro)-1;$i++)
				{
					$sql_device = query( "SELECT id,name FROM devices WHERE id ='" . $DevicesWithMacro[$i] . "'");
					$device = fetch($sql_device)
					?>																						
					<li><a href="?page=settings&aktion=editmapMacro&step=2&id=<?php echo $DevicesWithMacro[$i]; ?>"><?php echo $device['name'] ?> <span style="float:right;position:absolute;right:40px;"></span></a></li>
					<?php
				}
				?>
				</ul>
				</div>
		   
				<?php
			}
			if($_GET['step'] == 2){
				$sql = query( "SELECT id, DeviceID, MacroID FROM devicemacro WHERE DeviceID = '" . $_GET['id'] . "'" );
				$Device = fetch( $sql );
				$DeviceID = $Device['DeviceID'];
				?>
				<div id="cont">
					<form action="index.php?page=settings&aktion=editmapMacro&step=3&id=<?php echo $DeviceID ?>" method="post" class="ui-body ui-body-c ui-corner-all">
						<fieldset>
							<li data-role="fieldcontain">		
								<label for="device" class="select">Device:</label>
								<select name="device" id="device" data-native-menu="false">
									<?php
									?>
									<option>Bitte wählen...</option>
									<optgroup label="device">
									<?php
									$sql2 = query( "SELECT id,name,room FROM devices");					
									while( $row2 = fetch( $sql2 ) )
									{
										$sql = query( "SELECT id,name FROM rooms WHERE id='" . $row2['room'] ."'" );
										$RoomName = fetch($sql);
										$DevID = $row2['id'];
										if ($DeviceID == $DevID){
										?>
												<option value="<?php echo $row2['id']; ?>" selected="selected"><?php echo $row2['name'] . " (" . $RoomName['name'] . ")"; ?></option>
										<?php
										}else {
										?>
												<option value="<?php echo $row2['id']; ?>"><?php echo $row2['name'] . " (" . $RoomName['name'] . ")"; ?></option>
										<?php
										}
										
									}
									?>
								</select>	
							</li>
						
							<div data-role="fieldcontain">
								<fieldset data-role="controlgroup">
								<legend>Macros:</legend>
									<?php
										
									$sql_macros = query( "SELECT id,name,value FROM tvmacros ORDER BY name ASC");
									while($macros = fetch($sql_macros))
									{
										$sql_DevMac = query( "SELECT MacroID FROM devicemacro WHERE DeviceID='" . $DeviceID . "'");	
										while ($DevMacros = fetch($sql_DevMac))
										{
											if($macros['id'] == $DevMacros['MacroID']){ $checked = "checked";}
										}
										?>
										<input type="checkbox" name="Macros[]" id="<?php echo $macros['id'] ?>"  <? echo $checked ?> value="<?php echo $macros['id'] ?>" class="custom" />
										<label for="<?php echo $macros['id'] ?>"><?php echo $macros['name']; ?></label>
										<?php
										$checked = "";
									}
									?>
								</fieldset>
							</div>			

						<div class="ui-body ui-body-c">
							<fieldset class="ui-grid-a">
								<div class="ui-block-a"><button type="submit" name="delete" value="Submit" data-theme="d">Delete</button></div>
								<div class="ui-block-c"><button type="submit" name="submit" value="Submit" data-theme="b">Submit</button></div>
							</fieldset>
						</div>
					</fieldset>
					</form>
				</div>		
				<?php
			}
			if($_GET['step'] == 3){
				if( $_POST['delete'] ){
				$sql_mappings = query("SELECT id,DeviceId FROM devicemacro ORDER BY id DESC");
				while($mappings = fetch($sql_mappings))
				{
					if ($mappings['DeviceId'] == $_POST['device']){
						$sql = query( "DELETE FROM devicemacro WHERE id = '" . $mappings['id'] . "'" );
					}
				}
					
				?>
				<div id="cont1">
				<p>Das Mapping wurde gelöscht</p>
				</div>
				<?php
				}
				if( $_POST['submit'] ){
					$sql_mappings = query("SELECT id,DeviceId FROM devicemacro ORDER BY id DESC");
					while($mappings = fetch($sql_mappings))
					{
						if ($mappings['DeviceId'] == $_POST['device']){
							$sql = query( "DELETE FROM devicemacro WHERE id = '" . $mappings['id'] . "'" );
						}
					}
					$DeviceID = $_POST['device'];
					$Macros = $_POST['Macros'];
					for($i=0;$i<=count($Macros)-1;$i++) 
					{
						$sql = query( "INSERT INTO devicemacro VALUES( '', '" . $DeviceID . "', '" . $Macros[$i] . "')" );
					}		
					
					?>
					<div id="cont1">
					<p>Das Mapping wurde geändert</p>
					</div>
					<?
				}
			}
			break;		

		
		
		case 'editMacro':
			if(!$_GET['step']){
			?>
			<div id="cont">
				<div style="float: left; border-radius:10px; height:300px; width:100%; margin-left:10px; margin-top:15px; margin-bottom:500px">
					<ul data-role="listview" data-inset="true" data-theme="d">
						<li data-role="list-divider">Macros</li>
						<?php
						$sql = query( "SELECT * FROM tvmacros");
						
						while( $macro = fetch( $sql ) )
						{
							?>																						
							<li><a href="?page=settings&aktion=editMacro&step=2&id=<?php echo $macro['id']; ?>"><img src="<?php echo $macro['ChannelIcon'] ?>" class="ui-li-icon"><?php echo $macro['name'] ?> <span style="float:right;position:absolute;right:40px;"> <? echo "(" . $macro['value'] . ")"; ?></span></a></li>																			
							<?php
						}
						?>
					</ul>
					<br><br><br><br><br><br>
				</div>
			</div>
	   
			<?php
		}
		if($_GET['step'] == 2){
			$sql = query( "SELECT * FROM tvmacros WHERE id = '" . $_GET['id'] . "'" );
			$macro = fetch( $sql );
			?>
			<div id="cont">
				<form action="index.php?page=settings&aktion=editMacro&step=3&id=<?php echo $_GET['id'] ?>" method="post" class="ui-body ui-body-c ui-corner-all">
					<fieldset>
						<div data-role="fieldcontain">
							<label for="macroname">Macro Name:</label>
							<input data-clear-btn="true" name="macroname" id="macroname" value="<?php echo $macro['name']; ?>" type="text">					
						</div>
						<div data-role="fieldcontain">
							<label for="macrovalue">Commands: (<a href="#popup-TVMacroHelp"  data-inline="true" data-rel="popup" data-position-to="window">Erklärung</a>)</label>
							<input data-clear-btn="true" name="macrovalue" id="macrovalue" value="<?php echo $macro['value']; ?>" type="text">					
						</div>
						<div data-role="fieldcontain">	
							<?
							
							$YesNo = $macro['isChannel'];
							if ($YesNo == 'Yes'){
								$ValueYes = "selected=\"selected\"";
								$ValueNo = "";
							}else {
								$ValueYes = "";
								$ValueNo = "selected=\"selected\"";
							}
							?>
							<label for="flipChannel">TV Kanal:</label>
							<select name="flipChannel" id="flipChannel" data-role="slider">
								<option value="No" <?php echo $ValueNo; ?>>No</option>
								<option value="Yes" <?php echo $ValueYes; ?>>Yes</option>
							</select>
							
						</div>
						<div data-role="fieldcontain">
							<?					
							// open this directory 
							$myDirectory = opendir("icons/channel/");
							// get each entry
							while($entryName = readdir($myDirectory)) {
								$dirArray[] = $entryName;
							}
							// close directory
							closedir($myDirectory);
							//	count elements in array
							$indexCount	= count($dirArray);
							// sort 'em
							//sort($dirArray);							
							list($foldername, $subfoldername, $filename) = explode('/', $macro['ChannelIcon']);							
							?>
							<label for="ChannelIcon" class="select">Icon:</label>
								<select name="ChannelIcon" id="ChannelIcon" data-native-menu="false">
									<option value=""></option>
									<?php
									
									for($index=0; $index < $indexCount; $index++) {
										if (substr("$dirArray[$index]", 0, 1) != "."){ // don't list hidden files
											if($dirArray[$index] == $filename){
											?>
												<option value="<?php echo $dirArray[$index] ?>" selected="selected"><?php echo $dirArray[$index] ?></option>
											<?php
											}else{
											?>
												<option value="<?php echo $dirArray[$index] ?>"><?php echo $dirArray[$index] ?></option>
											<?php
											}
										}
									}
									?>							
								</select>
								
						</div>
						<div class="ui-body ui-body-c">
							<fieldset class="ui-grid-a">
								<div class="ui-block-a"><button type="submit" name="delete" value="Submit" data-theme="d">Delete</button></div>
								<div class="ui-block-c"><button type="submit" name="submit" value="Submit" data-theme="b">Submit</button></div>
							</fieldset>
						</div>
					</fieldset>
				</form>
			</div>		
			<?php
		
		}
		if($_GET['step'] == 3){
			if( $_POST['delete'] ){
				?>
				<div id="cont1">
				<p>Das Macro wurde gelöscht</p>
				</div>
				<?php
				$sql = query( "DELETE FROM tvmacros WHERE id = '" . $_GET['id'] . "'" );	
			}
			if( $_POST['submit'] ){
				$sql = query( "UPDATE tvmacros SET name = '" . $_POST['macroname'] . "', value = '" . $_POST['macrovalue'] . "', isChannel = '" . $_POST['flipChannel'] . "', ChannelIcon = 'icons/channel/" . $_POST['ChannelIcon'] . "' WHERE id='" . $_GET['id'] . "'" );	
				?>
				<div id="cont1">
				<p>Das Macro wurde geändert</p>
				</div>
				<?php
			}
		}
		break;					
	
		
		//EDIT DEVICE
		case 'editDevice':
		if(!$_GET['step']){
			?>
			<div id="cont">
			<div style="float: left; border-radius:10px; height:300px; width:100%; margin-left:10px; margin-top:15px; margin-bottom:130px">
				<ul data-role="listview" data-inset="true" data-theme="d">
					<li data-role="list-divider">Geräte</li>
					<?php
					$sql = query( "SELECT id,name,ip,room,type FROM devices");
					
					while( $row = fetch( $sql ) )
					{
						$sql1 = query( "SELECT  name,icon FROM rooms WHERE id = '" . $row['room'] . "'" );
						$row1 = fetch( $sql1 )
						?>																						
						<li><a href="?page=settings&aktion=editDevice&step=2&id=<?php echo $row['id']; ?>"><?php echo $row['name'] ?> <span style="float:right;position:absolute;right:40px;"> <? echo "(" . $row1['name'] . " / " . $row['ip'] . ")"; ?></span></a></li>																			
						<?php
					}
					?>
				</ul>
			</div>
	   
			<?php
		}
		if($_GET['step'] == 2){
			$sql = query( "SELECT iid, name, room, type, script, ip, logging, verbrauchWatt, zeitHeute FROM devices WHERE id = '" . $_GET['id'] . "'" );
			$row = fetch( $sql );
			?>
			<div id="cont">
				<form action="index.php?page=settings&aktion=editDevice&step=3&id=<?php echo $_GET['id'] ?>" method="post" class="ui-body ui-body-c ui-corner-all">
					<fieldset>
						<div data-role="fieldcontain">
							<li data-role="fieldcontain">
								<label for="devicename">Geräte Name:</label>
								<input data-clear-btn="true" name="devicename" id="devicename" value="<?php echo $row['name']; ?>" type="text">
							</li>
							<li data-role="fieldcontain">	
								<label for="verbrauchWatt">Verbrauch (W):</label>
								<input data-clear-btn="true" name="verbrauchWatt" id="verbrauchWatt" value="<?php echo $row['verbrauchWatt']; ?>" type="text">
							</li>
							<li data-role="fieldcontain">	     						
								<label for="ip">IP Adresse:</label>
								<input data-clear-btn="true" name="ip" id="ip" value="<?php echo $row['ip']; ?>" type="text">
							</li>
							<li data-role="fieldcontain">	
								<label for="room" class="select">Räume:</label>
								<select name="room" id="room" data-native-menu="false">
									<option>Räume:</option>
									<?php
									$sql2 = query( "SELECT id,name FROM rooms");	
									$roomID = $row['room'];
									while( $row2 = fetch( $sql2 ) )
										{
											if($roomID == $row2['id']){
											?>
												<option value="<?php echo $row2['id'] ?>" selected="selected"><?php echo $row2['name'] ?></option>
											<?php
											}else{
											?>
												<option value="<?php echo $row2['id'] ?>"><?php echo $row2['name'] ?></option>
											<?php
											}
										}
									?>

								</select>
							</li>
							<li data-role="fieldcontain">	
								<label for="typ" class="select">Typ:</label>
								<select name="typ" id="typ" data-native-menu="false">
									<option>Typ:</option>
									<?php
									$sql2 = query( "SELECT device,devtype,devtypename FROM deviceTypes");	
									$devtypeID = $row['type'];
									while( $row2 = fetch( $sql2 ) )
										{
											if($row2['device'] == 'device'){
												if($devtypeID == $row2['devtype']){
												?>
													<option value="<?php echo $row2['devtype'] ?>" selected="selected"><?php echo $row2['devtypename'] ?></option>
												<?php
												}else{
												?>
													<option value="<?php echo $row2['devtype'] ?>"><?php echo $row2['devtypename'] ?></option>
												<?php
												}
											}
										}
									?>		
															
								</select>
							</li>						
						</div>
						<div class="ui-body ui-body-c">
							<fieldset class="ui-grid-a">
								<div class="ui-block-a"><button type="submit" name="delete" value="Submit" data-theme="d">Delete</button></div>
								<div class="ui-block-c"><button type="submit" name="submit" value="Submit" data-theme="b">Submit</button></div>
							</fieldset>
						</div>
					</fieldset>
				</form>
			</div>		
			<?php
		
		}
		if($_GET['step'] == 3){
			if( $_POST['delete'] ){
				?>
				<div id="cont1">
				<p>Das Gerät wurde gelöscht</p>
				</div>
				<?php
				$sql = query( "DELETE FROM devices WHERE id = '" . $_GET['id'] . "'" );	
			}
			if( $_POST['submit'] ){
				$id = $_GET['id'];
				$sql = query( "UPDATE devices SET name = '" . $_POST['devicename'] . "', room = '" . $_POST['room'] . "', type = '" . $_POST['typ'] . "', ip = '" . $_POST['ip'] . "', verbrauchWatt = '" . $_POST['verbrauchWatt'] . "' WHERE id = '" . $id . "'" );
				?>
				<div id="cont1">
				<p>Das Gerät wurde geändert</p>
				</div>
				<?php	
			}
		}									
		break;	
		
			
		
		//EDIT Timer
		case 'editTimer':
		if(!$_GET['step']){
			?>
			<div id="cont">
			<div style="float: left; border-radius:10px; height:300px; width:100%; margin-left:10px; margin-top:15px; margin-bottom:130px">
			<ul data-role="listview" data-inset="true" data-theme="d">
				<li data-role="list-divider">Timer</li>
			<?php
			$sql = query( "SELECT id,name,enabled,aktor,time,isGroup FROM timer");
																
				while( $row = fetch( $sql ) )
				{
					if ($row['isGroup'] == 'Yes'){
						$sql1 = query( "SELECT  name FROM groups WHERE id = '" . $row['aktor'] . "'" );
						$row1 = fetch( $sql1 );
						$name = $row1['name'];
					} else {
						$sql1 = query( "SELECT  name,type FROM aktor WHERE id = '" . $row['aktor'] . "'" );
						$row1 = fetch( $sql1 );
						$sqldt = query( "SELECT id,devtypename FROM deviceTypes WHERE id = '" . $row1['type']. "'" );
						$devtype = fetch( $sqldt );
						$name = $row1['name'] . " / " . $devtype['devtypename'];
					}
					if ($row['enabled'] == 'Yes'){
					?>																						
						<li><a href="?page=settings&aktion=editTimer&step=2&id=<?php echo $row['id']; ?>"><?php echo $row['name'] ?> <span style="float:right;position:absolute;right:40px;"><FONT COLOR="#01DF01"> <? echo "(" . $row['time'] . " / " . $name . ")"; ?></FONT></span></a></li>																			
					<?php
					}else {
					?>																						
						<li><a href="?page=settings&aktion=editTimer&step=2&id=<?php echo $row['id']; ?>"><?php echo $row['name'] ?> <span style="float:right;position:absolute;right:40px;"><FONT COLOR="#FF0000"> <? echo "(" . $row['time'] . " / " . $name . ")"; ?></FONT></span></a></li>																			
					<?php
					}
					
				}
				?>
				</ul>
			</div>
	   
			<?php
		}
		if($_GET['step'] == 2){
		$sql = query( "SELECT id, name, aktor, time, hour, minute, enabled, value, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday, isGroup, suninfo, SensorID, SensorValue FROM timer WHERE id = '" . $_GET['id'] . "'" );
		$row = fetch( $sql );
		?>
		<div id="cont">
			<form action="index.php?page=settings&aktion=editTimer&step=3&id=<?php echo $_GET['id'] ?>" method="post" class="ui-body ui-body-c ui-corner-all">
				<fieldset>
					<div data-role="fieldcontain">
						<li data-role="fieldcontain">	
						    <label for="timername">Timer Name:</label>
     						<input data-clear-btn="true" name="timername" id="timername" value="<?php echo $row['name']; ?>" type="text">
     					</li>
						<li data-role="fieldcontain">		
     						<label for="aktor" class="select">Aktor/Gruppe:</label>
							<select name="aktor" id="aktor" data-native-menu="false">
								<?php
								$AktorGroupID = $row['aktor'];
								?>
								<option>Bitte wählen. ..</option>
								<optgroup label="Aktoren">
								<?php
    							$sql2 = query( "SELECT id,name,type,room FROM aktor");					
								while( $row2 = fetch( $sql2 ) )
								{
									$sql = query( "SELECT id,name FROM rooms WHERE id='" . $row2['room'] ."'" );
									$RoomName = fetch($sql);
									$AktorID = $row2['id'];
									$sqldt = query( "SELECT id,devtypename FROM deviceTypes WHERE id = '" . $row2['type'] . "'" );
									$devtype = fetch( $sqldt );
									$RowName = $row2['name'] . " (" . $RoomName['name'] . " / " . $devtype['devtypename'] .")";
									if (($AktorGroupID == $AktorID) && ($row['isGroup'] != 'Yes')){
									?>
											<option value="<?php echo "aktor." . $row2['id']; ?>" selected="selected"><?php echo $RowName; ?></option>
    								<?php
									}else {
									?>
											<option value="<?php echo "aktor." . $row2['id']; ?>"><?php echo $RowName; ?></option>
    								<?php
									}
									
    							}
    							?>	
    							
								<optgroup label="Gruppen">
								<?php
    							$sqlGroup = query( "SELECT id,name,status FROM groups");					
								while( $Groupvalue = fetch( $sqlGroup ) )
								{
									$GroupID = $Groupvalue['id'];
									if (($AktorGroupID == $GroupID) && ($row['isGroup'] == 'Yes')){
									?>
											<option value="<?php echo "group." . $Groupvalue['id']; ?>" selected="selected"><?php echo $Groupvalue['name']; ?></option>
    								<?php
									}else {
									?>
											<option value="<?php echo "group." . $Groupvalue['id']; ?>"><?php echo $Groupvalue['name']; ?></option>
    								<?php
									}
									
								}
    							?>	
    						</select>
						</li>
						<li data-role="fieldcontain">		
							<label for="slider-value">Value:</label>
							<input name="slider-value" id="slider-value" data-highlight="true" min="0" max="100" value="<?php echo $row['value'] ?>" type="range">		
						</li>
						<li data-role="fieldcontain">
						<label for="suninfo" class="select">Suninfo:</label>
							<?
							if ($row['suninfo'] == 'off') { $setOff = "selected=\"selected\""; }
							if ($row['suninfo'] == 'sunrise') { $setSunrise = "selected=\"selected\""; }
							if ($row['suninfo'] == 'sunset') { $setSunset = "selected=\"selected\""; }
							if ($row['suninfo'] == '') { $setOff = "selected=\"selected\""; }
							?>
							<select name="suninfo" id="suninfo" data-native-menu="false">
    							<option value="off" <? echo $setOff; ?>>off</option>
    							<option value="sunrise" <? echo $setSunrise; ?>>Sonnenaufgang</option>
    							<option value="sunset" <? echo $setSunset; ?>>Sonnenuntergang</option>
    						</select>
						</li>
						<li data-role="fieldcontain">							
							<label for="time">Time:</label>
							<input data-clear-btn="true" name="time" id="time" value="<?php echo $row['time'] ?>" type="time">
						</li>
						<li data-role="fieldcontain">	
							<?
							if ($row['Monday'] == 'Yes'){
								$ValueMonday = "checked=\"checked\"";
							}
							if ($row['Tuesday'] == 'Yes'){
								$ValueTuesday = "checked=\"checked\"";
							}
							if ($row['Wednesday'] == 'Yes'){
								$ValueWednesday = "checked=\"checked\"";
							}
							if ($row['Thursday'] == 'Yes'){
								$ValueThursday = "checked=\"checked\"";
							}
							if ($row['Friday'] == 'Yes'){
								$ValueFriday = "checked=\"checked\"";
							}
							if ($row['Saturday'] == 'Yes'){
								$ValueSaturday = "checked=\"checked\"";
							}
							if ($row['Sunday'] == 'Yes'){
								$ValueSunday = "checked=\"checked\"";
							}
							?>
							<fieldset data-role="controlgroup" data-type="horizontal">
								<legend>Wochentage:</legend>
								<label for="checkbox-h-Montag">Montag</label>
								<input type="checkbox" name="checkbox-h-Montag" id="checkbox-h-Montag" value="Yes" <? echo $ValueMonday; ?>>
							
								<label for="checkbox-h-Dienstag">Dienstag</label>
								<input type="checkbox" name="checkbox-h-Dienstag" id="checkbox-h-Dienstag" value="Yes" <? echo $ValueTuesday; ?>>
							
								<label for="checkbox-h-Mittwoch">Mittwoch</label>
								<input type="checkbox" name="checkbox-h-Mittwoch" id="checkbox-h-Mittwoch" value="Yes" <? echo $ValueWednesday; ?>>
							
								<label for="checkbox-h-Donnerstag">Donnerstag</label>
								<input type="checkbox" name="checkbox-h-Donnerstag" id="checkbox-h-Donnerstag" value="Yes" <? echo $ValueThursday; ?>>
							
								<label for="checkbox-h-Freitag">Freitag</label>
								<input type="checkbox" name="checkbox-h-Freitag" id="checkbox-h-Freitag" value="Yes" <? echo $ValueFriday; ?>>
							
								<label for="checkbox-h-Samstag">Samstag</label>
								<input type="checkbox" name="checkbox-h-Samstag" id="checkbox-h-Samstag" value="Yes" <? echo $ValueSaturday; ?>>
							
								<label for="checkbox-h-Sonntag">Sonntag</label>
								<input type="checkbox" name="checkbox-h-Sonntag" id="checkbox-h-Sonntag" value="Yes" <? echo $ValueSunday; ?>>
							</fieldset>
						</li>
						<li data-role="fieldcontain">	
							<?
							
							$YesNo = $row['SensorID'];
							if ($YesNo != ''){
								$ValueYes = "selected=\"selected\"";
								$ValueNo = "";
							}else {
								$ValueYes = "";
								$ValueNo = "selected=\"selected\"";
							}
							?>
							
							<label for="flipSensor">mit Sensor Steuerung: (<a href="#popup-TimerSensorHelp"  data-inline="true" data-rel="popup" data-position-to="window">hilfe</a>)</label>
							<select name="flipSensor" id="flipSensor" data-role="slider">
								<option value="No" <?php echo $ValueNo; ?>>No</option>
								<option value="Yes" <?php echo $ValueYes; ?>>Yes</option>
							</select>
							
						</li>
						<li data-role="fieldcontain">	     
							 <label for="TimerSensorID" class="select">Sensor:</label>
							<select name="TimerSensorID" id="TimerSensorID" data-native-menu="false">
    							<option>Sensor:</option>
								<?php
    							
								$sensID = $row['SensorID'];
												
								$sql_sens = query( "SELECT iid, name, room FROM sensoren");	
								while ( $sensor = fetch($sql_sens))
									{
										$sql_room = query( "SELECT name FROM rooms WHERE id='" . $sensor['room'] . "'");	
										$room = fetch($sql_room);
										
										if($sensID == $sensor['iid']){
										?>
											<option value="<?php echo $sensor['iid'] ?>" selected="selected"><?php echo $sensor['name'] . " (" . $room['name'] . ")"; ?></option>
										<?php
										}else{
										?>
											<option value="<?php echo $sensor['iid'] ?>"><?php echo $sensor['name'] . " (" . $room['name'] . ")"; ?></option>
										<?php
										}
    								}
    							?>
							</select>
						</li>
						<li data-role="fieldcontain">	
						    <label for="SensorValue">Sensor Wert:</label>
     						<input data-clear-btn="true" name="SensorValue" id="SensorValue" value="<?php echo $row['SensorValue']; ?>" type="text">
     					</li>
						<li data-role="fieldcontain">	
							<?
							
							$YesNo = $row['enabled'];
							if ($YesNo == 'Yes'){
								$ValueYes = "selected=\"selected\"";
								$ValueNo = "";
							}else {
								$ValueYes = "";
								$ValueNo = "selected=\"selected\"";
							}
							?>
							
							<label for="flipAktiv">Timer enabled:</label>
							<select name="flipAktiv" id="flipAktiv" data-role="slider">
								<option value="No" <?php echo $ValueNo; ?>>No</option>
								<option value="Yes" <?php echo $ValueYes; ?>>Yes</option>
							</select>
							
						</li>
						
					</div>
				<div class="ui-body ui-body-c">
				<fieldset class="ui-grid-a">
					<div class="ui-block-a"><button type="submit" name="delete" value="Submit" data-theme="d">Delete</button></div>
					<div class="ui-block-c"><button type="submit" name="submit" value="Submit" data-theme="b">Submit</button></div>
	    		</fieldset>
				</div>
			</fieldset>
			</form>
		</div>		
		<?php
		
		}
		if($_GET['step'] == 3){
			if( $_POST['delete'] ){
			?>
			<div id="cont1">
			<p>Der Timer wurde gelöscht</p>
			</div>
			<?php
			$sql = query( "DELETE FROM timer WHERE id = '" . $_GET['id'] . "'" );	
			}
			if( $_POST['submit'] ){
			$id = $_GET['id'];
			list($hour, $minute) = explode(':', $_POST['time']);
			list($type, $typeID) = explode('.', $_POST['aktor']);
			if ($type == 'group' ) {
				$isGroup = 'Yes';
			}	
			$sql = query( "UPDATE timer SET name = '" . $_POST['timername'] . "', aktor = '" . $typeID . "', value = '" . $_POST['slider-value'] . "', time = '" . $_POST['time'] . "', enabled = '" . $_POST['flipAktiv'] . "' , hour = '" . $hour . "' , minute = '" . $minute . "', Monday = '" . $_POST['checkbox-h-Montag'] . "', Tuesday = '" . $_POST['checkbox-h-Dienstag'] . "', Wednesday = '" . $_POST['checkbox-h-Mittwoch'] . "', Thursday = '" . $_POST['checkbox-h-Donnerstag'] . "', Friday = '" . $_POST['checkbox-h-Freitag'] . "', Saturday = '" . $_POST['checkbox-h-Samstag'] . "', Sunday = '" . $_POST['checkbox-h-Sonntag'] . "', isGroup = '" . $isGroup . "', suninfo = '" . $_POST['suninfo'] ."', SensorID = '" . $_POST['TimerSensorID'] ."', SensorValue = '" . $_POST['SensorValue'] ."' WHERE id = '" . $id . "'" );
			?>
			<div id="cont1">
			<p>Der Timer wurde geändert</p>
			</div>
			<?php	
			}
		}
									
		break;	
	
		case 'addRoom':
		
		if( $_POST['submit'] ){
		?>
		<div class="boxWhite">
			<p class="center">Raum wurde hinzugefügt</p>
		</div>
																									
		<?php	
		$sql = query( "INSERT INTO rooms VALUES( '', '" . $_POST['raumname'] . "', '" . $_POST['raumicon'] . "')" );
		}else{
		?>
		<div id="cont">
			<form action="index.php?page=settings&aktion=addRoom" method="post" class="ui-body ui-body-c ui-corner-all">
				<fieldset>
					<div data-role="fieldcontain">
						<label for="raumname">Raum Name:</label>
     					<input data-clear-btn="true" name="raumname" id="raumname" value="" type="text">
					</div>
					<?
					// open this directory 
					$myDirectory = opendir("glyphish-icons/");

					// get each entry
					while($entryName = readdir($myDirectory)) {
						$dirArray[] = $entryName;
					}

					// close directory
					closedir($myDirectory);
					//	count elements in array
					$indexCount	= count($dirArray);
					// sort 'em
					//sort($dirArray);
					?>
					<label for="roomicon" class="select">Icon:</label>
						<select name="roomicon" id="roomicon" data-native-menu="false">
						<option>Icon:</option>
    						<?php
    									
							for($index=0; $index < $indexCount; $index++) {
								if (substr("$dirArray[$index]", 0, 1) != "."){ // don't list hidden files
									?>
										<option value="<?php echo $dirArray[$index] ?>"><?php echo $dirArray[$index] ?></option>
									<?php
									}
								}
    						?>							
						</select>
					
					<button type="submit" data-theme="c" name="submit" value="submit-value">Submit</button>
				</fieldset>
			</form>
		</div>
		<?php
		}
		break;	
	
		case 'addMacro':
		
		if( $_POST['submit'] ){
		?>
		<div class="boxWhite">
			<p class="center">Macro wurde hinzugefügt</p>
		</div>
																									
		<?php
		if ($_POST['ChannelIcon']!= ''){
			$Icon = "icons/channel/" . $_POST['ChannelIcon'];
		}
		//icons/channel/
		$sql = query( "INSERT INTO tvmacros VALUES( '', '" . $_POST['macroname'] . "', '" . $_POST['macrovalue'] . "', '" . $_POST['flipChannel'] . "', '" . $Icon . "')" );
		}else{
		?>
		<div id="cont">
			<form action="index.php?page=settings&aktion=addMacro" method="post" class="ui-body ui-body-c ui-corner-all">
				<fieldset>
					<div data-role="fieldcontain">
						<label for="macroname">Macro Name:</label>
     					<input data-clear-btn="true" name="macroname" id="macroname" value="" type="text">
					</div>
					<div data-role="fieldcontain">
						<label for="macrovalue">Commands: (<a href="#popup-TVMacroHelp"  data-inline="true" data-rel="popup" data-position-to="window">Erklärung</a>)</label>
     					<input data-clear-btn="true" name="macrovalue" id="macrovalue" value="" type="text">
					</div>
					<div data-role="fieldcontain">	
						<label for="flipChannel">TV Kanal:</label>
						<select name="flipChannel" id="flipChannel" data-role="slider">
							<option value="No">No</option>
							<option value="Yes" selected="selected">Yes</option>
						</select>	
					</div>	
					<div data-role="fieldcontain">
					<?
					// open this directory 
					$myDirectory = opendir("icons/channel/");

					// get each entry
					while($entryName = readdir($myDirectory)) {
						$dirArray[] = $entryName;
					}

					// close directory
					closedir($myDirectory);
					//	count elements in array
					$indexCount	= count($dirArray);
					// sort 'em
					//sort($dirArray);
					?>
					<label for="ChannelIcon" class="select">Icon:</label>
						<select name="ChannelIcon" id="ChannelIcon" data-native-menu="false">
						<option>Icon:</option>
    						<?php
    									
							for($index=0; $index < $indexCount; $index++) {
								if (substr("$dirArray[$index]", 0, 1) != "."){ // don't list hidden files
									?>
										<option value="<?php echo $dirArray[$index] ?>"><?php echo $dirArray[$index] ?></option>
									<?php
								}
							}
    						?>							
						</select>
					</div>
					<button type="submit" data-theme="c" name="submit" value="submit-value">Submit</button>
				</fieldset>
			</form>
		</div>
		<?php
		}
		break;
		
	
		case 'mapMacro':
		
		if( $_POST['submit'] ){
		$DeviceID = $_POST['device'];
		$Macros = $_POST['Macros'];
		for($i=0;$i<=count($Macros)-1;$i++) 
		{
			$sql = query( "INSERT INTO devicemacro VALUES( '', '" . $DeviceID . "', '" . $Macros[$i] . "')" );
		}		
		?>
		<div class="boxWhite">
			<p class="center">Device und Macros wurden verknüft</p>
		</div>
		
		<?php
		
		}else{
		?>
		<div id="cont">
			<form action="index.php?page=settings&aktion=mapMacro" method="post" class="ui-body ui-body-c ui-corner-all">
				<fieldset>
					<li data-role="fieldcontain">	
     						<label for="device" class="select">Devices:</label>
							<select name="device" id="device" data-native-menu="false">
    							<option>Devices:</option>
    							<?php
    							$sql_device = query( "SELECT id,name FROM devices");	
								while( $devices = fetch( $sql_device ) )
									{
										?>
											<option value="<?php echo $devices['id'] ?>"><?php echo $devices['name'] ?></option>
										<?php
    								}
    							?>
							</select>
					</li>
					
					<div data-role="fieldcontain">
					<fieldset data-role="controlgroup">
					<legend>Macros:</legend>
								<?php
    							$sql_macros = query( "SELECT id,name,value FROM tvmacros ORDER BY name ASC");
								while( $Macro = fetch( $sql_macros ) )
									{
									?>
											<input type="checkbox" name="Macros[]" id="Macro-<?php echo $Macro['id']; ?>"  value="<?php echo $Macro['id']; ?>" class="custom" />
	   										<label for="Macro-<?php echo $Macro['id']; ?>"><?php echo $Macro['name']; ?></label>
    								<?php
    								}
    							?>	
    							
					</fieldset>
					</div>		
					
					<button type="submit" data-theme="c" name="submit" value="submit-value">Submit</button>
				</fieldset>
			</form>
		</div>
		<?php
		}
		break;
		
		
		case 'editConfig':
		if( $_POST['submit'] ){
			?>
			<div class="boxWhite">
				<p class="center">Konfiguration wurde geändert</p>
			</div>
																										
			<?php
			//clear config table
			$sql1 = query( "TRUNCATE TABLE config");
			//insert config values
			$sql1 = query( "INSERT INTO config VALUES( '', 'XS1IP', '" . $_POST['XS1IP'] . "')");
			$sql1 = query( "INSERT INTO config VALUES( '', 'XS1User', '" . $_POST['XS1User'] . "')");
			$sql1 = query( "INSERT INTO config VALUES( '', 'XS1Pass', '" . $_POST['XS1Pass'] . "')");
			$sql1 = query( "INSERT INTO config VALUES( '', 'WetterWidget', '" . str_replace("'","\"",$_POST['WetterWidget']) . "')");
			$sql1 = query( "INSERT INTO config VALUES( '', 'WetterWidgetAktiv', '" . $_POST['flipWetter'] . "')");
			$sql1 = query( "INSERT INTO config VALUES( '', 'ShowDayGraph', '" . $_POST['flipDayGraph'] . "')");
			$sql1 = query( "INSERT INTO config VALUES( '', 'ShowWeekGraph', '" . $_POST['flipWeekGraph'] . "')");
			$sql1 = query( "INSERT INTO config VALUES( '', 'ShowMonthGraph', '" . $_POST['flipMonthGraph'] . "')");
			$sql1 = query( "INSERT INTO config VALUES( '', 'GlobalEnergy', '" . $_POST['flipGlobalEnergy'] . "')");
			$sql1 = query( "INSERT INTO config VALUES( '', 'EnergySensor', '" . $_POST['EnergySensor'] . "')");
			$sql1 = query( "INSERT INTO config VALUES( '', 'EnergyPrice', '" . $_POST['EnergyPrice'] . "')");
			$sql1 = query( "INSERT INTO config VALUES( '', 'StandardRoom', '" . $_POST['StandardRoom'] . "')");
		
		}else{		
		?>
		<div id="cont">
			<form action="index.php?page=settings&aktion=editConfig" method="post" class="ui-body ui-body-c ui-corner-all">
			<div id="cont-inner">
  				<ul data-role="listview" data-inset="true" data-theme="d">
    			
				
				<ul data-role="listview" data-inset="true">
					<li data-role="list-divider">XS1</li>
					 <li data-role="fieldcontain">
							<?
							$sql = query( "SELECT value FROM config WHERE options='XS1IP'");
							$config = fetch( $sql);
							?>					
							<label for="XS1IP">XS1 IP Adresse:</label>
     						<input data-clear-btn="true" name="XS1IP" id="XS1IP" value="<? echo $config['value']; ?>" type="text">
					</li>
					<li data-role="fieldcontain">			
							<?
							$sql = query( "SELECT value FROM config WHERE options='XS1User'");
							$config = fetch( $sql);
							?>
							<label for="XS1User">XS1 Username:</label>
     						<input data-clear-btn="true" name="XS1User" id="XS1User" value="<? echo $config['value']; ?>" type="text">
					</li>
					<li data-role="fieldcontain">			
							<?
							$sql = query( "SELECT value FROM config WHERE options='XS1Pass'");
							$config = fetch( $sql);
							?>
							<label for="XS1Pass">XS1 Password:</label>
     						<input data-clear-btn="true" name="XS1Pass" id="XS1Pass" value="<? echo $config['value']; ?>" type="password">
									
					</li>
					<li data-role="list-divider">Graphen</li>
					<li data-role="fieldcontain">
							<?
							$sql = query( "SELECT value FROM config WHERE options='ShowDayGraph'");
							$config = fetch( $sql);
							$YesNo = $config['value'];
							if ($YesNo == 'Yes'){
								$ValueYes = "selected=\"selected\"";
								$ValueNo = "";
							}else {
								$ValueYes = "";
								$ValueNo = "selected=\"selected\"";
							}
							?>
							<label for="flipDayGraph">Show Day Graph:</label>
							<select name="flipDayGraph" id="flipDayGraph" data-role="slider">
								<option value="No" <? echo $ValueNo; ?>>No</option>
								<option value="Yes" <? echo $ValueYes; ?>>Yes</option>
							</select>	
							
					</li>
					<li data-role="fieldcontain">
							<?
							$sql = query( "SELECT value FROM config WHERE options='ShowWeekGraph'");
							$config = fetch( $sql);
							$YesNo = $config['value'];
							if ($YesNo == 'Yes'){
								$ValueYes = "selected=\"selected\"";
								$ValueNo = "";
							}else {
								$ValueYes = "";
								$ValueNo = "selected=\"selected\"";
							}
							?>
							<label for="flipWeekGraph">Show Week Graph:</label>
							<select name="flipWeekGraph" id="flipWeekGraph" data-role="slider">
								<option value="No" <? echo $ValueNo; ?>>No</option>
								<option value="Yes" <? echo $ValueYes; ?>>Yes</option>
							</select>	
							
					</li>
					<li data-role="fieldcontain">
							<?
							$sql = query( "SELECT value FROM config WHERE options='ShowMonthGraph'");
							$config = fetch( $sql);
							$YesNo = $config['value'];
							if ($YesNo == 'Yes'){
								$ValueYes = "selected=\"selected\"";
								$ValueNo = "";
							}else {
								$ValueYes = "";
								$ValueNo = "selected=\"selected\"";
							}
							?>
							<label for="flipMonthGraph">Show Month Graph:</label>
							<select name="flipMonthGraph" id="flipMonthGraph" data-role="slider">
								<option value="No" <? echo $ValueNo; ?>>No</option>
								<option value="Yes" <? echo $ValueYes; ?>>Yes</option>
							</select>	
							
					</li>
					<li data-role="list-divider">Energie</li>
					<li data-role="fieldcontain">			
							<?
							$sql = query( "SELECT value FROM config WHERE options='EnergyPrice'");
							$config = fetch( $sql);
							?>
							<label for="EnergyPrice">Energie Preis:</label>
     						<input data-clear-btn="true" name="EnergyPrice" id="EnergyPrice" value="<? echo $config['value']; ?>" type="text">
					</li>
					<li data-role="fieldcontain">
							<?
							$sql = query( "SELECT value FROM config WHERE options='GlobalEnergy'");
							$config = fetch( $sql);
							$YesNo = $config['value'];
							if ($YesNo == 'Yes'){
								$ValueYes = "selected=\"selected\"";
								$ValueNo = "";
							}else {
								$ValueYes = "";
								$ValueNo = "selected=\"selected\"";
							}
							?>
							<label for="flipGlobalEnergy">Globaler Energiezähler:</label>
							<select name="flipGlobalEnergy" id="flipGlobalEnergy" data-role="slider">
								<option value="No" <? echo $ValueNo; ?>>No</option>
								<option value="Yes" <? echo $ValueYes; ?>>Yes</option>
							</select>								
					</li>
					<li data-role="fieldcontain">
					<label for="EnergySensor" class="select">Energiesensor:</label>
							<select name="EnergySensor" id="EnergySensor" data-native-menu="false">
    							<option>Energiesensor</option>
    							<?php
								$sql = query( "SELECT value FROM config WHERE options='EnergySensor'");
								$config = fetch( $sql);
    							$sql2 = query( "SELECT id,name,hcType FROM sensoren");					
								while( $row2 = fetch( $sql2 ) )
									{
									if (($row2['hcType'] == 'energiezaehler') || ($row2['hcType'] == 'zaehler')){
										if ($config['value'] == $row2['id']){
											?>
												<option value="<?php echo $row2['id'] ?>" selected="selected"><?php echo $row2['name'] ?></option>
											<?php										
										}else{
											?>
												<option value="<?php echo $row2['id'] ?>"><?php echo $row2['name'] ?></option>
											<?php
										}
									}
    								}
    							?>

							</select>	
					</li>
					<li data-role="list-divider">Räume</li>
						<li data-role="fieldcontain">
						<label for="StandardRoom" class="select">Hauptraum:</label>
								<select name="StandardRoom" id="StandardRoom" data-native-menu="false">
									<option>Räume</option>
									<?php
									$sql = query( "SELECT value FROM config WHERE options='StandardRoom'");
									$config = fetch( $sql);
									$sql2 = query( "SELECT id,name FROM rooms ORDER by name ASC");					
									while( $row2 = fetch( $sql2 ) )
										{
										if ($config['value'] == $row2['id']){
												?>
													<option value="<?php echo $row2['id'] ?>" selected="selected"><?php echo $row2['name'] ?></option>
												<?php										
											}else{
												?>
													<option value="<?php echo $row2['id'] ?>"><?php echo $row2['name'] ?></option>
												<?php
											}
										}
									?>

								</select>	
						</li>
					<li data-role="list-divider">Wetter Widget</li>
						<li data-role="fieldcontain">		
							<?
							$sql = query( "SELECT value FROM config WHERE options='WetterWidgetAktiv'");
							$config = fetch( $sql);
							$YesNo = $config['value'];
							if ($YesNo == 'Yes'){
								$ValueYes = "selected=\"selected\"";
								$ValueNo = "";
							}else {
								$ValueYes = "";
								$ValueNo = "selected=\"selected\"";
							}
							?>
							<label for="flipWetter">Wetter Widget:</label>
							<select name="flipWetter" id="flipWetter" data-role="slider">
								<option value="No" <? echo $ValueNo; ?>>No</option>
								<option value="Yes" <? echo $ValueYes; ?>>Yes</option>
							</select>	
							
						</li>
						<li data-role="fieldcontain">
							
							<?
							$sql = query( "SELECT value FROM config WHERE options='WetterWidget'");
							$config = fetch( $sql);
							?>
							<label for="WetterWidget">URL:</label>
     						<input data-clear-btn="true" name="WetterWidget" id="WetterWidget" value="<? echo str_replace("\"","'",$config['value']); ?>" type="text">
							
					
						</li>
					</ul>
				</div>  
				</ul>
				<button type="submit" data-theme="c" name="submit" value="submit-value">Submit</button>
			</form>
		</div>
		<?php
		}
		break;
		
		case 'editFooterOrder':
		if( $_POST['submit'] ){
			
			$sql = query( "SELECT * FROM configFooter");
			$configt = fetch( $sql );
			for($x = 1; $x < count($configt) - 2; $x++) {
				$sql = query( "SELECT * FROM configFooter WHERE id=" . $x);
				$config = fetch( $sql );
				$flip = "flip" . $config['codename'];
				//echo $config['name'];
				$befehl = query("UPDATE configFooter SET visible = '" . $_POST[$flip] . "' WHERE name = '" . $config['name'] . "'");
			}
			
			?>
			<div class="boxWhite">
				<p class="center">Footer Konfiguration wurde geändert</p>
			</div>
																										
			<?php
		
		}else{		
			?>
			<div id="cont">
				<form action="index.php?page=settings&aktion=editFooterOrder" method="post" class="ui-body ui-body-c ui-corner-all">
					<div data-role="content" data-theme="c">
					<ul data-role="listview" data-inset="true" data-theme="c">
						<li data-role="list-divider">Footer</li>
							<?
							$sql = query( "SELECT * FROM configFooter ORDER BY name ASC");
							while( $config = fetch( $sql ) ){
								$YesNo = $config['visible'];
								if ($YesNo == 'Yes'){
									$ValueYes = "selected=\"selected\"";
									$ValueNo = "";
								}else {
									$ValueYes = "";
									$ValueNo = "selected=\"selected\"";
								}
								?>
								<li data-role="fieldcontain">
									<label for="flip<?echo $config['codename'];?>"><?echo $config['name'];?></label>
										<select name="flip<?echo $config['codename'];?>" id="flip<?echo $config['codename'];?>" data-role="slider">
											<option value="No" <? echo $ValueNo; ?>>No</option>
											<option value="Yes" <? echo $ValueYes; ?>>Yes</option>
										</select>
								</li>
								<?
							}
							?>
						</ul>
						<button type="submit" data-theme="c" name="submit" value="submit-value">Submit</button>
					</div> 
					<div data-role="content" data-theme="c" id="sortableFooter">
						<ul data-role="listview" data-inset="true">
							<li data-role="list-divider">Footer Reihenfolge</li>
								<?
									$sql_footerconf = query( "SELECT id,name,visible FROM configFooter ORDER by sortOrder ASC");
									while( $footerconf = fetch( $sql_footerconf ) ){
										if ($footerconf['visible'] == 'Yes') {
											//$sichtbar = ' (sichtbar)'; 
											$font = "#01DF01";
										} else { 
											//$sichtbar = ' (versteckt)'; 
											$font = "#FF0000";
										}
										?>
										<li id="recordsArray_<?php echo $footerconf['id']; ?>"><FONT COLOR="<? echo $font ?>"><?php echo $footerconf['name'] . $sichtbar; ?></FONT></li>
										<?php
									}		
									?>
						</ul>
					</div> 
					<div data-role="content" data-theme="c" id="sortedFooter">
						<p>&nbsp;</p>	
					</div>				
				</form>
			</div>
			<?php
		}
		break;
		
		case 'addDevice':
		
		if( $_POST['submit'] ){
		?>
		<div class="boxWhite">
			<p class="center">Gerät wurde hinzugefügt</p>
		</div>
																									
		<?php	
		$sql = query( "INSERT INTO devices VALUES( '', '" . $_POST['devicename'] . "',
													 '" . $_POST['room'] . "',
													 '0',
													 '" . $_POST['ip']  . "',
													 '" . $_POST['typ']  . "',
													 '" . $_POST['logging'] . "',
													 '" . $_POST['verbrauch'] . "',
													 '0',
													 '0',
													 '0',
													 '" . $_POST['verbrauchWatt'] . "')" );		
		}else{
		?>
		<div id="cont">
			<form action="index.php?page=settings&aktion=addDevice" method="post" class="ui-body ui-body-c ui-corner-all">
				<fieldset>
					<div data-role="fieldcontain">
						<li data-role="fieldcontain">	
							<label for="devicename">Geräte Name:</label>
							<input data-clear-btn="true" name="devicename" id="devicename" value="" type="text">
						</li>
						<li data-role="fieldcontain">		
							<label for="typ" class="select">Typ:</label>
								<select name="typ" id="typ" data-native-menu="false">
								<option>Typ:</option>
								<?php
    							$sql2 = query( "SELECT device,devtype,devtypename FROM deviceTypes ORDER BY devtypename ASC");					
								while( $row2 = fetch( $sql2 ) )
									{
									if( $row2['device'] == 'device'){
									?>
											<option value="<?php echo $row2['devtype'] ?>"><?php echo $row2['devtypename'] ?></option>
    								<?php
										}
    								}
    							?>	
    							
							</select>
						</li>
						<li data-role="fieldcontain">	
							<label for="room" class="select">Räume:</label>
							<select name="room" id="room" data-native-menu="false">
								<option>Räume:</option>
    						<?php
    						$sql2 = query( "SELECT id,name FROM rooms");					
							while( $row2 = fetch( $sql2 ) )
								{
								?>
    								<option value="<?php echo $row2['id'] ?>"><?php echo $row2['name'] ?></option>
    							<?php
    							}
    						?>
							</select>
								
						
						</li>
						<li data-role="fieldcontain">	
							<label for="verbrauchWatt">Verbrauch (W):</label>
							<input data-clear-btn="true" name="verbrauchWatt" id="verbrauchWatt" value="" type="text">
						</li>
						<li data-role="fieldcontain">							
							<label for="ip">IP Adresse:</label>
							<input data-clear-btn="true" name="ip" id="ip" value="" type="text">

					</div>
					<button type="submit" data-theme="c" name="submit" value="submit-value">Submit</button>
				</fieldset>
			</form>
		</div>
		<?php
		}
		break;
		
		case 'addTimer':
		
		if( $_POST['submit'] ){
		
		list($hour, $minute) = explode(':', $_POST['time']);
		list($type, $typeID) = explode('.', $_POST['aktor']);
		if ($type == 'group' ) {
			$isGroup = 'Yes';
		}
		$tzone = date_default_timezone_get();
		if ($tzone == '') { $tzone = 'Europe/Berlin'; }
		$tz = new DateTimeZone($tzone); 
		$loc = $tz->getLocation(); 
		$sun_info = date_sun_info(time(), $loc['latitude'], $loc['longitude']);
		
		if ($_POST['suninfo'] == 'sunrise') {
			$time = date("H:i", $sun_info['sunrise']);
			$hour = date("H", $sun_info['sunrise']);
			$minute = date("i", $sun_info['sunrise']);
		}elseif ($_POST['suninfo'] == 'sunset') {
			$time = date("H:i", $sun_info['sunset']);
			$hour = date("H", $sun_info['sunset']);
			$minute = date("i", $sun_info['sunset']);
		}elseif ($_POST['suninfo'] == 'off') {
			$time = $_POST['time'];
		}
		
		$sql = query( "INSERT INTO timer VALUES( '', '" . $_POST['timername'] . "',
													 '" . $typeID  . "',
													 '" . $_POST['slider-value']  . "',
													 '" . $time . "',
													 '" . $hour . "',
													 '" . $minute . "',	
													 '" . $_POST['flipAktiv'] . "',
													 '" . $_POST['checkbox-h-Montag'] . "',
													 '" . $_POST['checkbox-h-Dienstag'] . "',
													 '" . $_POST['checkbox-h-Mittwoch'] . "',
													 '" . $_POST['checkbox-h-Donnerstag'] . "',
													 '" . $_POST['checkbox-h-Freitag'] . "',
													 '" . $_POST['checkbox-h-Samstag'] . "',
													 '" . $_POST['checkbox-h-Sonntag'] . "',	
													 '" . $isGroup . "',			
													 '" . $_POST['suninfo'] . "',			
													 '" . $_POST['TimerSensorID'] . "',			
													 '" . $_POST['SensorValue'] . "')" );			
		?>
		<div class="boxWhite">
			<p class="center">Timer wurde hinzugefügt</p>
		</div>
																									
		<?php	
		}else{
		?>
		<div id="cont">
			<form action="index.php?page=settings&aktion=addTimer" method="post" class="ui-body ui-body-c ui-corner-all">
				<fieldset>
					<div data-role="fieldcontain">
					
					<li data-role="fieldcontain">
						<label for="timername">Timer Name:</label>
     					<input data-clear-btn="true" name="timername" id="timername" value="" type="text">
					</li>
					<li data-role="fieldcontain">					
						<label for="aktor" class="select">Aktor/Gruppe:</label>
						<select name="aktor" id="aktor" data-native-menu="false">
							<option>Bitte wählen. ..</option>
    						<optgroup label="Aktoren">
								<?php
    							$sql2 = query( "SELECT id,name,type,room FROM aktor");					
								while( $row2 = fetch( $sql2 ) )
									{
									$sql = query( "SELECT id,name FROM rooms WHERE id='" . $row2['room'] ."'" );
									$RoomName = fetch($sql);
									$sqldt = query( "SELECT id,devtypename FROM deviceTypes WHERE id = '" . $row2['type']. "'" );
									$devtype = fetch( $sqldt );
									$RowName = $row2['name'] . " (" . $RoomName['name'] . " / " . $devtype['devtypename'] .")";
									?>
											<option value="<?php echo "aktor." . $row2['id']; ?>"><?php echo $RowName; ?></option>
    								<?php
    								}
    							?>	
    							
								<optgroup label="Gruppen">
								<?php
    							$sqlGroup = query( "SELECT id,name,status FROM groups");					
								while( $Groupvalue = fetch( $sqlGroup ) )
									{
									?>
											<option value="<?php echo "group." . $Groupvalue['id']; ?>"><?php echo $Groupvalue['name']; ?></option>
    								<?php
    								}
    							?>	
    							
						</select>
					</li>
					<li data-role="fieldcontain">	
						<label for="slider-value">Value:</label>
						<input name="slider-value" id="slider-value" data-highlight="true" min="0" max="100" step="5" value="0" type="range">		
					</li>
					<li data-role="fieldcontain">
					<label for="suninfo" class="select">Suninfo:</label>
							<select name="suninfo" id="suninfo" data-native-menu="false">
    							<option value="off" selected="selected">off</option>
    							<option value="sunrise">Sonnenaufgang</option>
    							<option value="sunset">Sonnenuntergang</option>
    							
							</select>
					</li>
					<li data-role="fieldcontain">								
     					<label for="time">Time:</label>
     					<input data-clear-btn="true" name="time" id="time" value="" type="time">
					</li>
					<li data-role="fieldcontain">	
					
					<fieldset data-role="controlgroup" data-type="horizontal">
						<legend>Wochentage:</legend>
							<label for="checkbox-h-Montag">Montag</label>
							<input type="checkbox" name="checkbox-h-Montag" id="checkbox-h-Montag" value="Yes">
							
							<label for="checkbox-h-Dienstag">Dienstag</label>
							<input type="checkbox" name="checkbox-h-Dienstag" id="checkbox-h-Dienstag" value="Yes">
							
							<label for="checkbox-h-Mittwoch">Mittwoch</label>
							<input type="checkbox" name="checkbox-h-Mittwoch" id="checkbox-h-Mittwoch" value="Yes">
							
							<label for="checkbox-h-Donnerstag">Donnerstag</label>
							<input type="checkbox" name="checkbox-h-Donnerstag" id="checkbox-h-Donnerstag" value="Yes">
							
							<label for="checkbox-h-Freitag">Freitag</label>
							<input type="checkbox" name="checkbox-h-Freitag" id="checkbox-h-Freitag" value="Yes">
							
							<label for="checkbox-h-Samstag">Samstag</label>
							<input type="checkbox" name="checkbox-h-Samstag" id="checkbox-h-Samstag" value="Yes">
							
							<label for="checkbox-h-Sonntag">Sonntag</label>
							<input type="checkbox" name="checkbox-h-Sonntag" id="checkbox-h-Sonntag" value="Yes">
					</fieldset>
					</li>
					<li data-role="fieldcontain">	
							<label for="flipSensor">mit Sensor Steuerung: (<a href="#popup-TimerSensorHelp"  data-inline="true" data-rel="popup" data-position-to="window">hilfe</a>)</label>
							<select name="flipSensor" id="flipSensor" data-role="slider">
								<option value="No" selected="selected">No</option>
								<option value="Yes">Yes</option>
							</select>
							
					</li>
					<li data-role="fieldcontain">	     
							 <label for="TimerSensorID" class="select">Sensor:</label>
							<select name="TimerSensorID" id="TimerSensorID" data-native-menu="false">
    							<option>Sensor:</option>
								<?php
    							$sql_sens = query( "SELECT iid, name, room FROM sensoren");	
								while ( $sensor = fetch($sql_sens))
									{
										$sql_room = query( "SELECT name FROM rooms WHERE id='" . $sensor['room'] . "'");	
										$room = fetch($sql_room);
										?>
											<option value="<?php echo $sensor['iid'] ?>"><?php echo $sensor['name'] . " (" . $room['name'] . ")"; ?></option>
										<?php
    								}
    							?>
							</select>
						</li>
						<li data-role="fieldcontain">	
						    <label for="SensorValue">Sensor Wert:</label>
     						<input data-clear-btn="true" name="SensorValue" id="SensorValue" value="" type="text">
     					</li>
					<li data-role="fieldcontain">	
						<label for="flipAktiv">Timer enabled:</label>
						<select name="flipAktiv" id="flipAktiv" data-role="slider">
							<option value="No">No</option>
							<option value="Yes" selected="selected">Yes</option>
						</select>	
					</li>	
					</div>
					<button type="submit" data-theme="c" name="submit" value="submit-value">Submit</button>
				</fieldset>
			</form>
		</div>
		<?php
		}
		break;


		case 'addGroup':
		
		if( $_POST['submit'] ){
		
			if($_GET['step'] == "2"){
				$groupname = $_POST['groupname'];
				$groupstatus = $_POST['flipAktiv'];
				$aktoren = $_POST['Aktoren'];
				$devices = $_POST['Geraete'];
				//var_dump($_POST['Aktoren']);
			
				$typ = array("schalter","rolladen","dimmer");
				$typDev = array("samsungtv","samsungbluray","onkyoavrec","enigma2"); 
				$typid = array("1","2","3"); 
				$typidDev = array("19","20","21","22"); 
				$initial = true;
				$lastGroup = false;
				?>
				<div id="cont">
				<form action="index.php?page=settings&aktion=addGroup&step=3" method="post" class="ui-body ui-body-c ui-corner-all">
				<fieldset>	

				<?php
				for($x = 0; $x < count($typ); $x++) {
					for($i = 0; $i < count($aktoren); $i++) { 
						if($i == 0){
							?>
							
							<div id="cont-inner">
								<ul data-role="listview" data-inset="true" data-theme="d">
								<li data-role="list-divider"><?php echo $typ[$x]; ?></li>
								
						<?php 
						}
						
						$sql = query( "SELECT name,room FROM aktor WHERE id = '" . $aktoren[$i] . "' AND type = '" . $typid[$x] . "'" );	
						if ( mysql_num_rows($sql) == 0 ) {
							// nichts gefunden
						} else {
							$row = mysql_fetch_assoc($sql);
							?>
							<li>
							<?php
							$sqltype = query( "SELECT id,devtype,devtypename FROM deviceTypes WHERE id = '" . $typid[$x] . "'" );
							$devtype = fetch( $sqltype );
							$sqlroom = query( "SELECT name FROM rooms WHERE id = '" . $row['room'] . "'" );
							$room = fetch( $sqlroom );
							if($devtype['devtypename'] == "Dimmer"){
								?>
									<label for="Aktor-<?php echo $aktoren[$i] ?>"><?php echo $row['name'] . ' (' . $room['name'] . ')';?></label>
									<input name="Aktor-<?php echo $aktoren[$i] ?>" id="Aktor-<?php echo $aktoren[$i] ?>" data-highlight="true" min="0" max="100" step="5" value="0" type="range">
								<?php
							}
							if($devtype['devtypename'] == "Schalter"){
								?>
									<label for="Aktor-<?php echo $aktoren[$i] ?>"><?php echo $row['name'] . ' (' . $room['name'] . ')';?></label>
									<select name="Aktor-<?php echo $aktoren[$i] ?>" id="Aktor-<?php echo $aktoren[$i] ?>" data-role="slider">
										<option value="0">Aus</option>
										<option value="100">An</option>
									</select>
								<?php
							}
							if($devtype['devtypename'] == "Rolladen"){
								?>
									<fieldset data-role="controlgroup" data-type="horizontal">
									<legend><?php echo $row['name'] . ' (' . $room['name'] . ')';?></legend>
										<input type="radio" name="Aktor-<?php echo $aktoren[$i] ?>" id="Aktor-h-<?php echo $aktoren[$i] ?>" value="100">
										<label for="Aktor-h-<?php echo $aktoren[$i] ?>">Hoch</label>
										<input type="radio" name="Aktor-<?php echo $aktoren[$i] ?>" id="Aktor-r-<?php echo $aktoren[$i] ?>" value="0">
										<label for="Aktor-r-<?php echo $aktoren[$i] ?>">Runter</label>
									</fieldset>
								<?php
							}
							?>    					
							</li>
							</li>
						<?php		
						}  	
						if($i == (count($aktoren) -1) ){
						?>
							</ul>
							</div>  

							<br />				 			
						<?php
						}
					}
				}
				
				for($x = 0; $x < count($typDev); $x++) {
					for($i = 0; $i < count($devices); $i++) {
						$sql_devType = query("SELECT id,type FROM devices WHERE id='" . $devices[$i] . "'");
						$devType = fetch($sql_devType);
						
						if($devType['type'] ==  $typDev[$x]){
							$sql_devName = query("SELECT id,name FROM devices WHERE id='" . $devices[$i] . "'");
							$devName = fetch($sql_devName);
							?>
														
							<div id="cont-inner">
								<ul data-role="listview" data-inset="true" data-theme="d">
								<li data-role="list-divider"><?php echo $devName['name']; ?></li>
								<div data-role="fieldcontain">
								<fieldset data-role="controlgroup">
							<?php 
							
							$sql_devMacro = query( "SELECT id,DeviceID,MacroID FROM devicemacro WHERE DeviceID='" . $devices[$i] . "'");					
							while($devMacro = fetch($sql_devMacro)){
								$sql_Macro = query("SELECT id,name FROM tvmacros WHERE id='" . $devMacro['MacroID'] . "'");
								$Macro = fetch($sql_Macro);
								?>
								<input type="checkbox" name="Macros[]" id="<?php echo $devMacro['DeviceID'] ?>-<?php echo $devMacro['MacroID'] ?>" value="<?php echo $devMacro['DeviceID'] ?>-<?php echo $devMacro['MacroID'] ?>" class="custom" />
								<label for="<?php echo $devMacro['DeviceID'] ?>-<?php echo $devMacro['MacroID'] ?>"><?php echo $Macro['name']; ?></label>
								<?php
							}
							
							?>
								</fieldset>
								</div>	
								</ul>
							</div>
							<br/>				 			
							<?php								
						}
					}
				}
				?>
				<input type="hidden" name="groupname" value="<? echo $groupname ?>">
				<?
				for($i = 0; $i < count($devices); $i++) {
					$deviceVal = $deviceVal . $devices[$i] . "," ;
				}
				$deviceVal = substr($deviceVal, 0, -1);
				?>
				<input type="hidden" name="devices" value="<? echo $deviceVal ?>">
				<button type="submit" data-theme="c" name="submit" value="submit-value">Submit</button>
								</fieldset>
				</form>
				</div>
							   							
				<?php

			}

			if($_GET['step'] == "3"){	

				//var_dump($_POST);	
				$aktorenValues = $_POST;
				$macros = $_POST['Macros'];
				//var_dump($macros);
				
				//$GroupID = $_GET['group'];
				
				$delete = array_pop($aktorenValues);
				$delete = array_pop($aktorenValues);
				$delete = array_pop($aktorenValues);
				//var_dump($aktorenValues);	
				//print_r($aktorenValues);

				$sql = query( "INSERT INTO groups VALUES( '', '" . $_POST['groupname'] . "', '')" );
				$groupID = query("SELECT id FROM groups ORDER BY id DESC LIMIT 0,1 "); 
				$row = mysql_fetch_assoc($groupID);
				$GrID = $row['id'];
				//var_dump($row);

				//aktoren	
				foreach($aktorenValues as $key => $value) 
				{
					$key = explode("-", $key);
					if ($key[0] == 'Aktor'){
						$befehl= "INSERT INTO groupaktor VALUES( '', '" . $key[1] . "',
																		 '0', 
																		 '" . $GrID . "',
																		 '" . $value . "',
																		 '',
																		 '')";
						$sql = query( $befehl);	
					}
				} 
				
				$DevCount = count($macros);
				//echo "count: " . $DevCount;
				//geraete
				for($x = 0; $x < count($macros); $x++) {
					$dev = explode("-", $macros[$x]);
					$befehl= "INSERT INTO groupaktor VALUES( '', '',
																	 '" . $dev[0] . "', 
																	 '" . $GrID . "',
																	 '',
																	 '" . $dev[1]  . "',
																	 '')";
					$sql = query( $befehl);	
				}
					
				?>
				<p class="center">Gruppe wurde hinzugefügt</p>
				<?

			}else{		
				?>
				<!-- <div class="boxWhite">
					<p class="center">Gruppe wurde hinzugefügt</p>
				</div>
				-->




																								
				<?php
			}
			//$aktoren = $_POST;	
			//list($hour, $minute) = explode(':', $_POST['time']);
			//$sql = query( "INSERT INTO groups VALUES( '', '" . $_POST['groupname'] . "', '" . $_POST['flipAktiv'] . "')" );
			//var_dump($aktoren);			
			}else{
				?>
				<div id="cont">
					<form action="index.php?page=settings&aktion=addGroup&step=2" method="post" class="ui-body ui-body-c ui-corner-all">
						<fieldset>
							<div data-role="fieldcontain">
								<li data-role="fieldcontain">
									<label for="groupname">Gruppen Name:</label>
									<input data-clear-btn="true" name="groupname" id="groupname" value="" type="text">
								</li>
							
								<div data-role="fieldcontain">
								<fieldset data-role="controlgroup">
								<legend>Aktoren:</legend>
											<?php
											$sql2 = query( "SELECT id,name,type,room FROM aktor");
											$i = 0;					
											while( $row2 = fetch( $sql2 ) )
												{
												$sql = query( "SELECT id,name FROM rooms WHERE id='" . $row2['room'] ."'" );
												$RoomName = fetch($sql);
												$sqldt = query( "SELECT id,devtypename FROM deviceTypes WHERE id = '" . $row2['type']. "'" );
												$devtype = fetch( $sqldt );
												$RowName = $row2['name'] . " (" . $RoomName['name'] . " / " . $devtype['devtypename'] .")";
												?>
														
														<input type="checkbox" name="Aktoren[]" id="Aktor-<?php echo $row2['id'] ?>"  value="<?php echo $row2['id'] ?>" class="custom" />
														<label for="Aktor-<?php echo $row2['id'] ?>"><?php echo $RowName; ?></label>
												<?php
												}
											?>	
											
								</fieldset>
								</div>	

								<div data-role="fieldcontain">
								<fieldset data-role="controlgroup">
								<legend>Geräte:</legend>
											<?php
											$sql2 = query( "SELECT id,name,type,room FROM devices");
											$i = 0;					
											while( $row2 = fetch( $sql2 ) )
												{
												$sql = query( "SELECT id,name FROM rooms WHERE id='" . $row2['room'] ."'" );
												$RoomName = fetch($sql);
												//$sqldt = query( "SELECT id,devtypename FROM deviceTypes WHERE id = '" . $row2['type']. "'" );
												//$devtype = fetch( $sqldt );
												$RowName = $row2['name'] . " (" . $RoomName['name'] . " / " . $row2['type'] .")";
												?>
														
														<input type="checkbox" name="Geraete[]" id="Geraet-<?php echo $row2['id'] ?>"  value="<?php echo $row2['id'] ?>" class="custom" />
														<label for="Geraet-<?php echo $row2['id'] ?>"><?php echo $RowName; ?></label>
												<?php
												}
											?>	
											
								</fieldset>
								</div>
							</div>
							<button type="submit" data-theme="c" name="submit" value="submit-value">Submit</button>
						</fieldset>
					</form>
				</div>
				<?php
			}
			break;	
	
case 'editGroup':

		if( $_POST['submit'] ){
		
			if($_GET['step'] == "2"){
				$groupname = $_POST['groupname'];
				$groupstatus = $_POST['flipAktiv'];
				$aktoren = $_POST['Aktoren'];
				$devices = $_POST['Geraete'];
				
				//var_dump($_POST['Aktoren']);
				//var_dump($_POST['Geraete']);

				$typ = array("schalter","rolladen","dimmer");
				$typDev = array("samsungtv","samsungbluray","onkyoavrec","enigma2"); 
				$typid = array("1","2","3"); 
				$typidDev = array("19","20","21","22"); 
				//$aktoren = array("1","2","3","4");
				$initial = true;
				$lastGroup = false;
				?>
				<div id="cont">
				<form action="index.php?page=settings&aktion=editGroup&group=<? echo $_GET['group'] ?>&step=3" method="post" class="ui-body ui-body-c ui-corner-all">
				<fieldset>	

				<?php
				for($x = 0; $x < count($typ); $x++) {
					for($i = 0; $i < count($aktoren); $i++) { 
						if($i == 0){
							?>
							
							<div id="cont-inner">
								<ul data-role="listview" data-inset="true" data-theme="d">
								<li data-role="list-divider"><?php echo $typ[$x]; ?></li>
								
						<?php 
						} 	 
						$sql = query( "SELECT * FROM aktor WHERE id = '" . $aktoren[$i] . "' AND type = '" . $typid[$x] . "'" );	
						if ( mysql_num_rows($sql) == 0 ) {
							// nichts gefunden
						} else {
							$row = mysql_fetch_assoc($sql);
							$sqlroom = query( "SELECT name FROM rooms WHERE id = '" . $row['room'] . "'" );
							$room = fetch( $sqlroom );
							?>
							<li>
							<?php
							$sqltype = query( "SELECT id,devtype,devtypename FROM deviceTypes WHERE id = '" . $typid[$x] . "'" );
							$devtype = fetch( $sqltype );
							if($devtype['devtypename'] == "Dimmer"){
							?>
								<label for="Aktor-<?php echo $aktoren[$i] ?>"><?php echo $row['name'] . ' (' . $room['name'] . ')';?></label>
								<input name="Aktor-<?php echo $aktoren[$i] ?>" id="Aktor-<?php echo $aktoren[$i] ?>" data-highlight="true" min="0" max="100" value="0" type="range">
							<?php
							}
							if($devtype['devtypename'] == "Schalter"){
							?>
								<label for="Aktor-<?php echo $aktoren[$i] ?>"><?php echo $row['name'] . ' (' . $room['name'] . ')';?></label>
								<select name="Aktor-<?php echo $aktoren[$i] ?>" id="Aktor-<?php echo $aktoren[$i] ?>" data-role="slider">
									<option value="0">Aus</option>
									<option value="100">An</option>
								</select>
							<?php
							}
							if($devtype['devtypename'] == "Rolladen"){
							?>
								<fieldset data-role="controlgroup" data-type="horizontal">
								<legend><?php echo $row['name'] . ' (' . $room['name'] . ')';?></legend>
									<input type="radio" name="Aktor-<?php echo $aktoren[$i] ?>" id="Aktor-h-<?php echo $aktoren[$i] ?>" value="100">
									<label for="Aktor-h-<?php echo $aktoren[$i] ?>">Hoch</label>
									<input type="radio" name="Aktor-<?php echo $aktoren[$i] ?>" id="Aktor-r-<?php echo $aktoren[$i] ?>" value="0">
									<label for="Aktor-r-<?php echo $aktoren[$i] ?>">Runter</label>
								</fieldset>
							<?php
							}
							?>    					
							</li>
							</li>
						<?php		
						}  	
						if($i == (count($aktoren) -1) ){
						?>
							</ul>
							</div>  

							<br />				 			
						<?php
						}
					}
				}
								
				for($x = 0; $x < count($typDev); $x++) {
					for($i = 0; $i < count($devices); $i++) {
						$sql_devType = query("SELECT id,type FROM devices WHERE id='" . $devices[$i] . "'");
						$devType = fetch($sql_devType);
						
						if($devType['type'] ==  $typDev[$x]){
							$sql_devName = query("SELECT id,name FROM devices WHERE id='" . $devices[$i] . "'");
							$devName = fetch($sql_devName);
							?>
														
							<div id="cont-inner">
								<ul data-role="listview" data-inset="true" data-theme="d">
								<li data-role="list-divider"><?php echo $devName['name']; ?></li>
								<div data-role="fieldcontain">
								<fieldset data-role="controlgroup">
							<?php 
							
							$sql_devMacro = query( "SELECT id,DeviceID,MacroID FROM devicemacro WHERE DeviceID='" . $devices[$i] . "'");					
							while($devMacro = fetch($sql_devMacro)){
								$sql_Macro = query("SELECT id,name FROM tvmacros WHERE id='" . $devMacro['MacroID'] . "'");
								$Macro = fetch($sql_Macro);
								?>
								<input type="checkbox" name="Macros[]" id="<?php echo $devMacro['DeviceID'] ?>-<?php echo $devMacro['MacroID'] ?>" value="<?php echo $devMacro['DeviceID'] ?>-<?php echo $devMacro['MacroID'] ?>" class="custom" />
								<label for="<?php echo $devMacro['DeviceID'] ?>-<?php echo $devMacro['MacroID'] ?>"><?php echo $Macro['name']; ?></label>
								<?php
							}
							
							?>
								</fieldset>
								</div>	
								</ul>
							</div>
							<br/>				 			
							<?php								
						}
					}
				}

				?>
				<input type="hidden" name="groupname" value="<? echo $groupname ?>">
				<button type="submit" data-theme="c" name="submit" value="submit-value">Submit</button>
				</fieldset>
				</form>
				</div>
				
				<?php
			}
			
			if($_GET['step'] == "3"){	

				//var_dump($_POST);	
				$aktorenValues = $_POST;
				
				$macros = $_POST['Macros'];
				//var_dump($macros);
				
				$GroupID = $_GET['group'];
				//var_dump($aktorenValues);
				$delete = array_pop($aktorenValues);
				$delete = array_pop($aktorenValues);
				//$delete = array_pop($aktorenValues);
				//var_dump($aktorenValues);	
				//print_r($aktorenValues);
				$befehl = "UPDATE groups Set name = '" . $_POST['groupname'] . "' WHERE id = " . $GroupID; 
				$sql = query($befehl);

				$loeschen = "DELETE FROM groupaktor WHERE groupID = " . $GroupID;
				$sql = mysql_query($loeschen);
				//var_dump($aktorenValues);
				//aktoren	
				foreach($aktorenValues as $key => $value) 
				{
					//var_dump($key);
					$key = explode("-", $key);
					if ($key[0] == 'Aktor'){
						$befehl= "INSERT INTO groupaktor VALUES( '', '" . $key[1] . "',
																		 '0', 
																		 '" . $GroupID . "',
																		 '" . $value . "',
																		 '',
																		 '')";
						$sql = query( $befehl);	
					}
					$key='';
				} 
				
				$DevCount = count($macros);
				//echo "count: " . $DevCount;
				//geraete
				for($x = 0; $x < count($macros); $x++) {
					$dev = explode("-", $macros[$x]);
					$befehl= "INSERT INTO groupaktor VALUES( '', '',
																	 '" . $dev[0] . "', 
																	 '" . $GroupID . "',
																	 '',
																	 '" . $dev[1]  . "',
																	 '')";
					$sql = query( $befehl);	
				}
					
				?>
				<p class="center">Gruppe wurde bearbeitet</p>
				<?
			}
		}
		
		if( $_POST['delete'] ){
			$GroupID = $_GET['group'];
			$loeschen_GroupAktor = "DELETE FROM groupaktor WHERE groupID = " . $GroupID;
			$sql = mysql_query($loeschen_GroupAktor);
			$loeschen_Group = "DELETE FROM groups WHERE id = " . $GroupID;
			$sql = mysql_query($loeschen_Group);
			
			?>
			<p class="center">Gruppe wurde gelöscht</p>
			<?
		}

		if($_GET['group'] && $_GET['step'] == 1){
			?>
			<div id="cont">
				<form action="index.php?page=settings&aktion=editGroup&group=<? echo $_GET['group'] ?>&step=2" method="post" class="ui-body ui-body-c ui-corner-all">
					<fieldset>
						<div data-role="fieldcontain">
						
							<li data-role="fieldcontain">
								<?
								$sql_group = query( "SELECT name FROM groups WHERE id='" . $_GET['group'] ."'" );
								$group = fetch( $sql_group );
								$GroupID = $_GET['group'];
								?>
								<label for="groupname">Gruppen Name:</label>
								<input data-clear-btn="true" name="groupname" id="groupname" value="<? echo $group['name']; ?>" type="text">
							</li>

							<div data-role="fieldcontain">
							<fieldset data-role="controlgroup">
								<legend>Aktoren:</legend>
										<?php
										$sql_aktoren = query( "SELECT id,name,type,room FROM aktor");
										$i = 0;		
										$GroupID = $_GET['group'];									
										while( $aktoren = fetch( $sql_aktoren ) )
											{
											$sql_room = query( "SELECT id,name FROM rooms WHERE id='" . $aktoren['room'] ."'" );
											$room = fetch($sql_room);
											
											$sqldt = query( "SELECT id,devtypename FROM deviceTypes WHERE id = '" . $aktoren['type']. "'" );
											$devtype = fetch( $sqldt );
											$RowName = $aktoren['name'] . " (" . $room['name'] . " / " . $devtype['devtypename'] .")";
											
											$sql_groupaktor = query( "SELECT * FROM groupaktor WHERE groupID='" . $_GET['group'] ."' ORDER BY aktorID ASC" );
											
											while( $groupaktor = fetch( $sql_groupaktor ) ){
												if($groupaktor['aktorID'] == $aktoren['id']){
													$checked = "checked";
												}
											}
											
											?>
													
													<input type="checkbox" name="Aktoren[]" id="Aktor-<?php echo $aktoren['id'] ?>"  <? echo $checked ?> value="<?php echo $aktoren['id'] ?>" class="custom" />
													<label for="Aktor-<?php echo $aktoren['id'] ?>"><?php echo $RowName; ?></label>
											<?php
											$checked = "";
											}
											
										?>	
										
							</fieldset>
							</div>	
						
							<div data-role="fieldcontain">
							<fieldset data-role="controlgroup">
							<legend>Geräte:</legend>
										<?php
										$GroupID = $_GET['group'];	
										$sql2 = query( "SELECT id,name,type,room FROM devices");
										while( $row2 = fetch( $sql2 ) )
										{
											$sql_groupdevice = query( "SELECT deviceID FROM groupaktor WHERE groupID='" . $GroupID ."'" );
											while( $groupdevice = fetch( $sql_groupdevice ) ){
												if($groupdevice['deviceID'] == $row2['id']){
													$checked = "checked";
												}
											}
											
											$sql = query( "SELECT id,name FROM rooms WHERE id='" . $row2['room'] ."'" );
											$RoomName = fetch($sql);
											$RowName = $row2['name'] . " (" . $RoomName['name'] . " / " . $row2['type'] .")";
											?>
													
													<input type="checkbox" name="Geraete[]" id="Geraet-<?php echo $row2['id'] ?>" <? echo $checked ?> value="<?php echo $row2['id'] ?>" class="custom" />
													<label for="Geraet-<?php echo $row2['id'] ?>"><?php echo $RowName; ?></label>
											<?php
											$checked = "";
										}
										?>	
										
							</fieldset>
							</div>
						</div>
						<div class="ui-body ui-body-c">
						<fieldset class="ui-grid-a">
							<div class="ui-block-a"><button type="submit" name="delete" value="Submit" data-theme="d">Delete</button></div>
							<div class="ui-block-c"><button type="submit" name="submit" value="Submit" data-theme="b">Submit</button></div>
						</fieldset>
						</div>
					</fieldset>
				</form>
			</div>
		<?
		}
		if(!isset($_GET["group"])){
			?>
			<div id="cont">
			<ul data-role="listview" data-inset="true" data-theme="d" >
			<li data-role="list-divider">Gruppen bearbeiten</li>	

			<?

			$sql_groups = query( "SELECT id, name, status FROM groups" );

			while( $groups = fetch( $sql_groups ) )
			{
			?>
				<li>
					<a href="index.php?page=settings&aktion=editGroup&group=<? echo $groups['id']; ?>&step=1" ><h2><? echo $groups['name']; ?></h2></a>
				</li>
			<?
			}
			?>
			</ul>
			</div>
			<?
		}	
		break;	
		
case 'sortGroup':

		if( $_POST['submit'] ){
			$GroupID = $_POST['groupid'];
			var_dump($GroupID);
			
			$OrderList = $_POST['GroupOrderList'];
			var_dump($OrderList);
			
			$neworderarray = $_POST['neworder'];
			var_dump($neworderarray);
			//loop through the list of ids and update your db
			foreach($neworderarray as $order=>$id){    
				echo "order:" . $order . "    id:" .$id . "</br>";
			}
				
			?>
			<p class="center">Gruppen sortierung wurde bearbeitet</p>
			<?
		}
		
		if($_GET['group'] && $_GET['step'] == 1){
			?>
			<div id="cont">
				<form action="index.php?page=settings&aktion=sortGroup&group=<? echo $_GET['group'] ?>&step=2" method="post" class="ui-body ui-body-c ui-corner-all" id="GroupSortForm">
					<fieldset>
						<div data-role="fieldcontain">
							<div data-role="content" data-theme="c" id="sortable">
							<?
							$GroupID = $_GET['group'];
							$sql_group = query( "SELECT name FROM groups WHERE id='" . $GroupID . "'");
							$group = fetch($sql_group);
							?>
							<h3>Reihenfolge für Gruppe <? echo $group['name'];?> bearbeiten</h3>
							<ul data-role="listview" data-inset="true" data-theme="d">
								 <!--<li data-role="list-divider">Reihenfolge</li>-->
										<?php
										$sql_eintraege = query( "SELECT id,aktorID,aktorValue,deviceID,macroID FROM groupaktor WHERE groupID='" . $GroupID . "' ORDER BY sortOrder ASC");
										$x=0;
										while( $eintraege = fetch( $sql_eintraege ) )
										{
											$text = '';
											//aktor
											if ($eintraege['aktorID'] != 0){
												$sql_aktor = query( "SELECT name,room,type FROM aktor WHERE id='" . $eintraege['aktorID'] . "'");
												$aktor = fetch($sql_aktor);
												$sql_aktortyp = query( "SELECT devtype FROM deviceTypes WHERE id='" . $aktor['type'] . "'");
												$aktortyp = fetch($sql_aktortyp);
												switch ($aktortyp['devtype']) {
													case 'rolladen':
														$Typ = 'Rolladen';
														if ($eintraege['aktorValue'] == 0){
															$Aktion = 'runter';
														}elseif ($eintraege['aktorValue'] == 100){
															$Aktion = 'hoch';
														}
														break;
													case 'schalter':
														$Typ = 'Schalter';
														if ($eintraege['aktorValue'] == 0){
															$Aktion = 'aus';
														}elseif ($eintraege['aktorValue'] == 100){
															$Aktion = 'an';
														}
														break;
													case 'dimmer':
														$Typ = 'Dimmer';
														if ($eintraege['aktorValue'] == 0){
															$Aktion = 'aus';
														}elseif ($eintraege['aktorValue'] == 100){
															$Aktion = 'an';
														}else{
															$Aktion = ' zu ' . $eintraege['aktorValue'] . '% an';
														}
														break;
													case 'virtuell':
														$Typ = 'Virtuell';
														$Aktion = $eintraege['aktorValue'];
														break;
												}
												
												$sql_room = query( "SELECT name FROM rooms WHERE id='" . $aktor['room'] . "'");
												$room = fetch($sql_room);
												$text = $aktor['name'] . " (" . $room['name'] .") --> " . $Typ . " " . $Aktion; 
											}
											//device
											if ($eintraege['deviceID'] != 0){
												$sql_device = query( "SELECT name,room FROM devices WHERE id='" . $eintraege['deviceID'] . "'");
												$device = fetch($sql_device);
												$sql_macro = query( "SELECT name,value FROM tvmacros WHERE id='" . $eintraege['macroID'] . "'");
												$macro = fetch($sql_macro);
												$sql_room = query( "SELECT name FROM rooms WHERE id='" . $device['room'] . "'");
												$room = fetch($sql_room);
												$text = $device['name'] . " (" . $room['name'] .") --> " . $macro['name'] . " (" . $macro['value'] . ")";
											}
											?>
											 <li id="recordsArray_<?php echo $eintraege['id']; ?>"><?php echo $text ?></li>
											<?php
											$x++;
										}									
										?>	
							</ul>
							</div>
							<!-- sorted table -->
							<div data-role="content" data-theme="c" id="sorted">
								<p>&nbsp;</p>	
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		<?
		}
		if(!isset($_GET["group"])){
			?>
			<div id="cont">
			<ul data-role="listview" data-inset="true" data-theme="d" >
			<li data-role="list-divider">Gruppen Sortierung bearbeiten</li>	

			<?

			$sql_groups = query( "SELECT id, name, status FROM groups" );

			while( $groups = fetch( $sql_groups ) )
			{
			?>
				<li>
					<a href="index.php?page=settings&aktion=sortGroup&group=<? echo $groups['id']; ?>&step=1" ><h2><? echo $groups['name']; ?></h2></a>
				</li>
			<?
			}
			?>
			</ul>
			</div>
			<?
		}	
		break;			
		
	
		default:
		//include('dashboard.php');
		break;	
	}

?>



