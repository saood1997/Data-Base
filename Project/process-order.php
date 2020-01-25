<?php
	include "connect.php";

	session_start();

	$id = $_GET['id'];

	$qry = "Select * from OrderDetails where ORDER_ID = ".$id.";";

	$res = $con->query($qry);

	while($row = $res->fetch_assoc()) {
		$qry = "Select * from PRODUCTS where PROD_ID = ".$row["PROD_ID"].";";

		$res1 = $con->query($qry);

		$row1 = $res1->fetch_assoc();

		$oldQty = $row1["QUANTITY"];

		$ordrQty = $row["LINE_QTY"];

		$newQty = $oldQty - $row["LINE_QTY"];

		$qry = "Update PRODUCTS set QUANTITY = ".$newQty." where PROD_ID = ".$row["PROD_ID"].";";

		$con->query($qry);
	}

	$qry = "Update ORDERS set STATUS = 'Processed', EMP_ID = ".$_SESSION["id"]." where ORDER_ID = ".$id.";";

	$con->query($qry);

	header("Location:employee.php");
?>