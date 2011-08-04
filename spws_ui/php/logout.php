<?php
session_start();
session_unset("username");
session_unset("password");
 header( 'Location: login.php' ) ;
?>
