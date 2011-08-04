<?php
function get_internal_func($plugin_name,$function_name,$arg){

	$temp="./plugins/$plugin_name/$plugin_name.xml";
	$xml = simplexml_load_file($temp);
	if (count($xml->internal) > 0) {
	    foreach ($xml->internal as $node) {
		if($function_name==$node->name){
			include("./plugins/$plugin_name/index.php");
	    		$func= (string)$node->name;
			if($arg!=null)
				return $func($arg);
			else
				return $func();
						}
						}
	}

}
?>
	
