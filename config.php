<?php
/*
 * Created on 19.02.2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
//   Datenbank   //
$db['host'] = 'localhost';
$db['username'] = 'root';
$db['password'] = 'password';
$db['db'] = 'cd_home_automation';

$connect = mysql_connect( $db['host'], $db['username'], $db['password'] );
$select_db = mysql_select_db( $db['db'], $connect );

$db = false;

?>
