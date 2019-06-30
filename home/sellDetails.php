<?php
	$link = mysqli_connect("localhost", "root", "", "inventory");

	$sql = "SELECT sell.invoice,product.name,product.price,sell.quantity,sell.totalprice FROM product,sell where product.id=sell.pid";
	if($result = mysqli_query($link, $sql)){
		if(mysqli_num_rows($result) > 0){
			$pd=$result;
		}
	}
	$sql = "SELECT customer.name FROM customer,sell where customer.id=sell.cid";
	if($result = mysqli_query($link, $sql)){
		if(mysqli_num_rows($result) > 0){
			$cd=$result;
		}
	}
	
		
	mysqli_close($link);
	
?>

<!DOCTYPE html >
<html>
	<head>
		
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
						<table class="table">
							<thead class="thead-dark">
								<tr>
									<th scope="col">Invoice Number</th>
									<th scope="col">Product Name</th>
									<th scope="col">Customer Name</th>
									<th scope="col">Unit Price</th>
									<th scope="col">Quantity</th>
									<th scope="col">Total Price</th>
								
								</tr>
							</thead>
							<tbody>
								
								<?php while($r=mysqli_fetch_array($pd) ){ ?>
									<tr>
									<td ><?php echo $r['invoice']; ?></td>
									<td ><?php echo $r['name']; ?></td>
									<td ></td>
									<td ><?php echo $r['price']; ?></td>
									<td ><?php echo $r['quantity']; ?></td>
									<td ><?php echo $r['totalprice']; ?></td>
									
												
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

