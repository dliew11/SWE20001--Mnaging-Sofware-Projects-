<?php
    $user = 'root';
    $pass = '';
    $db = 'gtg';
    $connect = mysqli_connect('localhost', $user, $pass, $db) or die("Unable to connect". $connect->connect_error);

    if (isset($_POST["submit"])) 
    {
        if (!empty($_POST["memberid"]) && !empty($_POST["info"])) 
        {
            $memberid = $_POST["memberid"];
            // $address = $_POST["address"];
            $info= $_POST["info"];
            $time = date("Y-m-d");
            $status = "PENDING";
        
			$orderid = $_POST["orderID"];
		
            //Write SQL query
           
			$update_query = 
			"UPDATE orders 
			SET MemberID = $memberid, 
			OrderTime = $time, 
			OrderStatus = '$status', 
			Info = '$info' 
			WHERE OrderID = $orderid";
			
			
			
			
			$updateorderitems = 
			"SELECT ProductID, Quantity 
			FROM orderitems 
			WHERE OrderID = $orderid";
			
			
			
			$result = $connect->query($updateorderitems) or die("Failed");
			
				while($row = $result->fetch_assoc())
				{
					
					$productid = $row['ProductID'];
					$productidqty = $_POST[$productid];
					
					
					$update_productitem = "UPDATE orderitems SET Quantity = $productidqty WHERE OrderID = $orderid AND ProductID = $productid";
					$orderitemresult = $connect->query($update_productitem) or die("Failed: " . $update_productitem);
				
				}
			
			
			
			
			
			
			
            $result = mysqli_query($connect, $update_query) or die("Unable to add order's record into Orders table: " . $update_query);
            if ($result) {
               
				header('Location: orders.php');
			
            } 
			
			else 
			{
                echo "Form unsuccessfully submitted";	
            }

        } 
        echo "All fields required";
        
		
		
		header('Location: orders.php');
		
    }
?>