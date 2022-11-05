<?php
    $user = 'root';
    $pass = '';
    $db = 'gtg';
    $connect = mysqli_connect('localhost', $user, $pass, $db) or die("Unable to connect");
    if (isset($_POST["submit"])) {
        if (!empty($_POST["MemberID"]) && !empty($_POST["OrderTime"]) && !empty($_POST["OrderStatus"])) {
           
			$id = $_POST["OrderID"];
			$memid = $_POST["MemberID"];
            $time = $_POST["OrderTime"];
            $status = $_POST["OrderStatus"];
			
            
            //Write SQL query
            $query = "UPDATE orders SET MemberID='$memid', OrderTime='$time', OrderStatus='$status'WHERE OrderID = '$id'";
           
			
			echo $query;
			
			
			
			$result = mysqli_query($connect, $query) or die(mysqli_error($result));
            if ($result) {
                echo "Successfully edited product";
				header('Location: orders.php');
			
            } else {
                echo "Form unsuccessfully submitted";
                header('Location: orders.php');
            }

        } else {
            echo "All fields required";
			echo $_POST["OrderID"] . $_POST["MemberID"] .$_POST["OrderTime"] . $_POST["OrderStatus"];
        }
    }
    else(isset($_POST["cancel"])){
        header('Location: orders.php')
    }
?>