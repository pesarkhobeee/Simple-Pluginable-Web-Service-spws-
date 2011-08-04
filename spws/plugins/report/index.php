<?php
	function show_playlist(){
		include("config.php");
		$data = file($playlist_address);
		$theData='<music>';
		foreach($data as $value) {
		$theData.= "<item><name>$value</name></item>";
		}
		$theData.="</music>";
		header('Content-type: text/xml');
		echo($theData);
		return(0);
	}
	
	function empty_playlist(){  
		include("config.php");
		file_put_contents($playlist_address,"");	
		echo("playlist deleted!");
}

	function fetch_playlist(){ 
		include("config.php");
		$handle = opendir('uploads') ;
		    while (false !== ($file = readdir($handle))) {

			 if( $file == "." || $file == ".." )
    				continue;
  			else 
				file_put_contents($playlist_address, system("pwd")."/uploads/".$file."\n",FILE_APPEND );
				
		    }

		echo("playlist created");

}
?>

