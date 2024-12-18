<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
$hostName	= "localhost";
$userName	= "root";
$passWord	= "";
$database	= "survey";

$masuk = mysql_connect($hostName,$userName,$passWord) or die('Connection Failed');
$hore = mysql_select_db($database) or die('Database Failed');
?>