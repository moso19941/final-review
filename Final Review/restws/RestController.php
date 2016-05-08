<?php
require_once("MobileRestHandler.php");
		
$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];

$output="";
if(isset($_GET["output"]))
	$output = $_GET["output"];
/*
controls the RESTful services
URL mapping
*/
switch($view){

	case "all":
		// to handle REST Url /mobile/list/
		if ($output=='json'){
			$mobileRestHandler = new MobileRestHandler();
			$mobileRestHandler->getAllMobiles($output);
		}else if ($output=='xml'){
			$mobileRestHandler = new MobileRestHandler();
			$mobileRestHandler->getAllMobiles($output);
		}
		else{
			$mobileRestHandler = new MobileRestHandler();
			$mobileRestHandler->getAllMobiles("html");
		}
		
		break;
		
	case "single":
		// to handle REST Url /mobile/show/<id>/
		if ($output=='json'){
			$mobileRestHandler = new MobileRestHandler();
			$mobileRestHandler->getMobile($_GET["id"], $output);
		}else if ($output=='xml'){
			$mobileRestHandler = new MobileRestHandler();
			$mobileRestHandler->getMobile($_GET["id"], $output);
		}
		else{
			$mobileRestHandler = new MobileRestHandler();
			$mobileRestHandler->getMobile($_GET["id"], "html");
		}

		//$mobileRestHandler = new MobileRestHandler();
		//$mobileRestHandler->getMobile($_GET["id"]);
		break;

	case "" :
		//404 - not found;
		break;
}
?>