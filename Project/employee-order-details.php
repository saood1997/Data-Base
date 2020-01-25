
<?php
	include "connect.php";

	session_start();

	if (!isset($_SESSION["id"])) {
        header("Location:login.php");
    } else {
        if(!isset($_SESSION["type"])) {
            header("Location:customer-home.php");
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Orders</title>
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
    <style>
        .tblh{
            background: #616060;
            font-size: 14px;
            color: white;
        }
        .tblro{
            font-size: 12px;
        }
        .tblre{
            font-size: 12px;
            background: #E9E8E8;
        }
    </style>
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
                        <li class="active"><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>


	<div class="login">
        <div class="container">
            <h2>Order Details</h2>
        </div>
    </div>			
					
	
	<?php

		$id = $_GET['id'];
        
        $qry = "select p.NAME, d.LINE_QTY, d.LINE_PRICE from PRODUCTS as p, OrderDetails as d where p.PROD_ID = d.PROD_ID and ORDER_ID = ".$id.";";
        $res = $con->query($qry);
		$result = "";
        $class = "tblro";
        $flag = 1;

		if ($res->num_rows>0) {
            $result .= "<div class ='container'>";
			$result .= "<table align='center' class='table table-bordered'>";
			$result .= "<tr class='tblh'><th>Product Name</th><th>Quantity</th><th>Price</th></tr>";
			while ($row = $res->fetch_assoc()) 
			{
				//one row
				$result .= "<tr class ='".$class."'>
								<td>
									".$row['NAME']."
								</td>
								<td>
									".$row['LINE_QTY']."
								</td>
								<td>
									".$row['LINE_PRICE']."
								</td>
							</tr>";
                
                $flag++;
     
                if(($flag)%2==0)
                    $class = "tblre";
                else
                    $class = "tblro";
			}
			$result .= "</table></div>";
		}
		echo $result;

	?>

	<div class ='form-group row'>
		<div class='col-sm-9' ></div>
		<a class='btn btn-primary' href='process-order.php?id={$id}'>Process Order</a>
		<div class='col-sm-3'></div>
	</div>
</body>
</html>