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
    							$sql2 = query( "SELECT device,devtype,devtypename FROM deviceTypes");					
								while( $row2 = fetch( $sql2 ) )
									{
									if( $row2['device'] == 'aktor'){
									?>
											<option value="<?php echo $row2['devtype'] ?>"><?php echo $row2['devtypename'] ?></option>
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
										$row1 = fetch( $sql1 )
										?>																						
										<li><a href="?page=settings&aktion=editAktor&step=2&id=<?php echo $row['id']; ?>"><?php echo $row['name'] ?> <span style="float:right;position:absolute;right:40px;"> <? echo "(" . $row1['name'] . " / " . $row['type'] . ")"; ?></span></a></li>																			
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
    							$sql2 = query( "SELECT device,devtype,devtypename FROM deviceTypes");	
								$devtypeID = $row['type'];
								while( $row2 = fetch( $sql2 ) )
									{
										if($row2['device'] == 'aktor'){
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
										<li><a href="?page=settings&aktion=editRoom&step=2&id=<?php echo $row['id']; ?>"><?php echo $row['name'] ?> <span style="float:right;position:absolute;right:40px;"> <? echo "(" . $row['name'] . ")"; ?></span></a></li>																			
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
			$sql = query( "UPDATE rooms SET name = '" . $_POST['roomname'] . "' WHERE id = '" . $_GET['id'] . "'" );	
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
										$sql1 = query( "SELECT  name FROM rooms WHERE id = '" . $row['room'] . "'" );
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
		$sql = query( "SELECT id,name,enabled,aktor,time FROM timer");
															
			while( $row = fetch( $sql ) )
			{
				$sql1 = query( "SELECT  name,type FROM aktor WHERE id = '" . $row['aktor'] . "'" );
				$row1 = fetch( $sql1 )
				?>																						
				<li><a href="?page=settings&aktion=editTimer&step=2&id=<?php echo $row['id']; ?>"><?php echo $row['name'] ?> <span style="float:right;position:absolute;right:40px;"> <? echo "(enabled=" . $row['enabled'] . " / " . $row['time'] . " / " . $row1['name'] . " / " . $row1['type'] . ")"; ?></span></a></li>																			
				<?php
			}
			?>
			</ul>
		</div>
   
		<?php
		}
		if($_GET['step'] == 2){
		$sql = query( "SELECT id, name, aktor, time, hour, minute, enabled, value FROM timer WHERE id = '" . $_GET['id'] . "'" );
		$row = fetch( $sql );
		?>
		<div id="cont">
			<form action="index.php?page=settings&aktion=editTimer&step=3&id=<?php echo $_GET['id'] ?>" method="post" class="ui-body ui-body-c ui-corner-all">
				<fieldset>
					<div data-role="fieldcontain">
					
						    <label for="timername">Timer Name:</label>
     						<input data-clear-btn="true" name="timername" id="timername" value="<?php echo $row['name']; ?>" type="text">
     						
     						<label for="aktor" class="select">Aktor:</label>
							<select name="aktor" id="aktor" data-native-menu="false">
    							<option>Aktor:</option>
    							<?php
    							$sql2 = query( "SELECT id,name FROM aktor");	
								$aktorID = $row['aktor'];
								while( $row2 = fetch( $sql2 ) )
									{
										if($aktorID == $row2['id']){
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
							
							<label for="slider-value">Value:</label>
							<input name="slider-value" id="slider-value" data-highlight="true" min="0" max="100" value="<?php echo $row['value'] ?>" type="range">		
												
							<label for="time">Time:</label>
							<input data-clear-btn="true" name="time" id="time" value="<?php echo $row['time'] ?>" type="time">
							

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
							<select name="flipAktiv" id="flip2" data-role="slider">
								<option value="No" <?php echo $ValueNo; ?>>No</option>
								<option value="Yes" <?php echo $Valueyes; ?>>Yes</option>
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
			<p>Der Timer wurde gelöscht</p>
			</div>
			<?php
			$sql = query( "DELETE FROM timer WHERE id = '" . $_GET['id'] . "'" );	
			}
			if( $_POST['submit'] ){
			$id = $_GET['id'];
			list($hour, $minute) = explode(':', $_POST['time']);
			$sql = query( "UPDATE timer SET name = '" . $_POST['devicename'] . "', aktor = '" . $_POST['aktor'] . "', value = '" . $_POST['slider-value'] . "', time = '" . $_POST['time'] . "', enabled = '" . $_POST['flipAktiv'] . "' , hour = '" . $hour . "' , minute = '" . $minute . "' WHERE id = '" . $id . "'" );
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
		$sql = query( "INSERT INTO rooms VALUES( '', '" . $_POST['raumname'] . "', '" . $_POST['raumname'] . "')" );
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
							
							<?
							$sql = query( "SELECT value FROM config WHERE options='XS1User'");
							$config = fetch( $sql);
							?>
							<label for="XS1User">XS1 Username:</label>
     						<input data-clear-btn="true" name="XS1User" id="XS1User" value="<? echo $config['value']; ?>" type="text">
							
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
							<label>DreamBox available:</label>
							<select name="flipDreamBox" id="flip2" data-role="slider">
								<option value="No" <? echo $ValueNo; ?>>No</option>
								<option value="Yes" <? echo $ValueYes; ?>>Yes</option>
							</select>	
							
							<?
							$sql = query( "SELECT value FROM config WHERE options='DreamBoxIP'");
							$config = fetch( $sql);
							?>
					</li>
					 <li data-role="fieldcontain">
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
							<select name="flipMultimedia" id="flip2" data-role="slider">
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
					
						<label for="devicename">Geräte Name:</label>
     					<input data-clear-btn="true" name="devicename" id="devicename" value="" type="text">
							
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
								
						
						
     					<label for="verbrauchWatt">Verbrauch (W):</label>
     					<input data-clear-btn="true" name="verbrauchWatt" id="verbrauchWatt" value="" type="text">
												
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
		$sql = query( "INSERT INTO timer VALUES( '', '" . $_POST['timername'] . "',
													 '" . $_POST['aktor']  . "',
													 '" . $_POST['slider-value']  . "',
													 '" . $_POST['time'] . "',
													 '" . $hour . "',
													 '" . $minute . "',	
													 '" . $_POST['flipAktiv'] . "')" );		
		}else{
		?>
		<div id="cont">
			<form action="index.php?page=settings&aktion=addTimer" method="post" class="ui-body ui-body-c ui-corner-all">
				<fieldset>
					<div data-role="fieldcontain">
					
						<label for="timername">Timer Name:</label>
     					<input data-clear-btn="true" name="timername" id="timername" value="" type="text">
							
						<label for="aktor" class="select">Aktor:</label>
						<select name="aktor" id="typ" data-native-menu="false">
    						<option>Aktor:</option>
								<?php
    							$sql2 = query( "SELECT id,name,type,room FROM aktor");					
								while( $row2 = fetch( $sql2 ) )
									{
									$sql = query( "SELECT id,name FROM rooms WHERE id='" . $row2['room'] ."'" );
									$RoomName = fetch($sql);
									$RowName = $row2['name'] . " (" . $RoomName['name'] . " / " . $row2['type'] .")";
									?>
											<option value="<?php echo $row2['id'] ?>"><?php echo $RowName; ?></option>
    								<?php
    								}
    							?>	
    							
						</select>
						
						<label for="slider-value">Value:</label>
						<input name="slider-value" id="slider-value" data-highlight="true" min="0" max="100" value="0" type="range">		
												
     					<label for="time">Time:</label>
     					<input data-clear-btn="true" name="time" id="time" value="" type="time">
										
						<label for="flipAktiv">Timer enabled:</label>
						<select name="flipAktiv" id="flip2" data-role="slider">
							<option value="No">No</option>
							<option value="Yes" selected="selected">Yes</option>
						</select>	
						
					</div>
					<button type="submit" data-theme="c" name="submit" value="submit-value">Submit</button>
				</fieldset>
			</form>
		</div>
		<?php
		}
		break;
	
	
		default:
		//include('dashboard.php');
		break;	
	}

?>



