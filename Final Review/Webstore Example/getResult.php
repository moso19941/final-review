<?php
 include 'dbconfig.php';

$keyword = $_GET['keyword'];
//echo "The keyword that you wrote is : $keyword";

 $sql = "SELECT `id`, `name`, `category`, `price`, `description`, `img` FROM `product` WHERE `name` = '".$keyword."'";
 //echo "$sql";
 $result=mysql_query($sql);

 if($result){
 	echo '<form method="post" enctype="multipart/form-data">';
	echo "<table class='table'>";
 	$checkNotEmpty = '';
 	while ( $row = mysql_fetch_row($result) ) {
 		$checkNotEmpty = $row[0];
 		$productID = $row[0];
 		echo "<tr><td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td>$row[2]</td>";
			echo "<td>$row[3]</td>";
			echo "<td>$row[4]</td>";
			echo '<td><img height="150" width="150" src="data:image;base64,'.$row[5].' "> </td>';
			echo "<input type='hidden' name='idOfProduct' id='idOfProduct' value='$productID'>";
			echo "<td>quaitity <input type='text' name='quaitity' value='1'> </td>";
			echo "<td><button type='submit' class='btn btn-default' id='add' value='$productID' name='add' onclick='AddTocart(this)'>Add To Cart</button></td></tr>";
 	}
	echo "</table>";
	echo '</form>';
	if($checkNotEmpty == ''){
		echo "sorry we couldn't found you item";
	}

		if(isset($_POST['add'])){
		$ProductID =  $_POST['add'];
		$quaitity =  $_POST['quaitity'];
		echo "ID of the product : $ProductID<br>";
		echo "quaitity of the product : $quaitity";

		// echo "fdsgfdsgfdsgfd";
		// create cart for evey customer then add (ID of the customer and ID of the product and quaitity)

	}else {
		echo "something wrong";
	}
 }




?>