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
	<title>Employee</title>
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
                        <li class="active"><a href="employee.php" class="act">Home</a></li>
                        <li class="active"><a href="stock.php">Stock</a></li>
                        <?php
                            if($_SESSION["type"] == "Manager"){

                                $result = "<li class='active'><a href='manage-employees.php'>Employees</a></li>
                                ";
                                $result .= "<li class='active'><a href='supp_show.php'>Suppliers</a></li>
                                ";
                                $result .= "<li class='active'><a href='cus_show.php'>Customers</a></li>
                                ";
                                echo $result;
                            }
                        ?>
                        <li class="active"><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    

    <div class="login">
        <div class="container">
            <h2>orders</h2>
        </div>
    </div>
                    
    
    <?php
            
        $qry = "SELECT * FROM ORDERS Where STATUS = 'Pending';";
        $res = $con->query($qry);
        $result = "";
        $class = "tblro";
        $flag = 1;

        $result .= "<div class ='container'>";
        $result .= "<table align='center' class='table table-bordered'>";
        $result .= "<tr class='tblh'><th>Order Date</th><th>Order Price</th><th>Status</th><th>View Details</th></tr>";

        if ($res->num_rows>0) {
            while ($row = $res->fetch_assoc()) 
            {
                //one row
                $result .= "<tr class ='".$class."'>
                                <td>
                                    ".$row['ORDER_DATE']."
                                </td>
                                <td>
                                    ".$row['PRICE']."
                                </td>
                                <td>
                                    ".$row['STATUS']."
                                </td>
                                <td>
                                    "."<span><a class='btn btn-primary' href='employee-order-details.php?id={$row['ORDER_ID']}'>Details</a></span>" ."
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
        

</body>
</html>