<?php
	include "connect.php";

	session_start();

	if (isset($_SESSION["id"])) {

		$qry = "select * from PRODUCTS;";

		$res = $con->query($qry);

		$qry = "insert into ORDERS (CUS_ID, ORDER_DATE) values (".$_SESSION["id"].", '".date("Y-m-d")."');";

		$con->query($qry);

		$qry = "select ORDER_ID from ORDERS;";

		$res1 = $con->query($qry);

		while($row = $res1->fetch_assoc()){
			$ordrId = $row["ORDER_ID"];
		}

		while ($row = $res->fetch_assoc()) {
			if (isset($_POST[$row["PROD_ID"]])) {
				$lin_qty = $_POST[$row["PROD_ID"]."qty"];

				$lin_price = $lin_qty * $row["PRICE"];

				$qry = "insert into OrderDetails values (".$ordrId.", ".$row["PROD_ID"].", ".$lin_qty.", ".$lin_price.");";

				$con->query($qry);
			}
		}

		$qry = "select sum(LINE_PRICE) as price from OrderDetails where ORDER_ID = ".$ordrId.";";

		$res1 = $con->query($qry);

		$row = $res1->fetch_assoc();

		$qry = "update ORDERS set price = ".$row["price"]." where ORDER_ID = ".$ordrId.";";

		$con->query($qry);

		header("Location:customer-orders.php");

	} else {
		header("Location:login.php");
	}

?>