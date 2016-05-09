<?php
/* 
A domain Class to demonstrate RESTful web services
*/

require_once 'dbconfig.php';

Class Mobile {
	
	private $mobiles = array();
		

	/*
		you should hookup the DAO here
	*/
		//private $Products = array();
			// 'p1' => 'Apple iPhone 6S',  
			// 'p2' => 'Samsung Galaxy S6',  
			// 'p3' => 'Apple iPhone 6S Plus',  			
			// 'p4' => 'LG G4',  			
			// 'p5' => 'Samsung Galaxy S6 edge',  
			// 'p6' => 'OnePlus 2');





	public function getAllMobile(){
		
		 $sql = "SELECT `id`, `name`, `category`, `price`, `description`, `img` FROM `product`";
		// echo "$sql";
		 $sqll = mysql_query($sql);
		
		 if (isset ( $sqll )){
		 	$counter = 0;
		 	while ( $row = mysql_fetch_row ($sqll)) {
		 		 $p = 'p'.$counter;
		 		// echo "$p";
		 		$mobiles[$p] = $row[1];
		 		$counter++;
		 	}
		 }

		return $mobiles;
	}
	
	public function getMobile($id){
	//	echo $id;
		$int = intval(preg_replace('/[^0-9]+/', '', $id), 10); // to take number from string
	//	echo "$int";
	//	echo "$p";
		 $sql = "SELECT `id`, `name`, `category`, `price`, `description`, `img` FROM `product` WHERE `id` = $int";
		// echo "$sql";
		 $sqll = mysql_query($sql);
		
		 if (isset ( $sqll )){
		 	$counter = 0;
		 	while ( $row = mysql_fetch_row ($sqll)) {
				$mobiles[$id] = $row[1];
		 	}
		 }
		
		return $mobiles;
	}	
}
?>