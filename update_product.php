<?php
    $user = 'root';
    $pass = '';
    $db = 'gtg';
    $connect = mysqli_connect('localhost', $user, $pass, $db) or die("Unable to connect");
    if (isset($_POST["submit"])) {
        if (!empty($_POST["p_name"]) && !empty($_POST["p_price"]) && !empty($_POST["p_stock"]) && !empty($_POST["p_expiry"]) && !empty($_POST["p_unit"]) && !empty($_POST["p_category"])) {
           
			$id = $_POST["productID"];
			$productname = $_POST["p_name"];
            $price = $_POST["p_price"];
            $stock = $_POST["p_stock"];
			$expiry = $_POST["p_expiry"];
			$unit = $_POST["p_unit"];
			$category = $_POST["p_category"];
            
            //Write SQL query
            $query = "UPDATE products SET ProductName='$productname', Category='$category', Unit='$unit', Price='$price', Stock='$stock', ExpiryDate='$expiry' WHERE ProductID = '$id'";
           
			
			echo $query;
			
			
			
			$result = mysqli_query($connect, $query) or die(mysqli_error($result));
            if ($result) {
                echo "Successfully edited product";
				header('Location: Products.php');
			
            } else {
                echo "Form unsuccessfully submitted";
            }

        } else {
            echo "All fields required";
			echo $_POST["p_name"] . $_POST["p_price"] . $_POST["p_stock"] . $_POST["p_unit"] . $_POST["p_category"] . $_POST["p_expiry"];
        }
    }
?>