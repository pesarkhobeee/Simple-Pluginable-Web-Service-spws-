<?php
	function show_mp3_files(){
		$tmp = system("ls uploads/");
		echo($tmp);
	}

	function upload_file($arg){

	
		$target_path = "uploads/";

		$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
		    echo "The file ".basename( $_FILES['uploadedfile']['name']). 
		    " has been uploaded";

			$playlist_address="playlist";
			$tmp=file_get_contents($playlist_address);
			$current = $tmp .system("pwd")."/uploads/".$_FILES['uploadedfile']['name']."\n";
			file_put_contents($playlist_address, $current);

		} else{
		    echo "There was an error uploading the file, please try again!";
		}



	}
?>
