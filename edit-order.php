<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order Page</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">





</head>


<body>
  <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-2 text-white ">Home</a></li>
          <li><a href="products.php" class="nav-link px-2 text-secondary">Products</a></li>
          <li><a href="orders.php" class="nav-link px-2 text-white">Order</a></li>
          <li><a href="users.php" class="nav-link px-2 text-white">Users</a></li>
        </ul>


       
      </div>
    </div>
  </header>
  
  <div class="container" style="padding-top:5%">

    <h3>Edit Order </h3>
	 
	 <?php 
		
		
		// Create connection
		$conn = new mysqli('localhost', 'root', '', 'gtg');

		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		//echo "Connected successfully";

		$sql = "SELECT OrderID, MemberID, OrderTime, OrderStatus FROM orders where OrderID = " . $_GET["EditOrderID"];
		$result = $conn->query($sql);
		
	
		
	
		
		$row = $result->fetch_assoc();
		
	 ?>
	 
	 
     <form action="update_order.php" method="post">
			
	  <div class="form-group col-md-4">
          <strong>
            <label for="orderID">Order Id:</label>
            
			<?php echo  "<input type='number' style='border: none;' name = 'OrderID' id='orderID' value='".$row['OrderID']. "'readonly />";  ?>	  
			
          </strong>
        </div>
			
			<div class="form-row">
				<div class=" col-md-4">
				  <label for="memberID">Member ID:</label>
				 
          <?php echo '<input type="text" name="MemberID" class="form-control" id="memid" placeholder="Enter member ID" value='.$row["MemberID"].'>'; ?>
				  
				  
			
				</div>

      <div class="form-row">
				<div class=" col-md-4">
				  <label for="ordertime">Order Time:</label>

          <?php echo '<input type="date" name="OrderTime" class="form-control" id="time" value='.$row["OrderTime"].'>'; ?>
				  
				  
				  
			
				</div>
				
				
				<div class="col-md-4"> </div>
				
				<div class="col-md-4"> 
				<p>Order Status</p>
					<select name="OrderStatus" class="form-select" aria-label="Default select example">
					 
					  <?php echo '<option selected>' . $row["OrderStatus"]. '</option>'?>
					  <option value="PAID">PAID</option>
					  <option value="PENDING">PENDING</option>
					</select>
				</div>

				
			</div>
			
				
				
		  
		
		</div>
		
		  <button type="submit" name = "submit" class="btn btn-primary">Confirm</button>
		  <button type="cancel" name = "cancel" class="btn btn-danger">Cancel</button>
      </div>
	  
    </form>
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
