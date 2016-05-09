<!DOCTYPE html>
<html>
<head>
<title>Webstore</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="script.js"></script>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

<?php session_start (); ?>

	<form method="post" enctype="multipart/form-data">
        <br/>
        	name<input type="text" name="name" /><br/>
        	category<input type="text" name="catagory" /><br/>
        	price<input type="text" name="price" />
        	description<input type="text" name="description" />
            <input type="file" name="image" />
            <br/><br/>
            <input type="submit" name="sumit" value="Upload" />
    </form>

    <?php
    include 'dbconfig.php';
	
	$Products = array();
	if(isset($_POST['sumit'])){

		$name = $_POST['name'];
		$catagory = $_POST['catagory'];
		$price = $_POST['price'];
		$description = $_POST['description'];

 	    $image= addslashes($_FILES['image']['tmp_name']);
	    $image= file_get_contents($image);
	    $image= base64_encode($image);

                $qry="INSERT INTO `product`(`id`, `name`, `category`, `price`, `description`, `img`)
                values ('','$name','$catagory','price','$description : just word','$image')";

                $result=mysql_query($qry);
                if($result)
                {
                    echo "<br/>Image uploaded.";
                }
                else
                {
                    //echo "<br/>Image not uploaded.";
                }
            

 	}

 	echo "<h2 class='text-center'>All product</h2>";
 	echo "<a href='cart.php'><h3 style='color: black; background-color: lightblue' id='cart' class='text-center'>Cart</h3></a>";

		$sql = "SELECT `id`, `name`, `category`, `price`, `description`, `img` FROM `product`";
		$sqlCheck = mysql_query ($sql);
		if (isset ( $sqlCheck )) {
		echo "<table class='table'>";

		//
		
		echo '<form method="post" enctype="multipart/form-data">';
		while ( $row = mysql_fetch_row ($sqlCheck) ) {
			$productID = $row[0];
			echo "<tr><td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td>$row[2]</td>";
			echo "<td>$row[3]</td>";
			echo "<td>$row[4]</td>";
			echo '<td><img height="150" width="150" src="data:image;base64,'.$row[5].' "> </td>';
			echo "<input type='hidden' name='idOfProduct' id='idOfProduct' value='$productID'>";
			echo "<td>quaitity <input type='text' name='quaitity' value=''> </td>";
			echo "<td><button type='submit' class='btn btn-default' id='addToCart' value='$productID' name='add' onclick='AddTocart(this)'>Add To Cart</button></td></tr>";
				
			}
			echo '</form>';
		echo "</table>";

		} 
		
		if(isset($_POST['add'])){
			$ProductID =  $_POST['add'];
			$quaitity =  $_POST['quaitity'];
			echo "ID of the product : $ProductID<br>";
			echo "quaitity of the product : $quaitity";

			// create cart for evey customer then add (ID of the customer and ID of the product and quaitity)

		}
		

    ?>

</body>
</html>