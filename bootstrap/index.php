<?php
	$status=true;
	include("dbHandler.php");
	if(isset($_POST['adminLogin'])){
	$user=$_POST['userId'];
		$password=$_POST['password'];
		$obj=new Database;
		 $obj->ConnectDatabase();
			if($obj->AdminLogin($user,$password)){
				echo 'You r log in';
				 $obj->DisconnectDatabase();
				
			}else{
				$status=False;
				 $obj->DisconnectDatabase();				
				
			}
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Inventory Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	 

  </head>
  <body>
	<div class="container">
		<div class="row" >
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<div class="jumbotron" style="margin-top:200px">
					<form method="post" target="">
						<div class="form-group" style="margin:auto; width:50%; color:#0E5159;padding-bottom:20px">
							<h2>Admin Login</h2>
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon">
								<span class="fa fa-user-circle"></span>
							</span>
							<input type="text" name ="userId" class="form-control"  placeholder="Enter your User Id"  required>
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon">
								<span class="fa fa-key"></span>
							</span>
							<input type="password" class="form-control" name="password" placeholder="Enter your password" required>
						</div>		 
						<button type="submit" name="adminLogin"  name=""class="btn btn-primary" style="width:100%">Log In</button>
					</form>
					<?php if($status==false){
						echo '<div class="alert alert-danger" role="alert" style="margin-top:20px">';
						echo '<p>Invalid Email and Password try again.</p>';
						}
						?>
					</div>
				
				</div>			
			</div>
			<div class="col-sm-2"></div>
		</div>
	</div>
  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
		
  </body>
</html>
