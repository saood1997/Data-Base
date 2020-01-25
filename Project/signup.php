<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
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
				<h1><a href="index.html">super Market</a></h1>
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
						<li class="active"><a href="login.php" class="act">Log In</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<div class="register">
		<div class="container">
			<h2>Register Here</h2>
			<div class="login-form-grids">
				<form action="signup-try.php" method="post">
						<input type="text" name="first_name" placeholder="First name" required>
						<input type="text" name="last_name" placeholder="Last name" required>
						<input type="text" name="username" placeholder="Username" required>
						<input type="password" name="password" placeholder="Password" required style="background: white">
						<input type="text" name="contact" placeholder="contact" style=" margin-top: 13px" required>
						<textarea placeholder="Address" name="address"required style="background:white; border:1px solid #DBDBDB; padding: 10px 10px 10px 10px; font-size: 14px; color: #999; margin-top: 13px" ></textarea>
					    <input type="submit" value="Register">
			        
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