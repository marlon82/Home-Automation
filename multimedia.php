<div data-role="page" id="dashboard">

<div data-role="header" data-position="fixed" data-theme="b">
	<a href="#dashboard" data-icon="home">Home</a>
	<h1>Multimedia</h1>
</div><!-- /header -->

<div data-role="panel" id="defaultpanel" data-theme="b">
	<div class="panel-content" data-theme="b">
		<h3>Default panel options</h3>
		<p>This panel has all the default options: positioned on the left with the reveal display mode. The panel markup is <em>before</em> the header, content and footer in the source order.</p>
		<p>To close, click off the panel, swipe left or right, hit the Esc key, or use the button below:</p>
		<a href="#demo-links" data-rel="close" data-role="button" data-theme="c" data-icon="delete" data-inline="true">Close panel</a>
	</div><!-- /content wrapper for padding -->
</div>


<style type="text/css">


 div.samsung {
  margin-top:15px;
  margin-left:15px;
  border-width:1px;
  border-style:solid;
  border-color:blue;
  
  float:left;
  width:32%;
  height:500px;
}

div.samsung img{
margin-top:10px;
float:left;
}

div.samsung table{
margin-top:10px;
margin-right:10px;
margin-bottom:80px;
float:right;
}
</style>



<?php

include('functions.php');
?>

<div class="samsung">
<img width="200" height="120" src="samsung.png" alt="samsung">

<table border="1">
  <tr>
    <td>Status:</td>
    <td>
        	<select name="flip-<?php echo $row['iid'] ?>" id="flip-<?php echo $row['iid'] ?>" data-role="slider">
        	<option value="off" <? if($value == 0){ echo "selected=\"selected\"";}; ?>>Aus</option>
        	<option value="on" <? if($value > 1){ echo "selected=\"selected\"";}; ?>>An</option>
    	</select>
    </td>
  </tr>
  <tr>
    <td>IP:</td>
    <td>192.168.1.135</td>
  </tr>
  <tr>
    <td>Aktiv heute:</td>
    <td>2h 45min</td>
  </tr>
  <tr>
    <td>Verbrauch/Kosten heute:    </td>
    <td>0.98kw - 2,54€</td>
  </tr>
</table>
    <label for="volume">Volume:</label>
    <input name="volume" id="volume" data-highlight="true" min="0" max="100" value="" type="range">

</div>
        
<div class="samsung">
<img width="200" height="120" src="dream.jpg" alt="samsung">

<table border="0">
  <tr>
    <td>Status:</td>
    <td>
        	<select name="flip-<?php echo $row['iid'] ?>" id="flip-<?php echo $row['iid'] ?>" data-role="slider">
        	<option value="off" <? if($value == 0){ echo "selected=\"selected\"";}; ?>>Aus</option>
        	<option value="on" <? if($value > 1){ echo "selected=\"selected\"";}; ?>>An</option>
    	</select>
    </td>
  </tr>
  <tr>
    <td>IP:</td>
    <td>192.168.1.135</td>
  </tr>
  <tr>
    <td>Aktiv heute:</td>
    <td>2h 45min</td>
  </tr>
  <tr>
    <td>Verbrauch/Kosten heute:    </td>
    <td>0.98kw - 2,54€</td>
  </tr>
</table>


</div>

<div class="samsung">
<img width="200" height="120" src="samsung.png" alt="samsung">

<table border="0">
  <tr>
    <td>Status:</td>
    <td>Online</td>
  </tr>
  <tr>
    <td>IP:</td>
    <td>192.168.1.135</td>
  </tr>
  <tr>
    <td>Aktiv heute:</td>
    <td>2h 45min</td>
  </tr>
  <tr>
    <td>Verbrauch/Kosten heute:    </td>
    <td>0.98kw - 2,54€</td>
  </tr>
</table>


</div>

