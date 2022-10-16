<?php


  
	$product_id = $_POST['productid'];
	$order_id = $_POST['orderid'];
	
	
	
	
	if(!empty($_POST['productid']) && !empty($_POST['orderid']))
	{
		$conn = new mysqli('localhost', 'root', '', 'gtg');
		$query = "INSERT INTO orderitems(OrderID, ProductID, Quantity) values('$order_id', '$product_id', '0')";
		$order_result = mysqli_query($conn, $query);
		
		echo $query;
		
		$productinfo = mysqli_query($conn, "SELECT ProductName, Price FROM products where ProductID = $product_id");
		$row = $productinfo->fetch_assoc();
		
		
		echo "<tr>
				<td>".$product_id."</td><td>".$row["ProductName"]."</td><td>".$row["Price"]."</td>
					<td>
						<input class='form-control' type='number' name='$product_id' id='$product_id'  placeholder='' style='height:12%;' required>
					</td>
					
					<td> <button class='btn btn-warning'> <i class='fa fa-trash-o fa-lg'></i></button></td>
                </tr>";
		
		

		
	}
	
	
?>