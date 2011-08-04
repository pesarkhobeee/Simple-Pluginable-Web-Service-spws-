<?php
	function check($arg){
	   if(isset($arg["username"]) && isset($arg["password"])){
		include("connection.php");
		$result = mysql_query("select *  from users where username='$arg[username]' and password='$arg[password]'", $link)or die(mysql_error());


		if(mysql_num_rows($result)==1)
			echo "true";
		else
			echo "false";

		}	
	}

	function check_login($arg){
	   if(isset($arg["username"]) && isset($arg["password"])){
		include("connection.php");
		$result = mysql_query("select *  from users where username='$arg[username]' and password='$arg[password]'", $link)or die(mysql_error());


		if(mysql_num_rows($result)==1)
			return true;
		else
			return false;

		}	
	}

	function return_user_id($arg){
		if(isset($arg["username"]) && isset($arg["password"])){
				include("connection.php");
				$result = mysql_query("select u_id  from users where username='$arg[username]' and password='$arg[password]'", $link)or die(mysql_error());
				$row = mysql_fetch_array($result);
				return($row[0]);
		}

	}


	function form(){
		echo file_get_contents("plugins/authentication/form.html");
	}
?>
