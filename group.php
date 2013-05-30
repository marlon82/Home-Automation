<div data-role="page" id="dashboard">

<div data-role="header" data-position="fixed" data-theme="b">
	<a href="index.php?page=dashboard" data-icon="home" rel="external">Home</a>
	<div id="container">
		<li class="hours"></li>
		<li class="point">:</li>
		<li class="min"></li>
		<li class="point">:</li>
		<li class="sec"></li>
	</div>
	<h1>Gruppen</h1>
</div><!-- /header -->

<div data-role="popup" id="positionWindow" class="ui-content" data-theme="d">
	<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
    <p>I am positioned to the window.</p>

</div>

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
   
table{
  border: 0px solid black;
  border-spacing: 0px;
}

table thead tr{
  font-family: Arial, monospace;
  font-size: 14px;
}

table thead tr th{
  border-bottom: 2px solid black;
  border-top: 1px solid black;
  margin: 0px;
  padding: 2px;
  background-color: #cccccc;
}

table tr {
  font-family: arial, monospace;
  color: black;
  font-size:12px;
  background-color: white;
}

table tr.odd {
  background-color: #AAAAAA;
}

table tr td, th{
  border-bottom: 1px solid black;
  padding: 2px;
}
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
<div data-role="content" >

<?php

include('functions.php');
$sql_groups = query( "SELECT id, name, status FROM groups" );

while( $groups = fetch( $sql_groups ) )
{
	$sql_groupaktor = query( "SELECT aktorID,aktorValue FROM groupaktor WHERE groupID='" . $groups['id'] ."'" );
	//$aktor = fetch( $sql1 );
	
	
	?>
	
<div data-role="popup" id="popup-<? echo $groups['id'] ?>" class="ui-content" data-theme="d">
	<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
		<table>
  <tr>
    <td><b>Aktor</b></td>
    <td><b>Raum</b></td>
    <td><b>Value</b></td>
  </tr>
	<?
	while( $groupaktor = fetch( $sql_groupaktor ) ){
		$sql_aktor = query( "SELECT name,room FROM aktor where id='" . $groupaktor['aktorID'] ."'" );
		$aktor = fetch( $sql_aktor );
		
		$sql_raum = query( "SELECT name FROM rooms where id='" . $aktor['room'] ."'" );
		$raum = fetch( $sql_raum );
		//var_dump($raum1);
		if($groupaktor['aktorValue'] > 0){
			$font = "#01DF01";
		}else{
			$font = "#FF0000";
		}
	
		
	?>
    <!-- <p><? echo $aktor1['name']; ?></p> -->
      <tr>
    <td style="padding: 5px"><FONT COLOR="<? echo $font ?>"><? echo $aktor['name']; ?></FONT></td>
    <td style="padding: 5px"><FONT COLOR="<? echo $font ?>"><? echo $raum['name']; ?></FONT></td>
    <td style="padding: 5px"><FONT COLOR="<? echo $font ?>"><? echo $groupaktor['aktorValue']; ?></FONT></td>
  </tr>
	<? } ?>



</table>
</div>




	
	<div style="float: left; border-radius:10px; height:250px; width:32%; margin-left:10px; margin-bottom:12px">
  		<ul data-role="listview" data-inset="true">
			<li data-role="list-divider"><? echo $groups['name']?></li>			
			
			<li><a href="#popup-<? echo $groups['id'] ?>"  data-inline="true" data-rel="popup" data-position-to="window">Aktoren: </a></li> 
			<li><a href="#">Geräte: </a></li> 
			<li>Schalten:</li>

			
		</ul>		
    </div>
	<?
	$Wochentage = "";
}
?>
</div>