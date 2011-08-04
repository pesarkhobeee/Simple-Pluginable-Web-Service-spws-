<?php
$contents="./plugins";
$direcoty_list = scandir("$contents");
for($i=0;isset($direcoty_list[$i]);$i++)
  if(! is_dir("$contents/$direcoty_list[$i]") || 
       $direcoty_list[$i] == "." || 
       $direcoty_list[$i] == ".." )
    continue;
  else 
    $category_names[]=$direcoty_list[$i]; 
	
	foreach($category_names as $xmlfile){
	$temp="./plugins/$xmlfile/$xmlfile.xml";
	$xml = simplexml_load_file($temp);
	if (count($xml->external) > 0) {
	    foreach ($xml->external as $node) {
		if($_GET["n"]==$node->url){

		   if($node->restricted==1){
			if(isset($_POST['username']) && isset($_POST['password'])){
				require_once("get_internal_func.php");
				$login =get_internal_func("authentication","check_login",array("username"=>$_POST['username'],"password"=>$_POST['password']));
				if($login==false){
					die("authentication faild");
			}

			}else{
				die("username or password dont resived");
}
					}


				include("./plugins/$xmlfile/index.php");
		    		$func= (string)$node->name;
				if(isset($_POST))
					$func($_POST);
				elseif(isset($_FILES))
					$func($_FILES);
				else
					$func();
		}
	    }
	}
}
?>
