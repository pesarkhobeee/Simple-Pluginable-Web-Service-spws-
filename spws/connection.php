<?php
$host="localhost";
$username="username";
$password="password";
$database="spws";

$link= mysql_connect($host,$username,$password)or die(mysql_error());
mysql_select_db($database, $link)or die(mysql_error());

?>
