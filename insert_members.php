<?php
    $user = 'root';
    $pass = '';
    $db = 'gtg';
    $connect = mysqli_connect('localhost', $user, $pass, $db) or die("Unable to connect");
    if (isset($_POST["submit"])) {
        if (!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["join_date"]) && !empty($_POST["phone_number"]) && !empty($_POST["email"]) && !empty($_POST["address"])) {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $phone_num= $_POST["phone_number"];
            $join_date = $_POST["join_date"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            
            //Write SQL query
            $query = "INSERT INTO members(FirstName, LastName, JoinDate, Email, Address, PhoneNum, Active) values('$fname', '$lname', '$join_date', '$email', '$address', '$phone_num','1')";
            $result = mysqli_query($connect, $query) or die("Unable to add member's record into Members table" );
            if ($result) {
                echo "Successfully add member's details into Members Table";
				header('Location: Users.php');
			
            } else {
                echo "Form unsuccessfully submitted";
            }

        } else {
            echo "All fields required";
        }
    }
    mysqli_close($connect);
?>