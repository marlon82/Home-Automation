<!DOCTYPE html> 
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Home Automation Wizard</title> 
	<link rel="stylesheet" href="../jquery/jquery.mobile-1.3.1.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
	<script src="../jquery/jquery.mobile-1.3.1.js"></script>
	<!-- andere skripte -->
	<script src="../skripte/time.js"></script>
	<script src="../skripte/jquery.ui.touch-punch.min.js"></script>


        <style>

#cont { 
	margin-top: 50px; 
	margin-left: auto;
	margin-right: auto;
	width: 50em;
 

}

        </style>
</head> 

	
<body> 

<div data-role="header" data-position="fixed" data-theme="b"  data-tap-toggle="false">
	<h1>Home Automation Wizard</h1>
</div>

<?php



error_reporting(E_ALL);
if( $_POST['submit'] ){

$file = "../config.php";

if (!$handle = fopen($file, "w")) {
	print "Kann die Datei $file nicht anlegen. Bitte rechte prüfen!";
    exit;
}else{
	fwrite($handle, "<?php\n");
	fwrite($handle, "\$db['host'] =  " ."'" . $_POST['databaseHost'] . "' ;\n");
	fwrite($handle, "\$db['username'] =  " ."'" . $_POST['databaseUser'] . "' ;\n");
	fwrite($handle, "\$db['password'] =  " ."'" . $_POST['databasePassword'] . "' ;\n");
	fwrite($handle, "\$db['db'] =  " ."'" . $_POST['databaseName'] . "' ;\n");
	fwrite($handle, "// Settings for Backup/restore function;\n");
	fwrite($handle, "\$DBhost =  \$db['host'] ;\n");
	fwrite($handle, "\$DBuser =  \$db['username'] ;\n");
	fwrite($handle, "\$DBpass =  \$db['password'] ;\n");
	fwrite($handle, "\$DBName =  \$db['db'] ;\n");
	fwrite($handle, "// MySQL connection;\n");
	fwrite($handle, "\$connect = mysql_connect(\$db['host'], \$db['username'], \$db['password'] );\n");
	fwrite($handle, "\$select_db = mysql_select_db( \$db['db'], \$connect );\n");
	fwrite($handle, "\$db = false;\n");
	fwrite($handle, "?>");
}

fclose($handle);

$link = mysql_connect($_POST['databaseHost'],$_POST['databaseUser'] ,$_POST['databasePassword']);
if (!$link) {
    die('Verbindung fehlgeschlagen: ' . mysql_error());
}

$sql = "CREATE DATABASE " . $_POST['databaseName'] ;
if (mysql_query($sql, $link)) {

    mysql_select_db($_POST['databaseName'],$link);
	$file = 'install.sql';
	if($fp = file_get_contents($file)) {
  		$var_array = explode(';',$fp);
  		foreach($var_array as $value) {
    		mysql_query($value.';',$link);
  		}
	}
	echo "<h3><center>Datenbank \"" . $_POST['databaseName'] . "\" erfolgreich erzeugt</center></h3>\n";
    echo "<center><a href=../index.php rel=\"external\" >Hier gehts weiter...</a></center>"; 
}else{
    echo 'Schemaerzeugung fehlgeschlagen:: ' . mysql_error() . "\n";

}


}else{
?>
<div id="cont">
	<form action="/skripte/install.php?aktion=install" method="post" class="ui-body ui-body-c ui-corner-all">
		<div id="cont-inner">
  			<ul data-role="listview" data-inset="true" data-theme="d">
    			
				
				<ul data-role="listview" data-inset="true">
					<li data-role="list-divider">Create Database</li>
					 <li data-role="fieldcontain">					
							<label for="databaseHost">Host:</label>
     						<input data-clear-btn="true" name="databaseHost" id="databaseHost" value="localhost" type="text">
					</li>
					<li data-role="fieldcontain">			
							<label for="databaseUser">User:</label>
     						<input data-clear-btn="true" name="databaseUser" id="databaseUser" value="root" type="text">
					</li>
					<li data-role="fieldcontain">			
							<label for="databasePassword">Password:</label>
     						<input data-clear-btn="true" name="databasePassword" id="databasePassword" value="dbPassword" type="text">
									
					</li>
					<li data-role="fieldcontain">			
							<label for="databaseName">Datenbank Name:</label>
     						<input data-clear-btn="true" name="databaseName" id="databaseName" value="Homeautomation" type="text">
									
					</li>
					
				</ul>
				 
			</ul>
			<button type="submit" data-theme="c" name="submit" value="submit-value">Submit</button>
		</div> 
	</form>
</div>
<?php
}
?>	






</body>
</html>