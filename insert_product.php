<?php
    $user = 'root';
    $pass = '';
    $db = 'gtg';
    $connect = mysqli_connect('localhost', $user, $pass, $db) or die("Unable to connect");
    if (isset($_POST["submit"])) {
        if (!empty($_POST["p_name"]) && !empty($_POST["p_price"]) && !empty($_POST["p_stock"]) && !empty($_POST["p_expiry"]) && !empty($_POST["p_unit"]) && !empty($_POST["p_category"])) {
            $productname = $_POST["p_name"];
            $price = $_POST["p_price"];
            $stock = $_POST["p_stock"];
			$expiry = $_POST["p_expiry"];
			$unit = $_POST["p_unit"];
			$category = $_POST["p_category"];
            
            //Write SQL query
            $query = "INSERT INTO products(ProductName, Category, Unit, Price, Stock, ExpiryDate, Active) values('$productname', '$category', '$unit', '$price', '$stock', '$expiry', '1')";
            echo $query;
			
			
			
			$result = mysqli_query($connect, $query) or die(mysqli_error($result));
            if ($result) {
                echo "Successfully added product";
                header('Location: products.php');
			
            } else {
                echo "Form unsuccessfully submitted";
            }

        } else {
            echo "All fields required";
			echo $_POST["p_name"] . $_POST["p_price"] . $_POST["p_stock"] . $_POST["p_unit"] . $_POST["p_category"] . $_POST["p_expiry"];
        }
    }
?>