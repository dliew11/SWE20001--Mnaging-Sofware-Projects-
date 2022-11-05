
<?php
    $user = 'root';
    $pass = '';
    $db = 'gtg';
    $connect = mysqli_connect('localhost', $user, $pass, $db) or die("Unable to connect");
	$orderid = $_GET["EditOrderID"];
	
	$query = "UPDATE orders SET Active = 0 WHERE OrderID ='$orderid'";
	$result = mysqli_query($connect, $query) or die(mysqli_error($result));
	
	if ($result) { 
	echo "Successfully deleted Order"; 
	header('Location: orders.php');
	} 
	
	else { echo "Form unsuccessfully submitted"; }

?>

