<div data-role="page" id="dashboard">


<?
include("header.php");
$RefreshTime = 30000;
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


<script>
setTimeout(function(){
   window.location.reload(1);
}, <? echo $RefreshTime; ?>);

</script>
<div data-role="content" >

<?php

include('functions.php');

?>

<script language="javascript">

var time_left = <? echo $RefreshTime/1000; ?>;
var cinterval;

function time_dec(){
  time_left--;
  document.getElementById('countdown').innerHTML = time_left;
  if(time_left == 0){
    clearInterval(cinterval);
  }
}

cinterval = setInterval('time_dec()', 1000);

</script>

refreshing in <span id="countdown"><? echo $RefreshTime/1000; ?></span> seconds


		<table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive" data-column-btn-theme="b" data-column-btn-text="Columns to display..." data-column-popup-theme="a">
		 <thead>
		   <tr class="ui-bar-d">
			 <th data-priority="1">id</th>
			 <th data-priority="1">date</th>
			 <th data-priority="1">time</th>
			 <th data-priority="1">file</abbr></th>
			 <th data-priority="1">function</th>
			 <th data-priority="1">action</th>
			 <th>description</th>
		   </tr>
		 </thead>
		 <tbody>
	<?
	$sqll = query( "SELECT * FROM log WHERE dt='" . date("Y-m-d") . "' ORDER BY id DESC" );
	while( $log = fetch( $sqll ) )
	{
		?>
		   <tr>
			 <th><? echo $log['id'] ?></th>
			 <th><? echo $log['dt'] ?></th>
			 <th><? echo $log['tm'] ?></th>
			 <th><? echo $log['file'] ?></th>
			 <th><? echo $log['function'] ?></th>
			 <th><? echo $log['action'] ?></th>
			 <th><? echo $log['desc'] ?></th>
		   </tr>
		<?
	}
	?>

		 </tbody>
	   </table>
</div>