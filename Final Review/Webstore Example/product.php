<?php

$view = $_GET['view'];


if($view == 'all'){
	echo "print all the product";
}else if ($view == 'single'){
	$productID = $_GET['id'];

	echo "print inormation about product : $productID";
}



?>