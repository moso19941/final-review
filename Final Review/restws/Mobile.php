<?php
/* 
A domain Class to demonstrate RESTful web services
*/
Class Mobile {
	
	private $mobiles = array(
		'p1' => 'Apple iPhone 6S',  
		'p2' => 'Samsung Galaxy S6',  
		'p3' => 'Apple iPhone 6S Plus',  			
		'p4' => 'LG G4',  			
		'p5' => 'Samsung Galaxy S6 edge',  
		'p6' => 'OnePlus 2');
		
	/*
		you should hookup the DAO here
	*/
	public function getAllMobile(){
		return $this->mobiles;
	}
	
	public function getMobile($id){
		
		$mobile = array($id => ($this->mobiles[$id]) ? $this->mobiles[$id] : $this->mobiles[1]);
		return $mobile;
	}	
}
?>