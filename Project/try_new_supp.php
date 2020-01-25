<?php

	include "connect.php";

	session_start();

	$name = $_POST["txtname"];
	$contact = $_POST["txtcontact"];
	$address = $_POST["txtAddress"];

	$qry1 = "select * from SUPPLIER where NAME = '".$name."';";

	$res = $con->query($qry1);

	$msg = "";
	if ($res->num_rows > 0) {
		$msg = "username already exists";
		header("Location:supp_show.php?Message=$msg");
	} else{

		$qry = "insert into SUPPLIER (NAME,ADDRESS, CONTACT) values('".$name."','".$address."', '".$contact."');";

		$con->query($qry);
		$msg = "Supplier Registered";
		
	}
	
	header("Location:supp_show.php?Message=$msg");
    
?>