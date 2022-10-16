<?php
    $user = 'root';
    $pass = '';
    $db = 'gtg';
    $connect = mysqli_connect('localhost', $user, $pass, $db) or die("Unable to connect");
	$productid = $_GET["EditProductID"];
	
	$query = "UPDATE products SET Active = 0 WHERE ProductID = '$productid'";
	$result = mysqli_query($connect, $query) or die(mysqli_error($result));
	
	if ($result) { 
	echo "Successfully deleted product"; 
	header('Location: Products.php');
	} 
	
	else { echo "Form unsuccessfully submitted"; }

?>