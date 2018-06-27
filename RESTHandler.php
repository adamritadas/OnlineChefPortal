<?php

require "OrderCartRESTHandler.php";



$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));


switch ($method) {
    case 'GET':

	$view = $request[0];


	switch ($view) {

	case "orders":
		// to handle REST Url OrderCart/orders
		$OrderCartRESTHandler = new OrderCartRESTHandler();
		$OrderCartRESTHandler->getAllOrder();
		break;
	case "order":
		// to handle REST Url OrderCart/order/<id>
		$OrderCartRESTHandler = new OrderCartRESTHandler();
		$OrderCartRESTHandler->getOrder($request[1]);
		break;
	case "items":
		// to handle REST Url OrderCart/items
		$OrderCartRESTHandler = new OrderCartRESTHandler();
		$OrderCartRESTHandler->getAllItems();
		break;

	case "orderitems":
		// to handle REST Url OrderCart/orderitems/<id>
		$OrderCartRESTHandler = new OrderCartRESTHandler();
		$OrderCartRESTHandler->getOrderItems($request[1]);
		break;
 	default:
        	break;
	}
break;

   case 'PUT':
	// to handle REST Url OrderCart/items/<id>/<quantity>
	$OrderCartRESTHandler = new OrderCartRESTHandler();
	$OrderCartRESTHandler->createOrder($request[1],$request[2]);
	break;

  case 'POST':
         // to handle REST Url OrderCart/order/<id>/items/<id>/<quantity>
	$OrderCartRESTHandler = new OrderCartRESTHandler();
	$OrderCartRESTHandler->updateOrder($request[1],$request[3],$request[4]);
	break;

  case 'DELETE':
     // to handle REST Url OrderCart/item/1
    $OrderCartRESTHandler = new OrderCartRESTHandler();
    $OrderCartRESTHandler->cancelOrder($request[1]); 
    break;

  default:
        break;
}

$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];


switch($view ){
	
	
	case "selectall":
		// to handle REST Url OrderCart
		$OrderCartRESTHandler = new OrderCartRESTHandler();
		$OrderCartRESTHandler->getAllOrder();
		break;
		
	case "selectone":
		// to handle REST Url OrderCart/items/<id>/
		$OrderCartRESTHandler = new OrderCartRESTHandler();
		$OrderCartRESTHandler->getOrder($_GET["id"]);
		break;
        
   	case "selectorderitem":
		// to handle REST Url OrderCart/items/<id>/
		$OrderCartRESTHandler = new OrderCartRESTHandler();
		$OrderCartRESTHandler->getOrderItems($_GET["id"]);
		break;
	case "selectitem":
		// to handle REST Url OrderCart/items/<id>/
		$OrderCartRESTHandler = new OrderCartRESTHandler();
		$OrderCartRESTHandler->getAllItems();
		break;

	case "" :
		//404 - not found;
		break;
}




?>