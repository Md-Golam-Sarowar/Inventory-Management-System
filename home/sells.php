<?php
	$sellIsPossible1=false;
	$sellIsPossible2=false;
	$show;
	$link = mysqli_connect("localhost", "root", "", "inventory");
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
		if (isset($_POST['insert'])) {
			$productname =$_POST["productname"];
			$customername =$_POST["customername"];
			$quantity = $_POST["quantity"];
		
			if($link === false)
			{
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
			
				$sql = "SELECT * FROM product where name='$productname'";
				if($result = mysqli_query($link, $sql)){
					if(mysqli_num_rows($result) > 0){
						$product=mysqli_fetch_array($result);
						if($product['quantity']>=$quantity){
							$sellIsPossible1=true;
						}
						
					}
				}
				$sql = "SELECT * FROM customer where name='$customername'";
				if($result = mysqli_query($link, $sql)){
					if(mysqli_num_rows($result) > 0){
						$customer=mysqli_fetch_array($result);
						$sellIsPossible2=true;
					}
				}
			
				if($sellIsPossible1==true && $sellIsPossible2==true){
					$totalprice=$product['price']*$quantity;
					$pid=$product['id'];
					$cid=$customer['id'];
				
					$sql = "INSERT INTO sell (pid,cid,quantity,totalprice) VALUES ($pid,$cid,$quantity,$totalprice)";

					if(mysqli_query($link, $sql)){
						echo "Records inserted successfully.";
					} else{
						echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
					}
					
					$lastQuantity=$product['quantity']-$quantity;
					$sql = "update product set quantity=$lastQuantity where id=$pid";
					if(mysqli_query($link, $sql)){
						echo "Records inserted successfully.";
					} else{
						echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
					}
					
					
				}
				
		}
		
		if (isset($_POST['showProdeuct'])) {
			$name = test_input($_POST["productname"]);
			$sql = "SELECT * FROM product where name='$name'";
				if($result = mysqli_query($link, $sql)){
					if(mysqli_num_rows($result) > 0){
						$show=$result['name'];
					}
				}
			header("Location: sells.php");	
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
			$productrow=$result;
		}
	}
	$sql = "SELECT * FROM customer";
	if($result = mysqli_query($link, $sql)){
		if(mysqli_num_rows($result) > 0){
			$customerrow=$result;
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
					
					<div class="col-sm-6" style="text-align:center;">
						<div class="card">
						<h4 class="card-title">Product</h4>
						<table class="table">
								<tr>
									<th style="border:1px solid black;"> Name</th>
									<td style="border:1px solid black;">
									</td>
								</tr>
								<tr>
									<th style="border:1px solid black;">Price</th>
									<td style="border:1px solid black;">dsadsad</td>
								</tr>
								<tr>
									<th style="border:1px solid black;">Quantity</th>
									<td style="border:1px solid black;" >dsadsad</td>
								</tr>
							
							
						</table>
						
						</div>
						
					</div>
					
						<div class="col-sm-6" style="text-align:center;">
						<div class="card">
						<h4 class="card-title">Customer</h4>
						<table class="table">
								<tr>
									<th style="border:1px solid black;">Name</th>
									<td style="border:1px solid black;">dsadsad</td>
								</tr>
								<tr>
									<th style="border:1px solid black;">Address</th>
									<td style="border:1px solid black;">dsadsad</td>
								</tr>
								<tr>
									<th style="border:1px solid black;">Email</th>
									<td style="border:1px solid black;" >dsadsad</td>
								</tr>
							
							
						</table>
						
						</div>
						
					</div>
					
				</div>
				
			</div>
		</div>
		
		
		
		<div class="container">
			<div class="jumbotron">
				<form method="post" action="">	
					
						<div class="form-group input-group">
							<span class="input-group-addon">
								<span class="fa fa-user-circle"></span>
							</span>
							<span class="input-group-addon">
								<strong>Product Name</strong>
							</span>
							<select  name ="productname" class="form-control"  placeholder="Enter product Name"  required>
								<?php while($r=mysqli_fetch_array($productrow)){ ?>
										<option value="<?php echo $r['name']; ?>"><?php echo $r['name']; ?></option>option
									<?php } ?>
							</select>
							
						</div>
					
					<div class="form-group input-group">
						<span class="input-group-addon">
							<span class="fa fa-user-circle"></span>
						</span>
						<span class="input-group-addon">
							<strong>Customer Name</strong>
						</span>
						<select  name ="customername" class="form-control"  placeholder="Enter product Name"  required>
							<?php while($r=mysqli_fetch_array($customerrow)){ ?>
									<option value="<?php echo $r['name']; ?>"><?php echo $r['name']; ?></option>
								<?php } ?>
						</select>
					</div>									
					<div class="form-group input-group">
						<span class="input-group-addon">
							<span class="fa fa-user-circle"></span>
						</span>
						<span class="input-group-addon">
							<strong>Quantity</strong>
						</span>
						<input type="number" name ="quantity" class="form-control"  placeholder="Enter quantity"  required>
					</div>
					<div class="row">
						<div class="col-sm-4"></div>
						<div class="col-sm-4">
							<button type="submit" name="insert" class="btn btn-primary" style="width:100%; margin:auto;">Sell</button>
						</div>
						<div class="col-sm-4"></div>
							
						
					</div>
					
				</form>
			</div>
		</div>
					
							
					
		
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>

