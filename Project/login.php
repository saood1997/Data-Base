
<?php
    include "connect.php";

    session_start();

    if (isset($_SESSION["id"])) {
        if(!isset($_SESSION["type"])) {
            header("Location:customer-home.php");
        } else {
        	header("Location:employee.php");
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/checkbox.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome icons -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- //font-awesome icons -->
	<!-- js -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<!-- //js -->
	<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
			</div>
			<div class="agile-login">
				<h3 style="color:white">Welcome!
					<?php if(isset($_SESSION["name"])) {echo $_SESSION["name"];} ?>
				</h3>
			</div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="customer-home.php">super Market</a></h1>
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav" >
						<li class="active"><a href="customer-home.php" class="act">Home</a></li>
						<li class="active"><a href="signup.php" class="act">Sign Up</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>

	<div class="login">
		<div class="container">
			<h2>Login</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form action="login-try.php" method="post">
					<input type="text" name="user_name" placeholder="Username" required>
					<input type="password" name="password" placeholder="Password" required style="background: white">	
		            <input type="submit" value="Login">
					
					<?php 
						$result = "";
						if (isset($_GET["Message"])) {
						$result .= "<div class='alert alert-danger' style='margin-top:10px'>";
							$result .= $_GET["Message"];
						$result .= "</div>";
						}

						echo $result;
					?>
				</form>
			</div>
		</div>
	</div>
</body>
</html>