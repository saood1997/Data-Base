<?php 

	include "connect.php";

	session_start();

	$fName = $_POST["first_name"];
	$lName = $_POST["last_name"];
	$pass = $_POST["password"];
	$username = $_POST["username"];
	$contact = $_POST["contact"];
	$address = $_POST["address"];

	$qry1 = "select * from CUSTOMER where USER_NAME = '".$username."';";

	$res = $con->query($qry1);

	$msg = "";
	if ($res->num_rows > 0) {
		$msg = "username already exists";
		header("Location:signup.php?Message=$msg");
	} else {

		$qry = "insert into CUSTOMER (FIRST_NAME, LAST_NAME, ADDRESS, CONTACT, PASS, USER_NAME) values('".$fName."', '".$lName."', '".$address."', '".$contact."', '".$pass."', '".$username."');";

		$con->query($qry);
		
	}

	$_SESSION["id"] = $id;
	$_SESSION["name"] = $fname;

	header("Location:customer-home.php");
?>