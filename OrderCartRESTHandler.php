<?php

include 'SimpleREST.php';

include 'OrderCart.php';

		 
class OrderCartRESTHandler extends SimpleREST {

	public function getOrder($id) {
		$OrderCart = new OrderCart();
 echo"test1";
		$rawData = $OrderCart->getOrder($id);

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No Orders found!');		
		} else {
			$statusCode = 200;
		}
		$this->sendResponse($rawData, $statusCode);
	}

	function getAllOrder() {	
		$OrderCart = new OrderCart();

		$rawData = $OrderCart->getAllOrders();

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No orders found!');		
		} else {
			$statusCode = 200;
		}

 		$this->sendResponse($rawData, $statusCode);
	}

	function getAllItems() {	
		$OrderCart = new OrderCart();

		$rawData = $OrderCart->getAllItems();

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No items found!');		
		} else {
			$statusCode = 200;
		}

 		$this->sendResponse($rawData, $statusCode);
	}

	function createOrder($itemid,$quantity) {	
		$OrderCart = new OrderCart();
		$rawData = $OrderCart->createOrder($itemid,$quantity);


		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No orders found!');		
		} else {
			$statusCode = 200;
		}

 		$this->sendResponse($rawData, $statusCode);
	}
	function updateOrder($id,$itemid,$quantity) {	
		$OrderCart = new OrderCart();
		$rawData = $OrderCart->updateOrder($id,$itemid,$quantity);


		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No orders found!');		
		} else {
			$statusCode = 200;
		}

 		$this->sendResponse($rawData, $statusCode);
	}

	function cancelOrder($id) {	
		$OrderCart = new OrderCart();
		$rawData = $OrderCart->cancelOrder($id);


		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No orders found!');		
		} else {
			$statusCode = 200;
			echo"Order Cancelled successfully";
		}

 		$this->sendResponse($rawData, $statusCode);
	}

	function getOrderItems($id) {	
		$OrderCart = new OrderCart();

		$rawData = $OrderCart->getOrderItems($id);

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No orders found!');		
		} else {
			$statusCode = 200;
		}

 		$this->sendResponse($rawData, $statusCode);
	}
	public function encodeHtml($responseData) {

		foreach($responseData as $key=>$value) {

    			$htmlResponse .=  $value;
		}
		return "myFunc(json_encode($responseData))";		
	}
	
	public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
	}
	
	public function encodeXml($responseData) {
		// creating object of SimpleXMLElement
		$xml = new SimpleXMLElement('<?xml version="1.0"?><simplecart></simplecart>');
		foreach($responseData as $key=>$value) {
			$xml->addChild($key, $value);
		}
		return $xml->asXML();
	}
	
	function sendResponse($rawData, $statusCode)
	{
		if ($_SERVER['HTTP_ACCEPT'] == "*/*") // postman
		{
			$reqType  = $_SERVER['CONTENT_TYPE'];
		} else
		{
			$reqType  = $_SERVER['HTTP_ACCEPT'];			
		}

		$requestContentType = $reqType;
		
		if(strpos($requestContentType,'application/json') !== false || $requestContentType == ''){

			$this ->setHttpHeaders("application/json", $statusCode);
			$response = $this->encodeJson($rawData);
			echo $response;
			
		} else if(strpos($requestContentType,'text/html') !== false ){

			$this->setHttpHeaders("text/html", $statusCode);
			$response = $this->encodeHtml($rawData);
			echo $response;
			
		} else if(strpos($requestContentType,'application/xml') !== false){

			$this->setHttpHeaders("application/xml", $statusCode);
			$response = $this->encodeXml($rawData);
			echo $response;
		}
	}
	
}




?>