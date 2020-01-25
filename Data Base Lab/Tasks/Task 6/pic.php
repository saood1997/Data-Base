<?php
	include "connect.php";

?>

<html>
<head>
	<title>pic</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bclr{
            background: #EEEEEE;
        }
    </style>
</head>
<body class="bclr">
	<form action="pic_try" method="post">
        <div class="form-group row">
            <div class="col-sm-4"></div>
            <input type="file" value="select pic" class="btn btn-primary col-sm-4">
            <div class="col-sm-4"></div>
        </div>

	 <div class="form-group row">
            <div class="col-sm-4"></div>
            <input type="submit" value="Insert" class="btn btn-primary col-sm-4">
            <div class="col-sm-4"></div>
        </div>

	<div class="form-group row">
            <div class="col-sm-4"></div>
                <?php
                    if (isset($_GET["Message"])) {
                        echo "<div class='col-sm-4 alert alert-danger' align='center'>";
                        echo $_GET["Message"];
                        echo "</div>";
                    }
                ?>
            </div>
            <div class="col-sm-4"></div>
        </div>
	</form>
</body>
</html>
