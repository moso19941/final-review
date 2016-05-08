<?php

//echo "inside index.php";
	include 'dbconfig.php';
	session_start ();

$id = $_GET['id'];
$password = $_GET['password'];

if(empty ($id) || empty ($password)){
	echo "please full the id and password section";
}else {
	//echo "inside index.php";
	$sql = "SELECT `id`, `password`,`name`  FROM `login`";
	$sqlCheck = mysql_query ( $sql );

	if (isset ( $sqlCheck )) {
		while ( $row = mysql_fetch_row ( $sqlCheck ) ) {
			if($row [0] == $id && $row [1] == $password){
				echo "Weclome ".$row[2];
				$_SESSION ['user'] ['id'] = $row[0];
				$_SESSION ['user'] ['name'] = $row [2];
				header ('Location: homepage.html');
				exit ();
			}else{
				echo "sorry we couldn't find it";
			}
		}
	}

}


?>