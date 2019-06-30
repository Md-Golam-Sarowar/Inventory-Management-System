<?php require_once('../Connections/kg.php'); ?>
<?php
	$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
	if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
	  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
	}
	if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){	
	  $logoutGoTo = "../index.php";
	  if ($logoutGoTo) {
		header("Location: $logoutGoTo");
		exit;
	  }
	}
?>



<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>	
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
					
					<li class="nav-item" style="margin:5px">
						<button type="button" class="btn btn-danger">
							<a class="nav-link" href="<?php echo $logoutAction ?>" style="color:white;">Logout</a>
						</button>
					</li>
				</ul>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="row" style="margin-bottom:20px">
						<div class=col-sm-12>
							<div class="card">
								<div class="card-body">
									<div class="card-title">
										<img class="card-img-top" src="img/buy.png" alt="Card image cap" style="height:30%;width:30%;">
										<span><strong>Brands</strong></span>
									</div>
									<p class="card-text">Here you can add and manage Brands </p>
									<a href="brands.php" class="btn btn-warning"><span class="fa fa-pencil-square-o">&nbsp;</span>Manage</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row" style="margin-bottom:20px">
						<div class=col-sm-12>
							<div class="card">
								<div class="card-body">
									<div class="card-title">
										<img class="card-img-top" src="img/buy.png" alt="Card image cap" style="height:30%;width:30%;">
										<span><strong>Categories</strong></span>
									</div>
									<p class="card-text">Here you can add and manage Categories </p>
									<a href="categories.php" class="btn btn-warning"><span class="fa fa-pencil-square-o">&nbsp;</span>Add</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row" style="margin-bottom:20px">
						<div class=col-sm-12>
							<div class="card">
								<div class="card-body">
									<div class="card-title">
										<img class="card-img-top" src="img/buy.png" alt="Card image cap" style="height:30%;width:30%;">
										<span><strong>Products</strong></span>
									</div>
									<p class="card-text">Here you can add and manage Categories </p>
									<a href="products.php" class="btn btn-warning"><span class="fa fa-pencil-square-o">&nbsp;</span>Add</a>
								</div>
							</div>
						</div>
					</div>
						
											
				</div>
				<div class="col-sm-8" >
					<div class="jumbotron" >
						
						<div class="row" style="margin-bottom:30px;margin-top:20px;">
							<div class=col-sm-6>
								<div class="card">
									<div class="card-body">
										<div class="card-title">
											<img class="card-img-top" src="img/buy.png" alt="Card image cap" style="height:30%;width:30%;">
											<span><strong>Sell</strong></span>
										</div>
										<p class="card-text">Here you can add and manage Categories </p>
										<a href="sells.php" class="btn btn-warning"><span class="fa fa-pencil-square-o">&nbsp;</span>Sell</a>
									</div>
								</div>
							</div>
							<div class=col-sm-6>
								<div class="card">
									<div class="card-body">
										<div class="card-title">
											<img class="card-img-top" src="img/buy.png" alt="Card image cap" style="height:30%;width:30%;">
											<span><strong>Sell Details</strong></span>
										</div>
										<p class="card-text">Here you can add and manage Categories </p>
										<a href="sellDetails.php" class="btn btn-warning"><span class="fa fa-pencil-square-o">&nbsp;</span>Sell</a>
									</div>
								</div>
							</div>
							
						</div>
						
						<div class="row" style="margin-bottom:30px;margin-top:30px;">
							<div class=col-sm-6>
								<div class="card">
									<div class="card-body">
										<div class="card-title">
											<img class="card-img-top" src="img/buy.png" alt="Card image cap" style="height:30%;width:30%;">
											<span><strong>Customers</strong></span>
										</div>
										<p class="card-text">Here you can add and manage Categories </p>
										<a href="customers.php" class="btn btn-warning"><span class="fa fa-pencil-square-o">&nbsp;</span>Sell</a>
									</div>
								</div>
							</div>
							
							<div class=col-sm-6>
								<div class="card">
									<div class="card-body">
										<div class="card-title">
											<img class="card-img-top" src="img/buy.png" alt="Card image cap" style="height:30%;width:30%;">
											<span><strong>Sell</strong></span>
										</div>
										<p class="card-text">Here you can add and manage Categories </p>
										<a href="categories.php" class="btn btn-warning"><span class="fa fa-pencil-square-o">&nbsp;</span>Sell</a>
									</div>
								</div>
							</div>
							
							
						</div>
						
						
						
						
					</div>
				</div>
					
			</div>
		</div>
   
   
	
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>

