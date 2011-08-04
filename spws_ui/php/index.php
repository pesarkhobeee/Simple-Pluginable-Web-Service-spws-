<?php
include("restrict_access_to_page.php");
include("config.php");
?>
<html>
	<head>
		<title>interface for spws</title>
		  <script src="http://code.jquery.com/jquery-latest.js"></script>
	</head>
	
			<script>
			function loadXMLDoc(xsltfile){
				$.get(xsltfile,
				  function(data){
					return data;
				  
				  });
			}
			function displayResult(api,xsltfile)
				{
				xml=fetchxmldata(api);
				xsl=loadXMLDoc(xsltfile);
				// code for IE
				if (window.ActiveXObject)
				  {
				  ex=xml.transformNode(xsl);
				  document.getElementById("example").innerHTML=ex;
				  }
				// code for Mozilla, Firefox, Opera, etc.
				else if (document.implementation && document.implementation.createDocument)
				  {
				  xsltProcessor=new XSLTProcessor();
				  xsltProcessor.importStylesheet(xsl);
				  resultDocument = xsltProcessor.transformToFragment(xml,document);
				  document.getElementById("example").appendChild(resultDocument);
				  }
				}
				
		function fetchxmldata(api){
			$.ajax({
			   type: "POST",
			   url: api,
			   data: "username=<?php echo $_SESSION["username"]; ?>&password=<?php echo $_SESSION["password"]; ?>",
			   success: function(msg){
			    		 return msg;
				
			   }
			 });
		 }
		function fetchdata(api){
			$.ajax({
			   type: "POST",
			   url: api,
			   data: "username=<?php echo $_SESSION["username"]; ?>&password=<?php echo $_SESSION["password"]; ?>",
			   success: function(msg){
			    		 alert( msg );
				
			   }
			 });
		 }
		</script>
<body>

	<input type="button" value="show file" onclick="fetchdata('<?php echo $core_system_url; ?>/api.php?n=show_mp3_files');">
	
	<input type="button" value="show play list" onclick="displayResult('<?php echo $core_system_url; ?>/api.php?n=show_playlist','playlist.xsl');">

	<input type="button" value="empty playlist" onclick="fetchdata('<?php echo $core_system_url; ?>/api.php?n=empty_playlist')">

	<input type="button" value="fetch playlist" onclick="fetchdata('<?php echo $core_system_url; ?>/api.php?n=fetch_playlist');">

	<input type="button" value="log out" onclick="window.location='logout.php'" />

<hr>
<iframe src="upload.php" >

</iframe>
<hr>
<div id="showxml">

</div>
</body>
</html>
