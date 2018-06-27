<?php

class OrderCart {

private $dbhost = 'essenfursie.cmfoqzqe3kmx.us-west-2.rds.amazonaws.com';
private $dbport = '3306';
private $dbname ='EFSDB';
private $charset = 'utf8';

private $username = 'EFSuser123';
private $password = 'hello1234';

public function createOrder($item,$quant) {
	
		$connect_db = new mysqli( $this->dbhost, $this->username, $this->password, $this->dbname);
		
		if ( mysqli_connect_errno() ) {
			printf("Connection failed: %s\
", mysqli_connect_error());
			exit();
		}

		$sql = "INSERT INTO tbl_order(order_date) VALUES (now())";

if (mysqli_query($connect_db, $sql)) {
$lastinsID= $connect_db->insert_id;

$itemid= explode('-',$item);

$quantity=explode('-',$quant);

for ($x = 0; $x < count($itemid)-1; $x++) {

        $sqlitem = "INSERT INTO tbl_order_item(order_id,item_id,item_name,item_quantity,item_price) VALUES ($lastinsID,$itemid[$x],(Select item_name from tbl_item where item_id=".$itemid[$x]."),$quantity[$x],$quantity[$x]*(Select item_price from tbl_item where item_id=".$itemid[$x]."))";

  if (mysqli_query($connect_db, $sqlitem )) {
     }
else {
    echo "Error: " . $sqlitem . "<br>" . mysqli_error($connect_db);
  }
}
        $sqlprice = "UPDATE tbl_order SET order_price=(SELECT SUM(item_price) FROM tbl_order_item GROUP BY order_id HAVING order_id=".$lastinsID.") WHERE order_id=".$lastinsID;
      
       if (mysqli_query($connect_db, $sqlprice )){
             return array('ID'=> $lastinsID);
       }
  else {
    echo "Error: " . $sqlprice . "<br>" . mysqli_error($connect_db);
}
  
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect_db);
} 

mysqli_close($connect_db);
            
		
	}




public function getOrder($id) {
echo"test1";
	
		$connect_db = new mysqli( $this->dbhost, $this->username, $this->password, $this->dbname);
		
		if ( mysqli_connect_errno() ) {
			printf("Connection failed: %s\
", mysqli_connect_error());
			exit();
		}

		$sql = "SELECT * FROM tbl_order where order_id=".$id;
$result = $connect_db->query($sql);

 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

 return array('ID:'=> $row["order_id"],'Item:' => $row["item_id"]);
}
}
mysqli_close($connect_db);
            
		
	}



public function getAllOrders() {
	
		$connect_db = new mysqli( $this->dbhost, $this->username, $this->password, $this->dbname);
		
		if ( mysqli_connect_errno() ) {
			printf("Connection failed: %s\
", mysqli_connect_error());
			exit();
		}

		$sql = "SELECT * FROM tbl_order";
        $result = $connect_db->query($sql);
    $resultarray = array();
  $allresultarray = array();

   if ($result->num_rows > 0) {
    while($orderrow = $result->fetch_assoc()) {

        $itemarray = array();
        $allitemarray = array();

        $sqlitem = "SELECT * FROM tbl_order_item where order_id=".$orderrow["order_id"];
        $resultitem = $connect_db->query($sqlitem);
        if ($resultitem->num_rows > 0) {
            while($itemrow = $resultitem->fetch_assoc()) {
                $itemarray["itemname"]=$itemrow["item_name"];
                 $itemarray["itemprice"]=$itemrow["item_price"];
                 $itemarray["itemquantity"]=$itemrow["item_quantity"];
                 $allitemarray[]=$itemarray;
            }
        }
        
     $resultarray['orderid']=  $orderrow["order_id"];
     $resultarray['orderprice'] = $orderrow["order_price"];
     $resultarray['items'] =  $allitemarray;
     $allresultarray[]=$resultarray;
    }
   }
return $allresultarray; 
mysqli_close($connect_db);
            
		
	}

 public function getAllItems() {
	
		$connect_db = new mysqli( $this->dbhost, $this->username, $this->password, $this->dbname);
		
		if ( mysqli_connect_errno() ) {
			printf("Connection failed: %s\
", mysqli_connect_error());
			exit();
		}

		$sql = "SELECT * FROM tbl_item";

$result = $connect_db->query($sql);
$resultarray = array();
$itemarray= array();

 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

  $itemarray['itemid'] = $row["item_id"];
  $itemarray['itemname'] = $row["item_name"];
  $itemarray['itemprice'] = $row["item_price"];

  $resultarray[]=$itemarray;
    }
    
 }
return $resultarray;
mysqli_close($connect_db);
            
		
	}   
    
public function getOrderItems($id) {
	
		$connect_db = new mysqli( $this->dbhost, $this->username, $this->password, $this->dbname);
		
		if ( mysqli_connect_errno() ) {
			printf("Connection failed: %s\
", mysqli_connect_error());
			exit();
		}

 $resultarray = array();
        $itemarray = array();
        $allitemarray = array();

        $sqlitem = "SELECT * FROM tbl_order_item where order_id=".$id;
        $resultitem = $connect_db->query($sqlitem);
        if ($resultitem->num_rows > 0) {
            while($itemrow = $resultitem->fetch_assoc()) {
                $itemarray["itemid"]=$itemrow["item_id"];
                $itemarray["itemname"]=$itemrow["item_name"];
                 $itemarray["itemprice"]=$itemrow["item_price"];
                 $itemarray["itemquantity"]=$itemrow["item_quantity"];
                 $allitemarray[]=$itemarray;
            }
        }
    

     $resultarray= array('orderid' => $id,'items' => $allitemarray);
  
return $resultarray; 
mysqli_close($connect_db);
            
		
	}

public function cancelOrder($id) {
	
		$connect_db = new mysqli( $this->dbhost, $this->username, $this->password, $this->dbname);
		
		if ( mysqli_connect_errno() ) {
			printf("Connection failed: %s\
", mysqli_connect_error());
			exit();
		}

		$sql = "DELETE FROM tbl_order where order_id=".$id;

if (mysqli_query($connect_db, $sql)) {
    return array('ID:'=> $id);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($connect_db);
            
		
	}



public function updateOrder($id,$item,$quant) {
	
		$connect_db = new mysqli( $this->dbhost, $this->username, $this->password, $this->dbname);
		
		if ( mysqli_connect_errno() ) {
			printf("Connection failed: %s\
", mysqli_connect_error());
			exit();
		}
$itemid= explode('-',$item);

$quantity=explode('-',$quant);

for ($x = 0; $x < count($itemid)-1; $x++) {
		$sql = "UPDATE tbl_order_item SET item_quantity=".$quantity[$x].", item_price=".$quantity[$x]."*(SELECT item_price FROM tbl_item WHERE item_id=".$itemid[$x].") WHERE order_id=".$id." and item_id=".$itemid[$x];

if (mysqli_query($connect_db, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect_db);
}
}
	$sqlprice = "UPDATE tbl_order SET order_price=(SELECT SUM(item_price) FROM tbl_order_item GROUP BY order_id HAVING order_id=".$id.") WHERE order_id=".$id;
      
       if (mysqli_query($connect_db, $sqlprice )){

    return array('OrderID:'=> $id,'ItemID'=>$itemid);
} else {
    echo "Error: " . $sqlprice . "<br>" . mysqli_error($connect_db);
}
mysqli_close($connect_db);
            
		
	}
}

	

?>

