<?php
	$link = mysqli_connect("localhost", "root", "", "inventory");
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
		if (isset($_POST['insert'])) {
			$name = test_input($_POST["name"]);
			$brand = test_input($_POST["brand"]);
			$category = test_input($_POST["category"]);
			$price = test_input($_POST["price"]);
			$quantity = test_input($_POST["quantity"]);	
			if($link === false)
			{
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
				
				$sql = "INSERT INTO product (name,brand,category,price,quantity) VALUES ('$name','$brand','$category',$price,$quantity)";
				if(mysqli_query($link, $sql)){
				echo "Records inserted successfully.";
			} else{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
			header("Location: products.php");	
		} if (isset($_POST['delete'])){
				$id=$_POST['delete'] ;
			if($link === false)
			{
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
				$sql = "delete from product where id=$id";
				if(mysqli_query($link, $sql)){
				echo "Records inserted successfully.";
			} else{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
			header("Location: products.php");
		}
		if (isset($_POST['update'])){
				$id=$_POST['update'] ;
				$name = test_input($_POST["updatename"]);
				$brand = test_input($_POST["updatebrand"]);
				$category = test_input($_POST["updatecategory"]);
				$price = test_input($_POST["updateprice"]);
				$quantity = test_input($_POST["updatequantity"]);	
			if($link === false)
			{
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
				$sql = "update product set name='$name',brand='$brand',category='$category',price=$price,quantity=$quantity where id=$id";
				if(mysqli_query($link, $sql)){
				echo "Records inserted successfully.";
			} else{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
			header("Location: products.php");
		}
		
		
	}
	function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}
	
	$sql = "SELECT * FROM product";
	if($result = mysqli_query($link, $sql)){
		if(mysqli_num_rows($result) > 0){
			$row=$result;
		}
	}
		
	mysqli_close($link);
	
?>

<!DOCTYPE html >
<html>
	<head>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>   Products</title>
	</head>

	<body>
		<div class="container" style="margin-top:50px">
			<div class="jumbotron">
				<ul class="nav" style="background:#606060">
					<li class="nav-item" style="margin:5px">
						<button type="button" class="btn btn-info">
							<a class="nav-link active" href="home.php" style="color:white;">Home</a>
						</button>
					</li>
					<li class="nav-item" style="margin:5px">
						<button type="button" class="btn btn-info">
							<a class="nav-link" href="setting.php" style="color:white;">Setting</a>
						</button>
					</li>
					
					
				</ul>
			</div>
		</div>	
		<div class="container">
			<div class="jumbotron">
					<div class="row">	
						<div class="col-md-3">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#add" style="width:100%; font-size:20px">Add Product</button>
						</div>
					
					</div>
					<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title">Add Products</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
							<form method="post" action="">							
								<div class="form-group input-group">
									<span class="input-group-addon">
										<span class="fa fa-user-circle"></span>
									</span>
									<input type="text" name ="name" class="form-control"  placeholder="Enter product Name"  required>
								</div>
								
								<div class="form-group input-group">
									<span class="input-group-addon">
										<span class="fa fa-user-circle"></span>
									</span>
									<input type="text" name ="brand" class="form-control"  placeholder="Enter Brand"  required>
								</div>
								
								
								<div class="form-group input-group">
									<span class="input-group-addon">
										<span class="fa fa-user-circle"></span>
									</span>
									<input type="text" name ="category" class="form-control"  placeholder="Enter category"  required>
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon">
										<span class="fa fa-user-circle"></span>
									</span>
									<input type="number" name ="price" class="form-control"  placeholder="Enter Unit price"  required>
								</div>
								
								<div class="form-group input-group">
									<span class="input-group-addon">
										<span class="fa fa-user-circle"></span>
									</span>
									<input type="number" name ="quantity" class="form-control"  placeholder="Enter quantity"  required>
								</div>
								
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" name="insert" class="btn btn-primary">Add</button>
							</form>
						  </div>
						</div>
					  </div>
					</div>
							
					<div class="row">
						<table class="table">
							<thead class="thead-dark">
								<tr>
									<th scope="col">Product Name</th>
									<th scope="col">Brand</th>
									<th scope="col">Category</th>
									<th scope="col">Unit Price</th>
									<th scope="col">Quantity</th>
									<th scope="col" colspan="2"></th>
								</tr>
							</thead>
							<tbody>
								
								<?php while($r=mysqli_fetch_array($row)){ ?>
									<tr>
									<td ><?php echo $r['name']; ?></td>
									<td ><?php echo $r['brand']; ?></td>
									<td ><?php echo $r['category']; ?></td>
									<td ><?php echo $r['price']; ?></td>
									<td ><?php echo $r['quantity']; ?></td>
									<td>
										<form method="post" action="">
											<button type="submit" class="btn btn-danger" name="delete" value="<?php echo $r['id']; ?>" > Delete</button>
										</form>
									</td>
									<td>
										<button  class="btn btn-info" data-toggle="modal" data-target="#editModel-<?php echo $r['id']; ?>" >Update</button>
											 
											 <div class="modal fade" id="editModel-<?php echo $r['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
											  <div class="modal-dialog" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h5 class="modal-title">Update Product</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">&times;</span>
													</button>
												  </div>
												  <div class="modal-body">
													<form method="post" action="">							
														<div class="form-group input-group">
															<span class="input-group-addon">
																<span class="fa fa-user-circle"></span>
															</span>
															<input type="text" name ="updatename" class="form-control"  value="<?php echo $r['name']; ?>">
														</div>
														<div class="form-group input-group">
															<span class="input-group-addon">
																<span class="fa fa-user-circle"></span>
															</span>
															<input type="text" name ="updatebrand" class="form-control"  value="<?php echo $r['brand']; ?>">
														</div>
														<div class="form-group input-group">
															<span class="input-group-addon">
																<span class="fa fa-user-circle"></span>
															</span>
															<input type="text" name ="updatecategory" class="form-control"  value="<?php echo $r['category']; ?>">
														</div>
														<div class="form-group input-group">
															<span class="input-group-addon">
																<span class="fa fa-user-circle"></span>
															</span>
															<input type="text" name ="updateprice" class="form-control"  value="<?php echo $r['price']; ?>">
														</div>
														<div class="form-group input-group">
															<span class="input-group-addon">
																<span class="fa fa-user-circle"></span>
															</span>
															<input type="text" name ="updatequantity" class="form-control"  value="<?php echo $r['quantity']; ?>">
														</div>
														
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="submit" name="update" class="btn btn-primary" value="<?php echo $r['id']; ?>">Update</button>
													</form>
												  </div>
												</div>
											</div>
											</div>
											 
					
									</td>
								</tr> 
								<?php } ?>
							</tbody>
						</table>
					</div>			
					
			</div>  
		</div>
		
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>

