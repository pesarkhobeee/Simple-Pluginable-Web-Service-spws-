<?php
include("restrict_access_to_page.php");
include("config.php");
?>
<html>
<body>

<form action="<?php echo $core_system_url; ?>/api.php?n=upload_file" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="uploadedfile" id="uploadedfile" />
<br />
<input type="submit" name="submit" value="Submit" />
	<input type="hidden" name="username" value="<?php echo $_SESSION["username"]; ?>">
	<input type="hidden" name="password" value="<?php echo $_SESSION["password"]; ?>">
</form>

</body>
</html> 
