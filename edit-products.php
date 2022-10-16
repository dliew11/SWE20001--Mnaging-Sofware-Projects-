<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Page</title>
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


        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2">Search</button>
        </div>
      </div>
    </div>
  </header>
  
  <div class="container" style="padding-top:5%">

    <h3>Edit Product </h3>
	 
	 <?php 
		
		
		// Create connection
		$conn = new mysqli('localhost', 'root', '', 'gtg');

		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		//echo "Connected successfully";

		$sql = "SELECT ProductID, ProductName, Category, Unit, Price, Stock, ExpiryDate FROM products where PRODUCTID = " . $_GET["EditProductID"];
		$result = $conn->query($sql);
		
	
		
	
		
		$row = $result->fetch_assoc();
		
	 ?>
	 
	 
     <form action="update_product.php" method="post">
			
	  <div class="form-group col-md-4">
          <strong>
            <label for="productID">Product Id:</label>
            
			<?php echo  "<input type='number' style='border: none;' name = 'productID' id='productID' value='".$row['ProductID']. "'readonly />";  ?>	  
			
          </strong>
        </div>
			
			<div class="form-row">
				<div class=" col-md-4">
				  <label for="productname">Name</label>
				 
				  <?php echo '<input type="text" name="p_name" class="form-control" id="p_name" placeholder="Enter name product" value='.$row["ProductName"].'>'; ?>
				  
			
				</div>
				
				
				<div class="col-md-4"> </div>
				
				<div class="col-md-4"> 
				<p>Category of item</p>
					<select name="p_category" class="form-select" aria-label="Default select example">
					 
					  <?php echo '<option selected>' . $row["Category"]. '</option>'?>
					  <option value="Fruit">Fruit</option>
					  <option value="Vegetable">Vegetable</option>
					  <option value="Meat">Meat</option>
					</select>
				</div>

				
			</div>
			
			<div class="form-row">
				<div class="form-group col-md-4">
				  <label for="price">Price</label>
				   <?php echo '<input type="number" name="p_price" class="form-control" id="p_price" placeholder="Enter price product" value='.$row["Price"].'>'; ?>
				  
				</div>
				
				<div class="col-md-4"> </div>
				
				<div class="col-md-4">   
				<p>Unit of item</p>
				   <select name="p_unit" id="p_unit" class="form-select" aria-label="Default select example">
					  <?php echo '<option selected>' . $row["Unit"]. '</option'?>
					  <option value="Kg">Kg</option>
					  <option value="Bunch">Bunch</option>
					  <option value="Head">Head</option>
					  <option value="doz">doz</option>
					  <option value="litre">litre</option>
					  <option value="each">each</option>
				  </select>
				</div>
				
			</div>

		  <div class="form-row">
			  <div class="form-group col-md-4">
				  <label for="stock">Stock</label>
				  <?php echo '<input type="number" name="p_stock" class="form-control" id="p_stock" placeholder="Enter Stock Number" value='.$row["Stock"].'>'; ?>
				  
			  </div>
			  <div class="col-md-8"> </div>
			</div>
			

		<div class="form-row">
		  <div class="form-group col-md-4" >
			  <label for="expiry">Expiry</label>
			
			 <?php echo '<input type="date" name="p_expiry" class="form-control" id="p_expiry" value='.$row["ExpiryDate"].'>'; ?>
				 
		  </div>
		  
		
		</div>
		
		  <button type="submit" name = "submit" class="btn btn-primary">Confirm</button>
		  <button type="reset" class="btn btn-primary ">Cancel</button>
      </div>
	  
    </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
