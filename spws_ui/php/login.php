<?php

if(isset($_POST["username"])){

include("config.php");


//set POST variables
$url = "$core_system_url/api.php?n=check";
$fields = array(
            'username'=>urlencode($_POST["username"]),
            'password'=>urlencode($_POST["password"]),
        );

//url-ify the data for the POST
$fields_string="";
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string,'&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_POST,count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);

if($result=="false"){
	echo "username or password is invalid";
}else{
	session_start();
	$_SESSION["username"] = $_POST["username"] ;
	$_SESSION["password"] = $_POST["password"] ;
 	header( 'Location: index.php' ) ;
}
}
?>
<!--
        
        Copyright 2011 Farid Ahmadian <pesarkhobeee@gmail.com>
        
        This program is free software; you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation; either version 2 of the License, or
        (at your option) any later version.
        
        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.
        
        You should have received a copy of the GNU General Public License
        along with this program; if not, write to the Free Software
        Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
        MA 02110-1301, USA.
        
        
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>interface for spws</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 0.20" />
</head>

<body>
<form action="" method="post">
	<ul style="list-style-type:none">
		<li>username</li>
		<li><input type="text" name="username" value=""></li>
		<li>password</li>
		<li><input type="password" name="password" value=""></li>
		<li></li>
		<li><input type="submit" value="login"></li>
	</ul>
</form>
</body>

</html>
