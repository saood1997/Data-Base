<?php 
	include "connect.php";
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
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
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>

</head>
<body style="background: #f5f5f5">
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
						<?php 
							if (isset($_SESSION["type"])) {
								if (isset($_SESSION["id"])) {
									header("Location:employee.php");
								} else {
									header("Location:login.php");
								}
							} else {
								if (isset($_SESSION["id"])) {
									echo "<li class='active'><a href='manage-account.php' class=act'>Manage Account</a></li>";
									echo "<li class='active'><a href='customer-orders.php' class=act'>My Orders</a></li>";
									echo "<li class='active'><a href='logout.php' class=act'>Logout</a></li>";
								} else {
									echo "<li class='active'><a href='login.php' class='act'>Log In</a></li>";
								}
							}
						?>
					</ul>
				</div>
			</nav>
		</div>
	</div>

	<ul id="demo1">
		<li>
			<img src="images/11.jpg" alt="" />
			<!--Slider Description example-->
			<div class="slide-desc">
				<h3>Buy Products At Wholesale Price With Us</h3>
			</div>
		</li>
		<li>
			<img src="images/22.jpg" alt="" />
			  <div class="slide-desc">
				<h3>Buy Products At Wholesale Price With Us</h3>
			</div>
		</li>
		
		<li>
			<img src="images/44.jpg" alt="" />
			<div class="slide-desc">
				<h3>Buy Products At Wholesale Price With Us</h3>
			</div>
		</li>
	</ul>




	<?php
		$qry = "select * from PRODUCTS;";

		$res = $con->query($qry);

		$result = "<form action='"."place-order.php"."' method='"."post"."'>
				<div class='newproducts-w3agile'>
					<div class='container'>
						<h3>Products</h3>";
		$col = 0;
		$row = $res->fetch_assoc();
		$continue = $row;
		while ($continue) {
			$result .= "<div class='agile_top_brands_grids'>";

			while($continue && $col < 4) {
				if ($continue) {
					$result .= "<div class='col-md-3 top_brand_left-1'>
									<div class='hover14 column'>
										<div class='agile_top_brand_left_grid'>
											<div class='agile_top_brand_left_grid1'>
												<figure>
													<div class='snipcart-item block'>
														<div class='snipcart-thumb'>
															<img title=' ' alt=' ' src='".$row["PIC_PATH"]."'>
															<p>".$row["NAME"]."</p>
															<h4>Rs.".$row["PRICE"]."</h4>
														</div>
														<div class='snipcart-details top_brand_home_details'>
															<label class='checkbox-container'>Add to Order
																<input type='checkbox' name='".$row["PROD_ID"]."'>
																<span class='checkmark'></span>
															</label>";
					$result .= "<div class='booking-form'>
					<div class='form-group'>
					<span class='form-label'>Quantity</span>
					<select class='form-control' name='".$row["PROD_ID"]."qty"."'>";

					$i = 1;
					$col = $col + 1;
					while ($i <= $row["QUANTITY"]) {
						$result .= "<option value=".$i.">".$i."</option>";

						$i = $i + 1;
					}

					$result .= "</select>
								<span class='select-arrow'></span>
								</div>
								</div>
									</div>
										</div>
									</figure>
								</div>
							</div>
						</div>
					</div>";
				}
				$row = $res->fetch_assoc();
				$continue = $row;
			}
			$col = 0;
			$result .= "</div>";
		}

		$result .= "</div>
			</div>";
		// $result = "<form action='"."place-order.php"."' method='"."post"."'>
		// 				<div>";
		// while($row = $res->fetch_assoc()) {
		// 	$result .= "<span>
		// 					<span>
		// 						<a href=''>
		// 							<img style='width:150px' src='".$row["PIC_PATH"]."'>
		// 						</a>
		// 					</span>
		// 					<span>
		// 						".$row["NAME"]."
		// 					</span>
		// 					<span>
		// 						Price: Rs.".$row["PRICE"]."
		// 					</span>
		// 					<span>
		// 						<input type='checkbox' name='".$row["PROD_ID"]."'>
		// 					</span>
		// 					<span>
		// 						Add to Order
		// 					</span>
		// 					<span>
		// 						Quantity
		// 					</span>
		// 					<span>";
							
		// 	$result .= "<select name='".$row["PROD_ID"]."qty"."'>";

		// 	$i = 1;

		// 	while ($i <= $row["QUANTITY"]) {
		// 		$result .= "<option value=".$i.">".$i."</option>";

		// 		$i = $i + 1;
		// 	}

		// 	$result .= "</select>";

		// 	$result .= "</span>
		// 		</span>";
		// }

		$result .= "<div class='login-form-grids animated wow slideInUp' data-wow-delay='.5s'>
				<input type='submit' value='Place Order'>
			</div>
			</form>";

		echo $result;
	?>


<script src="js/bootstrap.min.js"></script>

<!-- top-header and slider -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<!-- main slider-banner -->
<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>
</body>
</html>