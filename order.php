<?php
require_once("SimpleCartRESTHandler.php");
		
$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];

switch($view){
	case "all":
		// to handle REST Url SimpleCart/items
		$SimpleCartRestHandler = new SimpleCartRestHandler();
		$SimpleCartRestHandler->getAllItems();
		break;
		
	case "single":
		// to handle REST Url SimpleCart/items/<id>/
		$SimpleCartRestHandler = new SimpleCartRestHandler();
		$SimpleCartRestHandler->getItem($_GET["id"]);
		break;
	case "" :
		//404 - not found;
		break;
}
?>