<?php session_start();?>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">


	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>


	<script>
	$(document).ready(function() {
		$('#example').DataTable();
	} );
	</script>
	
	

	
	</script>

<body>

	<header class="p-3 bg-dark text-white">
		<div class="container">
		  <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
			<a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
			  <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
			</a>

			<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
			  <li><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
			  <li><a href="products.php" class="nav-link px-2 text-white">Products</a></li>
			  <li><a href="orders.php" class="nav-link px-2 text-white">Order</a></li>
			  <li><a href="users.php" class="nav-link px-2 text-white">Users</a></li>
			</ul>


			
		  </div>
		</div>
	 </header>


	<div class="container" style="padding-top: 3%">
		<a type="button" class="btn btn-outline-primary" href="add-products.php">Add Products</a>
	</div>
	<div class="container" style="padding-top: 3%;">
		<div class="row">
			<div class="col-8 ">
				<table id="example" class="table table-striped" style="width:100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Product Name</th>
							<th>Category</th>
							<th>Unit</th>
							<th>Price</th>
							<th>Stock</th>
							<th>Expiry Date</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>

					<?php

					// Create connection
					$conn = new mysqli('localhost', 'root', '', 'gtg');

					// Check connection
					if ($conn->connect_error) {
					  die("Connection failed: " . $conn->connect_error);
					}
					//echo "Connected successfully";

					$sql = "SELECT ProductID, ProductName, Category, Unit, Price, Stock, ExpiryDate, Active FROM products";
					$result = $conn->query($sql);
					
					

					if ($result->num_rows > 0) {
					  // output data of each row
					  while($row = $result->fetch_assoc())
					  {
						if($row["Active"] == 1)
						{
							echo "<tr><td>" .$row["ProductID"]. "</td>" .
								 "<td>" . $row["ProductName"]. "</td>" .
								 "<td>" .$row["Category"]. "</td>" .
								 "<td>" .$row["Unit"]. "</td>" .
								 "<td>" .$row["Price"]. "</td>" .
								 "<td>" .$row["Stock"]. "</td>" .
								 "<td>" .$row["ExpiryDate"]. "</td>" .
								 "<td> <a  type ='button' class='btn btn-warning' href='edit-products.php?EditProductID=" .$row["ProductID"]."'><i class='fa fa-pencil fa-lg'></i></button></td>
								 <td> <a  type ='button' class='btn btn-warning' href='delete-products.php?EditProductID=" .$row["ProductID"]."'> <i class='fa fa-trash-o fa-lg'></i></button></td></tr>";
						}
					  }
					}

				?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<form method = "post" class="container" style="padding-top: 3%" action = "export_products.php">
        <input type = "submit" name = "export" value = "Export CSV file" class="btn btn-outline-primary"/>
    </form>
	<div class="container d-flex justify-content-center" style="padding-top: 3%;">
		<nav aria-label="Page navigation example">
			<ul class="pagination">
			  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
			  <li class="page-item"><a class="page-link" href="#">1</a></li>
			  <li class="page-item"><a class="page-link" href="#">2</a></li>
			  <li class="page-item"><a class="page-link" href="#">3</a></li>
			  <li class="page-item"><a class="page-link" href="#">4</a></li>
			  <li class="page-item"><a class="page-link" href="#">5</a></li>
			  <li class="page-item"><a class="page-link" href="#">6</a></li>
			  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
			</ul>
		  </nav>
	</div>

</body>
