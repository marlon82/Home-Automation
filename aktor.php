<?php

include('functions.php');
include('config.php');

if( $_GET['id']){
//$aktor = set_channel( $_GET['kanal']);
$aktor = setAktor($_GET['id'], $_GET['value'],  $_GET['function']);
}
//var jqxhr = $.get('http://192.168.1.22/web/zap?sRef=1:0:1:2EE3:441:1:C00000:0:0:0:', function() {
?>