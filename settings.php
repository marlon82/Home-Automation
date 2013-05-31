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

<div data-role="header" data-position="fixed" data-theme="b">
	<a href="index.php?page=dashboard" data-icon="home" rel="external">Home</a>
		<div id="container">
		<li class="hours"></li>
		<li class="point">:</li>
		<li class="min"></li>
		<li class="point">:</li>
		<li class="sec"></li>
		</div>
	<h1>Settings</h1>
</div><!-- /header -->

<div data-role="panel" id="defaultpanel" data-theme="b">
	<div class="panel-content" data-theme="b">
		<h3>Default panel options</h3>
		<p>This panel has all the default options: positioned on the left with the reveal display mode. The panel markup is <em>before</em> the header, content and footer in the source order.</p>
		<p>To close, click off the panel, swipe left or right, hit the Esc key, or use the button below:</p>
		<a href="#demo-links" data-rel="close" data-role="button" data-theme="c" data-icon="delete" data-inline="true">Close panel</a>
	</div><!-- /content wrapper for padding -->
</div>





<div  data-role="sidebar" id="left-sidebar"> 

	<div style="float: left; border-radius:10px; height:200%; width:90%; margin-left:10px; margin-top:10px; margin-right:10px">
    	<div data-role="collapsible" data-theme="d" data-content-theme="d">
    	<h2>Konfiguration</h2>
    	<ul data-role="listview">
			<li <?php if($_GET['aktion'] == 'editConfig') { ?> class="ui-btn-active" <?php } ?>><a href="?page=settings&aktion=editConfig">bearbeiten</a></li>
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
    	</ul>

	</div> 

</div>
</div>

<?php
//$XS1 = "192.168.1.242";
include('functions.php');

switch( $_GET['aktion'] )
	{
		
		case 'readSensor':
		//include('settings.php');
		
?>        
<div id="cont">
	<div style="float: left; border-radius:10px; height:300px; width:50%; margin-left:10px; margin-top:15px; margin-bottom:12px">
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
	<div style="float: left; border-radius:10px; height:300px; width:50%; margin-left:10px; margin-top:15px; margin-bottom:12px">
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
							
		if( !$row['id'] )
			{
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
			if( $_POST['submitSensor'] )
								{		
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
							
		if( !$row['id'] )
			{
			?>
			<div class="boxWhite"><p>Zuerst einen Raum anlegen!</p></div>			
			<?
		}else{
		?>
		<div id="cont">
			<form action="index.php?page=settings&aktion=addAktor&iid=<?php echo $_GET['iid'] ?>" method="post" class="ui-body ui-body-c ui-corner-all">
				<fieldset>
					<div data-role="fieldcontain">
					
						    <label for="aktorname">Aktor Name:</label>
     						<input data-clear-btn="true" name="aktorname" id="aktorname" value="" type="text">
     						
     						<label for="xs1name">XS1 Name:</label>
     						<input disabled="disabled" name="xs1name" id="xs1name" value= "<?php echo $name; ?>" type="text"> 
     						
     						<label for="verbrauchWatt">Verbrauch (W):</label>
     						<input data-clear-btn="true" name="verbrauchWatt" id="verbrauchWatt" value="" type="text">
     						
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

						
					</div>
					<button type="submit" data-theme="c" name="submit" value="submit-value">Submit</button>
				</fieldset>
			</form>
		</div>
<?php
}
}		
			if( $_POST['submit'] )
								{		
									?>
									<div class="boxWhite">
										<p class="center">Aktor wurde hinzugefügt</p>
									</div>
																									
									<?php	
									$sql = query( "INSERT INTO aktor VALUES( '', '" . $_POST['aktorname'] . "',
																				 '" . $name	. "',
																				 '" . $_POST['room'] . "',
																				 '" . $_POST['typ']  . "',
																				 '" . $_POST['logging'] . "',
																				 '" . $_POST['verbrauch'] . "',
																				 '" . $_GET['iid'] . "',
																				 '0',
																				 '0',
																				 '" . $_POST['verbrauchWatt'] . "')" );						
								}
								
		
		
		break;	
		
		case 'editAktor':
		if(!$_GET['step']){
		?>
		<div id="cont">
		<div style="float: left; border-radius:10px; height:300px; width:50%; margin-left:10px; margin-top:15px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true" data-theme="d">
    		<li data-role="list-divider">Aktoren</li>
    	<?php
		$sql = query( "SELECT id,name,room,type FROM aktor");
																			
									while( $row = fetch( $sql ) )
									{
										$sql1 = query( "SELECT  name FROM rooms WHERE id = '" . $row['room'] . "'" );
										$row1 = fetch( $sql1 );
										$sql2 = query( "SELECT id,device,devtype,devtypename FROM deviceTypes WHERE id = '" . $row['type'] . "'" );
										$devType = fetch( $sql2 );
										?>																						
										<li><a href="?page=settings&aktion=editAktor&step=2&id=<?php echo $row['id']; ?>"><?php echo $row['name'] ?> <span style="float:right;position:absolute;right:40px;"> <? echo "(" . $row1['name'] . " / " . $devType['devtypename'] . ")"; ?></span></a></li>																			
										<?php
									}
									?>
									</ul>
		</div>
   
		<?php
		}
		if($_GET['step'] == 2){
		$sql = query( "SELECT iid, name, iName, room, type, logging, verbrauchWatt, zeitHeute FROM aktor WHERE id = '" . $_GET['id'] . "'" );
		$row = fetch( $sql );
		?>
		<div id="cont">
			<form action="index.php?page=settings&aktion=editAktor&step=3&id=<?php echo $_GET['id'] ?>" method="post" class="ui-body ui-body-c ui-corner-all">
				<fieldset>
					<div data-role="fieldcontain">
					
						    <label for="aktorname">Aktor Name:</label>
     						<input data-clear-btn="true" name="aktorname" id="aktorname" value="<?php echo $row['name']; ?>" type="text">
     						
     						<label for="xs1name">XS1 Name:</label>
     						<input disabled="disabled" name="xs1name" id="xs1name" value= "<?php echo $row['iName']; ?>" type="text"> 
     						
     						<label for="verbrauchWatt">Verbrauch (W):</label>
     						<input data-clear-btn="true" name="verbrauchWatt" id="verbrauchWatt" value="<?php echo $row['verbrauchWatt']; ?>" type="text">
     						
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
			?>
			<div id="cont1">
			<p>Der Aktor wurde geändert</p>
			</div>
			<?php
			$sql = query( "UPDATE aktor SET name = '" . $_POST['aktorname'] . "', room = '" . $_POST['room'] . "', type = '" . $_POST['typ'] . "', verbrauchWatt = '" . $_POST['verbrauchWatt'] . "' WHERE id = '" . $_GET['id'] . "'" );	
			}
		}
									
		//include('dreambox.php');
		break;			
	
	
	
		case 'editSensor':
		if(!$_GET['step']){
		?>
		<div id="cont">
		<div style="float: left; border-radius:10px; height:300px; width:50%; margin-left:10px; margin-top:15px; margin-bottom:12px">
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
					
						    <label for="sensorname">Sensor Name:</label>
     						<input data-clear-btn="true" name="sensorname" id="sensorname" value="<?php echo $row['name']; ?>" type="text">
     						
     						<label for="xs1name">XS1 Name:</label>
     						<input disabled="disabled" name="xs1name" id="xs1name" value= "<?php echo $row['iName']; ?>" type="text"> 
     						
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
									
		//include('dreambox.php');
		break;			
		
		
		case 'editRoom':
		if(!$_GET['step']){
		?>
		<div id="cont">
		<div style="float: left; border-radius:10px; height:300px; width:50%; margin-left:10px; margin-top:15px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true" data-theme="d">
    		<li data-role="list-divider">Räume</li>
    	<?php
		$sql = query( "SELECT id,name,icon FROM rooms");
																			
									while( $row = fetch( $sql ) )
									{
										?>																						
										<li><a href="?page=settings&aktion=editRoom&step=2&id=<?php echo $row['id']; ?>"><img src="<?php echo $row['icon'] ?>" class="ui-li-icon"><?php echo $row['name'] ?> <span style="float:right;position:absolute;right:40px;"> <? echo "(" . $row['name'] . ")"; ?></span></a></li>																			
										<?php
									}
									?>
									</ul>
		</div>
   
		<?php
		}
		if($_GET['step'] == 2){
		$sql = query( "SELECT id, name, icon FROM rooms WHERE id = '" . $_GET['id'] . "'" );
		$row = fetch( $sql );
		?>
		<div id="cont">
			<form action="index.php?page=settings&aktion=editRoom&step=3&id=<?php echo $_GET['id'] ?>" method="post" class="ui-body ui-body-c ui-corner-all">
				<fieldset>
					<div data-role="fieldcontain">
					
						    <label for="roomname">Raum Name:</label>
     						<input data-clear-btn="true" name="roomname" id="roomname" value="<?php echo $row['name']; ?>" type="text">
     						
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
										if($dirArray[$index] == $row['icon']){
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
									
		//include('dreambox.php');
		break;			
	
		
		//EDIT DEVICE
		case 'editDevice':
		if(!$_GET['step']){
		?>
		<div id="cont">
		<div style="float: left; border-radius:10px; height:300px; width:50%; margin-left:10px; margin-top:15px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true" data-theme="d">
    		<li data-role="list-divider">Geräte</li>
    	<?php
		$sql = query( "SELECT id,name,ip,room,type FROM devices");
																			
									while( $row = fetch( $sql ) )
									{
										$sql1 = query( "SELECT  name,icon FROM rooms WHERE id = '" . $row['room'] . "'" );
										$row1 = fetch( $sql1 )
										?>																						
										<li><a href="?page=settings&aktion=editDevice&step=2&id=<?php echo $row['id']; ?>"><?php echo $row['name'] ?> <span style="float:right;position:absolute;right:40px;"> <? echo "(" . $row1['name'] . " / " . $row['type'] . ")"; ?></span></a></li>																			
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
					
						    <label for="devicename">Geräte Name:</label>
     						<input data-clear-btn="true" name="devicename" id="devicename" value="<?php echo $row['name']; ?>" type="text">
     						
     						<label for="verbrauchWatt">Verbrauch (W):</label>
     						<input data-clear-btn="true" name="verbrauchWatt" id="verbrauchWatt" value="<?php echo $row['verbrauchWatt']; ?>" type="text">
     						     						
     						<label for="ip">IP Adresse:</label>
     						<input data-clear-btn="true" name="ip" id="ip" value="<?php echo $row['ip']; ?>" type="text">
     						
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
		<div style="float: left; border-radius:10px; height:300px; width:50%; margin-left:10px; margin-top:15px; margin-bottom:12px">
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
		$sql = query( "SELECT id, name, aktor, time, hour, minute, enabled, value, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday, isGroup, suninfo FROM timer WHERE id = '" . $_GET['id'] . "'" );
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
			$sql = query( "UPDATE timer SET name = '" . $_POST['timername'] . "', aktor = '" . $typeID . "', value = '" . $_POST['slider-value'] . "', time = '" . $_POST['time'] . "', enabled = '" . $_POST['flipAktiv'] . "' , hour = '" . $hour . "' , minute = '" . $minute . "', Monday = '" . $_POST['checkbox-h-Montag'] . "', Tuesday = '" . $_POST['checkbox-h-Dienstag'] . "', Wednesday = '" . $_POST['checkbox-h-Mittwoch'] . "', Thursday = '" . $_POST['checkbox-h-Donnerstag'] . "', Friday = '" . $_POST['checkbox-h-Freitag'] . "', Saturday = '" . $_POST['checkbox-h-Samstag'] . "', Sunday = '" . $_POST['checkbox-h-Sonntag'] . "', isGroup = '" . $isGroup . "', suninfo = '" . $_POST['suninfo'] ."' WHERE id = '" . $id . "'" );
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
		$sql1 = query( "INSERT INTO config VALUES( '', 'DreamBoxavail', '" . $_POST['flipDreamBox'] . "')");
		$sql1 = query( "INSERT INTO config VALUES( '', 'DreamBoxIP', '" . $_POST['DreamBoxIP'] . "')");
		$sql1 = query( "INSERT INTO config VALUES( '', 'Multimedia', '" . $_POST['flipMultimedia'] . "')");
		$sql1 = query( "INSERT INTO config VALUES( '', 'SamsungIP', '" . $_POST['SamsungIP'] . "')");
		$sql1 = query( "INSERT INTO config VALUES( '', 'WetterWidget', '" . str_replace("'","\"",$_POST['WetterWidget']) . "')");
		$sql1 = query( "INSERT INTO config VALUES( '', 'TimerFooter', '" . $_POST['flipTimerFooter'] . "')");
		$sql1 = query( "INSERT INTO config VALUES( '', 'RaspberryFooter', '" . $_POST['flipRaspberryFooter'] . "')");
		$sql1 = query( "INSERT INTO config VALUES( '', 'GroupFooter', '" . $_POST['flipGroupFooter'] . "')");
		$sql1 = query( "INSERT INTO config VALUES( '', 'TimeZone', '" . $_POST['Timezone'] . "')");
		
		}else{		
		?>
		<div id="cont">
			<form action="index.php?page=settings&aktion=editConfig" method="post" class="ui-body ui-body-c ui-corner-all">
				<ul data-role="listview" data-inset="true">
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
					 <li data-role="fieldcontain">
							<?
							$sql = query( "SELECT value FROM config WHERE options='DreamBoxavail'");
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
							<label for="flipDreamBox">DreamBox available:</label>
							<select name="flipDreamBox" id="flipDreamBox" data-role="slider">
								<option value="No" <? echo $ValueNo; ?>>No</option>
								<option value="Yes" <? echo $ValueYes; ?>>Yes</option>
							</select>	
							
					</li>
					 <li data-role="fieldcontain">
							<?
							$sql = query( "SELECT value FROM config WHERE options='DreamBoxIP'");
							$config = fetch( $sql);
							?>
							<label for="DreamBoxIP">DreamBox IP:</label>
     						<input data-clear-btn="true" name="DreamBoxIP" id="DreamBoxIP" value="<? echo $config['value']; ?>" type="text">							
					</li>
					<li data-role="fieldcontain">
							<?
							$sql = query( "SELECT value FROM config WHERE options='Multimedia'");
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
							<label for="flipMultimedia">Multimedia:</label>
							<select name="flipMultimedia" id="flipMultimedia" data-role="slider">
								<option value="No" <? echo $ValueNo; ?>>No</option>
								<option value="Yes" <? echo $ValueYes; ?>>Yes</option>
							</select>							
					</li>
					
					 <li data-role="fieldcontain">								
									
							<?
							$sql = query( "SELECT value FROM config WHERE options='SamsungIP'");
							$config = fetch( $sql);
							?>					
							<label for="SamsungIP">Samsung IP:</label>
     						<input data-clear-btn="true" name="SamsungIP" id="SamsungIP" value="<? echo $config['value']; ?>" type="text">
							
								
					</li>
					<li data-role="fieldcontain">
							<?
							$sql = query( "SELECT value FROM config WHERE options='TimerFooter'");
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
							<label for="flipTimerFooter">Timer in footer:</label>
							<select name="flipTimerFooter" id="flipTimerFooter" data-role="slider">
								<option value="No" <? echo $ValueNo; ?>>No</option>
								<option value="Yes" <? echo $ValueYes; ?>>Yes</option>
							</select>							
					</li>
					<li data-role="fieldcontain">
							<?
							$sql = query( "SELECT value FROM config WHERE options='RaspberryFooter'");
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
							<label for="flipRaspberryFooter">RaspberryPi in footer:</label>
							<select name="flipRaspberryFooter" id="flipRaspberryFooter" data-role="slider">
								<option value="No" <? echo $ValueNo; ?>>No</option>
								<option value="Yes" <? echo $ValueYes; ?>>Yes</option>
							</select>							
					</li>
					<li data-role="fieldcontain">
							<?
							$sql = query( "SELECT value FROM config WHERE options='GroupFooter'");
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
							<label for="flipGroupFooter">Gruppen in footer:</label>
							<select name="flipGroupFooter" id="flipGroupFooter" data-role="slider">
								<option value="No" <? echo $ValueNo; ?>>No</option>
								<option value="Yes" <? echo $ValueYes; ?>>Yes</option>
							</select>	
							
					</li>
					<li data-role="fieldcontain">
							<label for="Timezone" class="select">Timezone:</label>
							<select name="Timezone" id="Timezone" data-native-menu="false">
    							<option>Timezone:</option>
    							<?php
								$timezone_identifiers = DateTimeZone::listIdentifiers('128');				
								for ($i=0; $i < 10; $i++) {
									?>
    									<option value="<?php echo $timezone_identifiers[$i] ?>"><?php echo $timezone_identifiers[$i] ?></option>
    								<?php
    							}
																	
    							?>

							</select>
					
					</li>
					<li data-role="fieldcontain">		
							<?
							$sql = query( "SELECT value FROM config WHERE options='WetterWidget'");
							$config = fetch( $sql);
							?>
							<label for="WetterWidget">Wetter Widget URL:</label>
     						<input data-clear-btn="true" name="WetterWidget" id="WetterWidget" value="<? echo str_replace("\"","'",$config['value']); ?>" type="text">
							
					
					</li>
					 <li data-role="fieldcontain">								
									
							<?
							$sql = query( "SELECT value FROM config WHERE options='TelevisionIP'");
							$config = fetch( $sql);
							?>
							<label for="TelevisionIP">Television IP:</label>
     						<input data-clear-btn="true" name="TelevisionIP" id="TelevisionIP" value="<? echo $config['value']; ?>" type="text">
								
					</li>
				</ul>
				<button type="submit" data-theme="c" name="submit" value="submit-value">Submit</button>
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
    							$sql2 = query( "SELECT device,devtype,devtypename FROM deviceTypes");					
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
		?>
		<div class="boxWhite">
			<p class="center">Timer wurde hinzugefügt</p>
		</div>
																									
		<?php	
		list($hour, $minute) = explode(':', $_POST['time']);
		list($type, $typeID) = explode('.', $_POST['aktor']);
		if ($type == 'group' ) {
			$isGroup = 'Yes';
		}				
		$sql = query( "INSERT INTO timer VALUES( '', '" . $_POST['timername'] . "',
													 '" . $typeID  . "',
													 '" . $_POST['slider-value']  . "',
													 '" . $_POST['time'] . "',
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
													 '" . $_POST['suninfo'] . "')" );			
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
			
			//var_dump($_POST['Aktoren']);
			
$typ = array("schalter","rolladen","dimmer"); 
$typid = array("1","2","3"); 
//$aktoren = array("1","2","3","4");
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
		
		$sql = query( "SELECT name FROM aktor WHERE id = '" . $aktoren[$i] . "' AND type = '" . $typid[$x] . "'" );	
		if ( mysql_num_rows($sql) == 0 ) {
  			// nichts gefunden
		} else {
  			$row = mysql_fetch_assoc($sql);
  			?>
    		<li>
    		<?php
			$sqltype = query( "SELECT id,devtype,devtypename FROM deviceTypes WHERE id = '" . $typid[$x] . "'" );
			$devtype = fetch( $sqltype );
    		if($devtype['devtypename'] == "Dimmer"){
    		?>
    			<label for="Aktor-<?php echo $aktoren[$i] ?>"><?php echo $row['name'] ?></label>
    			<input name="Aktor-<?php echo $aktoren[$i] ?>" id="Aktor-<?php echo $aktoren[$i] ?>" data-highlight="true" min="0" max="100" step="5" value="0" type="range">
    		<?php
    		}
    		if($devtype['devtypename'] == "Schalter"){
    		?>
    			<label for="Aktor-<?php echo $aktoren[$i] ?>"><?php echo $row['name'] ?></label>
    			<select name="Aktor-<?php echo $aktoren[$i] ?>" id="Aktor-<?php echo $aktoren[$i] ?>" data-role="slider">
        			<option value="0">Aus</option>
        			<option value="100">An</option>
    			</select>
    		<?php
    		}
    		if($devtype['devtypename'] == "Rolladen"){
    		?>
    			<fieldset data-role="controlgroup" data-type="horizontal">
				<legend><?php echo $row['name'] ?></legend>
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
?>
<input type="hidden" name="groupname" value="<? echo $groupname ?>">
<input type="hidden" name="groupstatus" value="<? echo $groupstatus ?>">
<button type="submit" data-theme="c" name="submit" value="submit-value">Submit</button>
				</fieldset>
</form>
</div>
			   
     			




			
<?php

   			
     			
}

if($_GET['step'] == "3"){	

//var_dump($_POST);	
$aktorenValues = $_POST;

$delete = array_pop($aktorenValues);
$delete = array_pop($aktorenValues);
$delete = array_pop($aktorenValues);
//var_dump($aktorenValues);	
//print_r($aktorenValues);

$sql = query( "INSERT INTO groups VALUES( '', '" . $_POST['groupname'] . "', '" . $_POST['groupstatus'] . "')" );
$groupID = query("SELECT id FROM groups ORDER BY id DESC LIMIT 0,1 "); 
$row = mysql_fetch_assoc($groupID);
//var_dump($row);

foreach($aktorenValues as $key => $value) 
{
	$key = explode("-", $key);
	//echo $key[1] . " => " . $value . "<br />";
	$befehl= "INSERT INTO groupaktor VALUES( '', '" . $key[1] . "',
													 '0', 
													 '" . $row['id'] . "',
													 '" . $value . "')";
													 
	$sql = query( $befehl);	
	//echo $befehl . "<br />";	
} 
	
?>
<p class="center">Gruppe wurde hinzugefügt</p>
<?


/*$sql = query( "INSERT INTO groupaktor VALUES( '', '" . $_POST['devicename'] . "',
													 '" . $_POST['room'] . "',
													 '0',
													 '" . $_POST['ip']  . "',
													 '" . $_POST['typ']  . "',
													 '" . $_POST['logging'] . "',
													 '" . $_POST['verbrauch'] . "',
													 '0',
													 '0',
													 '0',
													 '" . $_POST['verbrauchWatt'] . "')" );		*/		
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


				

					<li data-role="fieldcontain">	
						<label for="flipAktiv">Gruppe enabled:</label>
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
	
case 'editGroup':

		if( $_POST['submit'] ){
		
			if($_GET['step'] == "2"){
			$groupname = $_POST['groupname'];
			$groupstatus = $_POST['flipAktiv'];
			$aktoren = $_POST['Aktoren'];
			
			//var_dump($_POST['Aktoren']);

$typ = array("schalter","rolladen","dimmer"); 
$typid = array("1","2","3"); 
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
		$sql = query( "SELECT name FROM aktor WHERE id = '" . $aktoren[$i] . "' AND type = '" . $typid[$x] . "'" );	
		if ( mysql_num_rows($sql) == 0 ) {
  			// nichts gefunden
		} else {
  			$row = mysql_fetch_assoc($sql);
  			?>
    		<li>
    		<?php
			$sqltype = query( "SELECT id,devtype,devtypename FROM deviceTypes WHERE id = '" . $typid[$x] . "'" );
			$devtype = fetch( $sqltype );
    		if($devtype['devtypename'] == "Dimmer"){
    		?>
    			<label for="Aktor-<?php echo $aktoren[$i] ?>"><?php echo $row['name'] ?></label>
    			<input name="Aktor-<?php echo $aktoren[$i] ?>" id="Aktor-<?php echo $aktoren[$i] ?>" data-highlight="true" min="0" max="100" value="0" type="range">
    		<?php
    		}
    		if($devtype['devtypename'] == "Schalter"){
    		?>
    			<label for="Aktor-<?php echo $aktoren[$i] ?>"><?php echo $row['name'] ?></label>
    			<select name="Aktor-<?php echo $aktoren[$i] ?>" id="Aktor-<?php echo $aktoren[$i] ?>" data-role="slider">
        			<option value="0">Aus</option>
        			<option value="100">An</option>
    			</select>
    		<?php
    		}
    		if($devtype['devtypename'] == "Rolladen"){
    		?>
    			<fieldset data-role="controlgroup" data-type="horizontal">
				<legend><?php echo $row['name'] ?></legend>
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
?>
<input type="hidden" name="groupname" value="<? echo $groupname ?>">
<input type="hidden" name="groupstatus" value="<? echo $groupstatus ?>">
<button type="submit" data-theme="c" name="submit" value="submit-value">Submit</button>
				</fieldset>
</form>
</div>
			   
     			




			
<?php

   			
     			
}


if($_GET['step'] == "3"){	

//var_dump($_POST);	
$aktorenValues = $_POST;

$delete = array_pop($aktorenValues);
$delete = array_pop($aktorenValues);
$delete = array_pop($aktorenValues);
//var_dump($aktorenValues);	
//print_r($aktorenValues);
$befehl = "UPDATE groups Set name = '" . $_POST['groupname'] . "' WHERE id = " . $_GET['group']; 
$sql = query($befehl);

$loeschen = "DELETE FROM groupaktor WHERE groupID = " . $_GET['group'];
$sql = mysql_query($loeschen);

//$groupID = query("SELECT id FROM groups ORDER BY id DESC LIMIT 0,1 "); 
//$row = mysql_fetch_assoc($groupID);
//var_dump($row);

foreach($aktorenValues as $key => $value) 
{
	$key = explode("-", $key);
	//echo $key[1] . " => " . $value . "<br />";
	$befehl= "INSERT INTO groupaktor VALUES( '', '" . $key[1] . "',
													 '0', 
													 '" . $_GET['group'] . "',
													 '" . $value . "')";
													 
	$sql = query( $befehl);	
	//echo $befehl . "<br />";	
} 
	
?>
<p class="center">Gruppe wurde bearbeitet</p>
<?


/*$sql = query( "INSERT INTO groupaktor VALUES( '', '" . $_POST['devicename'] . "',
													 '" . $_POST['room'] . "',
													 '0',
													 '" . $_POST['ip']  . "',
													 '" . $_POST['typ']  . "',
													 '" . $_POST['logging'] . "',
													 '" . $_POST['verbrauch'] . "',
													 '0',
													 '0',
													 '0',
													 '" . $_POST['verbrauchWatt'] . "')" );		*/		
			}
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
						$group = fetch( $sql_group )
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
								while( $aktoren = fetch( $sql_aktoren ) )
									{
									$sql_room = query( "SELECT id,name FROM rooms WHERE id='" . $aktoren['room'] ."'" );
									$room = fetch($sql_room);
									
									$sqldt = query( "SELECT id,devtypename FROM deviceTypes WHERE id = '" . $aktoren['type']. "'" );
									$devtype = fetch( $sqldt );
									$RowName = $aktoren['name'] . " (" . $room['name'] . " / " . $devtype['devtypename'] .")";
									
									$sql_groupaktor = query( "SELECT * FROM groupaktor WHERE groupID='" . $_GET['group'] ."' ORDER BY aktorID ASC" );
									
									//$groupaktor = fetch( $sql_groupaktor );
									while( $groupaktor = fetch( $sql_groupaktor ) ){
										//echo "Gruppe Aktor ID: " . $groupaktor['aktorID']. "<br/>";
										//echo "aktor ID: " . $aktoren['id']. "<br/>";
										if($groupaktor['aktorID'] == $aktoren['id']){
											//echo "checeddkojg<br/>";
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


				

					<li data-role="fieldcontain">	
						<label for="flipAktiv">Gruppe enabled:</label>
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
<?
}
if(!isset($_GET["group"])){
?>
<div id="cont">
<ul data-role="listview" data-split-icon="gear" data-split-theme="d" data-inset="true">
<li data-role="list-divider">Gruppen bearbeiten</li>	

<?

$sql_groups = query( "SELECT id, name, status FROM groups" );

while( $groups = fetch( $sql_groups ) )
{
?>
    <li><a href="#">		        
        <h2><? echo $groups['name']; ?></h2>
        </a>
        <a href="index.php?page=settings&aktion=editGroup&group=<? echo $groups['id']; ?>&step=1" >bearbeiten</a>
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



